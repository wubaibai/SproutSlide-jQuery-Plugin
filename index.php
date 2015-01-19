<!DOCTYPE html>
<head>

	<!-- 所有的 lab 都套用的 head 裡面已經有包含：
		1. jquery-1.9.0.min.js, jquery-ui-1.10.0.custom.css, jquery-ui-1.10.0.custom.min.js
		2. bootstrap.min.css, bootstrap.min.js
		3. lab google analysitic
		4. author copyright favicon
		5. http://lab.25sprout.com/css/lab_site.css
		6. google fonts
		7. paste code pre tag with prettify
	-->
	<?php include("../source/source_head.php"); ?>

	<!-- HTML meta 設定（必填） -->
	<meta name="description" content="SproutSlide is a simple jQuery plugin, it is very easy to customize into yout website.">
	<meta name="keywords" content="Swipe, gesture, slider, easy, simple, customize, mobile, image, infinite, fade." />
	<meta name="URL" content="http://lab.25sprout.com/sproutSlide2/">
	<meta name="image" content="http://lab.25sprout.com/images/share-image.jpg" />

	<!--Facebook -->
	<meta property="og:locale" content="zh_TW" />
	<meta property="og:url" content="http://lab.25sprout.com/sproutSlide2/" />
	<meta property="og:type" content="Website" />
	<meta property="og:description" content="support 'mutiple slide' 'pagenation' 'next' 'previous' 'autoplay' feature." />
	<meta property="og:image" content="http://lab.25sprout.com/images/share-image.jpg" />

	<!-- 網站標題 -->
	<title>SproutSlide-jQuery-Plugin » 25sprout LAB</title>

	<!-- Lab 共用的 CSS -->
	<link type="text/css" rel="stylesheet" href="http://lab.25sprout.com/css/lab_site.css">
	
	<!-- 自己這個 site 要用的 CSS-->
	<link type="text/css" rel="stylesheet" href="css/style.css">

	<!-- 自己這個 site 要用的 js 檔案-->
	<script type="text/javascript" src="sprout-slide/sprout-slide.js"></script>
	<script type="text/javascript" src="sprout-slide/jquery.touchSwipe.js"></script>
	<link type="text/css" rel="stylesheet" href="sprout-slide/sprout-slide.css">
	<link type="text/css" rel="stylesheet" href="sprout-slide/sample.css">

	<script type="text/javascript">
		$(document).ready(function(){
			$('#slide1').sproutSlide({
				animateStyle: "slide",
				width: "auto",
				slideNum: 3,
				duration:700,
				autovalue:true,
				interval:4000,
				enableDot:true,
				enableArrow:true,
				enableLoop:false,
				enablePageNo:true,
				hoverShowArrow:false,
				onInit:function(slider,current,total){
					slider.find('.customize-page-text').html('IMAGES: '+(current+1)+' / '+total);
				},
				beforeAnimate:function(slider,current,total){
					slider.find('.customize-page-text').html('IMAGES: '+(current+1)+' / '+total);
				}
			});

			$('#slide2').sproutSlide({
				animateStyle: "fade",
				width: 720,
				duration:500,
				autovalue:false,
				interval:5000,
				enableDot:true,
				enableArrow:true,
				enablePageNo:false,
				hoverShowArrow:true,
				clickToNext:true
			});
		});
	</script>

</head>

