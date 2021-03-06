<?php get_header();?>
<div class="container home-page">
        <div class="row">
         <div class="category-information text-center">
            <h1 class="category-title"> <?php single_cat_title(); ?> </h1> 
            <p class="category-description"> <?php echo category_description(); ?></p>
         <div> 
             <!-- <div class="cat-stats">
                 <span>Articals Count: </span>
                 <span>Comments Count:</span>
             </div>  -->
    <?php
        //check if you have posts
        if (have_posts()){
            while (have_posts()){//looping through the posts
                the_post();?>
                <div class="col-sm-6">
                    <div class="main-post">
                        <h3 class="post-title">
                            <a href="<?php the_permalink();?>">
                            <?php the_title('<h3 class="post-title">', '</h3>');?>
                            </a>
                        </h3>
                        <span class="post-author"><i class="fa fa-user fa-fw fa-lg"></i> <?php the_author_posts_link();?> </span>
                        <span class="post-date"><i class="fa fa-calendar fa-fw fa-lg"></i> <?php the_date('F j, Y'); ?> at <?php the_time('g:i a'); ?> </span>
                        <span class="post-comments"><i class="fa fa-comments-o fa-fw fa-lg"></i> <?php comments_popup_link('0 comments','1 comment','% comment','comments-class','no-comments'); ?> </span>
                        <?php the_post_thumbnail('thumbnail',['class' =>'img-responsive img-thumbnail',
                        'title'=> 'img' ]); ?>
                        <hr>
                        
                        <p class="categories">
                        <i class="fa fa-tags fa-fw fa-lg"></i>
                        <?php the_category(','); ?> 
                        <?php the_excerpt()?>
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
            </div> 
                <?php   
            }
        }
        get_sidebar(); 
        // echo "<div class='clearfix'></div>";
        // echo "<div class='post-pagination'>";
        // if(get_previous_posts_link() ){
        //     previous_posts_link('Prev'); 
        // }
        // else{
        //     echo "<span class='span-prev'>Prev</span>";
        // }
        // if(get_next_posts_link() ){
        //     next_posts_link('Next'); 
        // }
        
        // else{
        //     echo "<span class='span-next'>Next</span>  ";
        // }
        // echo "</div>";
        echo "<div class='post-pagination'>";
       echo numbering_pagination();
       echo "</div>";   
    ?>
      <div class="col-md-3">
        <?php //add side bar to healthy-humans page
        
            // if (is_active_sidebar('main-sidebar')){
            //     dynamic_sidebar('main-sidebar');
            // }
           
                
           //get_sidebar('PAGE'); when you create custom sidebar for specific page 
           //call sidebar either (default of wordpress| sidebar.php )
           
        ?>
        </div>

        </div>
</div>

<?php get_footer();?> 