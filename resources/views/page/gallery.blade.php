@extends('layouts.frontend')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.0/css/lightgallery.min.css">
@endsection
@section('content')
<section>
	<div class="container">
			<div class="row">
					<h5 class="center">Galeri</h5>
					<div class="bb"></div>
					<div class="row">
						<div class="demo-gallery">
							<ul id="lightgallery" class="list-unstyled row">
								@foreach ($gallery as $item)
									<li class="col l3 m4 s12"
											data-responsive="{{ asset($item->path) }} 375, {{ asset($item->path) }} 480, {{ asset($item->path) }} 800"
											data-src="{{ asset($item->path) }}"
											data-sub-html="{{ $item->deskripsi }}">
											<a href="">
													<img class="responsive-img" src="{{ asset($item->path) }}">
											</a>
									</li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="text-center">
								{{ $gallery->links() }}
							</div>
						</div>
					</div>
			</div>
	</div>
</section>
@endsection
@section('script')
<script src="{{ asset('js/lightgallery-all.min.js') }}"></script>
<script src="{{ asset('js/jquery.mousewheel.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
@endsection