<body>

	<!-- 上方的 header 全站統一 START -->
	<?php include("../source/header.php"); ?>

	<div class="lab-name">
		SproutSlide-jQuery-Plugin
	</div>
	<div class="lab-detail">
		support 'mible swipe gesture' 'mutiple slide' 'pagenation' 'next & previous' 'autoplay' 'Infinite Scroll' feature.
	</div>

	<div class="clear-both"></div>
	<!-- 上方的 header 全站統一 END-->

	<div class="content-container">
		<a href="https://github.com/wubaibai/SproutSlide-jQuery-Plugin/archive/master.zip" style="margin-right:10px;" class="btn btn-inverse f-right" target="_blank"> <i class="fa fa-github" style="font-size:24px; vertical-align:middle; margin-right:8px;"></i> Download From Github</a>
		<a href="https://github.com/wubaibai/SproutSlide-jQuery-Plugin/" style="margin-right:10px;" class="btn f-right" target="_blank"> <i class="fa fa-github" style="font-size:24px; vertical-align:middle; margin-right:8px;"></i> Check At Github</a>
		<div class="clear-both"></div>
		<h2 >Sample 1</h2>
		<div class="sprout-slide-container" id="slide1">
			<div class="sprout-slide-wrapper">
				<ul class="sprout-slide">
					<li>
						<div class="sample-card">
							<a class="pic" href="https://unsplash.com/joshuaearle" target="_blank"><img src="images/sample1.jpg"></a>
							<div class="pic-info"><i class="fa fa-camera"></i> joshuaearle</div>
						</div>
					</li>
					<li>
						<div class="sample-card">
							<a class="pic" href="https://unsplash.com/joshuaearle" target="_blank"><img src="images/sample2.jpg"></a>
							<div class="pic-info"><i class="fa fa-camera"></i> joshuaearle</div>
						</div>
					</li>
					<li>
						<div class="sample-card">
							<a class="pic" href="https://unsplash.com/joshuaearle" target="_blank"><img src="images/sample3.jpg"></a>
							<div class="pic-info"><i class="fa fa-camera"></i> joshuaearle</div>
						</div>
					</li>
					<li>
						<div class="sample-card">
							<a class="pic" href="https://unsplash.com/joshuaearle" target="_blank"><img src="images/sample4.jpg"></a>
							<div class="pic-info"><i class="fa fa-camera"></i> joshuaearle</div>
						</div>
					</li>
					<li>
						<div class="sample-card">
							<a class="pic" href="https://unsplash.com/joshuaearle" target="_blank"><img src="images/sample5.jpg"></a>
							<div class="pic-info"><i class="fa fa-camera"></i> joshuaearle</div>
						</div>
					</li>
					<li>
						<div class="sample-card">
							<a class="pic" href="https://unsplash.com/joshuaearle" target="_blank"><img src="images/sample6.jpg"></a>
							<div class="pic-info"><i class="fa fa-camera"></i> joshuaearle</div>
						</div>
					</li>
					<li>
						<div class="sample-card">
							<a class="pic" href="https://unsplash.com/joshuaearle" target="_blank"><img src="images/sample7.jpg"></a>
							<div class="pic-info"><i class="fa fa-camera"></i> joshuaearle</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="sprout-arrow">
				<div class="sprout-prev"></div>
				<div class="sprout-next"></div>
			</div>
			<div class="sprout-dots">
			</div>
			<div class="customize-page-text"></div>
		</div>

<pre class="prettyprint linenums">
$('#slide1').sproutSlide({
	animateStyle: "slide",
	width: "auto",
	slideNum: 3,
	duration:700,
	autovalue:true,
	interval:4000,
	enableDot:true,
	enableArrow:true,
	enableLoop:false,
	enablePageNo:true,
	hoverShowArrow:false,
	onInit:function(slider,current,total){
		slider.find('.customize-page-text').html('IMAGES: '+(current+1)+' / '+total);
	},
	beforeAnimate:function(slider,current,total){
		slider.find('.customize-page-text').html('IMAGES: '+(current+1)+' / '+total);
	}
});
</pre>
		<hr>
		<h2 >Sample 2</h2>
		<div class="sprout-slide-container" id="slide2">
			<div class="sprout-slide-wrapper">
				<ul class="sprout-slide">
					<li>
						<div class="sample-card">
							<img src="images/sample1.jpg">
							<div class="caption"><i class="fa fa-camera"></i> joshuaearle</div>
						</div>
					</li>
					<li>
						<div class="sample-card">
							<img src="images/sample2.jpg">
						</div>
					</li>
					<li>
						<div class="sample-card">
							<img src="images/sample3.jpg">
							<div class="caption"><i class="fa fa-camera"></i> joshuaearle</div>
						</div>
					</li>
					<li>
						<div class="sample-card">
							<img src="images/sample4.jpg">
						</div>
					</li>
					<li>
						<div class="sample-card">
							<img src="images/sample5.jpg">
							<div class="caption"><i class="fa fa-camera"></i> joshuaearle</div>
						</div>
					</li>
					<li>
						<div class="sample-card">
							<img src="images/sample6.jpg">
						</div>
					</li>
					<li>
						<div class="sample-card">
							<img src="images/sample7.jpg">
							<div class="caption"><i class="fa fa-camera"></i> joshuaearle</div>
						</div>
					</li>
				</ul>
			</div>
			<div class="sprout-arrow">
				<div class="sprout-prev"></div>
				<div class="sprout-next"></div>
			</div>
			<div class="sprout-dots">
			</div>
		</div>

