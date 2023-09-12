<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>



	<div class="container mt-5">

		@if(Session::has('success'))
		<p class="alert alert-info mb-5">{{ Session::get('success') }}</p>
		@endif
		
		@if(Session::has('error'))
		<p class="alert alert-danger mb-5">{{ Session::get('error') }}</p>
		@endif


		<form action="{{ route('image.store') }}" method="post" enctype="multipart/form-data">
			@csrf

			<div class="input-group control-group lst increment">
				<input type="file" name="images[]" class="myfrm form-control">
				<div class="input-group-btn">
					<a href="javascript:void(0)" class="btn btn-success" id="addfile">Add</a>
				</div>
			</div>

			<div class="clone" id="morefile" style="display: none">
				<div class="input-group control-group lst my-3">
					<input type="file" name="images[]" class="myfrm form-control">
					<div class="input-group-btn">
						<a href="javascript:void(0)" class="btn btn-danger" id="removefile">Remove</a>
					</div>
				</div>
			</div>

			<button class="btn btn-success mt-3">Submit</button>


		</form>
	</div>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

	<script>
		$(document).ready(function () {
				$('#addfile').click(function () {
					var html = $('.clone').html();
					$('.increment').after(html);
				});

				$('body').on('click', '#removefile', function (){
					$(this).parents('.control-group').remove();
				});

			});
	</script>
</body>

</html>