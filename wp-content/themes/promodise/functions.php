<?php

//Авторизуем нашу функцию promodise_setup, она для подключения кастомного контента 
if (!function_exists('promodise_setup')) { //                Если наша setup функция еще  не существует,то
	function promodise_setup()
	{ //                          Создаем такую функцию
		add_theme_support('custom-logo', [ //                  Добавляем нашей теме поддержку кастомизации ЛОГОТИПА САЙТА, и задаем параметрьі кастомизации [ДИНАМИЧЕСКИЙ ЛОГОТИП]
			'height'      => 50,
			'width'       => 150,
			'flex-width'  => false,
			'flex-height' => false,
			'header-text' => '',
			'unlink-homepage-logo' => false,
		]);
		add_theme_support('title-tag'); //  Добавляем нашей теме поддержку кастомизации ЗАГОЛОВКА САЙТА, и задаем параметрьі кастомизации [ДИНАМИЧЕСКИЙ ЗАГОЛОВОК]     https://wp-kama.ru/function/add_theme_support#title-tag — Добавляем тег <title>

		//включаем миниатюрьі для постов
		add_theme_support('post-thumbnails');
		//задаем картинкам размер
		set_post_thumbnail_size(730, 390, true);
	}
	add_action('after_setup_theme', 'promodise_setup'); //запуск привязьваем на хук Wordpressa 'after_setup_theme'
}


/*ПОДКЛЮЧЕНИЕ СТИЛЕЙ И СКРИПТОВ*/


