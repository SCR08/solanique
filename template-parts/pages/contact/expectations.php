<?php
/**
 * Contact page expectations section.
 *
 * @package Solanique
 */

defined( 'ABSPATH' ) || exit;

$expectations = array(
	array(
		'number'      => '01',
		'title'       => __( 'Private Review', 'solanique' ),
		'description' => __( 'Your inquiry is reviewed with discretion, attention to context, and respect for the private nature of the request.', 'solanique' ),
	),
	array(
		'number'      => '02',
		'title'       => __( 'Clarifying Conversation', 'solanique' ),
		'description' => __( 'We begin by understanding your goals, priorities, and relevant details.', 'solanique' ),
	),
	array(
		'number'      => '03',
		'title'       => __( 'Strategic Direction', 'solanique' ),
		'description' => __( 'When appropriate, we identify whether Solanique Capital, Estates, Concierge, or an integrated path may support the conversation.', 'solanique' ),
	),
	array(
		'number'      => '04',
		'title'       => __( 'Refined Next Step', 'solanique' ),
		'description' => __( 'The next step is guided with clarity, privacy, and respect for your time.', 'solanique' ),
	),
);
?>

<section id="sg-contact-expectations" class="sg-section sg-product-process sg-contact-expectations" aria-labelledby="sg-contact-expectations-title">
	<div class="sg-container sg-container--xl">
		<div class="sg-product-section__header sg-contact-expectations__header sg-flow" data-sg-stagger>
			<p class="sg-product-section__eyebrow sg-contact-expectations__eyebrow sg-contact-reveal" data-sg-reveal="fade-up">
				<?php esc_html_e( 'Private Path', 'solanique' ); ?>
			</p>

			<h2 id="sg-contact-expectations-title" class="sg-product-section__title sg-contact-expectations__title sg-contact-reveal" data-sg-reveal="fade-up">
				<?php esc_html_e( 'What to Expect', 'solanique' ); ?>
			</h2>

			<p class="sg-product-section__intro sg-contact-expectations__intro sg-contact-reveal" data-sg-reveal="fade-up">
				<?php esc_html_e( 'The first conversation is designed to understand context before proposing direction, preserving clarity before action.', 'solanique' ); ?>
			</p>
		</div>

		<ol class="sg-process sg-contact-expectations__timeline" data-sg-stagger>
			<?php foreach ( $expectations as $expectation ) : ?>
				<li class="sg-process__item sg-contact-expectations__item sg-contact-reveal" data-sg-reveal="fade-up">
					<span class="sg-process__number sg-contact-expectations__number"><?php echo esc_html( $expectation['number'] ); ?></span>
					<div class="sg-process__content sg-contact-expectations__content sg-flow">
						<h3 class="sg-process__title sg-contact-expectations__item-title"><?php echo esc_html( $expectation['title'] ); ?></h3>
						<p class="sg-process__text sg-contact-expectations__text"><?php echo esc_html( $expectation['description'] ); ?></p>
					</div>
				</li>
			<?php endforeach; ?>
		</ol>
	</div>
</section>
