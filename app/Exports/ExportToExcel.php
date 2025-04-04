<?php
namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportToExcel implements FromCollection, WithHeadings

{
    protected $query;
    protected $columns;


    // Accept a custom query via constructor
    public function __construct($query, $columns = [])
    {
        $this->query = $query;
        $this->columns = $columns; // Pass the selected columns dynamically
    }

    public function collection()
    {
        // Execute the custom query and return the results
        // dd($this->query->get());
        return $this->query->get();
    }
    public function headings(): array
    {
        // Use the column names as the headings if provided, otherwise default to all columns
        return $this->columns ? $this->columns : array_keys((array)$this->query->first());
    }
}
