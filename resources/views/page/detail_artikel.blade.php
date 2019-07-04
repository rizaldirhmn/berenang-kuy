@extends('layouts.frontend')
@section('content')
<section>
		<div class="container at1">
				<div class="row">
						<nav class="transparent z-depth-0">
								<div class="nav-wrapper">
										<div class="col s12">
												<a href="#!" class="breadcrumb">Home</a>
												<a href="#!" class="breadcrumb">Artikel</a>
												<a href="{{ route('index.artikel.detail', $getArtikel->slug )}}" class="breadcrumb">{{ $getArtikel->judul }}</a>
										</div>
								</div>
						</nav>

				</div>
		</div>

		<div class="container">
				<div class="row">
						<div class="col s12 m12 l8" style="margin-top: -2.5em;">
								<div class="jdla">
										<h4>{{ $getArtikel->judul }}</h4>
										<div class="tgl">
												<p class="valign-wrapper" style="color: #999;"><i class="material-icons">date_range</i>
														{{ $getArtikel->created_at }}</p>
										</div>
								</div>
								<div class="pictartikel">
										<img src="{{ asset('uploads/artikel/'.$getArtikel->path) }}" alt="" class="responsive-img">
										<div class="caption center">
												<i>{{ $getArtikel->caption }}</i>
										</div>
										<p>
											{!! htmlspecialchars_decode($getArtikel->deskripsi) !!}
										</p>
										<br>
										@if($getArtikel->video != null)
											<h6><b>Simak juga video berikut</b></h6>
											<div class="col s12 m6 l6">
													<div class="video-container">
															<iframe width="560" height="315" src="https://www.youtube.com/embed/{{$getArtikel->video}}?rel=0"
																	frameborder="0" allowfullscreen></iframe></div>
											</div>
										@endif
										<div class="fixed-action-btn">
												<a class="btn-floating btn-large grey">
														<i class=" large material-icons">share</i>
												</a>
												<ul>
														<li><a href="#" target="_blank" class="btn-floating blue"><i
																				class="fab fa-facebook-square"></i></a></li>
														<li><a href="#" target="_blank" class="btn-floating green"><i
																				class="fab fa-line"></i></a></li>
														<li><a href="#" target="_blank" class="btn-floating blue"><i
																				class="fab fa-twitter"></i></a></li>
														<li><a href="#" target="_blank" class="btn-floating green"><i
																				class="fab fa-whatsapp"></i></a></li>
												</ul>
										</div>
								</div>
						</div>
						<div class="col s12 m12 l4" style="margin-top: 4.5em;">
								<div class="pushpin pin-top block">
										<h6 style="padding-left: 11px; font-size: 25px; font-weight: bold;">Artikel Terkait</h6>
										<div class="bb1"></div>
										@foreach ($relatedArtikel as $item)
											<div class="col s12 m12 l12">
												<a href="{{ route('index.artikel.detail', $item->slug) }}">
													<div class="card horizontal hoverable">
															<div class="card-image">
																	<img src="{{ asset('uploads/artikel/'.$item->path) }}" class="responsive-img">
															</div>
															<div class="card-stacked">
																	<div class="card-content">
																			<p>{{ $item->judul }}</p>
																	</div>
															</div>
													</div>
												</a>
											</div>
										@endforeach
								</div>


								<!-- <div id="red" class="block red lighten-1">
										<nav class="pushpin-demo-nav pin-top" data-target="red" style="top: 0px;">
												<div class="nav-wrapper red">
														<div class="container">
																<a href="#" class="brand-logo">Red</a>
																<ul id="nav-mobile" class="right hide-on-med-and-down">
																		<li><a href="#!">Red Link 1</a></li>
																		<li><a href="#!">Red Link 2</a></li>
																		<li><a href="#!">Red Link 3</a></li>
																</ul>
														</div>
												</div>
										</nav>
								</div> -->

						</div>
				</div>
		</div>
</section>
@endsection