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
                      <th>name</th>
                      <th>Price</th>
                      <th>Stock</th>
                      <th>Description</th>
                    </tr>
                  </thead>

                  <tbody>
                    
                    @foreach($menu as $menu)
                    
                    <tr>
                      <td>
                          <img src="{{ url('upload/'.$menu->photo)}}" id="profil" alt="foto"  style="width: 50px">
                      </td>

                      <td>
                        {{$menu->name}}
                      </td>

                      <td>
                        {{$menu->price}}K
                      </td>

                      <td>
                        {{$menu->stock}}
                      </td>

                      <td>
                        {{$menu->description}}
                      </td>

                      <td>

                        <button onclick="edit_menu('{{$menu->id}}','{{$menu->name}}','{{$menu->price}}','{{$menu->description}}','{{$menu->stock}}')" class="btn btn-warning"><span class="fa fa-pencil"></span></button>

                        <button onclick="hapus('{{$menu->id}}')" class="btn btn-danger"><span class="fa fa-trash"></span></button>

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
                  <form name="form1" action="{{ url('outlet/addMenu')}}" method="post" enctype="multipart/form-data">
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">Name</label>
                      <div class="col-md-10"><input type="text" name="name" class="form-control" id="judul" required="" placeholder="name of food"></div>
                    </div>
                    <br>
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">Price</label>
                      <div class="col-md-10"><input type="number" name="price" class="form-control" id="judul" required="" placeholder="ex : 15k"></div>
                    </div>
                    <br>
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">Stock</label>
                      <div class="col-md-10"><input type="number" name="stock" class="form-control" id="judul" placeholder="ex:15"></div>
                    </div>
                    <br>
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">Desc</label>
                      <div class="col-md-10"><textarea name="description" class="form-control" cols="30" rows="5" placeholder="description of food"></textarea></div>
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
          <div class="modal fade" id="edit_menu">
            <div class="modal-dialog" role="document">
              <div class="modal-content" style="padding: 10px">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Input Valid Data</h4>
                </div>
                <div class="modal-body">
                  <form name="form_edit_menu" action="{{ url('outlet/updateMenu')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id">
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">Name</label>
                      <div class="col-md-10"><input type="text" name="name" class="form-control" id="judul" required="" placeholder="name of food"></div>
                    </div>
                    <br>
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">Price</label>
                      <div class="col-md-10"><input type="number" name="price" class="form-control" id="judul" required="" placeholder="ex : 15k"></div>
                    </div>
                    <br>
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">Stock</label>
                      <div class="col-md-10"><input type="number" name="stock" class="form-control" id="judul" placeholder="ex:15"></div>
                    </div>
                    <br>
                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">Desc</label>
                      <div class="col-md-10"><textarea name="description" class="form-control" cols="30" rows="5" placeholder="description of food"></textarea></div>
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
                  
                  <form name="form2" action="{{ url('outlet/deleteMenu')}}" method="post" enctype="multipart/form-data">
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



      <!-- Fungsi Untuk menampilkan PopUp -->
      <script>

          function add()
              {
                $('#add_data').modal('show');
              }
          function edit_menu(id,name,price,description,stock)
            {
              document.forms['form_edit_menu']['name'].value=name;
              document.forms['form_edit_menu']['price'].value=price;
              document.forms['form_edit_menu']['description'].value=description;
              document.forms['form_edit_menu']['id'].value=id;
              document.forms['form_edit_menu']['stock'].value=stock;
                $('#edit_menu').modal('show');
            }
              
          function hapus(id)
            {
                document.forms['form2']['id'].value=id;
                $('#hapus').modal('show');
            }
      </script>




    @endsection