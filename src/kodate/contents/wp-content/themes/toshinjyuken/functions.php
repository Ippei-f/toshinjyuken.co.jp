<?php


//wysiwygでspanタグが消えるのを防ぐ
add_filter('tiny_mce_before_init', 'tinymce_init');
function tinymce_init($init)
{
    $init['verify_html'] = false;
    return $init;
}

// アイキャッチ画像を利用できるようにする
add_theme_support('post-thumbnails');

// アイキャッチ画像のsrcsetを削除する
add_filter('wp_calculate_image_srcset_meta', '__return_null');


// 管理画面サイドバーメニュー非表示 
function remove_menus()
{
    if (!current_user_can('level_10')) { //level10以下のユーザーの場合メニューをunsetする
        remove_menu_page('wpcf7');   //Contact Form 7
        remove_menu_page('edit.php?post_type=mw-wp-form'); //MW-WP-Form     
        remove_menu_page('edit.php?post_type=page');  // 固定ページ
        global $menu;
        unset($menu[2]); //ダッシュボード
        unset($menu[4]); //メニューの線1
        unset($menu[15]); //リンク
        unset($menu[25]); //コメント
        unset($menu[59]); //メニューの線2
        unset($menu[60]); //テーマ
        unset($menu[65]); //プラグイン
        unset($menu[70]); //プロフィール
        unset($menu[75]); //ツール
        unset($menu[80]); //設定
        unset($menu[90]); //メニューの線3
    }
}
add_action('admin_menu', 'remove_menus');


/* 【管理画面】投稿編集画面で不要な項目を非表示にする */
function my_remove_meta_boxes()
{
    if (!current_user_can('level_10')) { //level10以下のユーザーの場合メニューをunsetする
        remove_meta_box('tagsdiv-post_tag', 'post', 'normal'); // タグ
    }
}
add_action('admin_menu', 'my_remove_meta_boxes');

/* 【管理画面】投稿編集画面で不要な項目を非表示にする */
function plt_hide_autoptimize_metaboxes()
{
    if (!current_user_can('level_10')) { //level10以下のユーザーの場合メニューをunsetする
        $screen = get_current_screen();
        if (!$screen) {
            return;
        }

        //Hide the "Autoptimize this page" meta box.
        remove_meta_box('ao_metabox', $screen->id, 'side');
    }
}

add_action('add_meta_boxes', 'plt_hide_autoptimize_metaboxes', 20);


/* 投稿アーカイブを有効化し任意のスラッグで表示する */
function post_has_archive($args, $post_type)
{
    if ('post' == $post_type) {
        $args['rewrite'] = true;
        $args['has_archive'] = 'gallery';
        $args['labels'] = array(
            'name' => '施工例'
        );
    }
    return $args;
}
add_filter('register_post_type_args', 'post_has_archive', 10, 2);



//All in One SEO がタイトル反映しない問題（WordPress 6.9）対応
add_action('after_setup_theme', function () {
    add_theme_support('title-tag');
});
