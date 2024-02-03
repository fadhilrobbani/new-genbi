@extends('adminlte.layouts.app')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Panitia Kegiatan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">Panitia Kegiatan</li>
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
                    <h3 class="card-title">Kegiatan GenBI Bengkulu</h3>
                    {{-- <a href="{{ route('kegiatan.create') }}" class="btn btn-primary btn-sm float-right"><i
                            class="fas fa-plus mr-1"></i> Tambah Kegiatan</a> --}}
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session()->get('success') }}
                    </div>
                @endif
                <!-- /.card-header -->
                <div class="card-body pb-0">
                    <div class="row">
                        @foreach ($kegiatans as $kegiatan)
                            <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                <div class="card h-100">
                                    <img src="{{ asset('storage/images/' . $kegiatan->foto) }}" class="card-img-top"
                                        alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title"><b>{{ $kegiatan->judul_kegiatan }}</b></h5>
                                        <p class="card-text">{{ $kegiatan->deskripsi_kegiatan }}</p>
                                    </div>
                                    <div class="card-footer">
                                        <div class="text-right">
                                            <a href="{{ route('kegiatan.edit', $kegiatan->id) }}"
                                                class="btn btn-sm btn-info">
                                                <i class="fas fa-pencil-alt"></i> Edit
                                            </a>

                                            <a href="{{ route('panitia-kegiatan.lihat-panitia', $kegiatan->id) }}"
                                                class="btn btn-sm btn-primary">
                                                <i class="fas fa-user"></i> Lihat Panitia
                                            </a>
                                            <form action="{{ route('kegiatan.delete', $kegiatan->id) }}" method="post"
                                                class="d-inline" id="deleteForm-{{ $kegiatan->id }}">
                                                @method('DELETE')
                                                @csrf
                                                <button type="button" class="btn btn-danger btn-sm border-0"
                                                    onclick="confirmDelete({{ $kegiatan->id }})">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <nav aria-label="Contacts Page Navigation">
                            <ul class="pagination justify-content-center m-0">
                                {{ $kegiatans->links() }}
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
                    document.getElementById('deleteForm-' + id).submit();
                } else {
                    return false;
                }
            }
        </script>
    @endsection
