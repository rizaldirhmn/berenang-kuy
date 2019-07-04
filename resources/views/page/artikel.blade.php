@extends('layouts.frontend')
@section('content')
<section class="at">
	<div class="container at1">
			<div class="row">
					<h5 class="center">Artikel</h5>
					<div class="bb"></div>
					@foreach ($artikel as $item)
						<div class="col s6 m4 l3">
								<div class="card hoverable">
										<div class="card-image">
												<img src="{{ asset('uploads/artikel/'.$item->path) }}" class="responsive-img">
										</div>
										<div class="card-content">
												<p>{{ $item->judul }}</p>
										</div>
										<div class="card-action center">
												<a class="waves-effect waves-light light-blue accent-4 btn" href="{{ route('index.artikel.detail', $item->slug) }}">Selengkapnya</a>
										</div>
								</div>
						</div>
					@endforeach
			</div>
	</div>
</section>
@endsection