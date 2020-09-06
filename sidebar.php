<?php
//category comment count
$com_args=array(
  'status' => 'approve' //only approved comments
);
$commets_count = 0;//count number of comments
$all_comments= get_comments($com_args);
    foreach($all_comments as $comment){
        $post_id=$comment->comment_post_ID;//get post id
        if(! in_category('Team',$post_id)){//check if post not in the same categoty
            continue;
        }
        $all_comments++;
    }
?>
<?php
//get categeory posts count
   // print_r(get_queried_object());
    $cat=get_queried_object();//get full object properties
    $posts_count=$cat ->count;//get posts count
?>
<div class="main-sidebar">
<div class="widget">
<h3 class="widget-title"><?php single_cat_title(); ?> Page Statistics </h3>
<div class="widget-content">
    <ul class="gh">
        <li>
            <span> Comments Count </span> <?php echo $commets_count ?>
        </li>
        <li>
        <span> Posts Count </span> <?php echo $posts_count ?>
        </li>
    </ul>
</div>
</div>
</div>
<div class="main-sidebar">
<div class="widget">
<h3 class="widget-title"> Latest <?php echo single_cat_title(); ?> Posts </h3>
<div class="widget-content">
    <ul class="gh">
        <?php
            $posts_argss=array(
                'post_per_page'=>2,
                'cat'  => 68
            );
            $query=new WP_Query($posts_argss);
            if($query -> have_posts()){
            while ($query -> have_posts()){
                $query -> the_posts()?>
                <li>
                    <a target="_blank" href="<?php the_permalink() ?>"><?php the_title()?>
                </a> 
            </li>
        <?php    
        wp_reset_postdata();
        }
        wp_reset_postdata();
    }else{echo "There is no link here";}

        ?>
</ul>
</div>
</div>
</div>
<div class="main-sidebar">
<div class="widget">
<h3 class="widget-title"> Hot posts By Number Of Comments </h3>
<div class="widget-content">
<!-- <ul class="gh"> to get the hot posts
        <?php
            $hot_posts_argss=array(
                'posts_per_page'  => 1,
                'orderby'  => 'comment_count'
            );
            $hot_posts_query= new WP_Query($hot_posts_argss);
            if($hot_posts_query -> have_posts()){
             while ($hot_posts_query -> have_posts()){
                $hot_posts_query -> the_posts();?>
                <li>
                    <a target="_blank" href="<?php the_permalink() ?>"><?php the_title()?> </a>               
                </li>
                <hr>
                <?php comments_popup_link('0 comments','1 comment','% comment','comments-class','no-comments'); ?> </span>

        <?php    
            }
        wp_reset_postdata();
    }
        ?>
</ul> -->
</div>
</div>
</div>

<?php 
