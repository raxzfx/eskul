@extends('template')
@section('title','create eskul')
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
          <h3 class="fw-bold mb-3">ADD Ekstrakurikuler</h3>
        </div>
      </div>
      
      <!--form add data-->
      <div class="card p-4">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

      <form class="row g-3 needs-validation" action="{{route('admin.storeEskul')}}" method="POST" novalidate>
        
        @csrf

        <div class="col-md- ">
          <label for="validationCustom01" class="form-label">nama kegiatan eskul</label>
          <input type="text" class="form-control mb-3" id="validationCustom01" value="" name="nama_eskul" required>
          <div class="invalid-feedback">
            masukan nama lengkap anda dengan benar
          </div>

          <div class="col-md-">
            <label for="validationCustom05" class="form-label">Deskripsi</label>
            <textarea class="form-control mb-3" id="validationCustom05" name="deskripsi" rows="4" required></textarea>
            <div class="invalid-feedback">
                Masukkan deskripsi ekstrakurikuler.
            </div>
        </div>

          <div class="col-md-">
            <label for="validationCustom04" class="form-label">guru pembina</label>
            <select class="form-select" id="validationCustom04" name="guru_eskul" required>
              <option selected disabled value="">pilih nama guru yang sesuai dengan eskul</option>
              @foreach ( $guru as $gu )
              @if ($gu->role === 'pembinaEskul')
                  <option value="{{$gu->id_user}}">{{$gu->nama_lengkap}}</option>
              @endif
              @endforeach
            </select>
            <div class="invalid-feedback">
              Please select a valid state.
            </div>
          </div>
        </div>
        
        <div class="col-md-">
            <label for="validationCustom04" class="form-label">hari</label>
            <select class="form-select" id="validationCustom04" name="hari" required>
              <option selected disabled value="">pilih hari kegiatan eskul berjalan</option>
              <option value="senin">senin</option>
              <option value="selasa">selasa</option>
              <option value="rabu">rabu</option>
              <option value="kamis">kamis</option>
              <option value="jumat">jumat</option>
              <option value="sabtu">sabtu</option>
              <option value="minggu">minggu</option>
            </select>
            <div class="invalid-feedback">
              Pilih tingkatan kelas sesuai dengan anda!
            </div>
          </div>

          <div class="col-md- ">
            <label for="validationCustom01" class="form-label">jam mulai</label>
            <input type="time" class="form-control mb-3" id="validationCustom01" value="" name="jam_mulai" required>
            <div class="invalid-feedback">
              masukan nama lengkap anda dengan benar
            </div>

          <div class="col-md- ">
            <label for="validationCustom01" class="form-label">jam selesai</label>
            <input type="time" class="form-control mb-3" id="validationCustom01" value="" name="jam_selesai" required>
            <div class="invalid-feedback">
              masukan nama lengkap anda dengan benar
            </div>

            <div class="col-12">
                <label for="validationCustom02" class="form-label mb-2">Pilih Tempat</label>
                <div class="d-flex flex-wrap gap-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tempat[]" id="tempat1" value="Lapangan">
                        <label class="form-check-label" for="tempat1">Lapangan</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tempat[]" id="tempat2" value="Aula">
                        <label class="form-check-label" for="tempat2">Aula</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="tempat[]" id="tempat3" value="Lab Rpl">
                        <label class="form-check-label" for="tempat3">Lab Rpl</label>
                    </div>
                </div>
            </div>
            
<hr>            
            
     
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
@endsection