<pre class="prettyprint linenums">
$('#slide2').sproutSlide({
	animateStyle: "fade",
	width: 720,
	duration:500,
	autovalue:true,
	interval:5000,
	enableDot:true,
	enableArrow:true,
	enablePageNo:false,
	hoverShowArrow:true,
	clickToNext:true
});
</pre>
		<hr>
		<!-- <A class="btn btn-success f-right" HREF="sprout-slide-sample.zip"><i class="icon-white icon-download"></i> Click to Download</A> -->
		<!-- <A class="btn btn-success f-right" HREF="sprout-slide-sample/" target="_blank" style="margin-right:15px;"><i class="icon-white icon-eye-open"></i> view sample</A> -->
		<h2 >Implement</h2>
		<div class="alert alert-danger">
			Please do not add any padding and margin to 'li'.<br/>
			If you want each 'li' has margin to another, please put 'div' in 'li', and set margin to the 'div'.
		</div>

<pre class="prettyprint linenums">
&lt;!-- Don't forgot jquery, if your site already have it, it's no need to include again.--&gt;
&lt;script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"&gt;&lt;/script&gt;

&lt;!-- KEY FEATURE SPROUT SLIDE --&gt;
&lt;script type="text/javascript" src="sprout-slide/sprout-slide.js"&gt;&lt;/script&gt;
&lt;script type="text/javascript" src="sprout-slide/jquery.touchSwipe.js"&gt;&lt;/script&gt;
&lt;link type="text/css" rel="stylesheet" href="sprout-slide/sprout-slide.css"&gt;

&lt;!-- Initial It!! --&gt;
&lt;script type="text/javascript"&gt;
	$(document).ready(function() {
		// $(element).sproutSlide(options);
		$('#slide1').sproutSlide({
			'width': 900,
			...
		});
	});
&lt;/script&gt;

&lt;!-- Place HTML --&gt;
&lt;!-- YOU CAN MODIFY ID "slide1" --&gt;
&lt;div class="sprout-slide-container" id="slide1"&gt;
	&lt;div class="sprout-slide-wrapper"&gt;
		&lt;ul class="sprout-slide"&gt;
			&lt;li&gt;&lt;div&gt;...&lt;/div&gt;&lt;/li&gt;
			&lt;li&gt;&lt;div&gt;...&lt;/div&gt;&lt;/li&gt;
		&lt;/ul&gt;
	&lt;/div&gt;
	&lt;div class="sprout-arrow"&gt;
		&lt;div class="sprout-prev">&lt;/div&gt;
		&lt;div class="sprout-next">&lt;/div&gt;
	&lt;/div&gt;
	&lt;div class="sprout-dots"&gt;
	&lt;/div&gt;
