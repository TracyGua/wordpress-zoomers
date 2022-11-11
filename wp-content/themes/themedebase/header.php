<?php
	/*-----------------------------------------------------------------------------------*/
	/* Affiche l'entête (Header) sur toutes vos pages
	/*-----------------------------------------------------------------------------------*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title>
	<?php bloginfo('Zoomhit Skins'); // Affiche le nom du blog ?> | 
	<?php is_front_page() ? bloginfo('description') : wp_title(''); // si nous sommes sur la page d'accueil, affichez la description à partir des paramètres du site - sinon, affichez le titre du post ou de la page. ?>
</title>
<?php 
	// Tous les .css et .js sont chargés dans le fichier functions.php
?>
<!--Bootstrap CSS-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!--Google fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&family=Ruda:wght@600&display=swap" rel="stylesheet">

<?php wp_head(); 
/* Cette fonction permet à WordPress et aux extensions d'instancier des fichier CSS et js dans le <head>
	 Supprimer cette fonction briserait vos extensions et diverses fonctionnalités WordPress. 
	 Vous pouvez la déplacer si désiré, mais garder là. */
?>
</head>

<body 
	<?php body_class(); 
	/* Applique une classe contextuel sur le body
		 ex: sur la page d'accueil vous aurez la classe "home"
		 sur un article, "single postid-{ID}"
		 etc. */
	?>
>

<header class="row">
        <nav class="navbar navbar-expand-lg navigation col-6">
            <div class="container">
                <!--Logo-->
                <div class="logo">
                    <a class="navbar-brand" href="index.html"> <img src="<?php echo get_template_directory_uri().'/assets/icones/logo.png'; ?>"/></a>
                </div>

                <!-- Hamburger button -->
                <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Affichage/masquage de la navigation">
                    <span class="navbar-toggler-icon"><img src="medias/icones/burger_icon.png" alt=""></span>
                </button>

                <!--Navigation-->
                <div id="mainNav" class="collapse navbar-collapse">
                    <ul class="navbar-nav menu-header">
                        <li class="nav-item menu console">
                            <a href="autres_pages/console.html" class="nav-link">Console</a>
                        </li>
                        <li class="nav-item menu apple">
                            <a href="autres_pages/apple.html" class="nav-link">Apple</a>
                        </li>
                        <li class="nav-item menu creation">
                            <a href="autres_pages/creation.html" class="nav-link">Creation</a>
                        </li>
                        <li class="nav-item menu nouvelles">
                            <a href="autres_pages/nouvelles.html" class="nav-link">Nouvelles</a>
                        </li>
                        <li class="nav-item menu contact">
                            <a href="autres_pages/contact.html" class="nav-link">Contact</a>
                        </li>
                    </ul> 
                    <div>
                        <a href="autres_pages/console.html">
                        <img src="assets/icones/panier.png" alt=""></a>

                    </div>
                    <div>
                        <img src="medias/icones/langues.png" alt="">
                    </div>
                </div> 
            </div>
        </nav>
    </header>

	
	<header class="row">


	<nav class="navbar navbar-expand-lg navigation col-6">
	<div class="container">
		 <!--Logo-->
	<div class='logo' >
		<a class="navbar-brand"  href="<?php echo esc_url( home_url( '/' ) ); // Lien vers la page d'accueil ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); // Title it with the blog name ?>" rel="home">
		<img src="<?php echo get_template_directory_uri().'/assets/icones/logo.png'; ?>"/>
	</a>
</div>
	<div id="mainNav" class="collapse navbar-collapse">
		<ul class='navbar-nav menu-header'>
		<?php 
			// Affiche un menu si dans le tableau de bord un menu a été défini dans cet emplacement
				wp_nav_menu( array( 'theme_location' => 'main-menu' ) ); 
		?>
		</ul>
		</div>
		</div>
	</nav>

	<?php 
		// Affiche la description de site se trouvant dans "General Settings" dans l'admin WordPress
		bloginfo( 'description' ); 
	?>
</header>

<main><!-- Débute le contenu principal de notre site -->
