<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="{{ url('css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{ url('css/style1.css')}}">
	<title>Login</title>
</head>
<body>

	<body class="body_login">	

      <div class="row">
            <a href="{{ url('/')}}">
              <div class="col-md-12 text-right" style="color: red;padding-left: 20px;" id="login_brand">
              <img src="{{url('images/smack.png')}}" alt="SMACK">
              </div>
            </a>
      </div>
			<div class="container">
				<div class="row row-login">
					<div class="col-md-4"></div>
					<div class="col-md-4">
						<div class="login text-center">
							<div class="label"><h2 class="shadow"><span class="glyphicon glyphicon-user"></span> LOGIN</h2> <hr class="shadow"></div>
							
			                <form action="{{ url('loginCheck')}}" method="post" class="form">
											
			                    <div class="form-group">
									<input type="text" class="form-control" name="username" placeholder="Username or E-mail" required="">
								</div>
								<div class="form-group">
									<input type="Password" class="form-control" name="password" placeholder="Password" required="">
								</div>
								<br>
								<div class="form-group">
									<input type="submit" class="btn btn-primary" value=" LOGIN " style="width: 100%">
								</div>
								{{csrf_field()}}
							</form>
              
						</div>
					</div>
					<div class="col-md-4"></div>				
				</div>
			</div>
	</body>
</html>


<!-- pop up tambah register -->
 <div class="container">
<!-- Modal -->
<div class="modal fade" id="register">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Masukkan Data</h4>
      </div>
      <div class="modal-body">
        <form name="login1" action="{{ url('/register')}}" method="post" enctype="multipart/form-data">
        <div class="row">
          <div class="col-md-2">Nama</div>
          <div class="col-md-10"><input type="text" name="username" required></div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-2">Email</div>
          <div class="col-md-10"><input type="email" name="email" required></div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-2">Password</div>
          <div class="col-md-10"><input type="password" name="password" required></div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-2">Level</div>
          <div class="col-md-10">
			<select name="level">
				<option value="outlet">outlet</option>
				<option value="member">member</option>
			</select>
          </div>
        </div>
        <br>
      <div class="modal-footer">
        <input type="button" class="btn btn-default" data-dismiss="modal" value="TUTUP">
        <input type="submit" class="btn btn-primary" onclick="return alert('Berhasil Menyimpan Data')" value="SIMPAN">
      </div>
        {{csrf_field()}}
        </form>
      </div>
    </div><!--modal-content-->
  </div><!--modal-dialog-->
</div><!--modal-->
</div><!--container-->
<!-- akhir pop up -->



<script>

function register()
{
  $('#register').modal('show');
}

</script>

<script src="{{ url('js/jquery-1.8.3.min.js')}}"></script>              
<script src="{{ url('js/bootstrap.min.js')}}"></script>