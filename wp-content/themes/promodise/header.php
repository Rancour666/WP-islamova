<!DOCTYPE html>
<html lang="ru">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<meta name="description" content="seo & digital marketing" />
	<meta name="keywords" content="marketing,digital marketing,creative, agency, startup,promodise,onepage, clean, modern,seo,business, company" />

	<?php wp_head(); ?>
</head>

<body data-spy="scroll" data-target=".fixed-top">
	<nav class="navbar navbar-expand-lg fixed-top trans-navigation">
		<div class="container">
				<!-- Убираем наш статический логотип <img src="images/logo.png" alt="" class="img-fluid b-logo" /> и проверяем есть ли у нас кастомньій логотип -->
				<?php 
				if( has_custom_logo()){
					echo get_custom_logo();
				}
				?>
				<!-- Теперь сюда может вьіводится логотип из АДМИНКИ WordPress -->


			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon">
					<i class="fa fa-bars"></i>
				</span>
			</button>

			<div class="collapse navbar-collapse justify-content-end" id="mainNav">
				
				<!-- Подключаем сюда ДИНАМИЧЕСКОЕ МЕНЮ хедера (статическое можно удалить)  https://wp-kama.ru/function/wp_nav_menu — Функция wp_nav_menu()-->
				<?php 
					wp_nav_menu( [
						'theme_location'  => 'header',//указали расположение
						//'menu'            => '', //не нужно
						'container'       => false, //запретили контайнер он нам не нужен
						//'container_class' => '', //не нужено
						//'container_id'    => '', //не нужено
						'menu_class'      => 'navbar-nav', // взяли класс от елемента оболочки меню UL из HTML кода
						'menu_id'         => false,//не нужено
						'echo'            => true, // вьіводить ли меню? - да! вьіводить!
						//'fallback_cb'     => 'wp_page_menu',//не нужен
						//'before'          => '',// Перед и после меню, єти елементьі нам не нужньі
						//'after'           => '',// Перед и после меню, єти елементьі нам не нужньі
						//'link_before'     => '',// Перед и после ссьілок текстьі не нужньі нам не нужньі
						//'link_after'      => '',// Перед и после ссьілок текстьі не нужньі нам не нужньі
						'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 2,// максимальная вложенность меню
						'walker'          => new bootstrap_4_walker_nav_menu(),// клас меню которое переписьівается
					] );
				?>
				<!-- Подключаем сюда ДИНАМИЧЕСКОЕ МЕНЮ хедера (статическое можно удалить)   https://wp-kama.ru/function/wp_nav_menu — Функция wp_nav_menu() -->
			</div>
		</div>
	</nav>
	<!--MAIN HEADER AREA END -->