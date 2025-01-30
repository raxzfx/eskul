@extends('template')
@section('title', 'Pendaftaran Table')
@section('content')

<div class="container min-vh-100 d-flex flex-column">
    <div class="page-inner">
      <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
          <h3 class="fw-bold mb-3">pendaftaran</h3>
        </div>
      </div>
      <div class="mb-3">
        <a href="{{route('admin.pendaftaranCreate')}}" class="btn btn-primary d-inline-flex align-items-center">
          <i class="bi bi-plus-circle me-2"></i> Add data
      </a>
      
      
      </div>
      
      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Jurusan Table</div>
          </div>
          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">no</th>
                  <th scope="col">nama murid</th>
                  <th scope="col">nama eskul</th>
                  <th scope="col">nama jurusan</th>
                  <th scope="col">tingkat kelas</th>
                  <th scope="col">action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $pendaftaran as $daftar )
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$daftar->user->nama_murid}}</td>
                  <td>{{$daftar->eskul->nama_eskul}}</td>
                  <td>{{$daftar->jurusan->nama_jurusan}}</td>
                  <td>{{$daftar->user->tingkat_kelas}}</td>
                  <td>
                    <a href="{{route('admin.jurusanEdit',$jurus->id_jurusan)}}" class="btn btn-success mb-1">
                      <i class="fa-solid fa-pen"></i>
                  </a>

                  <form action="{{route('admin.jurusanDelete',$jurus->id_jurusan)}}" method="post">

                    @csrf
                    @method('delete')

                    <button class="btn btn-danger" onclick="return confirm('apakah anda yakin menghapus data ini?')">
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