@extends('template')
@section('title','create user')
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
          <h3 class="fw-bold mb-3">ADD Users</h3>
        </div>
      </div>
      
      <!--form add data-->
      <div class="card p-4">
      <form class="row g-3 needs-validation" action="{{route('admin.storeUser')}}" method="POST" novalidate>

        @csrf

        <div class="col-md-">
          <label for="validationCustom01" class="form-label">nama lengkap</label>
          <input type="text" class="form-control" id="validationCustom01" value="" name="nama_lengkap" required>
          <div class="invalid-feedback">
            masukan nama lengkap anda dengan benar
          </div>

          <div class="col-md-">
            <label for="validationCustom04" class="form-label">jurusan</label>
            <select class="form-select" id="validationCustom04" name="nama_jurusan" required>
              <option selected disabled value="">pilih jurusan yang sesuai</option>
              @foreach ($jurusan as $jurus )
                  <option value="{{$jurus->id_jurusan}}">{{$jurus->nama_jurusan}}</option>
              @endforeach
              
            </select>
            <div class="invalid-feedback">
              Please select a valid state.
            </div>
          </div>

        </div>
        <div class="col-md-">
          <label for="validationCustom02" class="form-label">no telp</label>
          <input type="number" class="form-control" id="validationCustom02" value="" name="nomor_telepon" required>
          <div class="invalid-feedback">
            masukan no telp anda dengan benar
          </div>
        </div>

        <div class="col-md-">
            <label for="validationCustom04" class="form-label">tingkat kelas</label>
            <select class="form-select" id="validationCustom04" name="tingkat_kelas" required>
              <option selected disabled value="">pilih tingkat kelas anda</option>
              <option>10</option>
              <option>11</option>
              <option>12</option>
            </select>
            <div class="invalid-feedback">
              Pilih tingkatan kelas sesuai dengan anda!
            </div>

          </div>

        <div class="col-12">
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
        <div class="col-12">
          <button class="btn btn-primary mb-4" type="submit">Submit form</button>
        </div>
      </form>
    </div>
  </div>
@endsection()