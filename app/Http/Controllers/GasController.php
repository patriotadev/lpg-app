<?php

namespace App\Http\Controllers;

use App\Models\Gas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;


class GasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = [
            'gas' => Gas::orderBy('id', 'DESC')->get(),
        ];
        confirmDelete('Hapus Data!', 'Apakah kamu ingin menghapus data ini?');
        return view('pages.jenis_gas', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        try {
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $outDirectory = public_path('images/gas');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move($outDirectory, $fileName);
            }

            $data = [
                'jenis_gas' => $request->jenis_gas,
                'foto' => isset($fileName) ? $fileName : '',
                'harga' => $request->harga,
                'stok' => $request->stok,
            ];
            Gas::create($data);
            Alert::success('Berhasil!', 'Data telah ditambahkan.');
            return redirect()->route('jenis_gas');
        } catch (\Throwable $th) {
            Alert::success('Oops!', 'Data gagal ditambahkan.');
            return redirect()->route('jenis_gas');
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
    public function show(Gas $gas)
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
            'gas' => Gas::where('id', $id)->first()
        ];

        return view('pages.jenis_gas_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        try {

            $currentGasFoto = Gas::where('id', $request->id)->pluck('foto')->first();
            $currentFotoPath = public_path('images/gas/' . $currentGasFoto);

            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $outDirectory = public_path('images/gas');
                $fileName = time() . '.' . $file->getClientOriginalExtension();
                $file->move($outDirectory, $fileName);

                if (File::exists($currentFotoPath)) {
                    File::delete($currentFotoPath);
                }
            }

            $data = [
                'jenis_gas' => $request->jenis_gas,
                'foto' => isset($file) ? $fileName : $currentGasFoto,
                'harga' => $request->harga,
                'stok' => $request->stok,
            ];
            Gas::where('id', $request->id)->update($data);
            Alert::success('Berhasil!', 'Data telah diubah.');
            return redirect()->route('jenis_gas');
        } catch (\Throwable $th) {
            Alert::error('Oops!', 'Data gagal diubah.');
            return redirect()->route('jenis_gas');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        try {
            $currentGasFoto = Gas::where('id', $id)->pluck('foto')->first();
            $currentFotoPath = public_path('images/gas/' . $currentGasFoto);

            if (File::exists($currentFotoPath)) {
                File::delete($currentFotoPath);
            }

            Gas::where('id', $id)->delete();
            Alert::success('Berhasil!', 'Data berhasil dihapus.');
            return redirect()->route('jenis_gas');
        } catch (\Throwable $th) {
            //throw $th;
            Alert::error('Oops!', 'Data gagal dihapus.');
            return redirect()->route('jenis_gas');
        }
    }
}
