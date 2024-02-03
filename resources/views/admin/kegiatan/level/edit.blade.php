@extends('adminlte.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-wrapper">
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Edit Level Kegiatan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/home">Home</a></li>
            <li class="breadcrumb-item active">Edit Level Kegiatan</li>
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
            <h3 class="card-title">Edit Level</h3>
          </div>
        <form method="post" action="/level-kegiatan/edit/{{ $level->id }}" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="form-group">
                <input type="text" class="form-control" name="id" value="{{ old('id', $level->id) }}" hidden>
                <label for="inputName">Nama Level</label>
                <input type="text" id="inputName" class="form-control @error('level') is-invalid @enderror" name="level" required value="{{ old('level', $level->level) }}">
                <label for="poin">Nilai Poin</label>
                <input type="text" id="poin" class="form-control @error('poin') is-invalid @enderror" name="poin" required value="{{ old('poin', $level->poin) }}">

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
                <a href="/level-kegiatan" class="btn btn-secondary">Cancel</a>
                <input type="submit" value="Edit Level" class="btn btn-success float-right">
            </div>
            </div>
        </form>
  </section>
  <!-- /.content -->
</div>
</div>
<!-- /.content-wrapper -->
@endsection