@extends('adminlte.layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="{{ asset('storage/images/'. $user->foto) }}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center" >{{ $user->nama }}</h3>

                <p class="text-muted text-center">{{ $user->komisariat->komisariat }}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Poin Keaktifan</b> <a class="float-right">{{ $user->poin }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Jabatan</b> <a class="float-right">{{ $user->jabatan->jabatan }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                  </li>
                  <li class="list-group-item">
                    <b>No. HP</b> <a class="float-right">{{ $user->no_hp }}</a>
                  </li>
                </ul>
                <form method="POST" action="{{ route('user.updatefoto',$user->id) }}" enctype="multipart/form-data">
                  @csrf
                  <input type="text" class="form-control" name="id" value="{{ $user->id }}" hidden>
                  <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile" name="foto">
                        <label class="custom-file-label" for="exampleInputFile" name="foto">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <button type="submit" class="input-group-text">Upload</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Aktivitas</a></li>
                  <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">Pengaturan Akun</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="timeline">
                    <!-- The timeline -->
                    <div class="timeline timeline-inverse">
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-danger">
                          10 Feb. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-envelope bg-primary"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 12:05</span>

                          <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                          <div class="timeline-body">
                            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                            weebly ning heekya handango imeem plugg dopplr jibjab, movity
                            jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                            quora plaxo ideeli hulu weebly balihoo...
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-primary btn-sm">Read more</a>
                            <a href="#" class="btn btn-danger btn-sm">Delete</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-user bg-info"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 5 mins ago</span>

                          <h3 class="timeline-header border-0"><a href="#">Sarah Young</a> accepted your friend request
                          </h3>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-comments bg-warning"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>

                          <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                          <div class="timeline-body">
                            Take me to your leader!
                            Switzerland is small and neutral!
                            We are more like Germany, ambitious and misunderstood!
                          </div>
                          <div class="timeline-footer">
                            <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <!-- timeline time label -->
                      <div class="time-label">
                        <span class="bg-success">
                          3 Jan. 2014
                        </span>
                      </div>
                      <!-- /.timeline-label -->
                      <!-- timeline item -->
                      <div>
                        <i class="fas fa-camera bg-purple"></i>

                        <div class="timeline-item">
                          <span class="time"><i class="far fa-clock"></i> 2 days ago</span>

                          <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                          <div class="timeline-body">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                            <img src="https://placehold.it/150x100" alt="...">
                          </div>
                        </div>
                      </div>
                      <!-- END timeline item -->
                      <div>
                        <i class="far fa-clock bg-gray"></i>
                      </div>
                    </div>
                  </div>
                  <!-- /.tab-pane -->
                  
                  <div class="tab-pane" id="settings">
                    <form action="/user/profile/edit/{{ $user->id }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('put')
                      <div class="form-group row" hidden>
                        <label for="id" class="col-sm-2 col-form-label" >Id</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="id" name="id" value="{{ $user->id }}" >
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nama" name="nama" value="{{ $user->nama }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="komisariat" class="col-sm-2 col-form-label">Komisariat</label>
                        <div class="col-sm-10">
                          <select class="custom-select rounded-0" name="komisariat_id" id="komisariat">
                            @foreach($komisariat as $komisariat)
                                <option value="{{ $komisariat->id }}" {{ $user->komisariat->id == $komisariat->id ? 'selected' : '' }}>
                                    {{ $komisariat->komisariat }}
                                </option>
                            @endforeach
                        </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                        <div class="col-sm-10">
                          <select class="custom-select rounded-0" name="jabatan_id" id="jabatan">
                            @foreach($jabatan as $jabatan)
                                <option value="{{ $jabatan->id }}" {{ $user->jabatan->id == $jabatan->id ? 'selected' : '' }}>
                                    {{ $jabatan->jabatan }}
                                </option>
                            @endforeach
                        </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="no_hp" class="col-sm-2 col-form-label">No. HP</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $user->no_hp }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="tgl_lahir" class="col-sm-2 col-form-label">Level</label>
                        <div class="col-sm-10">
                          <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $user->tgl_lahir }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="angkatan" class="col-sm-2 col-form-label">Angkatan</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="angkatan" name="angkatan" value="{{ $user->angkatan }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="poin" class="col-sm-2 col-form-label">Poin Keaktifan</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" id="poin" name="poin" value="{{ $user->poin }}">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="level" class="col-sm-2 col-form-label" name="level">Level</label>
                        <div class="col-sm-10">
                            <select class="custom-select rounded-0" id="level" name="level">
                                <option>Super Admin</option>
                                <option>Admin</option>
                                <option>User</option>
                            </select>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="password" name="password" placeholder="Password...">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-danger">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection