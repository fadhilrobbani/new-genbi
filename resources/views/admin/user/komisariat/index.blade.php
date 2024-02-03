@extends('adminlte.layouts.app')
 
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Komisariat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Home</a></li>
              <li class="breadcrumb-item active">Komisariat</li>
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
                <h3 class="card-title">Komisariat</h3>
                <a href="/komisariat/create" class="btn btn-primary btn-sm float-right"><i class="fas fa-plus mr-1"></i> Tambah Komisariat</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover lign-items-center mb-0">
                  <thead class="align-items-center">
                  <tr>
                    <th class="col-1 align-content-center text-sm-center">No.</th>
                    <th scope="col align-content-center" class="text-sm-center">Komisariat</th>
                    <th scope="col align-content-center" class="text-sm-center">Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    @foreach ($komisariats as $key => $komisariat)
                      <td class="align-middle text-center">{{ $komisariats->firstItem() + $key }}</td>
                      <td>{{ $komisariat->komisariat }}</td>
                      <td class="text-sm-center">
                        <a class="btn btn-info btn-sm" href="/komisariat/{{ $komisariat->id }}/edit">
                          <i class="fas fa-pencil-alt">
                          </i>
                          Edit
                      </a>
                      <form action="{{ route('komisariat.delete', $komisariat->id) }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm border-0" onclick="return confirm('Data Komisariat Akan Terhapus, Yakin akan Menghapus?')">
                          <i class="fas fa-trash"></i>
                          Delete
                        </button>
                      </form>
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
                <div class="row">
                  <div class="col-12">
                    <div class="float-right">{{ $komisariats->links() }}</div>
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