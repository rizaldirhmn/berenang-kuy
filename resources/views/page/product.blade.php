@extends('layouts.frontend')
@section('content')
<section>
	<div class="container">
			<div class="row center">
				<h5>Produk Kami</h5>
				<div class="bb"></div>
				@foreach ($product as $item)
					<div class="col s12 m4 l3">
							<div class="card hoverable">
									<div class="card-image">
											<img src="{{ asset('uploads/product/'.$item->path) }}" class="responsive-img pk">
									</div>
									<div class="card-content">
											<p>{{ $item->name }}</p>
									</div>
									<div class="card-action center">
											<a class="waves-effect waves-light light-blue accent-4 btn" href="{{ route('index.product.detail', $item->slug)}}">Lihat</a>
									</div>
							</div>
					</div>
				@endforeach
			</div>
			{{-- <div class="row">
				<div class="col s12 m4 l3">
					<div class="center">
						{{ $product->links() }}
					</div>
				</div>
			</div> --}}
	</div>
</section>
@endsection