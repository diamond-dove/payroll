<?php

namespace App\Console\Commands;

use App\Document;
use App\imports\AgentsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Config;

class ImportManager extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:excelfile';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This imports an excel file';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $this->output->title('Starting import.');
        $file = Document::where('imported','=','0')
            ->orderBy('created_at', 'DESC')
            ->first();
        if ($file) {
            $file_path = Config::get('filesystems.disks.local.root') . '/nominas/' . $file->file;
            $import = new AgentsImport($file);
            ($import)->withOutput($this->output)->import($file_path);

            $file->imported = 1;
            $file->total_rows = $import->getRowCount();
            $file->save();

            $this->output->success('Import successful.');
            return;
        }
        $this->output->success('No file to exports.');
    }
}
