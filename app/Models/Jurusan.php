<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Jurusan extends Model
{
    protected $table = 'jurusan';
      protected $primaryKey = 'id_jurusan';
    protected $fillable = ['nama_jurusan','kode_jurusan'];

    public function user(){
        return $this->hasMany(User::class, 'nama_jurusan','id_jurusan');
    }
    public function pendaftaran(){
        return $this->hasMany(Pendaftaran::class, 'nama_jurusan','id_jurusan');
    }

}
