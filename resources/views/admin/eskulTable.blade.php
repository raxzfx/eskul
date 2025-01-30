@extends('template')
@section('title', 'Eskul Table')
@section('content')
<div class="container min-vh-100 d-flex flex-column">
    <div class="page-inner">
      <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
          <h3 class="fw-bold mb-3">Ekstrakurikuler</h3>
        </div>
      </div>
      <div class="mb-3">
        <a href="{{route('admin.createEskul')}}" class="btn btn-primary d-inline-flex align-items-center">
          <i class="bi bi-plus-circle me-2"></i> Add data
      </a>
      </div>

      <div class="col-md-12">
        <div class="card">
          <div class="card-header">
            <div class="card-title">Ekstrakurikuler Table</div>
          </div>
          <div class="card-body">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">no</th>
                  <th scope="col">kegiatan eskul</th>
                  <th scope="col">guru pembina</th>
                  <th scope="col">hari</th>
                  <th scope="col">jam mulai</th>
                  <th scope="col">jam selesai</th>
                  <th scope="col">tempat</th>
                  <th scope="col">deskripsi</th>
                  <th scope="col">action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $eskul as $kul )
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$kul->nama_eskul}}</td>
                  <td>{{$kul->guru->nama_lengkap ?? "guru tidak ditemukan"}}</td>
                  <td>{{$kul->hari}}</td>
                  <td>{{$kul->jam_mulai}}</td>
                  <td>{{$kul->jam_selesai}}</td>
                  <td>
                    @foreach (explode(',', $kul->tempat) as $tempat)
                    <span class="badge bg-primary">{{ trim($tempat) }}</span>
                @endforeach
                </td>
                <td>
                  <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    deskripsi
                  </button>
                </td>
                  <td>
                    <a href="{{route('admin.editEskul', $kul->id_eskul)}}" class="btn btn-success mb-1">
                      <i class="fa-solid fa-pen"></i>
                  </a>

                  <form action="{{route('admin.deleteEskul',$kul->id_eskul)}}" method="post">

                    @csrf
                    @method('delete')

                    <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin')">
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
    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">deskripsi eskul</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      {{$kul->deskripsi}}
      </div>
    </div>
  </div>
</div>
  </div>
@endsection