<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusan = Jurusan::all();
        return view('admin.jurusanTable',compact('jurusan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.form.createJurusan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_jurusan' => 'required',
            'kode_jurusan' => 'required'
        ]);

        //jika ada konflik nama jurusan yang sama
        $konflik = Jurusan::where('nama_jurusan', $request->nama_jurusan)->exists();
        if ($konflik) {
            return redirect()->back()->withErrors(['error'=> 'jurusan sudah terdaftar, silahkan masukan dengan nama jurusan yang lain']);
        }

        //konflik jika ada kode jurusan yang sama
        $conflict = Jurusan::where('kode_jurusan', $request->kode_jurusan)->exists();
        if ($conflict) {
            return redirect()->back()->withErrors(['error'=> 'kode jurusan sudah terdaftar, silahkan masukan dengan kode jurusan yang lain']);
        }

        Jurusan::create($validate);
        return redirect()->route('admin.jurusanIndex');
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
        $jurusan = Jurusan::findOrFail($id);
        return view('admin.form.updateJurusan',compact('jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_jurusan' => 'required',
            'kode_jurusan' => 'required'
        ]);

        $jurusan = Jurusan::findOrFail($id);
        $jurusan->update($request->all());
        return redirect()->route('admin.jurusanIndex')->with('success','data berhasil ter update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $jurusan = Jurusan::findOrFail($id);

        $jurusan->delete();
        return redirect()->route('admin.jurusanIndex')->with('success','data berhasil terhapus');
    }
}
