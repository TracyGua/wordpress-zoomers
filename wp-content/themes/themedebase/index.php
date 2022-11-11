<?php
/**
 * Modèle générique au cas où Wordpress ne trouve pas un modèle
 * À utiliser comme fallback seulement.
 */

get_header(); // Affiche header.php

// Est-ce que nous avons des posts qui correspondent à notre requête ?
// Dans le cas de la page d'accueil, les billets les plus récents serons affichés
if ( have_posts() ) : 
	// Si oui, bouclons au travers pour tous les afficher
	while ( have_posts() ) : the_post(); 
?>

<body>
<main class="container"> <!--Pourquoi le nav est dans le main? Le main c'est le héros dans ce cas-->
    <header class="row">
        <nav class="navbar navbar-expand-lg navigation col-6">
            <div class="container">
                <!--Logo-->
                <div class="logo">
                    <a class="navbar-brand" href="index.html"> <img src="/wp-content/uploads/icones/logo.svg"/></a>
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
    <article class="row">
        <section class="heros__boite-description col-md-6">
            <h1 class="heros__titre-1">Des skins pour tous vos appareils!</h1>
            <p class="heros__desc">ZoomHitskin propose une variété de décals, d'emballages et d'habillages de haute qualité pour consoles de jeux et appareils électroniques fabriqués avec du vinyle 3M pour donner à vos appareils une finition impeccable et brillante garantie pour durer, en particulier lors de sessions de jeu intenses. Tous nos skins 3M en vinyle sont faciles à installer et complètement amovibles sans laisser de résidus, vous laissant plus de temps pour effectuer une danse Fortnite tout en admirant le decal sur votre appareil. Des didacticiels sont disponibles sur notre chaîne YouTube.
            </p>
        </section>
  

            <div class="swiper col-md-6">
                <div class="swiper-wrapper">
                  <div class="swiper-slide no1"><img src="medias/appareils/ipad/01_ipad.webp" alt="L'image est innaccessible"></div>
                  <div class="swiper-slide no3"><img src="medias/appareils/iphone/01_iphone.webp" alt="L'image est innaccessible">    </div>
                  <div class="swiper-slide no4"><img src="medias/appareils/iphone/02_iphone.webp" alt="L'image est innaccessible"></div>
                  <div class="swiper-slide no1"><img src="medias/appareils/ps4/01_ps4.webp" alt="L'image est innaccessible"></div>
                  <div class="swiper-slide no3"><img src="medias/appareils/ps4/02_ps4.webp" alt="L'image est innaccessible"></div>
                  <div class="swiper-slide no3"><img src="medias/appareils/switch_lite/01_lite.webp" alt="L'image est innaccessible">    </div>
                  <div class="swiper-slide no4"><img src="medias/appareils/switch_lite/02_lite.webp" alt="L'image est innaccessible"></div>
                  <div class="swiper-slide no1"><img src="medias/appareils/ps5/01_ps5.webp" alt="L'image est innaccessible"></div>
                  <div class="swiper-slide no3"><img src="medias/appareils/ps5/02_ps5.webp" alt="L'image est innaccessible"></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
    
    </article>
   
</main>
</body>

	<article>
		<?php the_post_thumbnail('large'); // Vignette large du post ?>

		<h2>
			<a href="<?php the_permalink(); // Lien du post ?>">
				<?php the_title(); // Titre du post ?>
			</a>
		</h2>

		<?php 
			the_content(); // Contenu principal de la page

			get_template_part( 'partials/metas' );   // Affiche partials/metas.pgp (nom d'auteur, date de publication, etc.)
		?>
	</article>

<?php endwhile; wp_reset_postdata(); // Fermeture de la boucle



else : // Si aucune page n'a été trouvée
	get_template_part( 'partials/404' ); // Affiche partials/404.php
endif;

get_footer(); // Affiche footer.php 
?>