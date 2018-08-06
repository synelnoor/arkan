<section id="special" class="special sections">
		<div class="container">
			<div class="row">
				<div class="head_title text-center wow slideInLeft" data-wow-duration="1.5s">
					<h2>This month specials</h2>
					<div class="separetor"></div>
				</div>
				<div class="main_special text-center wow slideInUp" data-wow-duration="3s">
					@foreach ($data['product_spc'] as $product)
					<div class="col-md-2 col-sm-3 col-xs-6 single_special">
						<div class="single_special_img">
							<img src="{{$product['img']}}" alt="{{$product['name']}}" />
							<div class="single_special_overlay text-center">
								<h3>{{$product['name']}}</h3>
								<div class="overlay_separetor"></div>
								<p>{{$product['desc']}}</p>
								<p>{{$product['price']}}</p>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</section>