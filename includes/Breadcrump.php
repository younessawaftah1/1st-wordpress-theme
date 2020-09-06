<?php
    $all_cats = get_the_category();

?>

<div class="breadcrumb-holder">
    <div class="container">
        <ol class="breadcrumb">
        <li>
            <a href="<?php get_home_utl()  ?>"><?php echo get_bloginfo('name') ?></a>
    </li>
    <li>
            <a href="<?php echo esc_url(get_category_link($all_cats(0)->term_id)); ?>">
            <?php echo esc_html($all_cats(0)->name )?>
            </a>
    </li>
    <li class="active">
            <?php echo get_the_title(); ?>
    </li>
    
        </ol>
    </div>
</div>