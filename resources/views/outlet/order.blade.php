@extends('outlet/template')

@section('content')

    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">List All Menu</h1>
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
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body p-0">
                 <table class="table table-striped">
                  <thead>
                    <tr>
                      <th>Menu</th>
                      <th>Pemesan</th>
                      <th>Jumlah</th>
                      <th>Status</th>
                    </tr>
                  </thead>

                  <tbody>
                    
                    @foreach($pemesanan as $pesan)
                    
                    <tr>

                      <td>
                        {{$pesan->menu->name}}
                      </td>
                      <td>
                        {{$pesan->member}}
                      </td>
                      <td>
                        {{$pesan->jumlah}}
                      </td>
                      <td>
                        {{$pesan->status}}
                      </td>

                      <td>

                        @if($pesan->status == "new")

                        <button onclick="confirm('{{$pesan->id}}','{{$pesan->menu_id}}','{{$pesan->jumlah}}')" class="btn btn-primary"><span class="fa fa-check"></span> Confirm</button>

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
          <div class="modal fade" id="confirm">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                </div>
                <div class="modal-body">
                  
                  <form name="form_confirm" action="{{ url('outlet/confirmOrder')}}" method="post" enctype="multipart/form-data">
                     <input type="hidden" name="id">
                     <input type="hidden" name="menu_id">
                     <input type="hidden" name="jumlah">
                    <p>Confirm this Ordering ? </p>
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



      <!-- Fungsi Untuk menampilkan PopUp -->
      <script>
          function confirm(id,menu_id,jumlah)
            {
                document.forms['form_confirm']['id'].value=id;
                document.forms['form_confirm']['menu_id'].value=menu_id;
                document.forms['form_confirm']['jumlah'].value=jumlah;
                $('#confirm').modal('show');
            }
      </script>
    @endsection