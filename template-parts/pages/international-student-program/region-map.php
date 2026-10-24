<?php
/** Shared schematic region explorer; geography is not a school-placement promise. @package Solanique */
defined( 'ABSPATH' ) || exit;
$communities = array(
	'barrie' => array( 'name' => 'Barrie', 'x' => 336, 'y' => 352, 'position' => 'En el centro de la región, junto a Kempenfelt Bay.', 'url' => 'https://www.tourismbarrie.com/' ),
	'collingwood' => array( 'name' => 'Collingwood', 'x' => 140, 'y' => 268, 'position' => 'Al oeste de la región, en la costa de Georgian Bay.', 'url' => 'https://www.collingwood.ca/' ),
	'midland' => array( 'name' => 'Midland', 'x' => 266, 'y' => 110, 'position' => 'Al norte de la región, junto a Georgian Bay.', 'url' => 'https://www.midland.ca/' ),
	'orillia' => array( 'name' => 'Orillia', 'x' => 438, 'y' => 210, 'position' => 'Al noreste de la región, entre los lagos Simcoe y Couchiching.', 'url' => 'https://www.orillia.ca/' ),
	'innisfil' => array( 'name' => 'Innisfil', 'x' => 365, 'y' => 418, 'position' => 'Al sur de Barrie, en la costa occidental del lago Simcoe.', 'url' => 'https://innisfil.ca/' ),
	'bradford' => array( 'name' => 'Bradford', 'x' => 384, 'y' => 542, 'position' => 'En el extremo sur de la región.', 'url' => 'https://www.townofbwg.com/' ),
);
?>
<section id="sg-student-region" class="sg-student-region" aria-labelledby="sg-region-heading" data-sg-region>
	<div class="sg-container">
		<header class="sg-student-region__heading">
			<h2 id="sg-region-heading">Explora la región de Simcoe</h2>
			<p>Conoce algunas de las comunidades de la región del programa.</p>
		</header>
		<div class="sg-student-region__layout">
			<figure class="sg-student-region__figure">
				<svg class="sg-student-region__map" viewBox="0 0 640 640" role="img" aria-labelledby="sg-region-map-title sg-region-map-desc">
					<title id="sg-region-map-title">Comunidades de la región de Simcoe, Ontario</title>
					<desc id="sg-region-map-desc">Mapa esquemático: Midland al norte, Collingwood al oeste, Orillia al noreste, Barrie al centro, e Innisfil y Bradford al sur. No representa límites oficiales ni ubicaciones de escuelas.</desc>
					<path class="sg-student-region__water" d="M0 0H640V640H0Z"/>
					<path class="sg-student-region__land" d="M0 263L72 275 111 260 155 237 188 205 194 177 222 169 230 130 253 108 281 100 302 126 332 122 365 100 390 119 406 145 437 158 451 187 469 195 482 229 470 254 459 274 438 290 412 302 391 322 371 333 348 345 343 366 364 391 389 408 403 446 432 474 454 480 472 511 512 546 548 584 640 615V640H0Z"/>
					<path class="sg-student-region__shore" d="M0 263L72 275 111 260 155 237 188 205 194 177 222 169 230 130 253 108 281 100 302 126 332 122 365 100 390 119 406 145 437 158 451 187 469 195 482 229 470 254 459 274 438 290 412 302 391 322 371 333 348 345 343 366 364 391 389 408 403 446 432 474 454 480 472 511 512 546 548 584 640 615"/>
					<path class="sg-student-region__road" d="M384 600L384 542 365 418 336 352 359 284 438 210M336 352L266 110M336 352L140 268"/>
					<text class="sg-student-region__water-label" x="82" y="119">Georgian Bay</text>
					<text class="sg-student-region__water-label" x="456" y="359">Lago Simcoe</text>
					<text class="sg-student-region__area-label" x="128" y="465">ONTARIO</text>
					<text class="sg-student-region__context" x="405" y="611">Hacia Toronto</text>
					<?php foreach ( $communities as $id => $community ) : ?>
					<g class="sg-student-region__point" data-region-point="<?php echo esc_attr( $id ); ?>">
						<circle class="sg-student-region__halo" cx="<?php echo (int) $community['x']; ?>" cy="<?php echo (int) $community['y']; ?>" r="18"/>
						<circle cx="<?php echo (int) $community['x']; ?>" cy="<?php echo (int) $community['y']; ?>" r="6"/>
						<text x="<?php echo (int) $community['x'] + 25; ?>" y="<?php echo (int) $community['y'] + 5; ?>"><?php echo esc_html( $community['name'] ); ?></text>
					</g>
					<?php endforeach; ?>
				</svg>
				<figcaption>Esquema orientativo, no a escala. No representa límites oficiales.</figcaption>
			</figure>
			<div class="sg-student-region__communities">
				<h3>Comunidades</h3>
				<div class="sg-student-region__choices" role="group" aria-label="Seleccionar una comunidad" hidden>
					<?php foreach ( $communities as $id => $community ) : ?>
					<button type="button" data-region-select="<?php echo esc_attr( $id ); ?>" aria-pressed="false" aria-controls="sg-region-detail-<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $community['name'] ); ?></button>
					<?php endforeach; ?>
				</div>
				<div class="sg-student-region__details" aria-live="polite" aria-atomic="true">
					<?php foreach ( $communities as $id => $community ) : ?>
					<article id="sg-region-detail-<?php echo esc_attr( $id ); ?>" data-region-detail="<?php echo esc_attr( $id ); ?>">
						<h4><?php echo esc_html( $community['name'] ); ?></h4>
						<p><?php echo esc_html( $community['position'] ); ?></p>
						<a href="<?php echo esc_url( $community['url'] ); ?>">Conocer <?php echo esc_html( $community['name'] ); ?> <span aria-hidden="true">↗</span></a>
					</article>
					<?php endforeach; ?>
				</div>
				<p class="sg-student-region__note">Las comunidades son referencias geográficas, no una oferta de cupos. La escuela y el alojamiento se confirman de forma individual.</p>
				<a class="sg-student-region__source" href="https://studyinsimcoecounty.com/explore-our-communities/">Fuente: comunidades del SCDSB</a>
			</div>
		</div>
	</div>
</section>
