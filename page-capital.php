<?php
/**
 * Capital page template.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

get_header();

$solanique_capital_copy = solanique_get_final_page_copy( 'capital' );

get_template_part( 'template-parts/pages/capital/hero' );

solanique_render_immersive_section(
	array(
		'id'       => 'sg-capital-immersive-global',
		'modifier' => 'capital-city',
		'eyebrow'  => $solanique_capital_copy['service'] ?? '',
		'title'    => $solanique_capital_copy['manifesto']['heading'] ?? '',
		'text'     => $solanique_capital_copy['manifesto']['text'] ?? '',
		'secondary_eyebrow' => $solanique_capital_copy['service'] ?? '',
		'secondary_title'   => $solanique_capital_copy['principles']['heading'] ?? '',
		'secondary_text'    => $solanique_capital_copy['principles']['items'][0]['text'] ?? '',
		'image'    => 'images/estates/london-commercial-real-estate-financial-district.jpg',
		'width'    => 2048,
		'height'   => 1365,
		'speed'    => '0.24',
	)
);

if ( function_exists( 'sg_render_service_video_slot' ) ) {
	sg_render_service_video_slot(
		'capital',
		array(
			'eyebrow' => __( 'Smart Capital video', 'solanique' ),
			'title'   => __( 'Approved Capital media placement.', 'solanique' ),
			'intro'   => __( 'This placement appears only when approved Smart Capital video files are available and enabled.', 'solanique' ),
			'class'   => 'sg-video-slot--capital',
		)
	);
}

get_template_part( 'template-parts/pages/capital/services' );
get_template_part( 'template-parts/pages/capital/broker-partners' );
get_template_part( 'template-parts/pages/capital/intro' );
get_template_part( 'template-parts/pages/capital/strategy' );

solanique_render_immersive_section(
	array(
		'id'       => 'sg-capital-immersive-portfolio',
		'modifier' => 'capital-city',
		'eyebrow'  => $solanique_capital_copy['service'] ?? '',
		'title'    => $solanique_capital_copy['protocols']['heading'] ?? '',
		'text'     => $solanique_capital_copy['protocols']['items'][2]['text'] ?? '',
		'secondary_eyebrow' => $solanique_capital_copy['service'] ?? '',
		'secondary_title'   => $solanique_capital_copy['protocols']['items'][1]['title'] ?? '',
		'secondary_text'    => $solanique_capital_copy['protocols']['items'][1]['text'] ?? '',
		'image'    => 'images/estates/modern-glass-commercial-building-architecture.jpg',
		'width'    => 2048,
		'height'   => 1074,
		'speed'    => '0.18',
	)
);

get_template_part( 'template-parts/pages/capital/process' );

if ( function_exists( 'sg_render_crm_form_slot' ) ) {
	sg_render_crm_form_slot(
		function_exists( 'sg_is_spanish' ) && sg_is_spanish() ? 'capital-inquiry-es' : 'capital-inquiry-en',
		array(
			'title' => __( 'Capital inquiry intake', 'solanique' ),
			'class' => 'sg-crm-slot--capital',
		)
	);
}

solanique_render_pending_content_panel(
	array(
		'id'       => 'sg-capital-disclosures',
		'modifier' => 'capital',
		'eyebrow'  => __( 'Capital disclosures', 'solanique' ),
		'title'    => __( 'Broker, license, mortgage, and disclaimer wording pending client approval.', 'solanique' ),
		'text'     => __( 'This area is reserved for required broker, license, mortgage, legal, investment, and partner disclosures. No regulated or partner language has been invented.', 'solanique' ),
		'items'    => array(
			__( 'Broker name', 'solanique' ),
			__( 'License number', 'solanique' ),
			__( 'Required mortgage disclosure wording', 'solanique' ),
			__( 'Approved investment and opportunity disclaimers', 'solanique' ),
		),
	)
);

get_template_part( 'template-parts/pages/capital/cta' );

get_footer();
