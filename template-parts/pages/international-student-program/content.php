<?php
/** Spanish program presentation, retaining source wording. @package Solanique */
defined( 'ABSPATH' ) || exit;
$program = sg_get_student_program_copy();
$phone   = solanique_get_company_phone();
$student_form = sg_get_student_presentation_form();
$render_list = static function ( array $items ): void {
	echo '<ul class="sg-student-list">';
	foreach ( $items as $item ) {
		echo '<li>' . esc_html( $item ) . '</li>';
	}
	echo '</ul>';
};
?>
<div class="sg-student-program">
	<section class="sg-student-hero" aria-labelledby="sg-student-title">
		<div class="sg-student-hero__media" aria-hidden="true">
			<?php echo sg_asset_img( 'images/estates/toronto-skyline-real-estate-investment.jpg', '', array( 'width' => 2048, 'height' => 1365, 'loading' => 'eager', 'fetchpriority' => 'high', 'sizes' => '100vw' ) ); ?>
		</div>
		<div class="sg-container sg-student-hero__inner">
			<p class="sg-student-hero__brand">Solanique Concierge</p>
			<h1 id="sg-student-title"><?php echo esc_html( $program['title'] ); ?></h1>
			<p class="sg-student-hero__intro"><?php echo esc_html( $program['intro'] ); ?></p>
		</div>
	</section>
	<section class="sg-student-band" aria-labelledby="sg-student-purpose">
		<div class="sg-container sg-student-editorial">
			<h2 id="sg-student-purpose" data-sg-reveal="fade-up"><?php echo esc_html( $program['purpose']['title'] ); ?></h2>
			<div class="sg-flow"><p><?php echo esc_html( $program['purpose']['text'] ); ?></p><p class="sg-student-statement"><?php echo esc_html( $program['purpose']['closing'] ); ?></p></div>
		</div>
		<figure class="sg-container sg-student-life-photo">
			<?php echo sg_asset_img( 'images/student-program/student-friends-outdoors.jpg', 'Estudiantes comparten una lectura al aire libre.', array( 'loading' => 'lazy', 'sizes' => '(max-width: 767px) 100vw, 90vw' ) ); ?>
			<figcaption>Vida estudiantil · fotografía ilustrativa de George Pak / Pexels. No representa participantes ni instalaciones del programa.</figcaption>
		</figure>
	</section>
	<?php foreach ( array( 'destination', 'academic' ) as $key ) : $section = $program[ $key ]; ?>
	<section class="sg-student-band sg-student-band--<?php echo esc_attr( $key ); ?>" aria-labelledby="sg-student-<?php echo esc_attr( $key ); ?>">
		<div class="sg-container sg-student-editorial">
			<header class="sg-flow"><h2 id="sg-student-<?php echo esc_attr( $key ); ?>" data-sg-reveal="fade-up"><?php echo esc_html( $section['title'] ); ?></h2><p class="sg-student-subtitle"><?php echo esc_html( $section['subtitle'] ); ?></p>
				<?php if ( 'destination' === $key ) : ?>
					<figure class="sg-student-destination-photo">
						<?php echo sg_asset_img( 'images/student-program/student-life-together.jpg', 'Estudiantes comparten apuntes alrededor de una mesa.', array( 'loading' => 'lazy', 'sizes' => '(max-width: 767px) 90vw, (max-width: 1440px) 40vw, 600px' ) ); ?>
						<figcaption>Vida estudiantil · fotografía ilustrativa de RDNE Stock project / Pexels. No representa participantes, alojamientos ni instalaciones del programa.</figcaption>
					</figure>
				<?php endif; ?>
			</header>
			<div class="sg-flow"><p><?php echo esc_html( $section['text'] ); ?></p><?php $render_list( $section['items'] ); ?></div>
		</div>
	</section>
	<?php endforeach; ?>
	<?php get_template_part( 'template-parts/pages/international-student-program/region-map' ); ?>
	<section class="sg-student-band" aria-labelledby="sg-student-services">
		<div class="sg-container">
			<header class="sg-student-section-heading sg-flow"><h2 id="sg-student-services" data-sg-reveal="fade-up"><?php echo esc_html( $program['services']['title'] ); ?></h2><p class="sg-student-subtitle"><?php echo esc_html( $program['services']['subtitle'] ); ?></p><p><?php echo esc_html( $program['services']['text'] ); ?></p></header>
			<div class="sg-student-services">
				<?php foreach ( $program['services']['items'] as $item ) : ?>
				<article class="sg-student-service" data-sg-reveal="fade-up"><h3><?php echo esc_html( $item['title'] ); ?></h3><p><?php echo esc_html( $item['text'] ); ?></p></article>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<figure class="sg-container sg-student-life-photo sg-student-life-photo--library">
		<?php echo sg_asset_img( 'images/student-program/students-library.jpg', 'Tres estudiantes leen juntos en una biblioteca.', array( 'loading' => 'lazy', 'sizes' => '(max-width: 767px) 100vw, 90vw' ) ); ?>
		<figcaption>Vida estudiantil · fotografía ilustrativa de Ludovic Delot / Pexels. No representa participantes ni instalaciones del programa.</figcaption>
	</figure>
	<section class="sg-student-band sg-student-band--housing" aria-labelledby="sg-student-housing">
		<div class="sg-container sg-student-editorial">
			<header class="sg-flow"><h2 id="sg-student-housing" data-sg-reveal="fade-up"><?php echo esc_html( $program['housing']['title'] ); ?></h2><p class="sg-student-subtitle"><?php echo esc_html( $program['housing']['subtitle'] ); ?></p><p><?php echo esc_html( $program['housing']['text'] ); ?></p></header>
			<?php $render_list( $program['housing']['items'] ); ?>
		</div>
	</section>
	<section class="sg-student-band" aria-labelledby="sg-student-programs">
		<div class="sg-container">
			<header class="sg-student-section-heading sg-flow"><h2 id="sg-student-programs" data-sg-reveal="fade-up"><?php echo esc_html( $program['programs']['title'] ); ?></h2><p class="sg-student-subtitle"><?php echo esc_html( $program['programs']['subtitle'] ); ?></p></header>
			<div class="sg-student-programs">
				<?php foreach ( $program['programs']['groups'] as $group ) : ?>
				<div class="sg-flow"><h3><?php echo esc_html( $group['title'] ); ?></h3><?php $render_list( $group['items'] ); ?></div>
				<?php endforeach; ?>
			</div>
		</div>
	</section>
	<section class="sg-student-band sg-student-band--closing" aria-labelledby="sg-student-contact">
		<div class="sg-container sg-container--lg sg-student-closing sg-flow">
			<h2 id="sg-student-contact" data-sg-reveal="fade-up"><?php echo esc_html( $program['closing']['title'] ); ?></h2>
			<p><?php echo esc_html( $program['closing']['text'] ); ?></p>
			<p class="sg-student-statement"><?php echo esc_html( $program['closing']['phrase'] ); ?></p>
			<p><?php echo esc_html( $program['closing']['invitation'] ); ?></p>
			<address class="sg-student-contact">
				<a class="sg-button<?php echo $student_form ? '' : ' sg-email-tab'; ?>" href="mailto:concierge@solaniquegroup.com" <?php if ( $student_form ) : ?>data-sg-intake-open<?php endif; ?>>Solicitar una presentación</a>
				<a href="mailto:concierge@solaniquegroup.com">concierge@solaniquegroup.com</a>
				<a href="<?php echo esc_url( $phone['url'] ); ?>"><?php echo esc_html( $phone['display'] ); ?></a>
			</address>
			<a class="sg-student-return" href="<?php echo esc_url( solanique_get_page_url( 'concierge', '/concierge/' ) ); ?>">Volver a Solanique Concierge</a>
		</div>
	</section>
</div>
