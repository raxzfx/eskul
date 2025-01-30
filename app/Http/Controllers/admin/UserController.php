<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.usersTable',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        $pilihanRole = ['admin','siswa','kesiswaan','pembinaEskul'];
        return view('admin.form.createUser',compact('jurusan','pilihanRole'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
           'nama_lengkap' => 'required',
           'nis_nig' => 'required',
           'nama_jurusan' => 'required',
           'nomor_telepon' => 'required',
           'tingkat_kelas' => 'required',
           'password' => 'nullable',
           'role' => 'required'
        ]);

        //konflik nama yang sama
        $konflikUser = User::where('nama_lengkap', $request->nama_lengkap)->exists();
        $konflikNomer = User::where('nomor_telepon', $request->nomor_telepon)->exists();

        if ($konflikUser) {
            return redirect()->back()->withErrors(['error'=> 'nama sudah terdaftar, silahkan masukan dengan nama yang lain']);
        } elseif ($konflikNomer){
            return redirect()->back()->withErrors(['error'=> 'nomor telepon sudah terdaftar, silahkan masukan dengan nama yang lain']);
        }

        $password = $request->password ? Hash::make($request->password) : Hash::make('defaultpassword');

        User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nis_nig' => $request->nis_nig,
            'nama_jurusan' =>$request->nama_jurusan,
            'nomor_telepon' =>$request->nomor_telepon,
            'tingkat_kelas' => $request->tingkat_kelas,
            'password' => $password,
            'role' => $request->role
        ]);

        return redirect()->route('admin.users');
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
        $user = User::findOrFail($id);
        $jurusan = Jurusan::all();
        return view('admin.form.updateUser',compact('user','jurusan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'nama_jurusan' => 'required',
            'nis_nig' => 'required',
            'nomor_telepon' => 'required',
            'tingkat_kelas' => 'required',
            'role' => 'required'
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully');
    }
}
