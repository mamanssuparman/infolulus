<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nis',
        'nisn',
        'namasiswa',
        'kelasid',
        'statuslulus',
        'suratlulus'
    ];
    protected $table ='siswas';
    // nilai balik
    public function Kelas()
    {
        return $this->belongsTo(Kelas::class,'kelasid','id');
    }
}