&lt;/div&gt;
</pre>
		<hr>
		<h2 >Options</h2>
		<table class="table table-bordered plugin-opt-table">
			<thead>
				<tr>
					<th>Property</th>
					<th>Default</th>
					<th>Description</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>animateStyle</td>
					<td>"slide"</td>
					<td><p class="sumup">The style of slider</p>
						<span class="blue">"slide"</span> : The Slider will slide Left and Right to animate.<br/>
						<span class="blue">"fade"</span> : The Slider will fade in or fade out to animate.
					</td>
				</tr>
				<tr>
					<td>width</td>
					<td>"auto"</td>
					<td><p class="sumup">The width of slider content</p>
						<span class="blue">"auto"</span> : The Slider will fit container's width.<br/>
						<span class="blue">digits</span> : The Slider will set to specific width.
					</td>
				</tr>
				<tr>
					<td>slideNum</td>
					<td>4</td>
					<td><p class="sumup">The li number per page</p>
						This only works for animateStyle : "slide"
					</td>
				</tr>
				<tr>
					<td>duration</td>
					<td>700</td>
					<td>The Animation duration(ms).</td>
				</tr>
				<tr>
					<td>autovalue</td>
					<td>true</td>
					<td>Set to <span class="blue">true</span>, the slider will autoplay to next automatically.</td>
				</tr>
				<tr>
					<td>interval</td>
					<td>3000</td>
					<td>The time(ms) of autoplay speed.</td>
				</tr>
			</tbody>
			<thead>
				<tr>
					<th colspan="3">Layout</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>enableDot</td>
					<td>true</td>
					<td>Show the pagenation dots or not.</td>
				</tr>
				<tr>
					<td>enableArrow</td>
					<td>true</td>
					<td>Show the left and right arrow or not.</td>
				</tr>
				<tr>
					<td>enablePageNo</td>
					<td>false</td>
					<td>Show the page number in dots or not.</td>
				</tr>
				<tr>
					<td>enableLoop</td>
					<td>true</td>
					<td><p class="sumup">Make the Slider infinite scroll, if set to <span class="blue">false</span> : </p>
						The prev button will hide at page first.<br/>
						The next button will hide at page end.
					</td>
				</tr>
				<tr>
					<td>hoverShowArrow</td>
					<td>false</td>
					<td>Set to <span class="blue">true</span> will hide the arrow when initial the slide,<br/>but fadeIn when you hover in the slide.</td>
				</tr>
				<tr>
					<td>clickToNext</td>
					<td>false</td>
					<td>Set to <span class="blue">true</span> will trigger next slide when you click on the slider,<br/>and cursor will be set to pointer.</td>
				</tr>
			</tbody>
			<thead>
				<tr>
					<th colspan="3">Callback</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>onInit</td>
					<td>false</td>
					<td><p class="sumup">The callback function after slider initial</p>
						<ul>
							<li><span class="blue">slider</span> : will return the slider itself.</li>
							<li><span class="blue">current</span> : will return the current page number start form 0 ~ (total-1).</li>
							<li><span class="blue">total</span> : will return the slider page count.</li>
						</ul>
<pre class="prettyprint linenums">
onInit:function(slider,current,total){
	
}
</pre>
					</td>
				</tr>
				<tr>
					<td>beforeAnimate</td>
					<td>false</td>
					<td><p class="sumup">The callback function before each slider animation.</p>
						EX: before next action, before previous action, before dot action.
						<ul>
							<li><span class="blue">slider</span> : will return the slider itself.</li>
							<li><span class="blue">current</span> : will return the current page number start form 0 ~ (total-1).</li>
							<li><span class="blue">total</span> : will return the slider page count.</li>
						</ul>
<pre class="prettyprint linenums">
beforeAnimate:function(slider,current,total){
	
}
</pre>
					</td>
				</tr>
				<tr>
					<td>afterAnimate</td>
					<td>false</td>
					<td><p class="sumup">The callback function after each slider animation.</p>
						EX: after next action, after previous action, after dot action.
						<ul>
							<li><span class="blue">slider</span> : will return the slider itself.</li>
							<li><span class="blue">current</span> : will return the current page number start form 0 ~ (total-1).</li>
							<li><span class="blue">total</span> : will return the slider page count.</li>
						</ul>
<pre class="prettyprint linenums">
afterAnimate:function(slider,current,total){
	
}
</pre>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</body>

