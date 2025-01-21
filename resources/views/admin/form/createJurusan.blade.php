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
          <h3 class="fw-bold mb-3">ADD Jurusan</h3>
        </div>
      </div>
      
      <!--form add data-->
      <div class="card p-4">
      <form class="row g-3 needs-validation" action="{{route('admin.jurusanStore')}}" method="POST" novalidate>
        
        @csrf

        <div class="col-md- ">
          <label for="validationCustom01" class="form-label">nama jurusan</label>
          <input type="text" class="form-control mb-3" id="validationCustom01" value="" name="nama_jurusan" required>
          <div class="invalid-feedback">
            masukan nama lengkap anda dengan benar
          </div>
     
        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label mb-1" for="invalidCheck">
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