<!--{*
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
 *}-->

<div id="undercolumn">
	<div id="undercolumn_entry">
	
		<ol class="breadcrumb">
				<li><a href="<!--{$smarty.const.TOP_URL}-->">トップ</a></li>
				<li class="active"><!--{$tpl_title|h}--></li>
		</ol>

		<h2 class="cat_title"><!--{$tpl_title|h}--></h2>
		
		<div id="complete_area">
			<p class="message">本登録が完了いたしました。<br />
					それではショッピングをお楽しみください。</p>

			<p>今後ともご愛顧賜りますようよろしくお願い申し上げます。</p>

			<div class="shop_information">
				<table class="table table-bordered" summary="お問い合わせ">
					<col width="30%" />
					<col width="70%" />
					<!--{if $arrSiteInfo.company_name !=""}-->
						<tr>
								<th>会社名</th>
								<td><!--{$arrSiteInfo.company_name|h}--></td>
						</tr>
					<!--{/if}-->
					<tr>
						<th>TEL</th>
						<td><!--{$arrSiteInfo.tel01}-->-<!--{$arrSiteInfo.tel02}-->-<!--{$arrSiteInfo.tel03}-->
								<!--{if $arrSiteInfo.business_hour != ""}-->
								(受付時間/<!--{$arrSiteInfo.business_hour}-->)
								<!--{/if}-->
						</td>
					</tr>
					<tr>
						<th>Email</th>
						<td><a href="mailto:<!--{$arrSiteInfo.email02|escape:'hex'}-->"><!--{$arrSiteInfo.email02|escape:'hexentity'}--></a></td>
					</tr>
				</table>
			</div>

			<div class="btn_area">
				<ul class="list-inline">
					<li>
						<a href="<!--{$smarty.const.TOP_URL}-->" class="btn btn-default">トップページへ</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
