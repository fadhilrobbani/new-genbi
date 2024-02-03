@extends('adminlte.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Peserta Kegiatan</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/home">Home</a></li>
                            <li class="breadcrumb-item active">Peserta Kegiatan</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Peserta Kegiatan</h3>
                                <a href="/panitia-kegiatan/create" class="btn btn-primary btn-sm float-right"><i
                                        class="fas fa-plus mr-1"></i> Tambah Peserta Kegiatan</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover lign-items-center mb-0">
                                    <thead class="align-items-center">
                                        <tr>
                                            <th class="col-1 align-content-center text-sm-center">No.</th>
                                            <th scope="col align-content-center" class="text-sm-center">Nama
                                            </th>
                                            <th scope="col align-content-center" class="text-sm-center">Posisi yang
                                                Diinginkan
                                            </th>

                                            <th scope="col align-content-center" class="text-sm-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @foreach ($peserta_kegiatans as $key => $peserta_kegiatan)
                                                {{-- {{ dd($panitia_kegiatan->user_id) }} --}}
                                                <td class="align-middle text-center">
                                                    {{ $peserta_kegiatans->firstItem() + $key }}</td>
                                                <td class="align-middle text-center">
                                                    {{ $peserta_kegiatan->user->nama }}</td>

                                                <td class="align-middle text-center">
                                                    {{ $peserta_kegiatan->jabatanKegiatan->jabatan }}
                                                </td>

                                                <td class="text-sm-center">
                                                    <form
                                                        action="{{ route('peserta-kegiatan.setuju', $peserta_kegiatan->user_id) }}"
                                                        method="post" class="d-inline">
                                                        @method('POST')
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary btn-sm border-0"
                                                            onclick="return confirm('Anda akan menyetujui peserta ini?')">
                                                            <i class="bi bi-ban"></i>
                                                            Setuju
                                                        </button>
                                                    </form>
                                                    <form
                                                        action="{{ route('peserta-kegiatan.tolak', $peserta_kegiatan->user_id) }}"
                                                        method="post" class="d-inline">
                                                        @method('POST')
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm border-0"
                                                            onclick="return confirm('Anda akan menolak peserta ini?')">
                                                            <i class="bi bi-ban"></i>
                                                            Tolak
                                                        </button>
                                                    </form>
                                                </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mt-3 float-right">{{ $peserta_kegiatans->links() }}</div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
