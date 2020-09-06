<?php get_header();?>

<div class="container home-page how-to-be-healthy-category">
        <div class="row">
         <div class="category-information text-center">
            <h1 class="category-title"> <?php single_cat_title(); ?> </h1> 
            <p class="category-description"> <?php echo category_description(); ?></p>
         
             <div class="clearfix"></div>
    <div class="col-md-9">
    <?php
        //check if you have posts
        if (have_posts()){
            while (have_posts()){//looping through the posts
                the_post();?>
                    <div class="main-post">
                        <div class="row">
                            <div class="col-md-6">
                            <?php the_post_thumbnail('thumbnail',['class' =>'img-responsive img-thumbnail',
                        'title'=> 'img' ]); ?>
                            </div>
                        <div class="col-md-6">
                        <h3 class="post-title">
                        <a href="<?php the_permalink();?>">
                        <?php the_title('<h3 class="post-title">', '</h3>');?>
                        </a>
                        </h3>
                        <span class="post-author"><i class="fa fa-user fa-fw fa-lg"></i>
                         <?php the_author_posts_link();?> </span>
                        <span class="post-date"><i class="fa fa-calendar fa-fw fa-lg"></i> 
                        <?php the_date('F j, Y'); ?> at <?php the_time('g:i a'); ?> </span>
                        <span class="post-comments"><i class="fa fa-comments-o fa-fw fa-lg"></i> 
                        <?php comments_popup_link('0 comments','1 comment','% comment','comments-class','no-comments');?></span>
                      
                        <hr>
                        <p class="categories">
                        <i class="fa fa-tags fa-fw fa-lg"></i>
                        <?php the_category(','); ?> 
                        <?php the_excerpt()?>

                            </div>
                        </div>





                        </p>
                        <p class="post-tag">
                            <?php //display the tags
                                if(has_tag()){
                                    the_tags();
                                }
                                else{
                                    echo 'Tags: There\'s no tag';}
                            ?>
                        </p>
                    </div> 
                <?php   
            }
        } ?>
        </div><!-- end col-md-9 -->

        <div class="col-md-3">
      
        </div>


        <?php
        echo "<div class='post-pagination'>";
       echo numbering_pagination();
       echo "</div>";   
          ?>

        </div>
</div>

<?php get_footer();?> 