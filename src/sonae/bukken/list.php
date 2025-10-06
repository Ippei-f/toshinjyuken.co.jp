<?php

$file = 'data.csv';
include 'data_all_disp.php';


foreach ($obj as $value){

//	echo "<pre>";
//	print_r($value);
//	echo "</pre>";

if ($value['表示'] == '表示' or $value['表示'] == '完売'){
		$price = number_format($value['価格'],2);
		$price = rtrim(rtrim($price,'0'),'.');
?>


<div class="c31<?php if($value['表示'] == '完売'){echo ' soldout';} ?>">
	<div><a href="../form_contact/form.html?bukken=<?php echo $value['フォルダ']; ?>">
		<h3><?php echo $value['物件名']; ?></h3>
		<p class="address">販売予定価格：<?php echo $value['価格']; ?></p>
		<div class="inBox">
			<div class="photo<?php if($value['パース'] == 'soon'){echo ' soon';} ?>"><img src="images/<?php echo $value['フォルダ']; ?>.jpg" /></div>
			<div class="summary">
				<p class="price"><span>年間予定収入</span><strong><?php echo $value['収入']; ?></strong></p>
				<p class="price"><span>予定利回り</span><strong><?php echo $value['利回り']; ?></strong></p>
			</div>
		</div>
		</a></div>
</div>


<?php
  }

}



?>
<?php

/**
 * ページングリストの作成
 *
 * @param unknown_type $current
 * @param unknown_type $total
 * @return unknown
 */
function displayPagedNoList($current,$total)
{
    if ($total == 1)
    {

        $str  = "";
        $str .= '<div id="pagination">';
        $str .= '<ul>';
        $str .= '<li>≪ 前へ</li>';
        $str .= '<li class="active">'.$current.' / '.$total.'</li>';
        $str .= '<li>次へ ≫</li>';
        $str .= '</ul>';
        $str .= '</div>';
    }
    else
    {
        $str  = "";
        $str .= '<div id="pagination">';
        $str .= '<ul>';

        if (1 < $current)
        {
            $str .= '<li><a href="?page='.($current-1).'">≪ 前へ</a></li>';
        }
        else
        {
            $str .= '<li>≪ 前へ</li>';
        }

        $str .= '<li class="active">'.$current.' / '.$total.'</li>';

        if ($current < $total)
        {
            $str .= '<li><a href="?page='.($current+1).'">次へ ≫</a></li>';
        }
        else
        {
            $str .= '<li>次へ ≫</li>';
        }

        $str .= '</ul>';
        $str .= '</div>';

    }

    return $str;

}
// ↑追加
?>
