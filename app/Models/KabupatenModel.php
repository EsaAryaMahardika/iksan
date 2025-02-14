<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KabupatenModel extends Model
{
    use HasFactory;
    protected $table = 'kabupaten';
    public function prov()
    {
        return $this->belongsTo(ProvinsiModel::class);
    }
}
