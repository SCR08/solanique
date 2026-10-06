<?php
/**
 * Concierge page template.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

get_header();

$solanique_concierge_copy = solanique_get_final_page_copy( 'concierge' );

get_template_part( 'template-parts/pages/concierge/hero' );
sg_render_service_video_slot( 'concierge', array( 'class' => 'sg-video-slot--concierge' ) );

solanique_render_immersive_section(
	array(
		'id'       => 'sg-concierge-immersive-lifestyle',
		'modifier' => 'concierge-lifestyle',
		'eyebrow'  => $solanique_concierge_copy['service'] ?? '',
		'title'    => $solanique_concierge_copy['manifesto']['heading'] ?? '',
		'text'     => $solanique_concierge_copy['manifesto']['text'] ?? '',
		'secondary_eyebrow' => $solanique_concierge_copy['service'] ?? '',
		'secondary_title'   => $solanique_concierge_copy['principles']['heading'] ?? '',
		'secondary_text'    => $solanique_concierge_copy['principles']['items'][0]['text'] ?? '',
		'image'    => 'images/concierge/luxury-black-car-headlights-transportation.jpg',
		'width'    => 2048,
		'height'   => 1365,
		'speed'    => '0.2',
	)
);

get_template_part( 'template-parts/pages/concierge/services' );
get_template_part( 'template-parts/pages/concierge/intro' );
get_template_part( 'template-parts/pages/concierge/approach' );

get_template_part( 'template-parts/pages/concierge/process' );

if ( function_exists( 'sg_render_crm_form_slot' ) ) {
	sg_render_crm_form_slot(
		function_exists( 'sg_is_spanish' ) && sg_is_spanish() ? 'concierge-inquiry-es' : 'concierge-inquiry-en',
		array(
			'title' => __( 'Concierge inquiry intake', 'solanique' ),
			'class' => 'sg-crm-slot--concierge',
		)
	);
}

get_template_part( 'template-parts/pages/concierge/cta' );

get_footer();
