@extends('template')
@section('title','update eskul')
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
      <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
          <h3 class="fw-bold mb-3">EDIT Ekstrakurikuler</h3>
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

      <form class="row g-3 needs-validation" action="{{route('admin.updateEskul', $eskul->id_eskul)}}" method="POST" novalidate>
        
        @csrf
        @method('put')

        <div class="col-md-">
          <label for="validationCustom01" class="form-label">Nama Kegiatan Eskul</label>
          <input type="text" class="form-control mb-3" id="validationCustom01" name="nama_eskul" value="{{ old('nama_eskul', $eskul->nama_eskul) }}" required>
          <div class="invalid-feedback">
            Masukan nama kegiatan eskul dengan benar
          </div>
        </div>

        <div class="col-md-">
            <label for="validationCustom04" class="form-label">Guru Pembina</label>
            <select class="form-select" id="validationCustom04" name="guru_eskul" required>
              <option selected disabled value="">Pilih nama guru yang sesuai dengan eskul</option>
              @foreach ($guru as $gu)
                  <option value="{{$gu->id_user}}" {{ $gu->id_user == $eskul->guru_eskul ? 'selected' : '' }}>{{ $gu->nama_lengkap }}</option>
              @endforeach
            </select>
            <div class="invalid-feedback">
              Pilih guru pembina yang valid
            </div>
        </div>

        <div class="col-md-">
            <label for="validationCustom04" class="form-label">Hari</label>
            <select class="form-select" id="validationCustom04" name="hari" required>
              <option selected disabled value="">Pilih hari kegiatan eskul berjalan</option>
              <option value="senin" {{ $eskul->hari == 'senin' ? 'selected' : '' }}>Senin</option>
              <option value="selasa" {{ $eskul->hari == 'selasa' ? 'selected' : '' }}>Selasa</option>
              <option value="rabu" {{ $eskul->hari == 'rabu' ? 'selected' : '' }}>Rabu</option>
              <option value="kamis" {{ $eskul->hari == 'kamis' ? 'selected' : '' }}>Kamis</option>
              <option value="jumat" {{ $eskul->hari == 'jumat' ? 'selected' : '' }}>Jumat</option>
              <option value="sabtu" {{ $eskul->hari == 'sabtu' ? 'selected' : '' }}>Sabtu</option>
              <option value="minggu" {{ $eskul->hari == 'minggu' ? 'selected' : '' }}>Minggu</option>
            </select>
            <div class="invalid-feedback">
              Pilih hari yang sesuai
            </div>
        </div>

        <div class="col-md-">
            <label for="validationCustom01" class="form-label">Jam Mulai</label>
            <input type="time" class="form-control mb-3" id="validationCustom01" name="jam_mulai" value="{{ old('jam_mulai', $eskul->jam_mulai) }}" required>
        </div>

        <div class="col-md-">
            <label for="validationCustom01" class="form-label">Jam Selesai</label>
            <input type="time" class="form-control mb-3" id="validationCustom01" name="jam_selesai" value="{{ old('jam_selesai', $eskul->jam_selesai) }}" required>
        </div>

        <div class="col-12">
            <label for="validationCustom02" class="form-label mb-2">Pilih Tempat</label>
            <div class="d-flex flex-wrap gap-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tempat[]" id="tempat1" value="Lapangan" {{ in_array('Lapangan', explode(',', $eskul->tempat)) ? 'checked' : '' }}>
                    <label class="form-check-label" for="tempat1">Lapangan</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tempat[]" id="tempat2" value="Aula" {{ in_array('Aula', explode(',', $eskul->tempat)) ? 'checked' : '' }}>
                    <label class="form-check-label" for="tempat2">Aula</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="tempat[]" id="tempat3" value="Lab rpl" {{ in_array('Ruang Kelas', explode(',', $eskul->tempat)) ? 'checked' : '' }}>
                    <label class="form-check-label" for="tempat3">Lab RPL</label>
                </div>
            </div>
        </div>

        <hr>            

        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label mb-1" for="invalidCheck">
                    Saya menyetujui
                </label>
                <div class="invalid-feedback">
                    Anda harus menyetujui terlebih dahulu
                </div>
            </div>
        </div>

        <div class="col-12">
            <button class="btn btn-primary mb-4" type="submit">Submit Form</button>
        </div>
      </form>
    </div>
  </div>
@endsection
