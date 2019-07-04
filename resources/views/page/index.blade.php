@extends('layouts.frontend')
@section('content')
<!-- Slider -->
<section class="sb">
	<div class="sbs">
		@foreach ($slider as $item)
			<div class="slidecaption">
					<img src="{{ asset($item->path) }}">
					<small>{{ $item->deskripsi }}</small>
			</div>
		@endforeach
	</div>
</section>

<section class="smn">
	<div class="container">
			<div class="row">
					<div class="center">
							<br>
							<p>Salam Berkat Rahmat Allah Yang Maha Kuasa</p>
							<p>Selamat datang di situs Organisasi Persaudaraan Cinta Tanah Air Indonesia – DPD Prov Banten.</p>
							<p>Kami hadir untuk Merajut Nusantara, dan membangkitkan Rasa Cinta Tanah Air di bumi Indonesia.</p>
					</div>
			</div>
	</div>
</section>

<div class="container">
	<div class="row">
			<div class="col m8">
					<h6>II. VISI :</h6>
					<p>Terwujudnya Bangsa Indonesia Yang Cinta Tanah Air</p>

					<h6>III. MISI :</h6>
					<p>Ø Menanamkan Cinta Tanah Air Indonesia sebagai bagian dari iman.</p>
					<p>Ø Menyelenggarakan pendidikan Cinta Tanah Air dalam arti yang seluas-luasnya.</p>
					<p>Ø Melestarikan nilai-nilai Cinta Tanah Air Indonesia</p>
					<p>Ø Melestarikan nilai-nilai luhur budaya bangsa.</p>
			</div>
			<div class="col m4 center">
					<img src="{{ asset('image/logo.png') }}" class="responsive-img vm" alt="">
			</div>
	</div>
</div>

<section class="at">
	<div class="container at1">
			<div class="row">
					<h5 class="center">Artikel Terkait</h5>
					<div class="bb"></div>


					<div class="sat">
						@foreach ($artikel as $item)
							<div class="col m3">
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
	</div>
</section>

<section class="at">
	<div class="container">
			<div class="row center">
					<h5>Kontak Kami</h5>
					<div class="bb"></div>

					<div class="row">
							<form class="col s12 m6 l6">
									<div class="row">
											<div class="input-field col s6 m12 l6">
													<input placeholder="Your Name" id="first_name" type="text" class="validate">
													<label for="first_name">Name</label>
											</div>
											<div class="input-field col s6 m12 l6">
													<input placeholder="Your Company" id="last_name" type="text" class="validate">
													<label for="last_name">Company</label>
											</div>
									</div>
									<div class="row">
											<div class="input-field col s6 m12 l6">
													<input placeholder="Your Email" id="email" type="email" class="validate">
													<label for="email">Email</label>
											</div>
											<div class="input-field col s6 m12 l6">
													<input placeholder="Your Phone" id="phone" type="tel" class="validate">
													<label for="phone">Phone</label>
											</div>
									</div>
									<div class="row">
											<div class="input-field col s12">
													<textarea id="textarea1" placeholder="Your Message"
															class="materialize-textarea"></textarea>
													<label for="textarea1">Message</label>
											</div>
									</div>
							</form>

							<div class="col s12 m6 l6">
									<div class="mapouter">
											<div class="gmap_canvas">
												<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.246072896325!2d106.7248212149728!3d-6.231256362758812!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f0a62510bc43%3A0x12ad2cd86182ee05!2sGKI+Ciledug+Raya!5e0!3m2!1sen!2sid!4v1561608363478!5m2!1sen!2sid" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
											</div>
									</div>
							</div>

					</div>


			</div>
	</div>
</section>
@endsection