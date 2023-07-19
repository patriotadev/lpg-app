<?php

namespace App\Http\Controllers;

use App\Models\Gas;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Isset_;

class LaporanController extends Controller
{
    //

    public function index()
    {
        return view('pages.laporan');
    }

    public function laporanBulanan()
    {
        $data = [
            'gas' => Gas::all(),
            'selected_month' => ''
        ];
        return view('pages.laporan_bulanan', $data);
    }

    public function laporanBulananByMonth($params)
    {
        if (isset($params)) {
            $filteredData = [];
            $gasList = Gas::all();

            foreach ($gasList as $key => $gas) {
                $splitMonth = explode('-', $gas->updated_at);
                $getYearAndMonth = $splitMonth[0] . '-' . $splitMonth[1];

                if ($getYearAndMonth === $params) {
                    array_push($filteredData, $gas);
                }
            }

            // dd($filteredData);
            $data = [
                'gas' => $filteredData,
                'selected_month' => $params
            ];
        }

        return view('pages.laporan_bulanan', $data);
    }


    public function laporanPenyebaran()
    {

        $penjualanRumahTangga = [];
        $penjualanPedagang = [];
        $penjualanWarung = [];

        foreach (Penjualan::all() as $key => $data) {
            if ($data->status === 'Rumah Tangga') {
                array_push($penjualanRumahTangga, $data);
            } else if ($data->status === 'Pedagang') {
                array_push($penjualanPedagang, $data);
            } else if ($data->status === 'Warung') {
                array_push($penjualanWarung, $data);
            }
        }

        $data = [
            'penjualan' => Penjualan::all(),
            'selected_month' => '',
            'penjualan_rumah_tangga' => $penjualanRumahTangga,
            'penjualan_pedagang' => $penjualanPedagang,
            'penjualan_warung' => $penjualanWarung
        ];

        return view('pages.laporan_penyebaran', $data);
    }

    public function laporanPenyebaranByMonth($params)
    {

        if (isset($params)) {
            $filteredData = [];
            $penjualanRumahTangga = [];
            $penjualanPedagang = [];
            $penjualanWarung = [];
            $penjualanList = Penjualan::all();

            foreach ($penjualanList as $key => $penjualan) {
                $splitMonth = explode('-', $penjualan->created_at);
                $getYearAndMonth = $splitMonth[0] . '-' . $splitMonth[1];

                if ($getYearAndMonth === $params) {
                    array_push($filteredData, $penjualan);
                }
            }

            foreach ($filteredData as $key => $data) {
                if ($data->status === 'Rumah Tangga') {
                    array_push($penjualanRumahTangga, $data);
                } else if ($data->status === 'Pedagang') {
                    array_push($penjualanPedagang, $data);
                } else if ($data->status === 'Warung') {
                    array_push($penjualanWarung, $data);
                }
            }

            // dd($filteredData);

            $data = [
                'penjualan' => $filteredData,
                'selected_month' => $params,
                'penjualan_rumah_tangga' => $penjualanRumahTangga,
                'penjualan_pedagang' => $penjualanPedagang,
                'penjualan_warung' => $penjualanWarung
            ];
        }

        return view('pages.laporan_penyebaran', $data);
    }

    public function laporanPenerimaan()
    {

        $store = [];
        $jenis_gas = Gas::all();

        foreach ($jenis_gas as $key => $gas) {
            $store[$gas->jenis_gas] = [];
            foreach (Penjualan::all() as $key => $penjualan) {
                if ($penjualan->jenis_gas === $gas->jenis_gas) {
                    array_push($store[$gas->jenis_gas], $penjualan);
                }
            }
        }

        // dd($store);

        $data = [
            'selected_month' => '',
            'jenis_gas' => Gas::all(),
            'penerimaan' => Penjualan::all(),
            'store' => $store
        ];

        return view('pages.laporan_penerimaan', $data);
    }

    public function laporanPenerimaanByMonth($params)
    {

        if (isset($params)) {
            $filteredData = [];
            $penjualanList = Penjualan::all();

            foreach ($penjualanList as $key => $penjualan) {
                $splitMonth = explode('-', $penjualan->created_at);
                $getYearAndMonth = $splitMonth[0] . '-' . $splitMonth[1];

                if ($getYearAndMonth === $params) {
                    array_push($filteredData, $penjualan);
                }
            }

            $store = [];
            $jenis_gas = Gas::all();

            foreach ($jenis_gas as $key => $gas) {
                $store[$gas->jenis_gas] = [];
                foreach ($filteredData as $key => $penjualan) {
                    if ($penjualan->jenis_gas === $gas->jenis_gas) {
                        array_push($store[$gas->jenis_gas], $penjualan);
                    }
                }
            }

            $data = [
                'selected_month' => '',
                'jenis_gas' => Gas::all(),
                'penerimaan' => Penjualan::all(),
                'store' => $store
            ];

            return view('pages.laporan_penerimaan', $data);
        }
    }
}
