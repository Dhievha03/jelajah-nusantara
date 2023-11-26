<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

    public function wisatas()
    {
        return $this->hasMany(Wisata::class, 'prov_id');
    }
}
