<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'user';
    protected $guarded = [];
    public function prov()
    {
        return $this->belongsTo(ProvinsiModel::class);
    }
    public function kab()
    {
        return $this->belongsTo(KabupatenModel::class);
    }
    public function kec()
    {
        return $this->belongsTo(KecamatanModel::class);
    }
    public function kel()
    {
        return $this->belongsTo(KelurahanModel::class);
    }
}
