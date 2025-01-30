<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Eskul;
use App\Models\User;
use Illuminate\Http\Request;

class EskulController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eskul = Eskul::all();
        return view('admin.eskulTable',compact('eskul'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $guru = User::all();
        return view('admin.form.createEskul',compact('guru'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
          'nama_eskul' => 'required',
          'guru_eskul' => 'required',
          'hari' => 'required',
          'jam_mulai' => 'required',
          'jam_selesai' => 'required',
          'deskripsi' => 'required',
          'tempat' => 'required|array|min:1'
        ]);

        //menggabungkan tempat menjadi satu string
        $validate['tempat'] = implode(',',$request->tempat);

        $jamMulai = $request->jam_mulai;
        $jamSelesai = $request->jam_selesai;
        $hari = $request->hari;

        //pemeriksaan 
        $konflik = Eskul::where('hari', $hari)
        ->where(function ($query) use ($jamMulai, $jamSelesai) {
            $query->whereBetween('jam_mulai', [$jamMulai, $jamSelesai])
                ->orWhereBetween('jam_selesai', [$jamMulai, $jamSelesai])
                ->orWhere(function ($query) use ($jamMulai, $jamSelesai) {
                    $query->where('jam_mulai', '<=', $jamMulai)
                        ->where('jam_selesai', '>=', $jamSelesai);
                });
        })->exists();

        //jika konflik di temukan
        if($konflik){
            return redirect()->back()->withErrors(['error', 'jadwal bentrok di hari yang sama dan jam yang sama']);
        }

        //pemeriksaan nama eskul yang sama
        $eskulName = Eskul::where('nama_eskul',$request->nama_eskul)->exists();

        //jika ada konflik nama eskul
        if($eskulName){
           return redirect()->back()->withErrors(['error' => 'nama eskul sudah tersedia, anda bisa menginput nama eskul yang berbeda,
            dan anda tidak bisa menambahkan data dengan nama eskul yang sama']);
        }

        Eskul::create($validate);
        return redirect()->route('admin.eskulIndex')->with('success','anda berhasil menambah data untuk eskul');
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
        $eskul = Eskul::findOrFail($id);
        $guru = User::all();
        return view('admin.form.updateEskul',compact('eskul','guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
          // Validasi input
    $request->validate([
        'nama_eskul' => 'required',
        'guru_eskul' => 'required',
        'hari' => 'required',
        'jam_mulai' => 'required',
        'jam_selesai' => 'required',
    ]);

    // Cari data eskul yang akan diupdate berdasarkan id
    $eskul = Eskul::findOrFail($id);

    // Update data eskul
    $eskul->nama_eskul = $request->nama_eskul;
    $eskul->guru_eskul = $request->guru_eskul;
    $eskul->hari = $request->hari;
    $eskul->jam_mulai = $request->jam_mulai;
    $eskul->jam_selesai = $request->jam_selesai;

    // Handle perubahan tempat
    if($request->has('tempat')) {
        // Gabungkan tempat yang dipilih menjadi string yang dipisahkan koma
        $eskul->tempat = implode(',', $request->tempat);
    } else {
        // Jika tidak ada tempat yang dipilih, set tempat menjadi kosong
        $eskul->tempat = '';
    }

    // Simpan perubahan
    $eskul->save();

    // Redirect dengan pesan sukses
    return redirect()->route('admin.eskulIndex')->with('success', 'Data Eskul berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $eskul = Eskul::findOrFail($id);
        $eskul->delete();
        return redirect()->route('admin.eskulIndex')->with('success','data berhasil terhapus');
    }
}
