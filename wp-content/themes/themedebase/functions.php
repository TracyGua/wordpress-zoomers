<?php
	/*-----------------------------------------------------------------------------------*/
	/* Ce fichier est présent sur chaque page
	/* Vous pouvez y ajouter des fonctions au besoin
	/*-----------------------------------------------------------------------------------*/

/* --------------------------------
Ajoute les vignettes dans les posts de type Article */
add_theme_support( 'post-thumbnails' );


/* --------------------------------
Déclare le menu principal */
register_nav_menus( 
	array(
		/* 
			1. 'main-menu' = Nom dans le code
			2. 'Menu principal' = Nom dans l'admin
			3. 'Menu principal du site' = Description dans l'admin */
		'main-menu' => __( 'Menu principal', 'Menu principal du site' ), 
		/* Dupliquer cette ligne si vous désirez déclarer d'autres menus */
	)
);


/* --------------------------------
Function déclarant la barre latérale principale */
function add_sidebars() {
	register_sidebar(array(	
		/* 
			1. 'main-sidebar' = Nom dans le code
			2. 'Barre laterale principale' = Nom dans l'admin
			3. 'Barre latérale principale du site' = Description dans l'admin */
		'main-sidebar' => __( 'Barre laterale principale', 'Barre latérale principale du site' ), 
		/* Dupliquer cette ligne si vous désirez déclarer d'autres sidebars */
	));
} 
/* Appel la fonction déclarant la barre latérale au moment de l'init des widgets */
add_action('widgets_init', 'add_sidebars');


/* -------------------------------- 
Function ajoutant les styles et scripts */
function add_style_and_js()  { 
	/* Ajoute le fichier style.css du theme WordPress actif 
	  1. 'default' = ID de référence à donner au à la feuille de style
		2. get_template_directory_uri() . '/style.css' = Chemin où ce trouve le fichier CSS en question
	*/
	wp_enqueue_style('default', get_template_directory_uri() . '/style.css');

	/* Pour ajoutez une feuille de style supplémentaire, copier la ligne précédente et ajuster le chemin du fichier de façon relative vers votre nouveau fichier CSS */

	/* Ajoute le fichier main.js du theme WordPress actif 
	   1. 'default' = ID de référence à donner au script
		 2. get_template_directory_uri() . '/main.js' = Chemin où ce trouve le fichier JS en question
		 3. array() = Liste des dépendances de ce script (généralement vide)
		 4. false = Si un no de version doit être ajouté (généralement à false)
		 5. true = Est-ce que le script doit-être ajouté à la fin du body. Si mis à false le script est ajouter dans le head à la place
	*/
	wp_enqueue_script('default', get_template_directory_uri() . '/main.js', array(), false, true);

	/* Pour ajoutez un script, copier la ligne précédente et ajuster le chemin de façon relative vers votre nouveau fichier JS */
}

/* Appel de la fonction ajoutant les styles et scripts */
add_action('wp_enqueue_scripts', 'add_style_and_js'); 

function theme_scripts() {
    wp_enqueue_style( 'bootstrapcss', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_style( 'stylesheet', get_stylesheet_uri() );
    wp_enqueue_script(
            'bootstrapjs',
            get_stylesheet_directory_uri() . '/js/bootstrap.js',
            array(),
            '3.3.5', // Bootstrap version number
            true // Place before </body>
    );
}
add_action( 'wp_enqueue_scripts', 'theme_scripts' );

add_theme_support('menus');


function add_menu_link_class( $atts, $item, $args ) {
	if (property_exists($args, 'link_class')) {
	  $atts['class'] = $args->link_class;
	}
	return $atts;
  }
  add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

  function add_menu_list_item_class($classes, $item, $args) {
	if (property_exists($args, 'list_item_class')) {
		$classes[] = $args->list_item_class;
	}
	return $classes;
  }
  add_filter('nav_menu_css_class', 'add_menu_list_item_class', 1, 3);