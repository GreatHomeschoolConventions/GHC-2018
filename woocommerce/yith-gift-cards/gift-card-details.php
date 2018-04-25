<?php
/**
 * Gift Card product add to cart
 *
 * @author  Yithemes
 * @package YITH WooCommerce Gift Cards
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>

<div class="gift-card-content-editor step-content">
	<span class="ywgc-editor-section-title"><?php echo apply_filters( 'ywgc_editor_section_title', __( 'Gift card details', 'yith-woocommerce-gift-cards' ) ); ?></span>

	<label
		for="ywgc-recipient-email">
		<?php
		if ( $mandatory_recipient ) {
			echo apply_filters( 'ywgc_editor_mandatory_recipient_email_label', __( 'Recipient&rsquo;s details (*)', 'yith-woocommerce-gift-cards' ) );
		} else {
	echo apply_filters( 'ywgc_editor_recipient_email_label', __( 'Recipient&rsquo;s details', 'yith-woocommerce-gift-cards' ) );
		}
		?>
		</label>

	<div class="ywgc-single-recipient">

		<input type="email"
	   name="ywgc-recipient-email[]" <?php echo ( $mandatory_recipient && ! $gift_this_product ) ? 'required' : ''; ?>
	   class="ywgc-recipient yith_wc_gift_card_input_recipient_details" placeholder="jane.doe@example.com"/>

		<input type="text" name="ywgc-recipient-name[]" placeholder="Jane Doe" <?php echo ( $mandatory_recipient && ! $gift_this_product ) ? 'required' : ''; ?> class="yith_wc_gift_card_input_recipient_details">

		<a href="#" class="ywgc-remove-recipient hide-if-alone">x</a>
		<?php if ( ! $mandatory_recipient ) : ?>
			<span class="ywgc-empty-recipient-note"><?php _e( 'If empty, will be sent to your email address', 'yith-woocommerce-gift-cards' ); ?></span>
		<?php endif; ?>
	</div>

	<?php
	// Only with gift card product type you can use multiple recipients
	if ( $allow_multiple_recipients ) :
	?>
		<a href="#" class="add-recipient button"
		   id="add_recipient"><?php _e( 'Add another recipient', 'yith-woocommerce-gift-cards' ); ?></a>
	<?php endif; ?>

	<div class="ywgc-sender-name">
		<label
			for="ywgc-sender-name"><?php echo apply_filters( 'ywgc_sender_name_label', __( 'Your name', 'yith-woocommerce-gift-cards' ) ); ?></label>
		<input type="text" name="ywgc-sender-name" id="ywgc-sender-name" value="<?php echo apply_filters( 'ywgc_sender_name_value', '' ); ?>" placeholder="John Doe">
	</div>
	<div class="ywgc-message">
		<label
			for="ywgc-edit-message"><?php echo apply_filters( 'ywgc_edit_message_label', __( 'Message', 'yith-woocommerce-gift-cards' ) ); ?></label>
		<textarea id="ywgc-edit-message" name="ywgc-edit-message" rows="5"
				  placeholder="<?php echo apply_filters( 'ywgc_edit_message_placeholder', __( 'Your message&hellip;', 'yith-woocommerce-gift-cards' ) ); ?>"></textarea>
	</div>

	<?php if ( $allow_send_later ) : ?>
		<div class="ywgc-postdated">
			<label
				for="ywgc-postdated"><input type="checkbox" id="ywgc-postdated" name="ywgc-postdated"> <?php echo apply_filters( 'ywgc_postdated_field_label', __( 'Schedule delivery?', 'yith-woocommerce-gift-cards' ) ); ?></label>
			<input type="text" id="ywgc-delivery-date" name="ywgc-delivery-date"
				   class="datepicker ywgc-hidden" placeholder="<?php echo apply_filters( 'ywgc_choose_delivery_date_placeholder', __( 'Choose the delivery date (year-month-day)', 'yith-woocommerce-gift-cards' ) ); ?>">
			<p>Please note that our <a href="<?php home_url( '/pricing/' ); ?>">prices do go up each month</a>, so if you purchase a gift card for this month&rsquo;s amount but the recipient doesn&rsquo;t use it until next month, it may not cover their entire order.</p>
		</div>
	<?php endif; ?>
</div>
