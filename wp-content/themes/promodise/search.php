<?php get_header(); ?>
<!--MAIN BANNER AREA START -->
<div class="page-banner-area page-contact" id="page-banner">
	<div class="overlay dark-overlay"></div>
	<div class="container">
		<div class="row">
			<div class="col-lg-6 col-sm-12 col-md-12">
				<div class="banner-content content-padding">
					<h1 class="text-white">
						<?php
						/* translators: %s: search query. */
						printf( esc_html__('Результатьі поиска по фразе: %s', 'promodise'), '<span>' . get_search_query() . '</span>');
						?>
					</h1>
				</div>
			</div>
		</div>
	</div>
</div>
<!--MAIN HEADER AREA END -->

<section class="section blog-wrap ">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="row">
					<?php
					$cnt = 0; //обьявляем счетчик постов
					if (have_posts()) : while (have_posts()) : the_post();//проверяем наличие постов
						$cnt++;// увеличиваем счетчик постов на 1
						switch($cnt){
						case '3': ?>
							<div class="col-lg-12"><!--Если пост 3-тий по счету то вьіводим 12-ти колоночньіе ячейки поста-->
								<div class="blog-post">
									<?php
									//должно находится внутри цикла
									if (has_post_thumbnail()) {
										the_post_thumbnail('post-thumbnail', array('class' => "img-fluid w-100"));
									} else {//если миниатюрьі нет то какую-то пустую или дефолтную
										echo '<img class="img-fluid w-100" src="' . get_template_directory_uri() . '/images/blog/blog-lg.jpg" />';
									}
									?>
									<div class="mt-4 mb-3 d-flex">
										<div class="post-author mr-3">
											<i class="fa fa-user"></i>
											<span class="h6 text-uppercase"><?php the_author(); ?></span>
										</div>
										<div class="post-info">
											<i class="fa fa-calendar-check"></i>
											<span><?php the_time('j F Y'); ?></span>
										</div>
									</div>
									<a href="<?php echo get_the_permalink(); ?>" class="h4 "><?php the_title(); ?></a>
									<p class="mt-3"><?php the_excerpt(); ?></p>
									<a href="<?php echo get_the_permalink(); ?>" class="read-more">Читать статью <i class="fa fa-angle-right"></i></a>
								</div>
							</div>
							<?php
							break;
							default: //По дефолту вьіводим 6-ти колоночньіе ячейки блога
							?>
							<!-- Вывод постов, функции цикла: the_title() и т.д. -->
							<div class="col-lg-6">
								<div class="blog-post">
									<?php
									//должно находится внутри цикла
									if (has_post_thumbnail()) {
										the_post_thumbnail('post-thumbnail', array('class' => "img-fluid w-100"));
									} else {//если миниатюрьі нет то какую-то пустую или дефолтную
										echo '<img class="img-fluid w-100" src="' . get_template_directory_uri() . '/images/blog/blog-lg.jpg" />';
									}
									?>
									<div class="mt-4 mb-3 d-flex">
										<div class="post-author mr-3">
											<i class="fa fa-user"></i>
											<span class="h6 text-uppercase"><?php the_author(); ?></span>
										</div>
										<div class="post-info">
											<i class="fa fa-calendar-check"></i>
											<span><?php the_time('j F Y'); ?></span>
										</div>
									</div>
									<a href="<?php echo get_the_permalink(); ?>" class="h4 "><?php the_title(); ?></a>
									<p class="mt-3"><?php the_excerpt(); ?></p>
									<a href="<?php echo get_the_permalink(); ?>" class="read-more">Читать статью <i class="fa fa-angle-right"></i></a>
								</div>
							</div>
							<?php break; } endwhile; else : ?>
						Записей нет.
					<?php endif; ?>
				</div>
				<?php the_posts_pagination($args = array(
					'show_all'     => false, // показаны все страницы участвующие в пагинации
					'end_size'     => 1,     // количество страниц на концах
					'mid_size'     => 1,     // количество страниц вокруг текущей
					'prev_next'    => true,  // выводить ли боковые ссылки "предыдущая/следующая страница".
					'prev_text'    => __('<span class="p-3 border"><< К предьідущим постам</span>'),
					'next_text'    => __('<span class="p-3 border">К следующим постам >></span>'),
					'add_args'     => false, // Массив аргументов (переменных запроса), которые нужно добавить к ссылкам.
					'add_fragment' => '',     // Текст который добавиться ко всем ссылкам.
					'screen_reader_text' => __( 'Posts navigation' ),
					'class'        => 'pagination', // CSS класс, добавлено в 5.5.0.
					'before_page_number' => '<span class="p-3 border">',
					'after_page_number' => '</span">',
				)); ?>
			</div>
			
			<div class="col-lg-4">
				<div class="row">
					<div class="col-lg-12">
						<?php get_search_form(); ?>
						<?php if( ! dynamic_sidebar('sidebar-blog') ) : dynamic_sidebar('sidebar-blog'); endif; ?>
					</div>

					<!--<div class="col-lg-12">
						<div class="sidebar-widget about-bar">
							<h5 class="mb-3">О нас</h5>
							<p>Мы — маркетинговое агентство полного цикла, которое оказывает диджитал услуги стартапам и крупным компаниям</p>
						</div>
					</div>

					<div class="col-lg-12">
						<div class="sidebar-widget category">
							<h5 class="mb-3">Рубрики</h5>
							<ul class="list-styled">
								<li>Маркетинг</li>
								<li>Диджитал</li>
								<li>SEO</li>
								<li>Веб-дизайн</li>
								<li>Разработка</li>
								<li>Видео</li>
								<li>Подкаст</li>
							</ul>
						</div>
					</div>

					<div class="col-lg-12">
						<div class="sidebar-widget tag">
							<a href="#">web</a>
							<a href="#">development</a>
							<a href="#">seo</a>
							<a href="#">marketing</a>
							<a href="#">branding</a>
							<a href="#">web deisgn</a>
							<a href="#">Tutorial</a>
							<a href="#">Tips</a>
							<a href="#">Design trend</a>
						</div>
					</div>
					<div class="col-lg-12">
						<div class="sidebar-widget download">
							<h5 class="mb-4">Полезные файлы</h5>
							<a href="#"> <i class="fa fa-file-pdf"></i>Презентация Promodise</a>
							<a href="#"> <i class="fa fa-file-pdf"></i>10 источников бесплатного SEO</a>
						</div>
					</div> -->

				</div>
			</div>
		</div>
	</div>
	</div>
</section>
<?php get_footer(); ?>