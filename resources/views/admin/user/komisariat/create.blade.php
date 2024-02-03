@extends('adminlte.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Tambah Komisariat</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active">Tambah Komisariat</li>
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
            <h3 class="card-title">Tambah Komisariat</h3>
          </div>
        <form method="post" action="{{ route('komisariat.add') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                <label for="inputName">Nama Komisariat</label>
                <input type="text" id="inputName" class="form-control  @error('komisariat') is-invalid @enderror" name="komisariat" required placeholder="Masukkan Nama Komisariat...">
                @error('komisariat')
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
                <a href="/komisariat" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Tambah Komisariat" class="btn btn-success float-right">
            </div>
            </div>
        </form>
  </section>
  <!-- /.content -->
</div>
</div>
<!-- /.content-wrapper -->
@endsection