<?php

namespace App\Http\Controllers;

use App\Models\Gas;
use App\Models\Keranjang;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            'penjualan' => Penjualan::orderBy('id', 'DESC')->get()
        ];

        confirmDelete('Hapus Data!', 'Apakah kamu ingin menghapus data ini?');
        return view('pages.penjualan', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        try {
            $dataPenjualan  = [
                'pembeli' => $request->pembeli,
                'status' => $request->status,
                'alamat' => $request->alamat,
                'jenis_gas' => $request->jenis_gas,
                'jumlah_pembelian' => $request->jumlah_pembelian,
                'tanggal_pembelian' => $request->tanggal_pembelian,
                'status_pembelian' => 'Sedang Diproses'
            ];

            $pelanggan = Pelanggan::where([
                'nama' => $request->pembeli,
                'status' => $request->status,
                'alamat' => $request->alamat,
            ])->first();

            if (!$pelanggan) {
                $dataPelanggan = [
                    'nama' => $request->pembeli,
                    'status' => $request->status,
                    'alamat' => $request->alamat,
                ];
                Pelanggan::create($dataPelanggan);
            }

            Penjualan::create($dataPenjualan);
            Alert::success('Berhasil!', 'Data telah ditambahkan.');
            return redirect()->route('penjualan');
        } catch (\Throwable $th) {
            //throw $th;
            // return $th;
            Alert::error('Oops!', 'Data gagal ditambahkan.');
            return redirect()->route('penjualan');
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
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $data = [
            'jenis_gas' => Gas::all(),
            'penjualan' => Penjualan::where('id', $id)->first()
        ];

        return view('pages.penjualan_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        try {
            $data = [
                'jenis_gas' => $request->jenis_gas,
                'jumlah_pembelian' => $request->jumlah_pembelian,
                'tanggal_pembelian' => $request->tanggal_pembelian,
                'status_pembelian' => $request->status_pembelian
            ];

            Penjualan::where('id', $request->id)->update($data);
            $data = Penjualan::where('id', $request->id)->first();
            Keranjang::where([
                'jenis_gas' => $data->jenis_gas,
                'jumlah' => $data->jumlah_pembelian,
                'tanggal' => $data->tanggal_pembelian,
                'created_at' => $data->created_at
            ])->update([
                'jenis_gas' => $request->jenis_gas,
                'jumlah' => $request->jumlah_pembelian,
                'tanggal' => $request->tanggal_pembelian,
                'status_pembelian' => $request->status_pembelian
            ]);
            Alert::success('Berhasil!', 'Data telah diubah.');
            return redirect()->route('penjualan');
        } catch (\Throwable $th) {
            //throw $th;
            Alert::error('Oops!', 'Data gagal diubah.');
            return redirect()->route('penjualan');
        }
    }

    public function updateStatus(Request $request)
    {
        try {
            $data = [
                'status_pembelian' => $request->status_pembelian === 'Sedang Diproses' ? 'Dalam Perjalanan' : 'Sedang Diproses'
            ];

            Penjualan::where('id', $request->id)->update($data);
            $data = Penjualan::where('id', $request->id)->first();
            Keranjang::where([
                'jenis_gas' => $data->jenis_gas,
                'jumlah' => $data->jumlah_pembelian,
                'tanggal' => $data->tanggal_pembelian,
                'created_at' => $data->created_at
            ])->update([
                'status_pembelian' => $request->status_pembelian === 'Sedang Diproses' ? 'Dalam Perjalanan' : 'Sedang Diproses'
            ]);
            return redirect()->route('penjualan');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->route('penjualan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        try {
            $data = Penjualan::where('id', $id)->first();
            Keranjang::where([
                'jenis_gas' => $data->jenis_gas,
                'jumlah' => $data->jumlah_pembelian,
                'tanggal' => $data->tanggal_pembelian,
                'created_at' => $data->created_at
            ])->delete();
            Penjualan::where('id', $id)->delete();
            Alert::success('Berhasil!', 'Data berhasil dihapus.');
            return redirect()->route('penjualan');
        } catch (\Throwable $th) {
            //throw $th;
            dd($th);
            Alert::error('Oops!', 'Data gagal dihapus.');
            return redirect()->route('penjualan');
        }
    }
}
