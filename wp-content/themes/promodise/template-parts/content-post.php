<div class="blog-post">
	<img src="images/blog/blog-lg.jpg" alt="" class="img-fluid">
	<div class="mt-4 mb-3 d-flex">
		<div class="post-author mr-3">
			<i class="fa fa-user"></i>
			<span class="h6 text-uppercase"> <?php the_author(); ?> </span>
		</div>

		<div class="post-info">
			<i class="fa fa-calendar-check"></i>
			<span><?php the_time('j F Y'); ?></span>
		</div>
	</div>

	<a href="#" class="h4 "> <?php the_title(); ?> </a>
	<?php the_content(); ?>

		<h5 class="d-inline-block mr-3">Метки:</h5>
		<ul class="list-inline d-inline-block">
			<li class="list-inline-item"><a href="#">Agency</a>,</li>
			<li class="list-inline-item"><a href="#">Marketing</a>,</li>
			<li class="list-inline-item"><a href="#">Business</a></li>
		</ul>
	</div>
	
	<div class="my-4">
		<h5 class="d-inline-block mr-3">Поделитесь:</h5>
		<ul class="list-inline d-inline-block">
			<li class="list-inline-item"><a href="#"><i class="fab fa-facebook"></i></a></li>
			<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
			<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
			<li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
		</ul>
	</div>
</div>