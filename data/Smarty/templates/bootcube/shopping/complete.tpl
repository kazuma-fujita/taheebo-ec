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
	<div id="undercolumn_shopping">
		<p class="flow_area">
			<img src="<!--{$TPL_URLPATH}-->img/picture/img_flow_04.jpg" class="img-responsive" alt="購入手続きの流れ" />
		</p>
		<h2 class="title"><!--{$tpl_title|h}--></h2>

		<!-- ▼その他決済情報を表示する場合は表示 -->
		<!--{if $arrOther.title.value}-->
			<p><span class="attention">■<!--{$arrOther.title.name}-->情報</span><br />
				<!--{foreach key=key item=item from=$arrOther}-->
					<!--{if $key != "title"}-->
						<!--{if $item.name != ""}-->
							<!--{$item.name}-->：
						<!--{/if}-->
							<!--{$item.value|nl2br}--><br />
					<!--{/if}-->
				<!--{/foreach}-->
			</p>
		<!--{/if}-->
		<!-- ▲コンビに決済の場合には表示 -->

		<div id="complete_area">
			<p class="message"><!--{$arrInfo.shop_name|h}-->の商品をご購入いただき、ありがとうございました。</p>
			<p>ただいま、ご注文の確認メールをお送りさせていただきました。<br />
				万一、ご確認メールが届かない場合は、トラブルの可能性もありますので大変お手数ではございますがもう一度お問い合わせいただくか、お電話にてお問い合わせくださいませ。<br />
				今後ともご愛顧賜りますようよろしくお願い申し上げます。</p>

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
