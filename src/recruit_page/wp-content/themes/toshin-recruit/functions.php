<?php

// ヘッダー不要タグ削除 
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head', 'feed_links_extra', 3);


// 投稿名変更
function change_post_menu_label() {
  global $menu;
  global $submenu;
  $menu[5][0] = 'お知らせ';
  $submenu['edit.php'][5][0] = 'お知らせ一覧';
  $submenu['edit.php'][10][0] = '新しいお知らせを投稿';
  $submenu['edit.php'][16][0] = 'タグ';
}

function change_post_object_label() {
  global $wp_post_types;
  $labels = &$wp_post_types['post']->labels;
  $labels->name = 'お知らせ';
  $labels->singular_name = 'お知らせ';
  $labels->add_new = _x('追加', 'お知らせ');
  $labels->add_new_item = 'お知らせの新規追加';
  $labels->edit_item = 'お知らせの編集';
  $labels->new_item = 'お知らせ';
  $labels->view_item = 'お知らせを表示';
  $labels->search_items = 'お知らせを検索';
  $labels->not_found = '記事が見つかりませんでした';
  $labels->not_found_in_trash = 'ゴミ箱に記事は見つかりませんでした';
}
add_action( 'init', 'change_post_object_label' );
add_action( 'admin_menu', 'change_post_menu_label' );

// サイトURLショートコード
add_shortcode('home_url', 'shortcode_hurl');
function shortcode_hurl() {
return home_url();
}

// テンプレートリンクショートコード
add_shortcode('gtdu', 'shortcode_gtdu');
function shortcode_gtdu() {
return get_template_directory_uri();
}

//　アイキャッチ画像の有効化
add_theme_support( 'post-thumbnails' );

// アーカイブ表示変更
function my_archives_link($html){
  $html = str_replace('年','.',$html);
  $html = str_replace('月','',$html);
  return $html;
}
add_filter('get_archives_link', 'my_archives_link');


//フォームバリデーション お問い合わせ
//function add_mwform_validation_rule01( $Validation, $data ) {
//    $validation_message = 'いずれかの項目が未入力です。';
//    if ( empty( $data['姓'] ) ) {
//        $Validation->set_rule( '姓', 'noempty', array( 'message' => $validation_message ) );
//    } elseif ( empty( $data['名'] ) ) {
//        $Validation->set_rule( '名', 'noempty', array( 'message' => $validation_message ) );
//    }
//  if ( empty( $data['セイ'] ) ) {
//        $Validation->set_rule( 'セイ', 'noempty', array( 'message' => $validation_message ) );
//    } elseif ( empty( $data['メイ'] ) ) {
//        $Validation->set_rule( 'メイ', 'noempty', array( 'message' => $validation_message ) );
//    } 
//    return $Validation;
//}
//add_filter( 'mwform_validation_mw-wp-form-46', 'add_mwform_validation_rule01', 10, 2 );


//フォーム
function mvwpform_autop_filter() {
  if (class_exists('MW_WP_Form_Admin')) {
    $mw_wp_form_admin = new MW_WP_Form_Admin();
    $forms = $mw_wp_form_admin->get_forms();
    foreach ($forms as $form) {
      add_filter('mwform_content_wpautop_mw-wp-form-' . $form->ID, '__return_false');
    }
  }
}
mvwpform_autop_filter();

//ショートコード・入社年数
function SC_NYUUSHA($atts){
	//implode('',$atts)
	$n=date('Ymd')-intval($atts[0].'0909');
	$n=floor($n/10000);
	if($n<1){$n=1;}
	return $n;
}
add_shortcode('nyuusha','SC_NYUUSHA');
function SC_AUTO_BR($prm=array(),$t=''){	
	return nl2br($t);
}
add_shortcode('auto_br','SC_AUTO_BR');
?>
