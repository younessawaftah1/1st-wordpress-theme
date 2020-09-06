<?php get_header();?>
<div class="container home-page">
        <div class="row"> 
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
                        <span class="post-author"><i class="fa fa-user fa-fw fa-lg"></i>
                         <?php the_author_posts_link();?> </span>
                        <span class="post-date"><i class="fa fa-calendar fa-fw fa-lg"></i> 
                        <?php the_date('F j, Y'); ?> at <?php the_time('g:i a'); ?> </span>
                        <span class="post-comments"><i class="fa fa-comments-o fa-fw fa-lg"></i>
                         <?php comments_popup_link('0 comments','1 comment','% comment','comments-class','no-comments'); ?> </span>
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

        </div>
</div>

<?php get_footer();?>