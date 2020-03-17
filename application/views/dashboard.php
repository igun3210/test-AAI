<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Side</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/font-awesome.min.css">

</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<a class="navbar-brand" href="#">AAI-TEST</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Movies</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" onclick="ajax_get_data('1','popular')">Popular Movies</a>
						<a class="dropdown-item" onclick="ajax_get_data('1','toprated')">Top Rated Movies</a>
						<a class="dropdown-item" onclick="ajax_get_data('1','upcoming')">Upcoming Movies</a>
						<a class="dropdown-item" onclick="ajax_get_data('1','nowplaying')">Now Playing Movies</a>
					</div>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">TV Show</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" onclick="ajax_get_data('0','popular')">Popular TV Shows</a>
						<a class="dropdown-item" onclick="ajax_get_data('0','toprated')">Top Rated TV Shows</a>
						<a class="dropdown-item" onclick="ajax_get_data('0','ontheair')">On The Air TV Shows</a>
						<a class="dropdown-item" onclick="ajax_get_data('0','airingtoday')">Airing Today TV Shows</a>
					</div>
				</li>
			</ul>
		</div>
	</nav>

	<br>
	<div class="container-fluid">
		<h2 id="t-menu"></h2>
		<hr>
		<div class="row" id="c-list">
		</div>
	</div>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/jquery/jquery-3.2.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>

	<script>
	_data = {};
	_data.movie = {
		'toprated' : ['Top Rated Movies','movie/top_rated','movie'],
		'upcoming' : ['Upcoming Movies','movie/upcoming','movie'],
		'nowplaying' : ['Now Playing Movies','movie/now_playing','movie'],
		'popular' : ['Poplar Movies','movie/popular','movie']
	};

	_data.tv = {
		'toprated' : ['Top Rated TV Shows','tv/top_rated','tv'],
		'ontheair' : ['On Air TV Shows','tv/on_the_air','tv'],
		'airingtoday' : ['Airing TV Shows','tv/airing_today','tv'],
		'popular' : ['Popular TV Shows','tv/popular','tv']
	};
	
	function check_index(type=0,prop='popular') {
		if (type == 1) {
			if (_data.movie.hasOwnProperty(prop)) {
				_feedback = _data.movie[prop];
			} else {
				_feedback = _data.movie.popular;
			}
		} else {
			if (_data.tv.hasOwnProperty(prop)) {
				_feedback = _data.tv[prop];
			} else {
				_feedback = _data.tv.popular;
			}
		}
		return _feedback;
	}

	ajax_get_data('1','popular');

	function ajax_get_data(t,p) {
		__feedback = check_index(t,p);
		
		$.ajax({
			type : "GET",
			url  : "https://api.themoviedb.org/3/"+__feedback[1],
			dataType : "JSON",
			data : {
				'api_key' : '86c15fc08188752ab7e969f5f0df07e7',
				'page' : 1,
			},
			success: function(data){
				$("#t-menu").text(__feedback[0]);
				$("#c-list").empty();
				$.each(data.results, function( index, value ) {
					$("#c-list").append(`
						<div class="col-lg-3 mb-3">
							<div class="card">
								<img src="https://image.tmdb.org/t/p/w500`+value.backdrop_path+`" class="card-img-top" alt="...">
								<span class="badge badge-warning position-absolute" style="top:0px;">
									`+value.vote_average+`
								</span>
								<div class="card-body">
									<h5 class="card-title text-truncate">`+value.title+`</h5>
									<ul>
										<li>Date : <b>`+value.release_date+`</b></li>
									</ul>
									<p class="card-text text-truncate">`+value.overview+`</p>
									<button type="button" class="btn btn-primary" onclick="ajax_get_detail('`+__feedback[2]+`','`+value.id+`')">Detail</a>
								</div>
							</div>
						</div>
						`);
				});
			}
		});
		return false;
	}

	function ajax_get_detail(t,id) {
		$.ajax({
			type : "GET",
			url  : "https://api.themoviedb.org/3/"+t+"/"+id,
			dataType : "JSON",
			data : {
				'api_key' : '86c15fc08188752ab7e969f5f0df07e7',
			},
			success: function(data){
				console.log(data);
				$("#t-menu").text(data.title);
				$("#c-list").empty();
				
				$("#c-list").append(`
					<div class="card m-3">
						<div class="row no-gutters">
							<div class="col-3 p-5">
								<img src="https://image.tmdb.org/t/p/w500`+data.poster_path+`" class="card-img" alt="..." style="width:300px;">
							</div>

							<div class="col-6 p-5">
								<h5 class="card-title text-truncate">`+data.title+`</h5>
								<ul>
									<li>Rate : <span class="badge badge-warning">
									`+data.vote_average+`
								</span></li>
									<li>Date : <b>`+data.release_date+`</b></li>
									<li><a href="`+data.homepage+`">
										`+data.homepage+`</a></li>
								</ul>
								<p class="card-text">`+data.overview+`</p>
							</div>
						</div>
					</div>
					`);
			}
		});
		return false;
	}
	</script>
</body>
</html>