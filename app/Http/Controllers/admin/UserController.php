<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Jurusan;
use Illuminate\Http\Request;

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
        return view('admin.form.createUser',compact('jurusan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
           'nama_lengkap' => 'required',
           'nama_jurusan' => 'required',
           'nomor_telepon' => 'required',
           'tingkat_kelas' => 'required'
        ]);

        User::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nama_jurusan' =>$request->nama_jurusan,
            'nomor_telepon' =>$request->nomor_telepon,
            'tingkat_kelas' => $request->tingkat_kelas,
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
