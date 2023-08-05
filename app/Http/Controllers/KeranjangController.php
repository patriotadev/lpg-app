<?php

namespace App\Http\Controllers;

use App\Models\Gas;
use App\Models\Keranjang;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            'keranjang' => Keranjang::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get()
        ];

        confirmDelete('Hapus Data!', 'Apakah kamu ingin menghapus data ini?');
        return view('pages.keranjang', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        try {
            //code...
            $totalHarga = 0;
            $jumlahPembelian = [];
            foreach ($request->jumlah_pembelian as $key) {
                if ($key !== null) {
                    array_push($jumlahPembelian, $key);
                }
            }

            for ($i = 0; $i < count($request->jenis_gas); $i++) {
                $gas = Gas::where('jenis_gas', $request->jenis_gas[$i])->first();
                if ($gas->stok < 1) {
                    Alert::error('Oops!', 'Maaf stok ' . $request->jenis_gas[$i] . ' kosong');
                    return redirect()->route('keranjang_add');
                }
                if ($jumlahPembelian[$i] > $gas->stok) {
                    Alert::error('Oops!', 'Maaf stok ' . $request->jenis_gas[$i] . ' kurang dari ' .  $jumlahPembelian[$i]);
                    return redirect()->route('keranjang_add');
                }
                $totalHarga += $gas->harga * $jumlahPembelian[$i];
            }

            $data = [
                'user_id' => Auth::user()->id,
                'jenis_gas' => implode(", ", $request->jenis_gas),
                'jumlah' => implode(", ", $request->jumlah_pembelian),
                'tanggal' => $request->tanggal_pembelian,
                'status_pembelian' => 'Sedang Diproses'
            ];

            $dataPenjualan = [
                'pembeli' => Auth::user()->name,
                'status' => Auth::user()->status,
                'alamat' => Auth::user()->address,
                'jenis_gas' => implode(", ", $request->jenis_gas),
                'jumlah_pembelian' => implode(", ", $request->jumlah_pembelian),
                'tanggal_pembelian' => $request->tanggal_pembelian,
                'status_pembelian' => 'Sedang Diproses'
            ];

            $pelanggan = Pelanggan::where([
                'nama' => Auth::user()->name,
                'status' => Auth::user()->status,
                'alamat' => Auth::user()->address,
            ])->first();

            if (!$pelanggan) {
                $dataPelanggan = [
                    'nama' => Auth::user()->name,
                    'status' => Auth::user()->status,
                    'alamat' => Auth::user()->address,
                ];
                Pelanggan::create($dataPelanggan);
            }

            Penjualan::create($dataPenjualan);
            Keranjang::create($data);

            for ($i = 0; $i < count($request->jenis_gas); $i++) {
                $gas = Gas::where('jenis_gas', $request->jenis_gas[$i])->first();
                Gas::where('jenis_gas', $request->jenis_gas[$i])->update([
                    'stok' => $gas->stok - $jumlahPembelian[$i]
                ]);
            }

            Alert::success('Berhasil!', 'Total = Rp. ' . $totalHarga);
            return redirect()->route('keranjang');
        } catch (\Throwable $th) {
            //throw $th;
            Alert::error('Oops!', 'Data gagal ditambahkan ke keranjang.');
            return redirect()->route('keranjang');
        }
    }

    public function createView()
    {
        $data = [
            'jenis_gas' => Gas::all(),
            'user' => User::where('id', Auth::user()->id)->first()
        ];

        return view('pages.keranjang_add', $data);
    }

    public function updateStatus(Request $request)
    {
        try {
            $data = [
                'status_pembelian' => 'Sudah Diterima'
            ];

            Keranjang::where('id', $request->id)->update($data);
            $data = Keranjang::where('id', $request->id)->first();
            Penjualan::where([
                'jenis_gas' => $data->jenis_gas,
                'jumlah_pembelian' => $data->jumlah,
                'tanggal_pembelian' => $data->tanggal,
                'created_at' => $data->created_at
            ])->update([
                'status_pembelian' => 'Sudah Diterima'
            ]);
            return redirect()->route('keranjang');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('keranjang');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keranjang $keranjang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keranjang $keranjang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keranjang $keranjang)
    {
        //
    }
}
