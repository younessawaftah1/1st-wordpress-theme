<?php
//number of comments 
   
 
    //if comments are open
    if(comments_open()){ ?>
     <h4><?php comments_number('0 comments' ,'1 comment', '% comments') ?> </h4>
     <?php
        echo "<ul class='list-unstyled comments-list'>";
        $cargs = array(
            'walker'            => null,
            'max_depth'         => 3,
            'style'             => 'ul',
            'callback'          => null,
            'end-callback'      => null,
            'type'              => 'all',
            'page'              => 'i07',
            'per_page'          => '',
            'avatar_size'       => 50,
            'reverse_top_level' => null,
            'reverse_children'  => '',
            'format'            => 'html5', // or 'xhtml' if no 'HTML5' theme support
            'short_ping'        => false,   // @since 3.6
            'echo'              => true     // boolean, default is true
        );//display the comments   
        wp_list_comments($cargs);
        echo "</ul>";    
    }

    else{
        echo "No  comments";
    }
    $a =array(
        'title_reply'  =>'Add a reply comment',
        'title_reply_to' =>'Reply to %s ' ,
        'label_submit' => 'Write your comment',
        'class_submit' => 'btn btn-primary'
    );
     comment_form($a);
     ?>
             
          