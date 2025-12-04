<?php
// 画像取得
$img_url = (!empty($sysdata['main'][0]))
	? $sysdata['main'][0]
	: $kaisou . 'images/common/noimage.png';

// ★ 絶対パスで検索詳細へ（これで 404 にならない）
$detail_url = '/kodate/search-detail.php?id=' . $sysdata[0];

// 表示データ
$bukken_data['価格-万'] = ($bukken_data['価格-万'] !== '') ? number_format($bukken_data['価格-万']) : '-';
$traffic = isset($bukken_data['最寄駅']) ? $bukken_data['最寄駅'] : '';
$address = isset($bukken_data['所在地']) ? $bukken_data['所在地'] : '';

if (!isset($sysdata[22])) $sysdata[22] = 1;
$teishaku = ($sysdata[22] == 2) ? '【定期借地】' : '';
?>

<li class="PU__item">
	<div class="img">
		<img src="<?php echo $img_url; ?>" alt="">
	</div>

	<div class="txt">
		<h3 class="ttl"><?php echo $teishaku . htmlspecialchars($sysdata[2]); ?></h3>

		<dl>
			<dt>交通</dt>
			<dd><?php echo htmlspecialchars($traffic); ?></dd>

			<dt>所在地</dt>
			<dd><?php echo htmlspecialchars($address); ?></dd>
		</dl>

		<div class="price">
			<?php echo htmlspecialchars($bukken_data['価格-万']); ?>
			<small>万円（税込）</small>
		</div>
	</div>
</li>