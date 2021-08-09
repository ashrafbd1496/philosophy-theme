<?php
/**
 * Template Name: Tax Query Example
 */

$philosophy_query_args = array(
	'post_type'=>'book',
	'post_per_page'=>-1,
	'tax_query'=>array(
		'relation'=>'AND',
		array(
			'taxonomy'=>'language',
			'field'=>'slug',
			'terms'=>['english'],
		),
		array(
			'taxonomy'=>'language',
			'field'=>'slug',
			'terms'=>['bangla'],
			'operator'=>'NOT IN'
		)
	),
);

$philosophy_query_posts = New WP_Query($philosophy_query_args);
while ($philosophy_query_posts->have_posts()){
	$philosophy_query_posts->the_post();
	the_title();
	echo '<br/>';
}
wp_reset_query();