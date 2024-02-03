@extends('adminlte.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('storage/default.png') }}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center" ></h3>

                <p class="text-muted text-center"></p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Poin Keaktifan</b> <a class="float-right"></a>
                  </li>
                  <li class="list-group-item">
                    <b>Jabatan</b> <a class="float-right"></a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right"></a>
                  </li>
                  <li class="list-group-item">
                    <b>No. HP</b> <a class="float-right"></a>
                  </li>
                </ul>
                <form method="POST" action="{{ route('user.add') }}" enctype="multipart/form-data">
                  @csrf
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="foto">
                        <label class="custom-file-label" for="exampleInputFile" name="foto">Choose file</label>
                      </div>
                    </div>
                  </div>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Tambah Akun</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="tab-pane active" id="settings">
                    <div class="form-horizontal">
                      <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nama" name="nama" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="komisariat" class="col-sm-2 col-form-label">Komisariat</label>
                        <div class="col-sm-10">
                          <select class="custom-select rounded-0" name="komisariat_id" id="komisariat">
                            @foreach($komisariat as $komisariat)
                                <option value="{{ $komisariat->id }}">
                                    {{ $komisariat->komisariat }}
                                </option>
                            @endforeach
                        </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                          <select class="custom-select rounded-0" name="jabatan_id" id="jabatan">
                            @foreach($jabatan as $jabatan)
                                <option value="{{ $jabatan->id }}" >
                                    {{ $jabatan->jabatan }}
                                </option>
                            @endforeach
                        </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="email" name="email" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="no_hp" class="col-sm-2 col-form-label">No. HP</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="no_hp" name="no_hp" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="tgl_lahir" class="col-sm-2 col-form-label">Level</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="angkatan" class="col-sm-2 col-form-label">Angkatan</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="angkatan" name="angkatan">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="poin" class="col-sm-2 col-form-label">Poin Keaktifan</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="poin" name="poin">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="level" class="col-sm-2 col-form-label" name="level">Level</label>
                        <div class="col-sm-10">
                            <select class="custom-select rounded-0" id="level" name="level">
                                <option>Super Admin</option>
                                <option>Admin</option>
                                <option>User</option>
                            </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="password" name="password" placeholder="Password...">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </form>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection