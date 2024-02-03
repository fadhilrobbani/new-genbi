@extends('adminlte.layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Tambah Berita</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                <li class="breadcrumb-item active">Tambah Berita</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>
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
            <!-- Main content -->
            <form method="post" action="{{ route('berita.update', $berita->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <section class="content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">berita</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Nama berita</label>
                                        <input type="text" id="inputName" class="form-control" name="judul_berita"
                                            value="{{ old('berita', $berita->judul_berita) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Deskripsi berita</label>
                                        <textarea id="inputDescription" class="form-control" name="deskripsi_berita" rows="4">{{ old('berita', $berita->deskripsi_berita) }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Tingkat Kegiatan</label>
                                        <select id="inputStatus" name="level_id" class="form-control custom-select">
                                            <option selected disabled>Tingkat Kegiatan</option>
                                            @foreach ($level as $level)
                                                <option value="{{ $level->id }}"
                                                    {{ $berita->level_id == $level->id ? 'selected' : '' }}>
                                                    {{ $level->level }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputClientCompany">Tanggal berita</label>
                                        <input type="text" class="form-control" name="tgl_berita"
                                            value="{{ old('berita', $berita->tgl_berita) }}" />
                                    </div>
                           
                
                                    <div class="form-group">
                                        <label for="inputProjectLeader">Lokasi berita</label>
                                        <input type="text" id="inputProjectLeader" name="lokasi" class="form-control"
                                            value="{{ old('beritan', $berita->lokasi) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Cover berita</label>
                                        <div class="input-group ">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile"
                                                    name="foto">
                                                <label class="custom-file-label" for="exampleInputFile"
                                                    name="foto">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-md-6">
                            <div class="card card-secondary">
                                <div class="card-header">
                                    <h3 class="card-title">Kepanitiaan</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive mailbox-messages">
                                        <table class="table table-hover table-striped">
                                            <tbody>
                                                @foreach ($kepanitiaan as $item)
                                                    <tr>
                                                        <td>
                                                            <div class="icheck-primary">
                                                                <input type="checkbox" value="{{ $item->id }}"
                                                                    id="check{{ $item->id }}" name="id_jabatan[]"
                                                                    @php
$isIdExist = collect($kepanitianChecked)->contains('id_jabatan',$item->id); @endphp
                                                                    @if ($isIdExist) @php
                                                                        $jumlah = collect($kepanitianChecked)->where('id_jabatan', $item->id)->first()->jumlah;
                                                                        // dd($jumlah);
                                                                    @endphp
                                                                    checked @endif>
                                                                <label for="check{{ $item->id }}"></label>
                                                            </div>
                                                        </td>
                                                        <td class="mailbox-subject">{{ $item->jabatan }}</td>
                                                        <td class="mailbox-attachment"></td>

                                                        <td class="col-sm-3">
                                                            <input type="number" class="form-control"
                                                                id="jumlah-{{ $item->id }}"
                                                                name="jumlah-{{ $item->id }}"
                                                                value=@if ($isIdExist) {{ $jumlah }} @else @endif
                                                                @if ($item->only_one == 1) hidden @endif>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <!-- /.table -->
                                    </div>
                                    <!-- /.mail-box-messages -->
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <a href="{{ route('berita') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" value="Tambah berita" class="btn btn-success float-right">Edit
                                berita</button>
                        </div>
                    </div>
                </section>
            </form>
            <!-- /.content -->
        </div>
    </div>
    <!-- /.content-wrapper -->
@endsection
@push('custome_js')
    <script>
        $(function() {
            $('input[name="tgl_pendaftaran"]').daterangepicker();
            $('input[name="tgl_kegiatan"]').daterangepicker();
            // console.log('true')
        });
    </script>
@endpush
