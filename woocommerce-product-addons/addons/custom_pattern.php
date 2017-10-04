<?php foreach ( $addon['options'] as $key => $option ) :
    $addon_key     = 'addon-' . sanitize_title( $addon['field-name'] );
    $option_key    = empty( $option['label'] ) ? $key : sanitize_title( $option['label'] );
    $current_value = isset( $_POST[ $addon_key ] ) && isset( $_POST[ $addon_key ][ $option_key ] ) ? wc_clean( $_POST[ $addon_key ][ $option_key ] ) : '2';
    $price = apply_filters( 'woocommerce_product_addons_option_price',
        $option['price'] > 0 ? '(' . wc_price( get_product_addon_price_for_display( $option['price'] ) ) . ')' : '',
        $option,
        $key,
        'custom_pattern'
    );

    // set extra attributes
    $input_type = 'text';
    $extra_attributes = '';
    $placeholder = '';
    if ( strpos( $addon_key, 'family-members' ) !== false ) {
        $placeholder = '1';
        $input_type = 'number';
        $extra_attributes = 'min="1" max=20"';
    }
    ?>

    <p class="form-row form-row-wide addon-wrap-<?php echo sanitize_title( $addon['field-name'] ); ?>">
        <label>
            <input type="<?php echo $input_type ?>" pattern="<?php echo esc_attr( $pattern ); ?>" title="<?php echo esc_attr( $title ); ?>" class="input-text addon addon-custom addon-custom-pattern" data-raw-price="<?php echo esc_attr( $option['price'] ); ?>" data-price="<?php echo get_product_addon_price_for_display( $option['price'] ); ?>" name="<?php echo $addon_key ?>[<?php echo $option_key; ?>]" value="<?php echo esc_attr( $current_value ); ?>" placeholder="<?php echo $placeholder; ?>" <?php if ( ! empty( $option['max'] ) ) echo 'maxlength="' . $option['max'] .'"'; ?> <?php echo $extra_attributes; ?> />
            <?php if ( ! empty( $option['label'] ) ) : ?>
                <?php echo wptexturize( $option['label'] ) . ' ' . $price; ?>
            <?php endif; ?>
        </label>
    </p>

<?php endforeach; ?>
