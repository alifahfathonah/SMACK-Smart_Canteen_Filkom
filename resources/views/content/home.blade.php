@extends('layouts.master')

@section('title','SMACK | HOME')

@section('slide')
	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
							<li data-target="#slider-carousel" data-slide-to="3"></li>
							<li data-target="#slider-carousel" data-slide-to="4"></li>
						</ol>
						
						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>S</span>-MACK</h1>
									<h2>Smart Canteen Filkom</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
								</div>
								<div class="col-sm-6">
									<img src="{{ url('images/home/5.png')}}" class="girl img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>S</span>-MACK</h1>
									<h2>Smart Canteen Filkom</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
								</div>
								<div class="col-sm-6">
									<img src="{{ url('images/home/1.jpeg')}}" class="girl img-responsive" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>S</span>-MACK</h1>
									<h2>Smart Canteen Filkom</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
								</div>
								<div class="col-sm-6">
									<img src="{{ url('images/home/2.jpeg')}}" class="girl img-responsive" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>S</span>-MACK</h1>
									<h2>Smart Canteen Filkom</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
								</div>
								<div class="col-sm-6">
									<img src="{{ url('images/home/3.jpeg')}}" class="girl img-responsive" alt="" />
								</div>
							</div>
							
							<div class="item">
								<div class="col-sm-6">
									<h1><span>S</span>-MACK</h1>
									<h2>Smart Canteen Filkom</h2>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
								</div>
								<div class="col-sm-6">
									<img src="{{ url('images/home/4.jpeg')}}" class="girl img-responsive" alt="" />
								</div>
							</div>
							
						</div>
						
						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
					
				</div>
			</div>
		</div>
	</section><!--/slider-->
@endsection

@section('content')
	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">OUR MENUS</h2>

						@foreach($menu as $menu)

						<div class="col-sm-3">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/{{ $menu->photo}}" alt="" style="width: 300px">
											<h2>{{ $menu->price}}K</h2>
											<p>{{ $menu->name}}</p>
											<a href="product_details" style="margin-bottom:23px" class="btn btn-default add-to-cart"><i class="fa fa-plus-square"></i>View Details</a>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2>{{ $menu->price}}K</h2>
											<p>{{ $menu->name}}</p>
												<a href="{{ url('product_detail/'.$menu->id)}}" style="margin-bottom:23px" class="btn btn-default add-to-cart"><i class="fa fa-plus-square"></i>View Details</a>
											</div>
										</div>
								</div>
							</div>
						</div>

						@endforeach

					</div><!--features_items-->

					
				</div>
			</div>
		</div>
	</section>

	@endsection