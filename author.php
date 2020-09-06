<?php get_header(); ?>
<div class="container author-page"> 
<h3 class="profile-header text-cneter"><?php the_author_meta('nickname')?></h3>
<div class="author-main-info">
        <div class="row">
            <div class="col-md-3">
            <?php
                    $aargs=array(
                        'class' => 'img-responsive img-thumbnail center-block'
                    );//get_avatar(id|email, img_size, default,'alt-text',arrgs)
                echo get_avatar(get_the_author_meta('ID'),100,'','',$aargs);
                ?>
                <?php
                //usage of WP_Query()
                // $apargs= array(
                //     'author' => (get_the_author_meta('ID'),
                //     'posts_per_page' =>
                // );
                // $author_posts=new W  P_Query($apargs);
                ?>
            </div>    
            <div class="col-md-9 info-style">
                <ul class="list-unstyled">
                    <li>First Name: <?php the_author_meta('first_name')?> </li>
                    <li>Last Name: <?php the_author_meta('last_name')?></li>
                    <li>Nickname: <?php the_author_meta('nickname')?></li>
                    </ul>
                </div>
                <hr>
                <p class="lead">
                <?php
                //bio
                if(get_the_author_meta('description')){
                    the_author_meta('description');
                }
                else{
                    echo "No biography about this author ";}
                    ?>
                </p>
                
            
            <div class="row author-stats" >
                <div class="">
                    <div class="stats">
                        Post Count:
                        <span><?php echo count_user_posts(get_the_author_meta('ID')); ?></span>
                     </div>
                </div>
                <div class="">
                    <div class="stats">
                        Comments Count:
                        <span><?php
                        $ccargs=array(
                           'user_id' =>get_the_author_meta('ID'),
                           'count' => true
                        );
                         echo get_comments($ccargs); ?></span>
                     </div>
                     <div class="">
                    <div class="stats">
                        Total Posts Count:
                         <span></span>
                     </div>
                </div>
                </div>
                <?php
                
                ?>
            </div>
            
        </div>
    </div>
    <div class="row">
    <?php
        $apargs= array(
            'author'         => (get_the_author_meta('ID')),
            'posts_per_page' => 2
        );
         $author_posts = new WP_Query($apargs);
         if ($author_posts -> have_posts()){?>

               <h3><?php the_author_meta('nickname');?> Posts</h3>
             <?php
            while ($author_posts->have_posts()){//looping through the posts
                $author_posts->the_post();?>
                <div class="author-posts">
               <div class="col-sm-3">
               <?php the_post_thumbnail('thumbnail',['class' =>'img-responsive img-thumbnail',
                        'title'=> 'img' ]); ?>
                </div>
                <div class="col-sm-9">
                        <?php edit_post_link('Edit <i class="fa fa-pencil"></i>'); ?>
                        <h3 class="post-title">
                            <a href="<?php the_permalink();?>">
                            <?php the_title('<h3 class="post-title">', '</h3>');?>
                            </a>
                        </h3>
                        <span class="post-date"><i class="fa fa-calendar fa-fw fa-lg"></i> <?php the_date('F j, Y'); ?> at <?php the_time('g:i a'); ?> </span>
                        <span class="post-comments"><i class="fa fa-comments-o fa-fw fa-lg"></i> <?php comments_popup_link('0 comments','1 comment','% comment','comments-class','no-comments'); ?> </span>
                        
                        <div class="post-content">
                            <?php the_excerpt();  ?>
                        <div>
                 </div>
            </div>
            <div class="clearfix"></div>
                <?php   
            }
        }
           
    ?>
    </div>
</div>   
<?php get_footer();?>