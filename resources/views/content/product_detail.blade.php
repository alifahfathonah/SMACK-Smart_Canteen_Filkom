@extends('layouts.master')

@section('title','SMACK | PRODUCT')

@section('content')
	<section>
		<div class="container">
			<div class="row">
				@foreach($menu as $menu)
				<div class="col-sm-12 ">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<!--Code for Zoom-->
							<div class="view-product">
								<img id="zoom_01" src='{{ url('images/home/'.$menu->photo)}}' data-zoom-image="images/product-details/roy.jpg"/>
							</div>
							<!--Code for zoom ends-->
						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								<div class="row">
									<div class="col-md-3">
											<h2>{{$menu->name}}</h2>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<h1 style="color: #FE980F">{{ $menu->price}} K</h1>
									</div>
									<div class="col-md-9">
										
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
											<p><strong>Description</strong></p>
									</div>
									<div class="col-md-9">
										: {{$menu->description}}
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<p><strong>Outlet</strong></p>
									</div>
									<div class="col-md-9">
										<p>: {{ $menu->user->username }}</p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-3">
										<p><strong>Stock</strong></p>
									</div>
									<div class="col-md-9">
										<p<strong style="color: #FE980F">: {{ $menu->stock}}</strong></i></p>
									</div>
								</div>
								<div class="row">
									<div class="col-md-9">
										@if(auth()->check())
										<button class="cart cart_wishlist" onclick="order('{{$menu->id}}','{{$menu->user->username}}','{{auth()->user()->username}}','{{$menu->stock}}')" style="padding:6px 36px;margin-top:20px">Order Now</button>
										{{csrf_field()}}
										@else
										<button class="cart cart_wishlist" onclick="popup()" style="padding:6px 36px;margin-top:20px">Order Now</button>
										@endif
									</div>
								</div>

							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
				</div>
				@endforeach
			</div>
		</div>
		<br>
		<br>
	</section>



       <div class="container">
          <!-- Modal -->
          <div class="modal fade" id="popup">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Rejection !</h4>
                </div>
                <div class="modal-body">
                    <p>You need Login First or register</p>
                      <br>
                    <div class="modal-footer">
                      <a href="{{url('login')}}" target="_blank" class="btn btn-primary">Login</a>
                    </div>
                    <input type="hidden" name="_method" value="PUT">
                </div>
              </div><!--modal-content-->
            </div><!--modal-dialog-->
          </div><!--modal-->
      </div><!--container-->
      <!-- akhir pop up -->



       <div class="container">
          <!-- Modal -->
          <div class="modal fade" id="order">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="myModalLabel">Rejection !</h4>
                </div>
                <div class="modal-body">
                    <form name="form_order" action="{{ url('pemesanan')}}" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id">
                    <input type="hidden" name="outlet">
                    <input type="hidden" name="member">

                    <div class="row">
                      <label for="judul" class="col-md-2 col-form-label">Amount</label>
                      <div class="col-md-10">
                      	<input type="number" class="form-control" name="jumlah" placeholder="1">
                      </div>
                    </div>
                    
                    <br>

                    <div class="modal-footer">
                      <input type="submit" class="btn btn-primary" value="Submit">
                    </div>
                    {{csrf_field()}}
                  </form>
                </div>
              </div><!--modal-content-->
            </div><!--modal-dialog-->
          </div><!--modal-->
      </div><!--container-->
      <!-- akhir pop up -->



      <!-- Fungsi Untuk menampilkan PopUp -->
      <script>              
          function popup(id)
            {
                $('#popup').modal('show');
            }              
          function order(id,outlet,member,stock)
            {
	            document.forms['form_order']['id'].value=id;
	            document.forms['form_order']['outlet'].value=outlet;
	            document.forms['form_order']['member'].value=member;
	            document.forms['form_order']['jumlah'].max=stock;
	            document.forms['form_order']['jumlah'].min=1;
                $('#order').modal('show');
            }
      </script>
	@endsection
