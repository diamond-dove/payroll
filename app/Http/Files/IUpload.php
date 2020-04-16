<?php


namespace App\Http\Files;


interface IUpload
{
    public function upload(array $file): array;
}
