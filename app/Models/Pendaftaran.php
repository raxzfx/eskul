<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';
    protected $fillable = ['nama_murid',
                           'nama_eskul',
                           'nama_jurusan',
                           'tingkat_kelas',
                           'nis/nig'
                        ];

    public function murid(){
        return $this->belongsTo(User::class,'nama_murid','id_user');
    }
    public function kelas(){
        return $this->belongsTo(User::class,'tingkat_kelas','id_user');
    }
    public function eskul(){
        return $this->belongsTo(Eskul::class,'nama_eskul','id_eskul');
    }
    public function jurusan(){
        return $this->belongsTo(Jurusan::class,'nama_jurusan','id_jurusan');
    }
    public function nis(){
        return $this->belongsTo(User::class, 'nis_nigUser', 'id_user');
    }
}
