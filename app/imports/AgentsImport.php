<?php


namespace App\imports;

use App\Agent;
use App\Document;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithProgressBar;

class AgentsImport implements ToModel, WithChunkReading, WithProgressBar
{
    use Importable;

    protected $file;
    protected $rows = 0;
    protected const AGENT_ID_COLUMN = 2;

    public function __construct(Document $file)
    {
        $this->file = $file;
    }

    public function model(array $row)
    {
        ++$this->rows;
        $agent = new Agent;
        $agent->csv_import_id = $this->file->id;
        if ($this->agentIDIsset($row)) {
            $agent->fill($row);
            $agent->save();
        }

        $this->file = $this->file->fresh(); //reload from the database
        $this->file->rows_imported = $this->rows;
        $this->file->save();

        return $agent;
    }

    public function chunkSize(): int
    {
        return 1000;
    }

    public function getRowCount(): int
    {
        return $this->rows;
    }

    private function agentIDIsset(array $attributes): bool
    {
        return isset($attributes[self::AGENT_ID_COLUMN]);
    }
}
