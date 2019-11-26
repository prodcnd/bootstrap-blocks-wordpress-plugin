<?php
/**
 * Template for wp-bootstrap-blocks/column
 *
 * This template can be overridden by copying it to theme/wp-bootstrap-blocks/column.php.
 *
 * @package wp-bootstrap-blocks/templates/column
 * @version 1.4.0
 */

/**
 * Block attributes.
 * Defined in wp_bootstrap_blocks_get_template() which requires this template.
 *
 * @var $attributes array
 */

/**
 * Block content.
 * Defined in wp_bootstrap_blocks_get_template() which requires this template.
 *
 * @var $content string
 */

$classes = array();
$column_content_classes = array();

if ( array_key_exists( 'equalWidthXs', $attributes ) && $attributes['equalWidthXs'] ) {
	array_push( $classes, 'col' );
} elseif ( array_key_exists( 'sizeXs', $attributes ) && $attributes['sizeXs'] > 0 ) {
	array_push( $classes, 'col-' . $attributes['sizeXs'] );
} else {
	array_push( $classes, 'col-12' );
}
if ( array_key_exists( 'equalWidthSm', $attributes ) && $attributes['equalWidthSm'] ) {
	array_push( $classes, 'col-sm' );
} elseif ( array_key_exists( 'sizeSm', $attributes ) && $attributes['sizeSm'] > 0 ) {
	array_push( $classes, 'col-sm-' . $attributes['sizeSm'] );
}
if ( array_key_exists( 'equalWidthMd', $attributes ) && $attributes['equalWidthMd'] ) {
	array_push( $classes, 'col-md' );
} elseif ( array_key_exists( 'sizeMd', $attributes ) && $attributes['sizeMd'] > 0 ) {
	array_push( $classes, 'col-md-' . $attributes['sizeMd'] );
}
if ( array_key_exists( 'equalWidthLg', $attributes ) && $attributes['equalWidthLg'] ) {
	array_push( $classes, 'col-lg' );
} elseif ( array_key_exists( 'sizeLg', $attributes ) && $attributes['sizeLg'] > 0 ) {
	array_push( $classes, 'col-lg-' . $attributes['sizeLg'] );
}
if ( array_key_exists( 'equalWidthXl', $attributes ) && $attributes['equalWidthXl'] ) {
	array_push( $classes, 'col-xl' );
} elseif ( array_key_exists( 'sizeXl', $attributes ) && $attributes['sizeXl'] > 0 ) {
	array_push( $classes, 'col-xl-' . $attributes['sizeXl'] );
}
if ( array_key_exists( 'className', $attributes ) ) {
	$classes = array_merge( $classes, explode( ' ', $attributes['className'] ) );
}

if ( array_key_exists( 'bgColor', $attributes ) && ! empty( $attributes['bgColor'] ) ) {
	array_push( $column_content_classes, 'h-100' );
	array_push( $column_content_classes, 'bg-' . $attributes['bgColor'] );

	if ( array_key_exists( 'centerContent', $attributes ) && $attributes['centerContent'] ) {
		array_push( $column_content_classes, 'd-flex' );
		array_push( $column_content_classes, 'flex-column' );
		array_push( $column_content_classes, 'justify-content-center' );
	}
}

if ( array_key_exists( 'padding', $attributes ) ) {
	array_push( $column_content_classes, $attributes['padding'] );
}

$classes = apply_filters( 'wp_bootstrap_blocks_column_classes', $classes, $attributes );
?>

<div class="<?php echo esc_attr( implode( ' ', $classes ) ); ?>">
		 <div <?php echo empty($column_content_classes) ? ' class="'.esc_attr( implode( ' ', $column_content_classes ) ).'"' : ''; ?>>
		<?php echo $content; // phpcs:ignore ?>
	</div>
</div>
