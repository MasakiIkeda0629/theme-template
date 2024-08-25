<?php
get_header();
//ヘッダーの読み込み
?>

<main id="main" class="site-main">
    <!-- Hero Section -->
    <section class="hero">
        
    </section>

    <!-- Content Area -->
    <section class="content">
        <?php 
        if ( have_posts() ) :
            while ( have_posts() ) : the_post();
            // コンテンツテンプレートの呼び出し
            get_template_part( 'template-parts/content', get_post_format() );
        endwhile;
        
        // ページネーション
        the_posts_navigation();
        
        else :
            // 投稿がない場合のテンプレート
            get_template_part( 'template-parts/content', 'none' );
        endif;
        ?>
        
        <?php get_sidebar();
        //サイドバーの読み込み
        ?>

    </section>
</main>

<?php
get_footer();
//フッターの読み込み
?>