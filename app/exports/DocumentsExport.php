<?php


namespace App\exports;

use Maatwebsite\Excel\Concerns\FromArray;

class DocumentsExport implements  fromArray
{
    protected $documents;

    public function __construct(array $documents)
    {
        $this->documents = $documents;
    }

    public function array(): array
    {
        return $this->documents;
    }
}
