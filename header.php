<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

    <meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>" charset="<?php bloginfo('charset'); ?>" />
    <meta name="author" content="<?php bloginfo('name'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">

</head>

<body <?php body_class(); ?>>

<?php
if (function_exists('wp_body_open')) {
    wp_body_open();
}
?>

<header class="header">
    <div class="title">
        <h1><?php echo 'Template Theme' ?></h1>
        <p class="about"><?php echo 'About' ?></p>
    </div>
    
</header>
