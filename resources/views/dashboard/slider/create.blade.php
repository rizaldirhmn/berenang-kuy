@extends('layouts.dashboard')
@section('content')
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h1>
				Slider
				<small>Control panel</small>
			</h1>
			<ol class="breadcrumb">
				<li><a href="{{ route('home') }}"><i class="fa fa-dashboard"></i> Dashboard</li></a>
				<li>Slider</li>
			</ol>
		</section>

		<!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-md-6">
					<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Upload</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
						<form role="form" action="{{ route('dashboard.slider.create.post') }}" enctype="multipart/form-data" method="POST">
							@csrf
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputPassword1">Deskripsi</label>
                  <textarea name="deskripsi" class="form-control" placeholder="Isi Deskripsi Slider (Optional)" id="" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">File input</label>
                  <input type="file" id="inp" name="image" id="image" class="form-control">

                  <p class="help-block">Ukuran file 1366 x 575</p>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
				</div>
				<div class="col-md-6">
					<div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Image</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
						<div class="box-body">
							<img id="img" class="img-responsive" alt="">
							<input type="hidden" name="foto" id="b64">
						</div>
          </div>
				</div>
			</div>
		</section>
		<!-- /.content -->
	</div>
@endsection
@section('script')
<script>
	function readFile() {
  
  if (this.files && this.files[0]) {
    
			var FR= new FileReader();
			
			FR.addEventListener("load", function(e) {
				document.getElementById("img").src       = e.target.result;
				document.getElementById("b64").value = e.target.result;
			}); 
			
			FR.readAsDataURL( this.files[0] );
		}
		
	}

	document.getElementById("inp").addEventListener("change", readFile);
</script>
@endsection