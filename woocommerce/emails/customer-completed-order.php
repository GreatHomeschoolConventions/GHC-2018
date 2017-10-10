<?php
/**
 * Customer completed order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/customer-completed-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates/Emails
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * @hooked WC_Emails::email_header() Output the email header
 */
do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

<p>Your order from Great Homeschool Conventions has been completed and your order details are shown below. Please print a copy of this email and bring it to the convention with you.</p>

<p>To keep registration costs low, <strong>nothing</strong> will be mailed to you; your packet and any special event tickets will be available when you arrive at the convention.</p>

<h2>Special Events and More</h2>

<p>Watch your email in the coming weeks for FAQs, deals on hotels, and more.</p>

<p>If you would like to add anything to your order, log in and <a href="https://www.greathomeschoolconventions.com/product-category/special-events/?utm_source=woocommerce&utm_medium=email-receipt&utm_campaign=registration-receipt&utm_content=add-to-order">place another order online</a> or email us at <a href="mailto:addtomyorder@greathomeschoolconventions.com/" target="_blank" >addtomyorder@greathomeschoolconventions.com</a>.</p>

<?php

/**
 * @hooked WC_Emails::order_details() Shows the order details table.
 * @hooked WC_Structured_Data::generate_order_data() Generates structured data.
 * @hooked WC_Structured_Data::output_structured_data() Outputs structured data.
 * @since 2.5.0
 */
do_action( 'woocommerce_email_order_details', $order, $sent_to_admin, $plain_text, $email );

/**
 * @hooked WC_Emails::order_meta() Shows order meta data.
 */
do_action( 'woocommerce_email_order_meta', $order, $sent_to_admin, $plain_text, $email );

/**
 * @hooked WC_Emails::customer_details() Shows customer details
 * @hooked WC_Emails::email_address() Shows email address
 */
do_action( 'woocommerce_email_customer_details', $order, $sent_to_admin, $plain_text, $email );

/**
 * @hooked WC_Emails::email_footer() Output the email footer
 */
do_action( 'woocommerce_email_footer', $email );
