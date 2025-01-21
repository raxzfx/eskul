@extends('template')
@section('title', 'Users Table')
@section('content')

<div class="container min-vh-100 d-flex flex-column">
    <div class="page-inner">
      <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
          <h3 class="fw-bold mb-3">Users</h3>
        </div>
      </div>
      <div class="mb-3">
        <a href="{{route('admin.createUser')}}" class="btn btn-primary d-inline-flex align-items-center">
          <i class="bi bi-plus-circle me-2"></i> Add data
      </a>
      
      
      </div>
      
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Users Table</div>
          </div>
          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">no</th>
                  <th scope="col">nama</th>
                  <th scope="col">jurusan</th>
                  <th scope="col">tingkat kelas</th>
                  <th scope="col">no telp</th>
                  <th scope="col">role</th>
                  <th scope="col">action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user )
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$user->nama_lengkap}}</td>
                  <td>{{$user->jurusan->nama_jurusan}}</td>
                  <td>{{$user->tingkat_kelas}}</td>
                  <td>{{$user->nomor_telepon}}</td>
                  <td>{{$user->role}}</td>
                  <td>
                    <a href="{{route('admin.editUser',$user->id_user)}}" class="btn btn-success mb-1">
                      <i class="fa-solid fa-pen"></i>
                  </a>
                  <form action="{{route('admin.deleteUser',$user->id_user)}}" method="POST">
                   @csrf
                   @method('DELETE')
                   <button class="btn btn-danger" onclick="return confirm('apakah anda yakin ingin menghapus data ini?')">  
                   <i class="fa-solid fa-trash"></i>
                   </button>
                  </form>

              
                  
                  
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </div>
  </div>
@endsection