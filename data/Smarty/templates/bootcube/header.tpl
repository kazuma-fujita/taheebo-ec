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
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.    See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA    02111-1307, USA.
 *}-->

<!--▼HEADER-->
<!--{strip}-->
	<div id="header_wrap" class="navbar-fixed-top">


		<!-- /top_ber -->

		<div id="header">
			<div class="container">
				<div class="row">
						
				<div id="logo_area" class="col-sm-3 col-md-offset-1 col-md-3">
					<h1>
						<a href="<!--{$smarty.const.TOP_URL}-->">
							<img src="<!--{$TPL_URLPATH}-->img/taheebo/iinet_main_logo.png" style="width:150px"/>
						</a>
					</h1>
				</div>	
				
				<div id="header_utility" class="col-sm-9 col-md-7 text-right">
				
					<div id="headerInternalColumn">
					<!--{* ▼HeaderInternal COLUMN *}-->
					<!--{if $arrPageLayout.HeaderInternalNavi|@count > 0}-->
						<!--{* ▼上ナビ *}-->
						<!--{foreach key=HeaderInternalNaviKey item=HeaderInternalNaviItem from=$arrPageLayout.HeaderInternalNavi}-->

							<!-- ▼<!--{$HeaderInternalNaviItem.bloc_name}--> -->

							<!--{if $HeaderInternalNaviItem.php_path != ""}-->
								<!--{include_php file=$HeaderInternalNaviItem.php_path items=$HeaderInternalNaviItem}-->
							<!--{else}-->
								<!--{include file=$HeaderInternalNaviItem.tpl_path items=$HeaderInternalNaviItem}-->
							<!--{/if}-->
							
							<!-- ▲<!--{$HeaderInternalNaviItem.bloc_name}--> -->

						<!--{/foreach}-->
						<!--{* ▲上ナビ *}-->
					<!--{/if}-->
					<!--{* ▲HeaderInternal COLUMN *}-->
					</div>
					
				</div>
				
				</div><!-- /row -->
			</div>
		</div><!-- /header -->
	</div>
<!--{/strip}-->
<!--▲HEADER-->
