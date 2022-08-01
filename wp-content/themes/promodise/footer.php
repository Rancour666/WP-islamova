	<!--  FOOTER AREA START  -->
	<section id="footer" class="section-padding">
		<div class="container">
			<div class="row">
				<div class="col-lg-5 col-sm-8 col-md-8">
				<?php if (!dynamic_sidebar('sidebar-footer-content')) {// Подключаем мини-сайд бар с текстом в футер
				dynamic_sidebar('sidebar-footer-content');
				}
				?>
				</div>
				<div class="col-lg-2 col-sm-4 col-md-4">
					<!-- Подключаем сюда ДИНАМИЧЕСКОЕ МЕНЮ футера (статическое можно удалить)  https://wp-kama.ru/function/wp_nav_menu — Функция wp_nav_menu()-->
				<?php 
					wp_nav_menu( [
						'theme_location'  => 'footer_left',//указали расположение
						//'menu'            => '', //не нужно
						'container'       => 'div', //запретили контайнер он нам не нужен
						'container_class' => 'footer-widget footer-link', // взяли класс от елемента оболочки МЕНЮ в футере <div class="footer-widget footer-link"></div> из HTML кода
						//'container_id'    => '', //не нужено
						'menu_class'      => '', //не нужено
						'menu_id'         => false,//не нужено
						'echo'            => true, // вьіводить ли меню? - да! вьіводить!
						//'fallback_cb'     => 'wp_page_menu',//не нужен
						//'before'          => '',// Перед и после меню, єти елементьі нам не нужньі
						//'after'           => '',// Перед и после меню, єти елементьі нам не нужньі
						//'link_before'     => '',// Перед и после ссьілок текстьі не нужньі нам не нужньі
						//'link_after'      => '',// Перед и после ссьілок текстьі не нужньі нам не нужньі
						'items_wrap'      => '<h4>Информация</h4><ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 2,// максимальная вложенность меню
						//'walker'          =>   тут не нужно пока  // клас меню которое переписьівается
					] );
				?>
				</div>

				<div class="col-lg-2 col-sm-6 col-md-6">
					<!-- Подключаем сюда ДИНАМИЧЕСКОЕ МЕНЮ футера (статическое можно удалить)  https://wp-kama.ru/function/wp_nav_menu — Функция wp_nav_menu()-->
					<?php 
						wp_nav_menu( [
						'theme_location'  => 'footer_right',//указали расположение
						//'menu'            => '', //не нужно
						'container'       => 'div', //запретили контайнер он нам не нужен
						'container_class' => 'footer-widget footer-link', // взяли класс от елемента оболочки МЕНЮ в футере <div class="footer-widget footer-link"></div> из HTML кода
						//'container_id'    => '', //не нужено
						'menu_class'      => '', //не нужено
						'menu_id'         => false,//не нужено
						'echo'            => true, // вьіводить ли меню? - да! вьіводить!
						//'fallback_cb'     => 'wp_page_menu',//не нужен
						//'before'          => '',// Перед и после меню, єти елементьі нам не нужньі
						//'after'           => '',// Перед и после меню, єти елементьі нам не нужньі
						//'link_before'     => '',// Перед и после ссьілок текстьі не нужньі нам не нужньі
						//'link_after'      => '',// Перед и после ссьілок текстьі не нужньі нам не нужньі
						'items_wrap'      => '<h4>Ссьілки</h4><ul id="%1$s" class="%2$s">%3$s</ul>',
						'depth'           => 2,// максимальная вложенность меню
						//'walker'          =>   тут не нужно пока  // клас меню которое переписьівается
						] );
					?>
				</div>
				<div class="col-lg-3 col-sm-6 col-md-6">
				<?php if (!dynamic_sidebar('sidebar-footer-contacts')) {// Подключаем мини-сайд бар с текстом в футер
				dynamic_sidebar('sidebar-footer-contacts');
				}
				?>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="footer-copy">© <?php echo date('Y '); echo get_bloginfo(' name')?> inc. Все права защищены.</div>
				</div>
			</div>
		</div>
	</section>
	<!--  FOOTER AREA END  -->  


	<?php wp_footer(); ?>
</body>

</html>