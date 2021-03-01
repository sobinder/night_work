<?php

/**
 * Import Woocommerce Products
 */
class DN_Import_Products
{
	
	function __construct()
	{
		// Export
		add_filter( 'woocommerce_product_export_column_names', [$this, 'add_columns'] );
		add_filter( 'woocommerce_product_export_product_default_columns', [$this, 'add_columns'] );
		add_filter( 'woocommerce_product_export_product_column_berocket_brand', [$this, 'export_berocket_brand_taxonomy'], 10, 2 );
		add_filter( 'woocommerce_product_export_product_column_berocket_series', [$this, 'export_berocket_series_taxonomy'], 10, 2 );

		// Import
		add_filter( 'woocommerce_csv_product_import_mapping_options', [$this, 'add_columns'] );
		add_filter( 'woocommerce_csv_product_import_mapping_default_columns', [$this, 'add_column_to_mapping_screen'] );
		add_filter( 'woocommerce_product_import_pre_insert_product_object', [$this, 'process_import'], 10, 2 );
	}

	public function add_columns( $columns )
	{
		$columns[ 'berocket_brand' ] = __( 'Brands' );
		$columns[ 'berocket_series' ] = __( 'Series' );
		return $columns;
	}

	public function add_column_to_mapping_screen($columns)
	{
		// potential column name => column slug
		$columns['Brands'] = 'berocket_brand';
		$columns['Series'] = 'berocket_series';

		return $columns;
	}

	public function export_berocket_brand_taxonomy($value, $product)
	{
		$terms = get_terms( array( 'object_ids' => $product->get_ID(), 'taxonomy' => 'berocket_brand' ) );

		if ( ! is_wp_error( $terms ) ) {

			$data = array();

			foreach ( (array) $terms as $term ) {
				$data[] = $term->name;
			}

			$value = implode(', ', $data);

		}

		return $value;
	}

	public function export_berocket_series_taxonomy($value, $product)
	{
		$terms = get_terms( array( 'object_ids' => $product->get_ID(), 'taxonomy' => 'berocket_series' ) );

		if ( ! is_wp_error( $terms ) ) {

			$data = array();

			foreach ( (array) $terms as $term ) {
				$data[] = $term->name;
			}

			$value = implode(', ', $data);

		}

		return $value;
	}

	public function process_import( $object, $data ) {

		if ( is_a( $object, 'WC_Product' ) ) {

			if( ! empty( $data[ 'berocket_brand' ] ) ) {
				wp_set_object_terms( $object->get_id(),  (array) $data[ 'berocket_brand' ], 'berocket_brand' );
			}

			if( ! empty( $data[ 'berocket_series' ] ) ) {
				wp_set_object_terms( $object->get_id(),  (array) $data[ 'berocket_series' ], 'berocket_series' );
			}

		}

		return $object;
	}
}

$class = new DN_Import_Products();