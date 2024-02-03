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
                            <h1>Tambah Kegiatan</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/home">Home</a></li>
                                <li class="breadcrumb-item active">Tambah Kegiatan</li>
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
            <form method="post" action="{{ route('kegiatan.update', $kegiatan->id) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <section class="content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Kegiatan</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"
                                            title="Collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="inputName">Nama Kegiatan</label>
                                        <input type="text" id="inputName" class="form-control" name="judul_kegiatan"
                                            value="{{ old('kegiatan', $kegiatan->judul_kegiatan) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputDescription">Deskripsi Kegiatan</label>
                                        <textarea id="inputDescription" class="form-control" name="deskripsi_kegiatan" rows="4">{{ old('kegiatan', $kegiatan->deskripsi_kegiatan) }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputStatus">Tingkat Kegiatan</label>
                                        <select id="inputStatus" name="level_id" class="form-control custom-select">
                                            <option selected disabled>Tingkat Kegiatan</option>
                                            @foreach ($level as $level)
                                                <option value="{{ $level->id }}"
                                                    {{ $kegiatan->level_id == $level->id ? 'selected' : '' }}>
                                                    {{ $level->level }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputClientCompany">Tanggal Kegiatan</label>
                                        <input type="text" class="form-control" name="tgl_kegiatan"
                                            value="{{ old('kegiatan', $kegiatan->tgl_kegiatan) }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="inputClientCompany">Batas Pendaftaran Kegiatan</label>
                                        <input type="text" class="form-control" name="tgl_pendaftaran"
                                            value="{{ old('kegiatan', $kegiatan->tgl_pendaftaran) }}" />
                                    </div>
                                    <div class="form-group">
                                        <label for="inputClientCompany">Dresscode</label>
                                        <input type="text" id="inputClientCompany" name="dresscode" class="form-control"
                                            value="{{ old('kegiatan', $kegiatan->dresscode) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputProjectLeader">Kuota Peserta</label>
                                        <input type="number" id="inputProjectLeader" name="kuota" class="form-control"
                                            value="{{ old('kegiatan', $kegiatan->kuota) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="inputProjectLeader">Lokasi</label>
                                        <input type="text" id="inputProjectLeader" name="lokasi" class="form-control"
                                            value="{{ old('kegiatan', $kegiatan->lokasi) }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">Cover Kegiatan</label>
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
                                                                value=@if ($isIdExist) "{{ $jumlah }}" @else "1" @endif
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
                            <a href="{{ route('kegiatan') }}" class="btn btn-secondary">Cancel</a>
                            <button type="submit" value="Tambah Kegiatan" class="btn btn-success float-right">Tambah
                                Kegiatan</button>
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
