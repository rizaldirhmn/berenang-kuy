@extends('layouts.frontend')
@section('content')
<section>
		<div class="container at1">
				<div class="row">
						<nav class="transparent z-depth-0">
								<div class="nav-wrapper">
										<div class="col s12">
												<a href="#!" class="breadcrumb">Home</a>
												<a href="#!" class="breadcrumb">Produk</a>
												<a href="#!" class="breadcrumb">{{ $getProduct->name }}</a>
										</div>
								</div>
						</nav>

				</div>
		</div>

		<div class="container">
				<div class="row">
						<div class="col s12 m12 l8" style="
						margin-top: -2.5em;">
								<div class="jdla">
										<h5>{{ $getProduct->name }}</h5>
										<div class="tgl">
												<p class="valign-wrapper" style="color: #999; font-size: 12px;"><i
																class="tiny material-icons">date_range</i>{{ $getProduct->created_at }}</p>
										</div>
								</div>
								<div class="pictartikel">
										<img src="{{ asset('uploads/product/'.$getProduct->path) }}" alt="" class="responsive-img">
										<div class="caption center">
												<i style="font-size: 10px;">{{ $getProduct->caption }}</i>
										</div>
										<p class="ijdl">
												{!! htmlspecialchars_decode($getProduct->deskripsi) !!}
										</p>
										<br>
										@if($getProduct->video != null)
											<h6><b>Simak juga video berikut</b></h6>
											<div class="col s12 m6 l6">
													<div class="video-container">
															<iframe width="560" height="315" src="https://www.youtube.com/embed/{{$getProduct->video}}?rel=0"
																	frameborder="0" allowfullscreen></iframe></div>
											</div>
										@endif
										<div class="fixed-action-btn">
												<a class="btn-floating btn-small grey">
														<i class="small material-icons">share</i>
												</a>
												<ul>
														<li><a href="#" target="_blank" class="btn-floating btn-small blue"><i
																				class="fab fa-facebook-square"></i></a></li>
														<li><a href="#" target="_blank" class="btn-floating btn-small green"><i
																				class="fab fa-line"></i></a></li>
														<li><a href="#" target="_blank" class="btn-floating btn-small blue"><i
																				class="fab fa-twitter"></i></a></li>
														<li><a href="#" target="_blank" class="btn-floating btn-small green"><i
																				class="fab fa-whatsapp"></i></a></li>
												</ul>
										</div>
								</div>
						</div>
						<div class="col s12 m12 l4" style="
						margin-top: 4.5em;">
								<div class="pushpin pin-top block">
										<h6 style="padding-left: 11px; font-size: 25px; font-weight: bold;">Produk Terkait</h6>
										<div class="bb1"></div>
										@foreach ($relatedProduct as $item)
											<div class="col s12 m12 l12">
													<div class="card horizontal hide-on-small-only">
															<div class="card-image">
																	<img class="partikel" src="{{ asset('uploads/product/'.$item->path)}}">
															</div>
															<div class="card-stacked">
																	<div class="card-content">
																			<p class="ijdl">{{ $item->name }}
																			</p>
																	</div>
																	<div class="card-action">
																			<a href="{{ route('index.product.detail', $item->slug )}}">Selengkapnya</a>
																	</div>
															</div>
													</div>
													<div class="card hide-on-med-only hide-on-large-only">
															<div class="card-image">
																	<img class="partikel" src="{{ asset('uploads/product/'.$item->path)}}">
															</div>
															<div class="card-content">
																	<p class="ijdl">{{ $item->name }}
																	</p>
															</div>
															<div class="card-action">
																	<a href="{{ route('index.product.detail', $item->slug )}}">Selengkapnya</a>
															</div>
													</div>
											</div>
										@endforeach
								</div>
						</div>
				</div>
		</div>
</section>
@endsection