@extends('adminlte.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Jabatan Kegiatan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active">Edit Jabatan Kegiatan</li>
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
            <h3 class="card-title">Edit Jabatan</h3>
          </div>
        <form method="post" action="/jabatan/edit/{{ $jabatan->id }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">
                <input type="text" class="form-control" name="id" value="{{ old('id', $jabatan->id) }}" hidden>
                <label for="inputName">Nama Jabatan</label>
                <input type="text" id="inputName" class="form-control  @error('jabatan') is-invalid @enderror" name="jabatan" required value="{{ old('jabatan', $jabatan->jabatan) }}">
                @error('jabatan')
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
                <a href="/jabatan" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Edit Jabatan" class="btn btn-success float-right">
            </div>
            </div>
        </form>
  </section>
  <!-- /.content -->
</div>
</div>
<!-- /.content-wrapper -->
@endsection