@extends('admin/template')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">List All Outlet User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
                <button class="btn btn-primary" onclick="add()"><span class="fa fa-plus"></span> Add Outlet</button>
                <br>
                <br>
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body p-0">
                 <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Foto</th>
                      <th>Username</th>
                      <th>E-mail</th>
                      <th>Status</th>
                    </tr>
                  </thead>

                  <tbody>
                    
                    @foreach($user as $user)
                    
                    <tr>
                      <td>
                          <img src="{{ url('foto_user/'.$user->photo)}}" id="profil" alt="foto"  style="width: 50px">
                      </td>

                      <td>
                        {{$user->username}}
                      </td>

                      <td>
                        {{$user->email}}
                      </td>

                      <td>
                        {{$user->status}}
                      </td>

                      <td>

                        @if($user->status == "new")

                        <button onclick="confirm('{{$user->id}}')" class="btn btn-primary"><span class="fa fa-check"></span></button>
                        <button onclick="reject('{{$user->id}}')" class="btn btn-danger"><span class="fa fa-times"></span></button>

                        @elseif($user->status == "reject")

                        <button onclick="hapus('{{$user->id}}')" class="btn btn-danger"><span class="fa fa-trash"></span></button>

                        @else

                        <button onclick="edit('{{$user->id}}','{{$user->username}}','{{$user->email}}')" class="btn btn-warning"><span class="fa fa-pencil"></span></button>
                        <button onclick="hapus('{{$user->id}}')" class="btn btn-danger"><span class="fa fa-trash"></span></button>

                        @endif
                      </td>
                    
                    </tr>
                    
                    @endforeach

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->



      <div class="container">
          <!-- Modal -->
          <div class="modal fade" id="add_data">
            <div class="modal-dialog" role="document">
              <div class="modal-content" style="padding: 10px">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Input Valid Data</h4>
                </div>
                <div class="modal-body">
                  <form name="form1" action="{{ url('admin/add_user')}}" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">Username</label>
                      <div class="col-md-10"><input type="text" name="username" class="form-control" id="judul" required=""></div>
                    </div>
                    <br>
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">Email</label>
                      <div class="col-md-10"><input type="email" name="email" class="form-control" id="judul" required=""></div>
                    </div>
                    <br>
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">Password</label>
                      <div class="col-md-10"><input type="password" name="password" class="form-control" placeholder="new Password" id="judul"></div>
                    </div>
                    <br>
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">Photo</label>
                      <div class="col-md-10"><input type="file" name="photo" class="form-control" placeholder="photo" id="judul"></div>
                    </div>
                    <br>
                    <div class="modal-footer">
                      <input type="button" class="btn btn-default" data-dismiss="modal" value="TUTUP">
                      <input type="submit" class="btn btn-primary" value="SIMPAN">
                    </div>
                      {{csrf_field()}}
                  </form>
                </div>
              </div><!--modal-content-->
            </div><!--modal-dialog-->
          </div><!--modal-->
      </div><!--container-->
      <!-- akhir pop up -->



      <div class="container">
          <!-- Modal -->
          <div class="modal fade" id="edit_data">
            <div class="modal-dialog" role="document">
              <div class="modal-content" style="padding: 10px">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Input Valid Data</h4>
                </div>
                <div class="modal-body">
                  <form name="form_edit" action="{{ url('admin/edit_user')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id">
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">Username</label>
                      <div class="col-md-10"><input type="text" name="username" class="form-control" id="judul" required=""></div>
                    </div>
                    <br>
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">Email</label>
                      <div class="col-md-10"><input type="email" name="email" class="form-control" id="judul" required=""></div>
                    </div>
                    <br>
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">Password</label>
                      <div class="col-md-10"><input type="password" name="password" class="form-control" placeholder="new Password" id="judul"></div>
                    </div>
                    <br>
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">Photo</label>
                      <div class="col-md-10"><input type="file" name="photo" class="form-control" placeholder="photo" id="judul"></div>
                    </div>
                    <br>
                    <div class="modal-footer">
                      <input type="button" class="btn btn-default" data-dismiss="modal" value="TUTUP">
                      <input type="submit" class="btn btn-primary" value="SIMPAN">
                    </div>
                      {{csrf_field()}}
                    <input type="hidden" name="_method" value="PUT">
                  </form>
                </div>
              </div><!--modal-content-->
            </div><!--modal-dialog-->
          </div><!--modal-->
      </div><!--container-->
      <!-- akhir pop up -->


       <div class="container">
          <!-- Modal -->
          <div class="modal fade" id="hapus">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Delete Data</h4>
                </div>
                <div class="modal-body">
                  
                  <form name="form2" action="{{ url('admin/deleteOutlet')}}" method="post" enctype="multipart/form-data">
                    <div class="col-md-12">

                      <input type="hidden" name="id"></div>
                    <p>Delete this Data ? </p>
                      <br>
                    <div class="modal-footer">
                      <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
                      <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">
                  </form>
                </div>
              </div><!--modal-content-->
            </div><!--modal-dialog-->
          </div><!--modal-->
      </div><!--container-->
      <!-- akhir pop up -->


       <div class="container">
          <!-- Modal -->
          <div class="modal fade" id="confirm">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Confirmation !</h4>
                </div>
                <div class="modal-body">
                  
                  <form name="form_confirm" action="{{ url('admin/confirm_user')}}" method="post" enctype="multipart/form-data">
                    <div class="col-md-12">

                      <input type="hidden" name="id"></div>
                    <p>Confirm This Account ? </p>
                      <br>
                    <div class="modal-footer">
                      <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
                      <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PUT">
                  </form>
                </div>
              </div><!--modal-content-->
            </div><!--modal-dialog-->
          </div><!--modal-->
      </div><!--container-->
      <!-- akhir pop up -->


       <div class="container">
          <!-- Modal -->
          <div class="modal fade" id="reject">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Rejection !</h4>
                </div>
                <div class="modal-body">
                  
                  <form name="form_reject" action="{{ url('admin/reject_user')}}" method="post" enctype="multipart/form-data">
                    <div class="col-md-12">

                      <input type="hidden" name="id"></div>
                    <p>Reject This Account ? </p>
                      <br>
                    <div class="modal-footer">
                      <input type="button" class="btn btn-default" data-dismiss="modal" value="Close">
                      <input type="submit" class="btn btn-danger" value="Submit">
                    </div>
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PUT">
                  </form>
                </div>
              </div><!--modal-content-->
            </div><!--modal-dialog-->
          </div><!--modal-->
      </div><!--container-->
      <!-- akhir pop up -->



      <!-- Fungsi Untuk menampilkan PopUp -->
      <script>

          function add()
              {
                $('#add_data').modal('show');
              }

          function edit(id,username,email)
              {
                document.forms['form_edit']['id'].value=id;
                document.forms['form_edit']['username'].value=username;
                document.forms['form_edit']['email'].value=email;
                $('#edit_data').modal('show');
              }
              
          function hapus(id)
            {
                document.forms['form2']['id'].value=id;
                $('#hapus').modal('show');
            }
              
          function confirm(id)
            {
                document.forms['form_confirm']['id'].value=id;
                $('#confirm').modal('show');
            }
              
          function reject(id)
            {
                document.forms['form_reject']['id'].value=id;
                $('#reject').modal('show');
            }
      </script>




    @endsection