<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class Jurusan extends Model
{
    protected $table = 'jurusan';
    protected $fillable = ['nama_jurusan'];

    public function user(){
        return $this->hasMany(User::class, 'nama_jurusan','id_jurusan');
    }

}