// правильный способ подключить стили и скрипты
add_action('wp_enqueue_scripts', 'promodise_scripts');
// add_action('wp_print_styles', 'theme_name_scripts'); // можно использовать этот хук он более поздний
function promodise_scripts()
{
	wp_enqueue_style('main', get_stylesheet_uri());
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/plugins/bootstrap/css/bootstrap.css', array('main'));
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/plugins/fontawesome/css/all.css', array('main'));
	wp_enqueue_style('animate', get_template_directory_uri() . '/plugins/animate-css/animate.css', array('main'));
	wp_enqueue_style('aicofont', get_template_directory_uri() . '/plugins/icofont/icofont.css', array('main'));
	wp_enqueue_style('promodise', get_template_directory_uri() . '/css/style.css', array('bootstrap'));

	// Main jQuery
	wp_deregister_script('jquery');
	wp_register_script('jquery', get_template_directory_uri() . '/plugins/jquery/jquery.min.js', array(), '1.0.0', true);
	wp_enqueue_script('jquery');
	// Bootstrap 4.3.1
	wp_enqueue_script('bootstrap-popper', get_template_directory_uri() . '/plugins/bootstrap/js/popper.min.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('bootstrap', get_template_directory_uri() . '/plugins/bootstrap/js/bootstrap.min.js', array('bootstrap-popper'), '1.0.0', true);
	// Woow animtaion
	wp_enqueue_script('animation-wow', get_template_directory_uri() . '/plugins/counterup/wow.min.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('animation-easing', get_template_directory_uri() . '/plugins/counterup/jquery.easing.1.3.js', array('jquery'), '1.0.0', true);
	// Counterup
	wp_enqueue_script('counterup-waypoints', get_template_directory_uri() . '/plugins/counterup/jquery.waypoints.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('counterup-counterup', get_template_directory_uri() . '/plugins/counterup/jquery.counterup.min.js', array('jquery'), '1.0.0', true);
	// Google Map
	wp_enqueue_script('google-map', get_template_directory_uri() . '/plugins/google-map/gmap3.min.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('map-key', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyAkeLMlsiwzp6b3Gnaxd86lvakimwGA6UA&callback=initMap', array('jquery'), '1.0.0', true);
	// Contact Form
	wp_enqueue_script('contact', get_template_directory_uri() . '/plugins/form/contact.js', array('jquery'), '1.0.0', true);
	wp_enqueue_script('custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), '1.0.0', true);
}





//Ренгистрируем сразу несколько облостей для наших меню
function promodise_menus()
{
	//собираем несколько областей меню
	$locations = array(
		'header'  => __('Header Menu', 'promodise'),
		'footer_left'   => __('Footer Left Menu', 'promodise'),
		'footer_right'   => __('Footer Right Menu', 'promodise'),
	);
	//Регистрируем областей меню которьіе лежат в переменной (в массиве) $locations       https://wp-kama.ru/function/register_nav_menus — Функция register_nav_menus()
	register_nav_menus($locations); 
}

add_action( 'init', 'promodise_menus' );

/*

//Цепляем хук-собьітие, т.е.епри вьіполнении Вордпрессом init он вьіполнит и нашу ф-цию promodise_menus с определением и регистрацией областей менюх



// добавим класс nav-item ко всем пунктам меню ( сейчас мьі подцепимся хуком к какому то собьітию в WP и переделаем те классьі пуктов меню, которьіе использует и вьідает Вордпресс для елементов меню)
add_filter('nav_menu_css_class', 'custom_nav_menu_css_class', 10, 1); //на хук WP - 'nav_menu_css_class', вешаем свою функцию заменьі классов 'custom_nav_menu_css_class'.
//получаем список всех классов пунктов меню
function custom_nav_menu_css_class($classes){
	//добавляем к списку классов свой класс nav-item
	$classes[] = 'nav-item';
	//возвращаем список классов уже с нашим классом
	return $classes;// ОБЯЗАТЕЛЬНО ДОЛЖЕН БЬІТЬ ВОЗВРАТ, возвращаем классьі
}


//повесим на все ссьілки класс nav-link
add_filter('nav_menu_link_attributes', 'custom_nav_menu_link_attributes', 10, 1);

function custom_nav_menu_link_attributes($atts){
	//добавляем к ссьілкам свой класс nav-link
	$atts['class'] = 'nav-link';
	return $atts;// ОБЯЗАТЕЛЬНО ДОЛЖЕН БЬІТЬ ВОЗВРАТ, возвращаем классьі
}

*/



class bootstrap_4_walker_nav_menu extends Walker_Nav_menu
{

	function start_lvl(&$output, $depth = 0, $args = null)
	{ // ul
		$indent = str_repeat("\t", $depth); // indents the outputted HTML
		$submenu = ($depth > 0) ? ' sub-menu' : '';
		$output .= "\n$indent<ul class=\"dropdown-menu$submenu depth_$depth\">\n";
	}

	function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
	{ // li a span

		$indent = ($depth) ? str_repeat("\t", $depth) : '';

		$li_attributes = '';
		$class_names = $value = '';

		$classes = empty($item->classes) ? array() : (array) $item->classes;

		$classes[] = ($args->walker->has_children) ? 'dropdown' : '';
		$classes[] = ($item->current || $item->current_item_anchestor) ? 'active' : '';
		$classes[] = 'nav-item';
		$classes[] = 'nav-item-' . $item->ID;
		if ($depth && $args->walker->has_children) {
			$classes[] = 'dropdown-menu';
		}

		$class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
		$class_names = ' class="' . esc_attr($class_names) . '"';

		$id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
		$id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

		$output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

		$attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
		$attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
		$attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
		$attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

		$attributes .= ($args->walker->has_children) ? ' class="nav-link dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="nav-link"';

		$item_output = $args->before;
		$item_output .= ($depth > 0) ? '<a class="dropdown-item"' . $attributes . '>' : '<a' . $attributes . '>';
		$item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
	}
}




## отключаем создание миниатюр файлов для указанных размеров
add_filter( 'intermediate_image_sizes', 'delete_intermediate_image_sizes' );
function delete_intermediate_image_sizes( $sizes ){
	// размеры которые нужно удалить
	return array_diff( $sizes, [
		'medium_large',
		'large',
		'1536x1536',
		'2048x2048',
	] );
}



//ВИДЖЕТЬІ САЙДБАРЬІ

add_action('widgets_init','promodise_widgets_init');// вешаем функцию инициализации наших виджетов и сайдбара на хук инициализации виджетов WP
function promodise_widgets_init(){
	register_sidebar(array(
		'name'          => esc_html__('Сайдбар блога', 'promodise'),//esc_html__ и аргумент 'promodise' добавленьі для последующего перевода на другой язьік,а 'Sidebar %d' можно поменять на 'Сайдбар блога'
		'id'            => "sidebar-blog",
		'before_widget' => '<section id="%1$s" class="sidebar-widget %2$s">',// тут поменяли теги li на section чтоб не списком шли виджетьі а отдельньіми секциями, и поставили имя класса sidebar-widget из верстки
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title mb-3">',
		'after_title'   => '</h5>'
	));
	register_sidebar(array(
		'name'          => esc_html__('Сайдбар с текстовьіми контентом в футере', 'promodise'),//esc_html__ и аргумент 'promodise' добавленьі для последующего перевода на другой язьік,а 'Sidebar %d' можно поменять на 'Сайдбар блога'
		'id'            => "sidebar-footer-content",
		'before_widget' => '<div id="%1$s" class="footer-widget footer-link %2$s">',// тут поменяли теги  на div и поставили имя класса footer-widget footer-link из верстки
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	));
	register_sidebar(array(
		'name'          => esc_html__('Сайдбар с контактами в футере', 'promodise'),//esc_html__ и аргумент 'promodise' добавленьі для последующего перевода на другой язьік,а 'Sidebar %d' можно поменять на 'Сайдбар блога'
		'id'            => "sidebar-footer-contacts",
		'before_widget' => '<div id="%1$s" class="footer-widget footer-text %2$s">',// тут поменяли теги  на div и поставили имя класса footer-widget footer-link из верстки
		'after_widget'  => '</div>',
		'before_title'  => '<h4>',
		'after_title'   => '</h4>'
	));
}












/**
 * Добавление нового виджета Download_Widget.
 */
class Download_Widget extends WP_Widget {

	// Регистрация виджета используя основной класс
	function __construct() {
		// вызов конструктора выглядит так:
		// __construct( $id_base, $name, $widget_options = array(), $control_options = array() )
		parent::__construct(
			'download_widget', // ID виджета, если не указать (оставить ''), то ID будет равен названию класса в нижнем регистре: download_widget
			'Скачать файлы',
			array( 'description' => 'Прикрепите ссьілки на полезньіе файльі', 'classname' => 'download', )
		);

		// скрипты/стили виджета, только если он активен
		if ( is_active_widget( false, false, $this->id_base ) || is_customize_preview() ) {
			add_action('wp_enqueue_scripts', array( $this, 'add_download_widget_scripts' ));
			add_action('wp_head', array( $this, 'add_download_widget_style' ) );
		}
	}



	/**
	 * Вывод виджета во Фронт-энде
	 *
	 * @param array $args     аргументы виджета.
	 * @param array $instance сохраненные данные из настроек
	 */
	function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );

		$file_name = $instance['file_name'];
		$file = $instance['file'];

		$file_name_2 = $instance['file_name_2'];
		$file_2 = $instance['file_2'];
		

		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		echo '<a href="' . $file . '"><i class="fa fa-file-pdf"></i>' . $file_name . '</a>' ;
		echo '<a href="' . $file_2 . '"><i class="fa fa-file-pdf"></i>' . $file_name_2 . '</a>' ;
		echo $args['after_widget'];
	}

	/**
	 * Админ-часть виджета
	 *
	 * @param array $instance сохраненные данные из настроек
	 */
	function form( $instance ) {
		$title = @ $instance['title'] ?: 'Полезньіе файльі';

		$file_name = @ $instance['file_name'] ?: 'Имя первого файла';
		$file = @ $instance['file'] ?: 'URL первого файла';

		$file_name_2 = @ $instance['file_name_2'] ?: 'Имя второго файла';
		$file_2 = @ $instance['file_2'] ?: 'URL второго файла';
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'file_name' ); ?>"><?php _e( 'Имя первого файла:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'file_name' ); ?>" name="<?php echo $this->get_field_name( 'file_name' ); ?>" type="text" value="<?php echo esc_attr( $file_name ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'file' ); ?>"><?php _e( 'Ссьілка на первьій файл:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'file' ); ?>" name="<?php echo $this->get_field_name( 'file' ); ?>" type="text" value="<?php echo esc_attr( $file ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'file_name_2' ); ?>"><?php _e( 'Имя второго файла:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'file_name_2' ); ?>" name="<?php echo $this->get_field_name( 'file_name_2' ); ?>" type="text" value="<?php echo esc_attr( $file_name_2 ); ?>">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'file_2' ); ?>"><?php _e( 'Ссьілка на второй файл:' ); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'file_2' ); ?>" name="<?php echo $this->get_field_name( 'file_2' ); ?>" type="text" value="<?php echo esc_attr( $file_2 ); ?>">
		</p>
		<?php
	}

	/**
	 * Сохранение настроек виджета. Здесь данные должны быть очищены и возвращены для сохранения их в базу данных.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance новые настройки
	 * @param array $old_instance предыдущие настройки
	 *
	 * @return array данные которые будут сохранены
	 */
	function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		
		$instance['file_name'] = ( ! empty( $new_instance['file_name'] ) ) ? strip_tags( $new_instance['file_name'] ) : '';
		$instance['file'] = ( ! empty( $new_instance['file'] ) ) ? strip_tags( $new_instance['file'] ) : '';

		$instance['file_name_2'] = ( ! empty( $new_instance['file_name_2'] ) ) ? strip_tags( $new_instance['file_name_2'] ) : '';
		$instance['file_2'] = ( ! empty( $new_instance['file_2'] ) ) ? strip_tags( $new_instance['file_2'] ) : '';

		return $instance;
	}

	// скрипт виджета
	function add_download_widget_scripts() {
		// фильтр чтобы можно было отключить скрипты
		if( ! apply_filters( 'show_download_widget_script', true, $this->id_base ) )
			return;

		$theme_url = get_template_directory_uri();

		//wp_enqueue_script('download_widget_script', $theme_url .'/js/download_widget_script.js' );
	}

	// стили виджета
	function add_download_widget_style() {
		// фильтр чтобы можно было отключить стили
		if( ! apply_filters( 'show_download_widget_style', true, $this->id_base ) )
			return;
		?>
		<style type="text/css">
			.download_widget a{ display:inline; }
		</style>
		<?php
	}

}
// конец класса Download_Widget

// регистрация Download_Widget в WordPress
function register_download_widget() {
	register_widget( 'Download_Widget' );
}
add_action( 'widgets_init', 'register_download_widget' );