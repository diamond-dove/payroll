<?php


namespace App\Http\Files;


use Carbon\Carbon;
use Illuminate\Support\Facades\Config;

class NominaFileUpload implements IUpload
{
    public function upload(array $files): array
    {
        $inserts = [];
        foreach ($files as $file) {
            $fname = md5(rand()) . '.csv';
            $full_path = Config::get('filesystems.disks.local.root');
            $file->move("{$full_path}/nominas/", $fname);
            $inserts[]['file'] = $fname;
        }

        return $inserts;
    }
}
