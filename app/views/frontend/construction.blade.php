<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>幸福時光</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />

	<link rel="stylesheet" type="text/css" href="css/animate.css">
	<link rel="stylesheet" type="text/css" href="css/2/default2.css">
	<link rel="stylesheet" type="text/css" href="css/2/construction.css">

	<script src="js/jquery.js"></script>
	<script src="js/wow.min.js"></script>

	<script src="js/script2.js"></script>
	<style media="screen">
	#list li  img{
		width: 110px;
	}
	</style>
</head>
<body>
	<nav>
		<div>
			<img src="img/2/menu.png">
			<ul>
				<li><a href="environment.html">環境特色</a></li>
				<li><a href="material.html">建材特色</a></li>
				<li><a href="plan.html">規劃特色</a></li>
				<li><a href="security.html">安全特色</a></li>
				<li><a href="furniture.html">傢配</a></li>
				<li><a href="payment.html">付款方式</a></li>
				<li><a href="construction">施工進度</a></li>
			</ul>
			<img src="img/2/index/i1.png">
		</div>
	</nav>
	<p class="menu2"><img src="img/2/menu2.png"></p>

<div id="container">

	<div id="top">
		<img src="img/2/cons/top.jpg">
		<a href="index2.html"><img class="logo" src="img/2/logo2.png"></a>
		<p><span>施工進度</span></p>
	</div>


	<div id="main">
		<div id="list">
			<div class="title">
				<p>施工進度</p>
				<span>POWER of HAPPINESS</span>
			</div>

			<ul>
				@foreach($res as $row )
				<li class="clearfix">

					@if(  !empty($row->image) AND File::exists( public_path().$row->image)  )

						<a href="/public{{$row->image}}" id="example1">
								<img src="/public{{$row->image}}">
						</a>
					@endif
					<p>
						<span>{{$row->date}}</span>
						<span class="wow fadeInUp">{{$row->content}}</span>
					</p>

					<!-- <a href="login.html"><div class="more"></div></a> -->
				</li>
				@endforeach

			</ul>

			<p>

				<?php echo with(new CustomPresenter($res))->render(); ?>

			</p>
		</div>
	</div>

	<img id="toTop" src="img/2/toTop.jpg">
	<footer>
		<img src="img/2/footer.png">
		<p>Copyright © HAPPINESS TIME CONSTRUCTION ENTERPRISE CO., LTD. All Rights Reserved‧</p>
		<div>
			<a href="index1.html"><img src="img/2/index1.png"></a>
			<a href="index2.html"><img src="img/2/index2.png"></a>
			<a href="index.html"><img src="img/2/home.png"></a>
		</div>
	</footer>

</div>
<script type="text/javascript">
	$(document).ready(function() {
		/*
		*   Examples - images
		*/

		$("a#example1").fancybox();

		$("a#example2").fancybox({
			'overlayShow'	: false,
			'transitionIn'	: 'elastic',
			'transitionOut'	: 'elastic'
		});

		$("a#example3").fancybox({
			'transitionIn'	: 'none',
			'transitionOut'	: 'none'
		});

		$("a#example4").fancybox({
			'opacity'		: true,
			'overlayShow'	: false,
			'transitionIn'	: 'elastic',
			'transitionOut'	: 'none'
		});

		$("a#example5").fancybox();

		$("a#example6").fancybox({
			'titlePosition'		: 'outside',
			'overlayColor'		: '#000',
			'overlayOpacity'	: 0.9
		});

		$("a#example7").fancybox({
			'titlePosition'	: 'inside'
		});

		$("a#example8").fancybox({
			'titlePosition'	: 'over'
		});

		$("a[rel=example_group]").fancybox({
			'transitionIn'		: 'none',
			'transitionOut'		: 'none',
			'titlePosition' 	: 'over',
			'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
				return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
			}
		});

		/*
		*   Examples - various
		*/

		$("#various1").fancybox({
			'titlePosition'		: 'inside',
			'transitionIn'		: 'none',
			'transitionOut'		: 'none'
		});

		$("#various2").fancybox();

		$("#various3").fancybox({
			'width'				: '75%',
			'height'			: '75%',
			'autoScale'			: false,
			'transitionIn'		: 'none',
			'transitionOut'		: 'none',
			'type'				: 'iframe'
		});

		$("#various4").fancybox({
			'padding'			: 0,
			'autoScale'			: false,
			'transitionIn'		: 'none',
			'transitionOut'		: 'none'
		});
	});
</script>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
<script>
	!window.jQuery && document.write('<script src="jquery-1.4.3.min.js"><\/script>');
</script>
<script type="text/javascript" src="./fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
<script type="text/javascript" src="./fancybox/jquery.fancybox-1.3.4.pack.js"></script>
<link rel="stylesheet" type="text/css" href="./fancybox/jquery.fancybox-1.3.4.css" media="screen" />

</body>
</html>
