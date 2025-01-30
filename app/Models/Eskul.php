<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eskul extends Model
{
    protected $table = 'eskul';
    protected $primaryKey = 'id_eskul';
    protected $fillable = [
        'nama_eskul',
        'guru_eskul',
        'hari',
        'jam_mulai',
        'jam_selesai',
        'deskripsi',
        'tempat'
    ];

    public function guru(){
        return $this->belongsTo(User::class,'guru_eskul','id_user');
    }
    public function pendaftaran(){
        return $this->hasMany(Pendaftaran::class, 'nama_eskul','id_eskul');
    }
}
