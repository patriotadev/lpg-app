<?php

namespace App\Http\Controllers;

use App\Imports\PelangganImport;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use RealRashid\SweetAlert\Facades\Alert;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            'pelanggan' => Pelanggan::orderBy('id', 'DESC')->get(),
        ];
        confirmDelete('Hapus Data!', 'Apakah kamu ingin menghapus data ini?');
        return view('pages.pelanggan', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try {
            if ($request->hasFile('tanda_tangan')) {
                $file = $request->file('tanda_tangan');
                $outDirectory = public_path('images/users');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move($outDirectory, $fileName);
            }
            $data = [
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'status' => $request->status,
                'tanda_tangan' => isset($fileName) ? $fileName : '',
            ];
            Pelanggan::create($data);
            Alert::success('Berhasil!', 'Data telah ditambahkan.');
            return redirect()->route('pelanggan');
        } catch (\Throwable $th) {
            Alert::error('Oops!', 'Data gagal ditambahkan.');
            return redirect()->route('dashboard');
        }
    }

    /**
     * Import a newly created resource in storage.
     */
    public function import(Request $request)
    {
        //
        try {
            Excel::import(new PelangganImport, $request->file('pelanggan_excel_file'));
            Alert::success('Berhasil!', 'Data telah diupload.');
            return redirect()->route('pelanggan');
        } catch (\Throwable $th) {
            //throw $th;
            Alert::error('Oops!', 'Data gagal diupload.');
            return redirect()->route('pelanggan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
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
            'pelanggan' => Pelanggan::where('id', $id)->first(),
        ];
        return view('pages.pelanggan_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        //
        try {
            $currentPelangganTtd = Pelanggan::where('id', $request->id)->pluck('tanda_tangan')->first();
            $currentTtdPath = public_path('images/users/' . $currentPelangganTtd);

            if ($request->hasFile('tanda_tangan')) {
                $file = $request->file('tanda_tangan');
                $outDirectory = public_path('images/users/');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move($outDirectory, $fileName);

                if (File::exists($currentTtdPath)) {
                    File::delete($currentTtdPath);
                }
            }
            $data = [
                'nama' => $request->nama,
                'alamat' => $request->alamat,
                'status' => $request->status,
                'tanda_tangan' => isset($file) ? $fileName : $currentPelangganTtd,
            ];

            Pelanggan::where('id', $request->id)->update($data);
            Alert::success('Berhasil!', 'Data telah diubah.');
            return redirect()->route('pelanggan');
        } catch (\Throwable $th) {
            //throw $th;
            Alert::error('Oops!', 'Data gagal diubah.');
            return redirect()->route('pelanggan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        try {
            $currentPelangganTtd = Pelanggan::where('id', $id)->pluck('tanda_tangan')->first();
            $currentTtdPath = public_path('images/users/' . $currentPelangganTtd);

            if (File::exists($currentTtdPath)) {
                File::delete($currentTtdPath);
            }

            Pelanggan::where('id', $id)->delete();
            Alert::success('Berhasil!', 'Data berhasil dihapus.');
            return redirect()->route('pelanggan');
        } catch (\Throwable $th) {
            //throw $th;
            Alert::error('Oops!', 'Data gagal dihapus.');
            return redirect()->route('pelanggan');
        }
    }
}
