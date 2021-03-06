<?php do_action( 'philosophy_category_page',single_term_title('',false)); ?>
<?php get_header(); ?>
<!-- s-content
================================================== -->
<section class="s-content">
    <div class="row narrow">
        <div class="col-full s-content__header" data-aos="fade-up">
            <h3><?php  _e('Translatable Text','philosophy') ?></h3>
            <h4><?php  _e('Lanugage Translate','philosophy') ?></h4>
            <?php echo apply_filters('philosophy_text','filter hook test','second param test'); ?>
	        <?php do_action('philosophy_before_category_title'); ?>
            <h1>Category: <?php single_cat_title(); ?></h1>
            <?php do_action('philosophy_after_category_title'); ?>
            <p class="lead"><?php echo category_description(); ?></p>
	        <?php do_action('philosophy_after_category_description'); ?>
        </div>
    </div>

	<div class="row masonry-wrap">
		<div class="masonry">

			<div class="grid-sizer"></div>
            <?php
                if(! have_posts()):
                    ?>
                    <h5><?php _e('There is no post in this category','philosophy'); ?></h5>

                    <?php endif; ?>

            <?php
            while(have_posts()){
                the_post();
                get_template_part("template-parts/post-formats/post",get_post_format());
            }
            ?>


		</div> <!-- end masonry -->
	</div> <!-- end masonry-wrap -->

	<div class="row">
		<div class="col-full">
			<nav class="pgn">
				<?php philosophy_pagination(); ?>
			</nav>
		</div>
	</div>

</section> <!-- s-content -->

<?php get_footer(); ?>