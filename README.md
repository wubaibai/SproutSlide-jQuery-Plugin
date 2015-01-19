SproutSlide-jQuery-Plugin
=========================

SproutSlide is a simple jQuery plugin, it is very easy to customize into yout website.

### Version
* v2.1.0
  * [Download SproutSlide-jQuery-Plugin](https://github.com/wubaibai/SproutSlide-jQuery-Plugin/archive/master.zip)
  * [View the Sample](http://lab.25sprout.com/SproutSlide-jQuery-Plugin/).

### Changelog

* v2.1.1 - Jan 19, 2015
  * FIX enableLoop true, let it will always show arrows.
  * ADD Vertical website Scrolling on slider.
* v2.1.0 - Dec 22, 2014
  * ADD more function and fade style.
  * ADD Callback after and before animation.
* v2.0.0 - Jul 23, 2014
  * Fixed only 2 page wired animation.
* v2.0.0 - May 31, 2014
  * support Mobile Swipe Gesture.
* v2.0.0 - Dec 29, 2013
  * NEW Version Sprout Slide Release. With Infinite Scroll Feature!!!


## In This Documentation

1. [Getting Started](#getting-started)
2. [Options & Settings](#options-and-settings)


### Getting Started

#### 1. Include SproutSlider on your site.

```html
<!-- Don't forgot jquery, if your site already have it, it's no need to include again.-->
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
 
<!-- KEY FEATURE SPROUT SLIDE -->
<script type="text/javascript" src="sprout-slide/sprout-slide.js"></script>
<script type="text/javascript" src="sprout-slide/jquery.touchSwipe.js"></script>
<link type="text/css" rel="stylesheet" href="sprout-slide/sprout-slide.css">
```

SproutSlider included [`touchswipe.js`](https://github.com/mattbryson/TouchSwipe-Jquery-Plugin) to detect mobile gesture.

#### 2. Add the markup to your HTML.

```html
<!-- YOU CAN MODIFY ID "slide1" -->
<div class="sprout-slide-container" id="slide1">
	<div class="sprout-slide-wrapper">
		<ul class="sprout-slide">
			<li><div>...</div></li>
			<li><div>...</div></li>
		</ul>
	</div>
	<div class="sprout-arrow">
		<div class="sprout-prev"></div>
		<div class="sprout-next"></div>
	</div>
	<div class="sprout-dots">
	</div>
</div>
```

`[sprout-slide-container]` 's `id` is changeable, you also can use class instead.

`[sprout-dots]` will dynamically add navigation elements and slide position content to them.


#### 3. Initialize Slider.

```html
<script type="text/javascript">
	$(document).ready(function() {
		$('#slide1').sproutSlide(options);
	});
</script>
```


### Options and Settings

Please check document at [SproutSlide-jQuery-Plugin](http://lab.25sprout.com/SproutSlide-jQuery-Plugin/).


