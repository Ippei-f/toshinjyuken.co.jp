<table width="100%" class="waku_bukken">
	<tr>
		<th align="center" nowrap="nowrap">建物タイプ</th>
		<td width="20"><?php echo $obj['タイプ']; ?></td>
	</tr>
	<tr>
		<th width="20%" align="center" nowrap>所在地</th>
		<td><?php echo $obj['所在地1']; ?><?php echo $obj['所在地2']; ?></td>
	</tr>
	<tr>
		<th align="center" nowrap>交通</th>
		<td><?php echo $obj['交通']; ?></td>
	</tr>
	<tr>
		<th align="center" nowrap>建物面積</th>
		<td><?php echo $obj['建物面積']; ?></td>
	</tr>
	<tr>
		<th align="center" nowrap>構造</th>
		<td><?php echo $obj['構造']; ?></td>
	</tr>
	<tr>
		<th align="center" nowrap>間取り</th>
		<td><?php echo $obj['間取り']; ?></td>
	</tr>
	<tr>
		<th align="center" nowrap>竣工</th>
		<td><?php echo $obj['竣工日']; ?></td>
	</tr>
	<tr>
		<th align="center" nowrap>土地面積</th>
		<td><?php echo $obj['土地面積']; ?></td>
	</tr>
	<tr>
		<th align="center" nowrap>土地権利</th>
		<td><?php echo $obj['土地権利']; ?></td>
	</tr>
	<tr>
		<th align="center" nowrap>地目</th>
		<td><?php echo $obj['地目']; ?></td>
	</tr>
	<tr>
		<th align="center" nowrap>都市計画</th>
		<td><?php echo $obj['都市計画']; ?></td>
	</tr>
	<tr>
		<th align="center" nowrap>用途地域</th>
		<td><?php echo $obj['用途地域']; ?></td>
	</tr>
	<tr>
		<th align="center" nowrap>建ぺい率</th>
		<td><?php echo $obj['建ぺい率']; ?></td>
	</tr>
	<tr>
		<th align="center" nowrap>容積率</th>
		<td><?php echo $obj['容積率']; ?></td>
	</tr>
	<tr>
		<th align="center" nowrap>接道方向</th>
		<td><?php echo $obj['接道方向']; ?></td>
	</tr>
	<tr>
		<th align="center" nowrap>接道幅員</th>
		<td><?php echo $obj['接道幅員']; ?></td>
	</tr>
	<tr>
		<th align="center" nowrap>ガス</th>
		<td><?php echo $obj['ガス']; ?></td>
	</tr>
	<tr>
		<th align="center" nowrap>水道</th>
		<td><?php echo $obj['水道']; ?></td>
	</tr>
	<tr>
		<th align="center" nowrap>汚水</th>
		<td><?php echo $obj['汚水']; ?></td>
	</tr>
	<tr>
		<th align="center" nowrap>現況</th>
		<td><?php echo $obj['現況']; ?></td>
	</tr>
	<tr>
		<th align="center" nowrap>引渡</th>
		<td><?php echo $obj['引渡']; ?></td>
	</tr>
	<tr>
		<th align="center" nowrap>掲載／更新日</th>
		<td><?php echo $obj['掲載日']; ?></td>
	</tr>
	<tr>
		<th align="center" nowrap>備考</th>
		<td><?php echo $obj['備考']; ?></td>
	</tr>
</table>
<ul class="text_small appeal_color">
	<li class="attentionList">※掲載にあたっては万全を期しておりますが、当該情報と当該不動産物件の現況が異なる場合には現況を優先させていただきます。</li>
</ul>

<?php
if($obj['表示'] == '非表示' or $obj['表示'] == '完売'){
	echo '<script>';
	echo '$(function (){document.getElementById("bukkenBox").innerHTML = "<p>この物件は、情報公開期間を終了いたしました。</p>"});';
	echo '</script>';
}
?>


