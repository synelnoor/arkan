<section id="menus" class="menus sections">
		<div class="container">
			<div class="row">
				<div class="main_menus">
					<div class="head_title text-center wow slideInDown" data-wow-duration="2s">
						<h2>Menu</h2>
						<div class="separetor"></div>
					</div>
					
					<div class="menus_top_menu text-center wow slideInDown" data-wow-duration="1.5s">
						<ul>
							<li class="active"><a href="javascipt:void(0);" id="saung">Saung Cisadane</a></li>
							<li><a href="javascipt:void(0);" id="mie">Mie Ayam Banyumas</a></li>
						</ul>
					</div>

					<!-- saung -->
					<div class="saung">
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="single_menus wow slideInLeft" data-wow-duration="1.5s">
								<ul>
									@foreach ($data['price_saung'][0] as $product)
									<li>
										<div style="overflow:hidden; border-bottom:1px solid #666;"> 
											<span style="float:left;">{{$product['name']}}</span>
											<span style="float:right;">{{$product['price']}}</span>
										</div>
									</li>
									@endforeach
									
								</ul>
							</div>
						</div>
						
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="single_menus wow slideInRight" data-wow-duration="1.5s">
								<ul>
									@foreach ($data['price_saung'][1] as $product)
									<li>
										<div style="overflow:hidden; border-bottom:1px solid #666;"> 
											<span style="float:left;">{{$product['name']}}</span>
											<span style="float:right;">{{$product['price']}}</span>
										</div>
									</li>
									@endforeach
									
								</ul>
							</div>
						</div>
					</div>
					<!-- Mie -->
					<div class="mie" style="display:none;">
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="single_menus wow slideInLeft" data-wow-duration="1.5s">
								<ul>
									@foreach ($data['price_miayam'][0] as $product)
									<li>
										<div style="overflow:hidden; border-bottom:1px solid #666;"> 
											<span style="float:left;">{{$product['name']}}</span>
											<span style="float:right;">{{$product['price']}}</span>
										</div>
									</li>
									@endforeach
									
								</ul>
							</div>
						</div>
						
						<div class="col-md-6 col-sm-6 col-xs-12">
							<div class="single_menus wow slideInRight" data-wow-duration="1.5s">
								<ul>
									@foreach ($data['price_miayam'][1] as $product)
									<li>
										<div style="overflow:hidden; border-bottom:1px solid #666;"> 
											<span style="float:left;">{{$product['name']}}</span>
											<span style="float:right;">{{$product['price']}}</span>
										</div>
									</li>
									@endforeach
									
								</ul>
							</div>
						</div>
					</div>

					

				</div>
			</div>
		</div>
	</section>

@section('scripts')
<script>
	$('#mie').on( "click", function(){
		$('.saung').hide()
		$('.mie').show()
	});

	$('#saung').on( "click", function(){
		$('.mie').hide()
		$('.saung').show()
	});

</script>
@endsection