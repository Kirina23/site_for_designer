<?php

add_action('wp_enqueue_scripts', 'style_theme');
add_action('wp_enqueue_scripts', 'script_theme');


function style_theme()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css');
    wp_enqueue_style('main-1', get_template_directory_uri() . '/assets/css/main.be91b8da15e82f9cdb17.css');
    wp_enqueue_style('main-2', get_template_directory_uri() . '/assets/css/713.be91b8da15e82f9cdb17.css');
	wp_enqueue_style('main-3', get_template_directory_uri() . '/assets/css/menu.css');
}

function script_theme()
{
    wp_enqueue_script('main-script-1', get_template_directory_uri() . '/assets/js/main.be91b8da15e82f9cdb17.js', array('jquery'),'1.0', true);
    wp_enqueue_script('main-script-2', get_template_directory_uri() . '/assets/js/713.be91b8da15e82f9cdb17.js', array('jquery'),'1.0', true);
	wp_enqueue_script('main-script-3', get_template_directory_uri() . '/assets/js/script.js', array('jquery'),'1.0', true);

	}


function designerti_theme_init() {
// Регистраиуя локаций меню
	register_nav_menus(array(
		'header_nav' => 'Header Navigation',
		'footer_nav' => 'Foter Navigation' )
	);
}
add_action('after_setup_theme', 'designerti_theme_init', 0);



function designerti_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on irina, use a find and replace
		* to change 'irina' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'designerti', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );
	}





//Добавляет галочку в редактор "не показывать пост на главной"
// если для главной не установлена отдельная страница
// или она есть и есть страница блога, тогда функционал переходит на страницу блога...
if( ! get_option('page_on_front') || get_option('page_for_posts') ){

	// чекбокс для исключения
	add_action('post_submitbox_misc_actions', 'epfp_fields_box_func');

	// включаем обновление полей при сохранении
	add_action('save_post', 'epfp_fields_update', 0);

	// Исключает вывод постов из списка "помеченных"
	add_action('pre_get_posts', 'epfp_exclude_posts');

	## Выводит виджет с настройками при публикации/редактировании поста
	function epfp_fields_box_func( $post ){
		if( $post->post_type !== 'post' ) return;

		$exclude = get_post_meta( $post->ID, 'epfp_exclude_post', 1);

		echo '
		<div class="misc-pub-section">
			<input type="hidden" name="epfp[epfp_exclude_post]" value="" />
			<label><input type="checkbox" name="epfp[epfp_exclude_post]" value="1" '. checked( 1, $exclude, 0 ) .' /> не показывать пост на главной</label>
		</div>
		';
	 }

	## Сохранение данных виджет
	function epfp_fields_update( $post_id ){
		if( !isset($_POST['epfp']) || ! is_admin() || ! wp_verify_nonce( $_POST['_wpnonce'], 'update-post_'. $post_id ) )
			return false; // базовая проверка не пройдена

		if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE )
			return false; // автосохранение

		if ( ! current_user_can('edit_post', $post_id) )
			return false; // юзер не имеет право редактировать запись

		// Все ОК! Теперь, нужно сохранить/удалить данные
		$epfp = array_map('trim', $_POST['epfp']);

		foreach( $epfp as $key => $value ){
			if( empty($value) ){
				delete_post_meta( $post_id, $key ); // удаляем поле если значение пустое
				continue;
			}

			update_post_meta( $post_id, $key, $value ); // add_post_meta() работает автоматически
		}

		return $post_id;
	}

	## Исключает вывод постов из списка "помеченных"
	function epfp_exclude_posts( $query ) {
		if( $query->is_page )                                return; // когда для главной установлена страница...
		if( ! $query->is_main_query() )                      return; // не главный запрос
		if( ! $query->is_home && ! $query->is_front_page() ) return; // не страницы постов

		$query->set(
			'meta_query', array([ 'key'=>'epfp_exclude_post', 'compare'=>'NOT EXISTS' ])
		);

	}

}

add_action( 'wp_enqueue_scripts', 'enqueue_font_awesome' );
function enqueue_font_awesome() {
 wp_enqueue_style( 'font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css' );
}


