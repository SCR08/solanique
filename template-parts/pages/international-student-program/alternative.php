<?php
/** Student-focused alternative: same Spanish source copy, lighter editorial composition. @package Solanique */
defined( 'ABSPATH' ) || exit;
$program = sg_get_student_program_copy();
$phone   = solanique_get_company_phone();
$list = static function ( array $items ): void {
	echo '<ul class="sg-student-v2__list">';
	foreach ( $items as $item ) {
		echo '<li>' . esc_html( $item ) . '</li>';
	}
	echo '</ul>';
};
?>
<div class="sg-student-v2">
	<section class="sg-student-v2__hero" aria-labelledby="sg-program-v2-title">
		<div class="sg-student-v2__hero-media" aria-hidden="true">
			<?php echo sg_asset_img( 'images/student-program/student-friends-outdoors.jpg', '', array( 'loading' => 'eager', 'fetchpriority' => 'high', 'sizes' => '100vw' ) ); ?>
		</div>
		<div class="sg-container sg-student-v2__hero-inner">
			<p class="sg-student-v2__brand">Solanique Concierge</p>
			<h1 id="sg-program-v2-title"><?php echo esc_html( $program['title'] ); ?></h1>
			<p><?php echo esc_html( $program['intro'] ); ?></p>
		</div>
	</section>
	<nav class="sg-student-v2__jump" aria-label="Secciones del programa">
		<div class="sg-container"><a href="#sg-program-purpose">La experiencia</a><a href="#sg-student-region">Simcoe</a><a href="#sg-program-academic">Educación</a><a href="#sg-program-support">Acompañamiento</a><a href="#sg-program-contact">Contacto</a></div>
	</nav>
	<section id="sg-program-purpose" class="sg-student-v2__band" aria-labelledby="sg-program-purpose-title">
		<div class="sg-container sg-student-v2__intro">
			<h2 id="sg-program-purpose-title"><?php echo esc_html( $program['purpose']['title'] ); ?></h2>
			<div class="sg-flow"><p><?php echo esc_html( $program['purpose']['text'] ); ?></p><p class="sg-student-v2__statement"><?php echo esc_html( $program['purpose']['closing'] ); ?></p></div>
		</div>
	</section>
	<section class="sg-student-v2__band sg-student-v2__band--mist" aria-labelledby="sg-program-destination">
		<div class="sg-container sg-student-v2__split">
			<figure class="sg-student-v2__photo sg-student-v2__photo--portrait">
				<?php echo sg_asset_img( 'images/student-program/student-life-together.jpg', 'Un grupo de estudiantes comparte apuntes en una mesa al aire libre.', array( 'loading' => 'lazy', 'sizes' => '(max-width: 767px) 100vw, 45vw' ) ); ?>
				<figcaption>Fotografía ilustrativa · RDNE Stock project / Pexels.</figcaption>
			</figure>
			<div class="sg-flow">
				<h2 id="sg-program-destination"><?php echo esc_html( $program['destination']['title'] ); ?></h2>
				<p class="sg-student-v2__subtitle"><?php echo esc_html( $program['destination']['subtitle'] ); ?></p>
				<p><?php echo esc_html( $program['destination']['text'] ); ?></p>
				<?php $list( $program['destination']['items'] ); ?>
			</div>
		</div>
	</section>
	<?php get_template_part( 'template-parts/pages/international-student-program/region-map' ); ?>
	<section id="sg-program-academic" class="sg-student-v2__band" aria-labelledby="sg-program-academic-title">
		<div class="sg-container sg-student-v2__split sg-student-v2__split--reverse">
			<figure class="sg-student-v2__photo sg-student-v2__photo--portrait">
				<?php echo sg_asset_img( 'images/student-program/students-library.jpg', 'Tres estudiantes consultan un libro juntos en una biblioteca.', array( 'loading' => 'lazy', 'sizes' => '(max-width: 767px) 100vw, 45vw' ) ); ?>
				<figcaption>Fotografía ilustrativa · Ludovic Delot / Pexels.</figcaption>
			</figure>
			<div class="sg-flow">
				<h2 id="sg-program-academic-title"><?php echo esc_html( $program['academic']['title'] ); ?></h2>
				<p class="sg-student-v2__subtitle"><?php echo esc_html( $program['academic']['subtitle'] ); ?></p>
				<p><?php echo esc_html( $program['academic']['text'] ); ?></p>
				<?php $list( $program['academic']['items'] ); ?>
			</div>
		</div>
	</section>
	<section id="sg-program-support" class="sg-student-v2__band sg-student-v2__band--graphite" aria-labelledby="sg-program-support-title">
		<div class="sg-container">
			<header class="sg-student-v2__section-head sg-flow"><h2 id="sg-program-support-title"><?php echo esc_html( $program['services']['title'] ); ?></h2><p class="sg-student-v2__subtitle"><?php echo esc_html( $program['services']['subtitle'] ); ?></p><p><?php echo esc_html( $program['services']['text'] ); ?></p></header>
			<div class="sg-student-v2__services">
				<?php foreach ( $program['services']['items'] as $item ) : ?>
				<article><h3><?php echo esc_html( $item['title'] ); ?></h3><p><?php echo esc_html( $item['text'] ); ?></p></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<section class="sg-student-v2__band sg-student-v2__band--mist" aria-labelledby="sg-program-housing">
		<div class="sg-container sg-student-v2__intro">
			<header class="sg-flow"><h2 id="sg-program-housing"><?php echo esc_html( $program['housing']['title'] ); ?></h2><p class="sg-student-v2__subtitle"><?php echo esc_html( $program['housing']['subtitle'] ); ?></p><p><?php echo esc_html( $program['housing']['text'] ); ?></p></header>
			<?php $list( $program['housing']['items'] ); ?>
		</div>
	</section>
	<section class="sg-student-v2__band" aria-labelledby="sg-program-opportunities">
		<div class="sg-container">
			<header class="sg-student-v2__section-head sg-flow"><h2 id="sg-program-opportunities"><?php echo esc_html( $program['programs']['title'] ); ?></h2><p class="sg-student-v2__subtitle"><?php echo esc_html( $program['programs']['subtitle'] ); ?></p></header>
			<div class="sg-student-v2__programs">
				<?php foreach ( $program['programs']['groups'] as $group ) : ?>
				<div class="sg-flow"><h3><?php echo esc_html( $group['title'] ); ?></h3><?php $list( $group['items'] ); ?></div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<section id="sg-program-contact" class="sg-student-v2__band sg-student-v2__band--closing" aria-labelledby="sg-program-contact-title">
		<div class="sg-container sg-student-v2__closing sg-flow">
			<h2 id="sg-program-contact-title"><?php echo esc_html( $program['closing']['title'] ); ?></h2>
			<p><?php echo esc_html( $program['closing']['text'] ); ?></p>
			<p class="sg-student-v2__statement"><?php echo esc_html( $program['closing']['phrase'] ); ?></p>
			<p><?php echo esc_html( $program['closing']['invitation'] ); ?></p>
			<address class="sg-student-v2__contact"><a class="sg-button sg-email-tab" href="mailto:concierge@solaniquegroup.com">Solicitar una presentación</a><?php echo solanique_get_pillar_email_tab( 'concierge', 'Correo' ); ?><a href="<?php echo esc_url( $phone['url'] ); ?>"><?php echo esc_html( $phone['display'] ); ?></a></address>
			<a class="sg-student-v2__return" href="<?php echo esc_url( solanique_get_page_url( 'concierge', '/concierge/' ) ); ?>">Volver a Solanique Concierge</a>
		</div>
	</section>
	<div class="sg-student-v2__credits"><div class="sg-container">Fotografías ilustrativas de vida estudiantil: George Pak, RDNE Stock project y Ludovic Delot / <a href="https://www.pexels.com/license/">Pexels</a>. No representan participantes, escuelas ni alojamientos del programa.</div></div>
</div>
