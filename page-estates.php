<?php
/**
 * Estates page template.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

get_header();

$solanique_estate_copy = solanique_get_final_page_copy( 'estate' );

get_template_part( 'template-parts/pages/estates/hero' );

solanique_render_immersive_section(
	array(
		'id'       => 'sg-estate-immersive-architecture',
		'modifier' => 'estate-architecture',
		'eyebrow'  => $solanique_estate_copy['service'] ?? '',
		'title'    => $solanique_estate_copy['manifesto']['heading'] ?? '',
		'text'     => $solanique_estate_copy['manifesto']['text'] ?? '',
		'secondary_eyebrow' => $solanique_estate_copy['service'] ?? '',
		'secondary_title'   => $solanique_estate_copy['principles']['heading'] ?? '',
		'secondary_text'    => $solanique_estate_copy['principles']['items'][0]['text'] ?? '',
		'image'    => 'images/estates/luxury-home-exterior-night-lighting.jpg',
		'width'    => 2048,
		'height'   => 1365,
		'speed'    => '0.22',
	)
);

if ( function_exists( 'sg_render_service_video_slot' ) ) {
	sg_render_service_video_slot(
		'estate',
		array(
			'eyebrow' => __( 'Estate video', 'solanique' ),
			'title'   => __( 'Approved Estate media placement.', 'solanique' ),
			'intro'   => __( 'This placement appears only when approved Estate video files are available and enabled.', 'solanique' ),
			'class'   => 'sg-video-slot--estate',
		)
	);
}

get_template_part( 'template-parts/pages/estates/advisory' );
get_template_part( 'template-parts/pages/estates/intro' );

solanique_render_immersive_section(
	array(
		'id'       => 'sg-estate-immersive-property',
		'modifier' => 'estate-property',
		'eyebrow'  => $solanique_estate_copy['service'] ?? '',
		'title'    => $solanique_estate_copy['principles']['heading'] ?? '',
		'text'     => $solanique_estate_copy['principles']['items'][0]['text'] ?? '',
		'secondary_eyebrow' => $solanique_estate_copy['service'] ?? '',
		'secondary_title'   => $solanique_estate_copy['protocols']['heading'] ?? '',
		'secondary_text'    => $solanique_estate_copy['protocols']['items'][0]['text'] ?? '',
		'image'    => 'images/estates/backyard-pool-pergola-fire-feature-night.jpg',
		'width'    => 2048,
		'height'   => 1365,
		'speed'    => '0.18',
	)
);

get_template_part( 'template-parts/pages/estates/intelligence' );
get_template_part( 'template-parts/pages/estates/process' );

if ( function_exists( 'sg_render_crm_form_slot' ) ) {
	sg_render_crm_form_slot(
		function_exists( 'sg_is_spanish' ) && sg_is_spanish() ? 'estate-inquiry-es' : 'estate-inquiry-en',
		array(
			'title' => __( 'Estate inquiry intake', 'solanique' ),
			'class' => 'sg-crm-slot--estate',
		)
	);
}

solanique_render_pending_content_panel(
	array(
		'id'       => 'sg-estate-disclosures',
		'modifier' => 'estate',
		'eyebrow'  => __( 'Estate disclosures', 'solanique' ),
		'title'    => __( 'Broker, license, real estate, and disclaimer wording pending client approval.', 'solanique' ),
		'text'     => __( 'This area is reserved for required broker, license, real estate, property management, and service disclaimers. No regulatory information has been invented.', 'solanique' ),
		'items'    => array(
			__( 'Broker name', 'solanique' ),
			__( 'License number', 'solanique' ),
			__( 'Required real estate disclosure wording', 'solanique' ),
			__( 'Approved Estate service disclaimers', 'solanique' ),
		),
	)
);

get_template_part( 'template-parts/pages/estates/cta' );

get_footer();
