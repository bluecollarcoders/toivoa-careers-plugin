<?php
/**
 * Title: Career Query Loop
 * Slug:   toivoa-careers/career-query-loop
 * Categories: featured
 * Block Types: core/image, core/columns
 *
 * @package Toivoa_Careers
 * @since   1.0.0
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"margin":{"top":"0","bottom":"0"},"padding":{"top":"var:preset|spacing|x-large","bottom":"var:preset|spacing|x-large"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group alignfull" style="margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--x-large);padding-bottom:var(--wp--preset--spacing--x-large)"><!-- wp:group {"align":"wide","layout":{"type":"constrained"}} -->
<div class="wp-block-group alignwide"><!-- wp:heading {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-secondary"}}},"typography":{"fontStyle":"normal","fontWeight":"800"}},"textColor":"custom-secondary"} -->
<h2 class="wp-block-heading has-text-align-center has-custom-secondary-color has-text-color has-link-color" style="font-style:normal;font-weight:800">Featured Careers </h2>
<!-- /wp:heading -->

<!-- wp:query {"queryId":22,"query":{"perPage":10,"pages":0,"offset":0,"postType":"job","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"parents":[],"format":[]}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","minimumColumnWidth":"12rem"},"boldblocks":{"grid":{"columns":{"lg":{"value":"none","inherit":null},"md":{"inherit":"lg"},"sm":{"inherit":null}},"gap":{"lg":{"value":{"row":"1rem","column":"1rem"},"inherit":null},"md":{"inherit":"lg"},"sm":{"inherit":"lg"}}},"layout":{"type":"responsiveGrid"}}} -->
<!-- wp:post-featured-image {"sizeSlug":"large"} /-->

<!-- wp:post-date /-->

<!-- wp:post-title {"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-secondary"}}},"typography":{"fontStyle":"normal","fontWeight":"800"}},"textColor":"custom-secondary"} /-->

<!-- wp:post-excerpt {"moreText":"","className":"is-style-excerpt-truncate-3","style":{"elements":{"link":{"color":{"text":"var:preset|color|custom-secondary"}}}},"textColor":"custom-secondary"} /-->

<!-- wp:read-more {"content":"See job post  \u003e ","style":{"elements":{"link":{"color":{"text":"var:preset|color|base"}}},"spacing":{"padding":{"top":"7px","bottom":"7px","left":"26px","right":"26px"}}},"backgroundColor":"custom-secondary","textColor":"base"} /-->
<!-- /wp:post-template -->

<!-- wp:query-pagination -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></section>
<!-- /wp:group -->
