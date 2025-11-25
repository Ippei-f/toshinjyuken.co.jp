<?php
//<meta charset="utf-8">
?>
<style>
	.top_lp_box_202503 {}

	.top_bnr_zeroyen_set {
		max-width: 800px;
		margin-top: min(50px, 5%);
		display: flex;
		flex-direction: column;
		align-items: center;
	}

	.top_lp_box_202503 .content_box {
		margin-top: 20px;
		padding: 60px 20px;
		background-color: #F9E796;
	}

	.top_sharing+.top_bnr_zeroyen_set {
		margin-top: min(80px, 8%);
	}

	.fontP150+.top_bnr_zeroyen_set {
		margin-top: min(70px, 7%);
	}

	.top_lp_box_202503 img[src*="sarani."],
	.top_bnr_zeroyen_set img[src*="sarani."] {
		width: 232px;
		max-width: 29%;
	}

	.top_bnr_zeroyen_set a {
		margin-top: 20px;
		width: 100%;
		background-image: url("<?php echo $data_param_lp_zeroyen['dir']; ?>bnr/top/bg-ami.png");
		background-position: center center;
		background-repeat: no-repeat;
		background-size: cover;
		box-shadow: 5px 5px 10px rgba(0, 0, 0, 0.25);
		position: relative;
		display: flex;
	}

	.top_bnr_zeroyen_set a::before {
		content: '';
		display: block;
		border: solid 5px #f5695a;
		box-sizing: border-box;
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		z-index: 3;
	}

	.top_lp_box_202503 .top_bnr_zeroyen_set a {
		margin-top: 0;
	}

	.top_bnr_zeroyen_set a>* {
		flex-grow: 1;
		display: flex;
	}

	.top_bnr_zeroyen_set a img {
		width: 100%;
	}

	.top_bnr_zeroyen_set a .p {
		width: calc(1% * 180 / 8);
		height: 100%;
		flex-direction: column;
		justify-content: space-between;
	}

	.top_bnr_zeroyen_set a .p>* {
		height: 100px;
		flex-grow: 1;
		overflow: hidden;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.top_bnr_zeroyen_set a .p img {
		height: 100%;
		object-fit: cover;
	}

	.top_bnr_zeroyen_set a .p img[src*="-L1."] {
		height: 170%;
	}

	.top_bnr_zeroyen_set a .p img[src*="-L3."] {
		height: 160%;
	}

	.top_bnr_zeroyen_set a .p img[src*="-R2."] {
		height: 190%;
		margin-top: -25%;
	}

	.top_bnr_zeroyen_set a .c {
		width: calc(1%* 440 / 8);
		z-index: 2;
	}

	@media screen and (min-width: 1000px) {}

	@media screen and (max-width: 999px) {
		.top_bnr_zeroyen_set {
			max-width: 800px;
		}

		.top_bnr_zeroyen_set a {
			margin-top: 2.5%;
		}

		.top_bnr_zeroyen_set a .p {
			position: absolute;
			width: 50%;
			top: 0;
		}

		.top_bnr_zeroyen_set a .p:first-child {
			left: 0;
		}

		.top_bnr_zeroyen_set a .p:last-child {
			right: 0;
		}

		.top_bnr_zeroyen_set a .c {
			width: 100%;
			background-color: rgba(0, 0, 0, 0.3);
		}
	}

	.top_lp_box_202503 .top_movie .set {
		padding-top: 60px;
	}

	.top_lp_box_202503 h4 {
		font-size: 30px;
		font-weight: 700;
		line-height: 1em;
		margin-bottom: 1em;
		color: #004ea3;
	}
</style>
<?php
function LOCAL_BNR_ZEROYEN_IMG($data)
{
	global $data_param_lp_zeroyen;
	$str = '';
	$dir = $data_param_lp_zeroyen['dir'];
	foreach ($data as $v) {
		$str .= '<div><img src="' . $dir . 'img/' . $v . '"></div>' . PHP_EOL;
	}
	return $str;
}
function LOCAL_BNR_ZEROYEN($type = '')
{
	global $link_list, $data_param_lp_zeroyen;
	$dir = $data_param_lp_zeroyen['dir'];
	$add = ($type != 'first') ? '<img src="' . $dir . 'bnr/top/sarani.svg">' : '';
	$bnr = !isset($data_param_lp_zeroyen['type_hiraya']) ? $dir . 'bnr/top/bnr-zeroyen' : 'lp-harforder/bnr/halforder';
	$url = !isset($data_param_lp_zeroyen['type_hiraya']) ? 'lp-zeroyen/' : 'lp-harforder/';
	return '<div class="top_bnr_zeroyen_set Wbase">
' . $add . '
<a href="' . $url . '" target="_blank">
<div class="p">
' . LOCAL_BNR_ZEROYEN_IMG($data_param_lp_zeroyen['mainpic'][0]) . '
</div>
<div class="c vanish_branch">
<img src="' . $bnr . '-pc.png">
<img src="' . $bnr . '-sp.png">
</div>
<div class="p">
' . LOCAL_BNR_ZEROYEN_IMG($data_param_lp_zeroyen['mainpic'][1]) . '
</div>
</a>
</div>' . chr(10);
}
?>
<div class="top_lp_box_202503">
	<div class="top_movie content_box">
		<?php
		if (!isset($data_param_lp_zeroyen['type_hiraya'])) {
			echo '<img src="' . $data_param_lp_zeroyen['dir'] . 'bnr/top/sarani.svg">' . PHP_EOL;
		}
		?>
		<?php echo LOCAL_BNR_ZEROYEN('first'); ?>
	</div>
</div>