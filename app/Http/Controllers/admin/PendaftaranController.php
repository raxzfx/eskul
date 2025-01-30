<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use App\Models\User;
use App\Models\Eskul;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendaftaran = Pendaftaran::all();
        return view('admin.pendaftaranTable',compact('pendaftaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        $namaMurid = User::all();
        $tingkatKelas = ['10','11','12','-'];
        $eskul = Eskul::all();
        return view('admin.form.createPendaftaran',compact('jurusan','namaMurid','tingkatKelas','eskul'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
           'nama_murid' => 'required',
           'nama_eskul' => 'required|array|min:1',
           'nama_jurusan' => 'required',
           'tingkat_kelas' => 'required'
        ]);

        Pendaftaran::create([
            'nama_murid' => $request->nama_murid,    
            'nama_eskul' => $request->nama_eskul,
            'nama_jurusan' => $request->nama_jurusan,
            'tinkat_kelas' => $request->tinkat_kelas
        ]);

        return redirect()->route('admin.pendaftaranIndex');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
