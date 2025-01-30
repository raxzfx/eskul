<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'nama_lengkap',
        'nama_jurusan',
        'nomor_telepon',
        'tingkat_kelas',
        'nis_nig',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected $primaryKey = 'id_user';
    protected $table = 'users';
    public function jurusan(){
        return $this->belongsTo(Jurusan::class, 'nama_jurusan','id_jurusan');
    }
    public function eskul(){
        return $this->hasMany(Eskul::class, 'guru_eskul','id_user');
    }
    public function pendaftaran(){
        return $this->hasMany(Pendaftaran::class, 'nama_murid','id_user');
    }
    public function kelas(){
        return $this->hasMany(Pendaftaran::class, 'tingkat_kelas','id_user');
    }
    public function nis(){
        return $this->hasMany(Pendaftaran::class, 'nis_nigUser', 'id_user');
    }
}
