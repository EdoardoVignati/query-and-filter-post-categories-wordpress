<?php
function query_and_filter_post_categories($attr){
	global $post;
 	$args = shortcode_atts( array(
            "query" => "",
            "filters" => array(),
        ), $attr);
 
 	$category = get_category_by_slug($args["query"]);
 	$filters = explode(",",$args["filters"]);
 
 
	$out = "<div class='accordion' id='accordionPosts'>";
		
		foreach($filters as $filter){
			$catfilter = get_category_by_slug($filter);
			$query = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'category__and' => array($catfilter->term_id,$category->term_id),
				'posts_per_page' => 500,
			);
			$filtered_posts = get_posts($query);
			if(sizeof($filtered_posts)==0)
				continue;
			$out.="<div class='accordion-item'>
				<h2 class='accordion-header' id='heading$filter'>
					<button class='accordion-button collapsed' type='button' data-bs-toggle='collapse' data-bs-target='#collapse$filter' aria-expanded='false' aria-controls='collapse$filter'>
						" . get_cat_name($catfilter->term_id) . " (" . sizeof($filtered_posts) . ")
					</button>
				</h2>
				<div id='collapse$filter' class='accordion-collapse collapse' aria-labelledby='heading$filter' data-bs-parent='#accordionPosts'>
					<div class='accordion-body'>";
						$query = array(
							'post_type' => 'post',
							'post_status' => 'publish',
							'category__and' => array($catfilter->term_id,$category->term_id),
							'posts_per_page' => 500,
						);
						$out .= "<div class='list-group'>";
							foreach($filtered_posts as $post){
								$out .= "<a class='list-group-item list-group-item-action' href='#'>";
									$out .= get_the_title($post->ID);
								$out .= "</a>";
							}
						$out .= "</div>";

					$out.="</div>
				</div>
			</div>";
		}
	$out .= "</div>";
 
 
    return $out;
}
add_shortcode("query_and_filter_post_categories","query_and_filter_post_categories");
?>
