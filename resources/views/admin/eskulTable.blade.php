@extends('template')
@section('title', 'Eskul Table')
@section('content')
<div class="container min-vh-100 d-flex flex-column">
    <div class="page-inner">
      <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
          <h3 class="fw-bold mb-3">Jurusan</h3>
        </div>
      </div>
      <div class="mb-3">
        <a href="{{route('admin.jurusanCreate')}}" class="btn btn-primary d-inline-flex align-items-center">
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
                  <th scope="col">jurusan</th>
                  <th scope="col">action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $jurusan as $jurus )
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$jurus->nama_jurusan}}</td>
                  <td>
                    <a href="" class="btn btn-success">
                      <i class="fa-solid fa-pen"></i>
                  </a>
                  <a href="delete" class="btn btn-danger">
                    <i class="fa-solid fa-trash"></i>
                  </a>
                  
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