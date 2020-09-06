<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    <?php wp_title('/','true','right');?>  
    <?php bloginfo('name');?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url');?>"/>
    <?php wp_head();?>

</head>
<body>
<nav class="navbar navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php bloginfo('url')?>"><?php bloginfo('name')?></a>
  <?php display_menu();?>
  <button class="navbar-toggler" type="button" data-toggle="collapse" 
  data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
  </div>
</nav>