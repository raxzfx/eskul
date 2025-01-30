@extends('template')
@section('title','create pendaftaran')
@section('content')

<style>
    .form-control:focus{
        outline: none;
        box-shadow: none;
    }
    .form-select:focus{
        outline: none;
        box-shadow: none;
    }
</style>

<div class="container min-vh-100 d-flex flex-column">
    <div class="page-inner">
      <div
        class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
          <h3 class="fw-bold mb-3">Pendaftaran ekstrakurikuler</h3>
        </div>
      </div>
      
      <!--form add data-->
      <div class="card p-4">
      <form class="row g-3 needs-validation" action="{{route('admin.pendaftaranStore')}}" method="POST" novalidate>

        @csrf

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="col-md-">
          <label for="validationCustom01" class="form-label">nama lengkap</label>
          <input type="text" class="form-control" id="validationCustom01" value="" name="nama_murid" required>
          <div class="invalid-feedback">
            masukan nama lengkap anda dengan benar
          </div>

          <div class="col-12 mt-3">
            <label for="validationCustom02" class="form-label mb-2">Pilih Eskul</label>
            <div class="d-flex flex-wrap gap-3">
              @foreach ($eskul as $kul)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="nama_eskul[]" id="eskul{{ $kul->id }}" value="{{ $kul->id }}">
                        <label class="form-check-label" for="eskul{{ $kul->id }}">{{ $kul->nama_eskul }}</label>
                    </div>
                    @endforeach
            </div>
        </div>
        
        <div class="col-md- mt-3">
            <label for="validationCustom04" class="form-label">hoby</label>
            <select class="form-select" id="validationCustom04" name="nama_jurusan" required>
              <option selected disabled value="">pilih tingkat kelas anda</option>
              @foreach ( $jurusan as $jurus )
                   <option value="{{$jurus->id_jurusan}}" >{{$jurus->nama_jurusan }}</option>  
              @endforeach
            </select>
            <div class="invalid-feedback">
              Pilih tingkatan kelas sesuai dengan anda!
            </div>
          </div>

        <div class="col-md- mt-3">
            <label for="validationCustom04" class="form-label">alasan</label>
            <select class="form-select" id="validationCustom04" name="tingkat_kelas" required>
              <option selected disabled value="">pilih tingkat kelas anda</option>
              <option>10</option>
              <option>11</option>
              <option>12</option>
              <option>-</option>
            </select>
            <div class="invalid-feedback">
              Pilih tingkatan kelas sesuai dengan anda!
            </div>
          </div>

        <div class="col-12 mt-3">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
              saya menyetujui
            </label>
            <div class="invalid-feedback">
             anda harus menyetujui terlebih dahulu
            </div>
          </div>
        </div>
        <div class="col-12 mt-2">
          <button class="btn btn-primary mb-4" type="submit">Submit form</button>
        </div>
      </form>
    </div>
  </div>
@endsection