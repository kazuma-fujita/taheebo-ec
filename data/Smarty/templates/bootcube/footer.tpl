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

<!--▼FOOTER-->
<!--{strip}-->
		<div id="footer_wrap">
				<div id="footer" class="container">
						<div id="guide_list">
							<ul class="list-inline">
								<li>
									<a href="<!--{$smarty.const.ROOT_URLPATH}-->abouts/<!--{$smarty.const.DIR_INDEX_PATH}-->" class="<!--{if $tpl_page_class_name == "LC_Page_Abouts"}-->selected<!--{/if}-->">
												当サイトについて</a>
								</li>
								<li style="display:none;">
									<a href="<!--{$smarty.const.HTTPS_URL}-->contact/<!--{$smarty.const.DIR_INDEX_PATH}-->" class="<!--{if $tpl_page_class_name == "LC_Page_Contact" || $tpl_page_class_name == "LC_Page_Contact_Complete"}-->selected<!--{/if}-->">
												お問い合わせ</a></li>
								<li>
									<a href="<!--{$smarty.const.ROOT_URLPATH}-->order/<!--{$smarty.const.DIR_INDEX_PATH}-->" class="<!--{if $tpl_page_class_name == "LC_Page_Order"}-->selected<!--{/if}-->">
												ご利用ガイド</a></li>
								<li>
									<a href="<!--{$smarty.const.ROOT_URLPATH}-->guide/privacy.php" class="<!--{if $tpl_page_class_name == "LC_Page_Guide_Privacy"}-->selected<!--{/if}-->">
												プライバシーポリシー</a></li>
							</ul>
						</div>
						<!--div id="pagetop" class="text-right"><a href="#top"><img src="<!--{$TPL_URLPATH}-->img/taheebo/scrollup.gif"/></a></div-->
						<div id="pagetop" class="text-right"><a href="#top" class="btn btn-success btn-lg"><span class="glyphicon glyphicon-arrow-up"></span></a></div>
						<div id="copyright" class="text-center">Copyright ©
								&nbsp;<!--{$smarty.now|date_format:"%Y"}-->
								&nbsp;いいねっと All rights reserved.
						</div>
				</div>
		</div>
<!--{/strip}-->
<!--▲FOOTER-->
