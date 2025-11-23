<?php

namespace App\Exports;

use App\Models\Aset;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AsetExport implements FromCollection, WithHeadings
{
    protected $filters;

    public function __construct($filters = [])
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        $query = Aset::query();

        if (!empty($this->filters['kategori_id'])) {
            $query->where('kategori_id', $this->filters['kategori_id']);
        }
        if (!empty($this->filters['status'])) {
            $query->where('status', $this->filters['status']);
        }
        if (!empty($this->filters['kondisi'])) {
            $query->where('kondisi', $this->filters['kondisi']);
        }
        if (!empty($this->filters['lokasi'])) {
            $query->where('lokasi', 'like', '%' . $this->filters['lokasi'] . '%');
        }

        return $query->with('kategori')->get(['nama', 'kategori_id', 'status', 'lokasi', 'kondisi']);
    }

    public function headings(): array
    {
        return ['Nama', 'Kategori', 'Status', 'Lokasi', 'Kondisi'];
    }
}
