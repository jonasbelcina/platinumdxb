<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */
?>
<?php 
global $wp_query,$woocommerce_loop;
$columns = isset($woocommerce_loop['columns']) ? ' columns-'.absint($woocommerce_loop['columns']):'';
$data_columns = isset($woocommerce_loop['columns']) ? absint($woocommerce_loop['columns']):'';
?>
<ul class="products<?php echo esc_attr($columns)?>" data-columns="<?php echo esc_attr($data_columns)?>" <?php echo (is_shop() || is_product_taxonomy() ? ' data-maxpage="'.absint($wp_query->max_num_pages).'"':'')?>>