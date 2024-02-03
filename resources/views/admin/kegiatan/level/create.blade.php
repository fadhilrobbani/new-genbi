@extends('adminlte.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Level Kegiatan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active">Tambah Level Kegiatan</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
<section class="content container col-6">
    <div class="row">
      <div class="col-md">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Tambah level</h3>
          </div>
        <form method="post" action="{{ route('level.add') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                <label for="inputName">Nama Level</label>
                <input type="text" id="inputName" class="form-control  @error('level') is-invalid @enderror" name="level" required placeholder="Masukkan Nama Level Kegiatan...">
                <label for="poin">Nilai Poin</label>
                <input type="text" id="poin" class="form-control  @error('level') is-invalid @enderror" name="poin" required placeholder="Masukkan Nilai Poin Level Kegiatan...">
                @error('level')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
                </div>
            </div>
            <!-- /.card-body -->
            </div>
            <!-- /.card -->
            </div>
            </div>
            <div class="row">
            <div class="col-12">
                <a href="{{ route('level') }}" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Tambah Level Kegiatan" class="btn btn-success float-right">
            </div>
            </div>
        </form>
  </section>
  <!-- /.content -->
</div>
</div>
<!-- /.content-wrapper -->
@endsection