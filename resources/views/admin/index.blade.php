@extends('template')
@section('title', 'Dashboard')
@section('content')

<div class="page-heading">
  <h3>Dasboard</h3>
</div>

<div class="page-content">
  <section class="row">
      <div class="col-12 mb-5">
          <div class="row">
              <div class="col-6 col-lg-4 col-md-6">
                  <div class="card">
                      <div class="card-body px-3 py-4-5">
                          <div class="row">
                              <div class="col-md-4">
                                  <div class="stats-icon purple">
                                    <i class="fa-solid fa-users"></i>
                                  </div>
                              </div>
                              <div class="col-md-8">
                                  <h6 class="text-muted font-semibold">murid</h6>
                                  <h6 class="font-extrabold mb-0">{{$siswa}}</h6>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-6 col-lg-4 col-md-6">
                  <div class="card">
                      <div class="card-body px-3 py-4-5">
                          <div class="row">
                              <div class="col-md-4">
                                  <div class="stats-icon blue">
                                    <i class="fa-solid fa-user"></i>
                                  </div>
                              </div>
                              <div class="col-md-8">
                                  <h6 class="text-muted font-semibold">pembina eskul</h6>
                                  <h6 class="font-extrabold mb-0">{{$guru}}</h6>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-6 col-lg-4 col-md-6">
                  <div class="card">
                      <div class="card-body px-3 py-4-5">
                          <div class="row">
                              <div class="col-md-4">
                                  <div class="stats-icon green">
                                    <i class="fa-solid fa-clipboard-list"></i>
                                  </div>
                              </div>
                              <div class="col-md-8">
                                  <h6 class="text-muted font-semibold">kegiatan eskul</h6>
                                  <h6 class="font-extrabold mb-0">{{$eskul}}</h6>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>  
      </div>
  </section>
</div>
@endsection