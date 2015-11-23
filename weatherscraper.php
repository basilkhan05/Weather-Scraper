<!doctype html>
<html>
<head>
<title>My First Webpage</title>
<meta charset="utf-8" />
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css">

</head>

<style>

html,body{
	height:100%;
}

.container{
	background-image:url("img/unsplash.jpg"); 
	width: 100%;
	height: 100%;
	background-size: cover;
	background-position: center;
	padding-top: 100px;
}

.center{
	text-align: center;

}


.white{
	color:black;
	font-weight: bold
}

p{
	padding-top: 15px;
	padding-bottom: 15px;
}

button{	
	margin-top: 20px;
}

.alert{
	margin-top: 30px;
	display: none;
}

</style>


<body>

<div class="container">

	<div class="row">

		<div class="col-md-6 col-md-offset-3 center">
<h1 class="center white">Weather Predictor</h1>

<p class="lead center white"> Enter your city below to get a weather forecast.</p>

<form>
<div class="form-group">

<input type="text" class="form-control" name="city" id="city" placeholder="Eg. London, San Francisco, Toronto..." />

</div>

<button id="findMyWeather" class="btn btn-success btn-lg">Find My Weather</button>

</form>

<div id="success" class="alert alert-success">
</div>

<div id="fail" class="alert alert-danger">Could not find city. Please try again.</div>


<div id="noCity" class="alert alert-danger">Please enter a city.</div>
		</div>

	</div>


</div>


<!-- Latest compiled and minified JavaScript -->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>

<script>

	$("#findMyWeather").click(function(event) {

		event.preventDefault();

		if ($("#city").val()!="") {

			$.get("scraper.php?city="+$("#city").val(), function(data) {

			


			if (data=="*failed*") {
				$("#success").hide();
				$("#noCity").hide();
				$("#fail").fadeIn();

			} else{
				$("#fail").hide();
				$("#noCity").hide();

				$("#success").html(data).fadeIn();
			};

		});

		} else{
			$("#fail").hide();
				$("#success").hide();

			$("#noCity").fadeIn();


		}

	});

</script>


<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>