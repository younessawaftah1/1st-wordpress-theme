<?php get_header();
  include (get_template_directory() . '/includes/Breadcrump.php');
?>
<div class="container post-page">       
    
    <?php
    
        //check if you have posts
        if (have_posts()){
            while (have_posts()){//looping through the posts
                    the_post();?>
                    <div class="main-post">
                        <?php edit_post_link('Edit <i class="fa fa-pencil"></i>'); ?>
                        <h3 class="post-title">
                            <a href="<?php the_permalink();?>">
                            <?php the_title('<h3 class="post-title">', '</h3>');?>
                            </a>
                        </h3>
                        <span class="post-author"><i class="fa fa-user fa-fw fa-lg"></i> <?php the_author_posts_link();?> </span>
                        <span class="post-date"><i class="fa fa-calendar fa-fw fa-lg"></i> <?php the_date('F j, Y'); ?> at <?php the_time('g:i a'); ?> </span>
                        <span class="post-comments"><i class="fa fa-comments-o fa-fw fa-lg"></i>
                        <?php comments_popup_link('0 comments','1 comment','% comment','comments-class','no-comments'); ?> </span>
                        <?php the_post_thumbnail('thumbnail',['class' =>'img-responsive img-thumbnail',
                        'title'=> 'img' ]); ?>
                        <div class="post-content">
                            <?php the_content();  ?>
                        <div>
                        <hr>
                        <p class="categories">
                        <i class="fa fa-tags fa-fw fa-lg"></i>
                        <?php the_category(','); ?> 
                       
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
        }
        
        echo "<div class='clearfix'></div>";
        
        //get_queried_object_id(); return id number of post
       //get categories id print_r (wp_get_post_categories( get_queried_object_id()));
        //same post category
        $random_posts_args= array(
            'posts_per_page' => 5,
            'orderby'        => 'rand',
            'category__in'   => wp_get_post_categories( get_queried_object_id()),
            'post__not_in'   => array(get_queried_object_id())
        );
         $random_posts = new WP_Query($random_posts_args);
         if ($random_posts -> have_posts()){
            while ($random_posts->have_posts()){//looping through the posts
                $random_posts->the_post();?>
                <div class="author-posts">  
                        <h3 class="post-title">
                            <a href="<?php the_permalink();?>">
                            <?php the_title();?>
                            </a>
                        </h3>
                    <hr>
                </div>    
                <?php
            }
        }
                ?>
      
        <?php
            $aargs=array(
                'class' => 'img-responsive img-thumbnail center-block'
            );//get_avatar(id|email, img_size, default,'alt-text',arrgs)
           echo get_avatar(get_the_author_meta('ID'),100,'','',$aargs);
        ?>
            <div class="col-md-9 author-info">
        <h4>
        <?php the_author_meta('first_name')?>
        <?php the_author_meta('last_name')?>
        ( <span class="nick-name"><?php the_author_meta('nickname')?></span>)
        <h4>
        <p class="lead">
        <?php
        
        if(get_the_author_meta('description')){
            the_author_meta('description');
        }
        else{
            echo " ";}
            ?>
        </p>
        </div>
       </div>
         <hr>
            <p class="author-states">
            Number of posts is: <span class="posts-count"><?php echo count_user_posts(get_the_author_meta('ID')) ?></span>  <br>            
            User profile link:<span class="upl"><?php the_author_posts_link(); ?></span> 
            </p>
        <?php

        echo "<div class='post-pagination'>";
        if(get_previous_post_link() ){//check if prev post is here
            previous_post_link('%link','%title'); 
        }
        else{
            echo "<span class='span-prev'>none</span>";
        }
        if(get_next_post_link() ){
            next_post_link('%link','%title'); 
        }
        
        else{
            echo "<span class='span-next'>none</span>  ";
        }
        echo "</div>";
        //display comments template
        comments_template();
    ?>
</div>

<?php get_footer();?>