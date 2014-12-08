<!--{*
/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) 2000-2013 LOCKON CO.,LTD. All Rights Reserved.
 *
 * http://www.lockon.co.jp/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */
*}-->
<!--{include file="`$smarty.const.TEMPLATE_REALDIR`popup_header.tpl" subtitle="新しいお届け先の追加・変更"}-->

<div id="window_area" class="container">

  <div id="undercolumn_entry">

	<h2 class="cat_title"><!--{$tpl_title|h}--></h2>
	<p>下記項目にご入力ください。「<span class="attention">※</span>」印は入力必須項目です。<br />
		入力後、一番下の「登録する」ボタンをクリックしてください。</p>

	<form class="form-inline" name="form1" id="form1" method="post" action="?" onsubmit="return false;">
		<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
		<input type="hidden" name="mode" value="edit" />
		<input type="hidden" name="other_deliv_id" value="<!--{$smarty.session.other_deliv_id|h}-->" />
		<input type="hidden" name="ParentPage" value="<!--{$ParentPage}-->" />

		<table class="table table-bordered" summary="お届け先登録">
			<!--{include file="`$smarty.const.TEMPLATE_REALDIR`frontparts/form_personal_input.tpl" flgFields=2 emailMobile=false prefix=""}-->
		</table>
		<div class="btn_area">
			<ul class="list-inline">
				<li>
					<a class="btn btn-default" href="javascript:" onclick="eccube.setValueAndSubmit('form1', 'mode', 'edit'); return false;">登録する</a>
				</li>
			</ul>
		</div>
	</form>
  </div>
</div>

<!--{include file="`$smarty.const.TEMPLATE_REALDIR`popup_footer.tpl"}-->
