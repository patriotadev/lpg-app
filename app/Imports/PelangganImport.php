<?php

namespace App\Imports;

use App\Models\Pelanggan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class PelangganImport implements ToModel, WithStartRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Pelanggan([
            'nama' => $row[0],
            'alamat' => $row[1],
            'status' => $row[2],
        ]);
    }

    public function startRow(): int
    {
        return 2;
    }
}
