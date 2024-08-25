<?php
//セキュリティのため、直接アクセスを防止
if ( ! defind('ABSPATH')){
    exit; // ABSPATHが定義されていない場合はスクリプトを終了
}

if ( ! function_exists('my_theme_setup')){
    function my_theme_setup(){
        //サポートする機能を追加
        add_theme_support('title-tag'); //タイトルタグを自動生成
        add_theme_support('custom-logo'); //カスタムロゴをサポート
        add_theme_support('post-thumbnails'); //投稿にアイキャッチ画像をサポート
        add_theme_support('html5',array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));
        add_theme_support( 'automatic-feed-links' ); // RSSフィードリンクを自動で追加
        add_theme_support( 'customize-selective-refresh-widgets' ); // ウィジェットの選択的リフレッシュをサポート
        add_theme_support( 'wp-block-styles' ); // ブロックエディタのスタイルをサポート
        add_theme_support( 'align-wide' ); // ブロックエディタの幅広ブロックをサポート

        // ナビゲーションメニューの登録
        register_nav_menus( array(
            'primary' => __( 'Primary Menu', 'mytheme' ),
            'footer'  => __( 'Footer Menu', 'mytheme' ),
        ));
    } 
}
add_action( 'after_setup_theme', 'my_theme_setup' );

// スクリプトとスタイルの読み込み
function my_theme_enqueue_scripts() {
    // テーマのメインスタイルシート
    wp_enqueue_style( 'my-theme-style', get_stylesheet_uri() );

    // カスタムJavaScriptファイルの読み込み
    wp_enqueue_script( 'my-theme-script', get_template_directory_uri() . '/js/main.js', array(), null, true );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_scripts' );

// ウィジェットエリアの登録
function my_theme_widgets_init() {
    register_sidebar( array(
        'name'          => __( 'Sidebar', 'mytheme' ),
        'id'            => 'sidebar-1',
        'description'   => __( 'Add widgets here to appear in your sidebar.', 'mytheme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar( array(
        'name'          => __( 'Footer', 'mytheme' ),
        'id'            => 'footer-1',
        'description'   => __( 'Add widgets here to appear in your footer.', 'mytheme' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));
}
add_action( 'widgets_init', 'my_theme_widgets_init' );

// カスタムロゴの設定
function my_theme_custom_logo_setup() {
    $defaults = array(
        'height'      => 400,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'my_theme_custom_logo_setup' );

//カスタム投稿タイプの追加 (必要に応じて)
function my_theme_custom_post_type() {
    register_post_type( 'product', array(
        'labels' => array(
            'name' => __( 'Products' ),
            'singular_name' => __( 'Product' )
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array( 'title', 'editor', 'thumbnail' ),
    ));
}
add_action( 'init', 'my_theme_custom_post_type' );

?>