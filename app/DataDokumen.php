<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataDokumen extends Model
{
    protected $table = 'data_dokumens';
    protected $fillable = ['dataid', 'fileName'];
}
