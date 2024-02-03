@extends('adminlte.layouts.app')

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-header">
          <h3 class="card-title">Anggota GenBI Bengkulu</h3>
          <a href="
          {{ route('user.create') }}" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus mr-1"></i> Tambah Anggota</a>
        </div>
        <!-- /.card-header -->
        <div class="card-body pb-0">
          <div class="row">
            @foreach ($users as $key => $user)
            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
              <div class="card bg-light d-flex flex-fill">
                <div class="card-header text-muted border-bottom-0">
                  {{ $user->komisariat->komisariat }}
                </div>
                <div class="card-body pt-0">
                  <div class="row">
                    <div class="col-7">
                      <h2 class="lead"><b>{{ $user->nama }}</b></h2>
                      <p class="text-muted text-sm"><b>Jabatan: </b> {{ $user->jabatan->jabatan }} </p>
                      <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="mt-2 small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> Email: {{ $user->email }}</li>
                        <li class="mt-2 small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone : {{ $user->no_hp }}</li>
                        <li class="mt-2 small"><span class="fa-li"><i class="fas fa-lg ion ion-stats-bars"></i></span> Poin Keaktifan : {{ $user->poin }}</li>
                      </ul>
                    </div>
                    <div class="col-5 text-center">
                      <img src="{{ asset('storage/images/' . $user->foto) }}" alt="user-avatar" class="img-circle img-fluid">
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <div class="text-right">
                    <a href="/user/{{ $user->id }}/profile" class="btn btn-sm btn-primary">
                      <i class="fas fa-user"></i> View Profile
                    </a> 
                    <form action="/user/delete/{{ $user->id }}" method="post" class="d-inline" id="deleteForm-{{ $user->id }}">
                      @method('DELETE')
                      @csrf
                      <button type="button" class="btn btn-danger btn-sm border-0" onclick="confirmDelete({{ $user->id }})">
                          <i class="fas fa-trash"></i>
                      </button>
                  </form>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
              {{ $users->links() }}
            </ul>
          </nav>
        </div>
        <!-- /.card-footer -->
      </div>
      <!-- /.card -->

    </section>

    <script>
      function confirmDelete(id) {
          if (confirm('Data User Akan Terhapus, Yakin akan Menghapus?')) {
              document.getElementById('deleteForm-'+id).submit();
          } else {
              return false;
          }
      }
  </script>
    @endsection