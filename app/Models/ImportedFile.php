<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportedFile extends Model
{
public function importedFile()
{
    return $this->belongsTo(ImportedFile::class);
}
}
