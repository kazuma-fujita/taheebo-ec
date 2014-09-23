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
<script type="text/javascript">
	function fnSetClassCategories(form, classcat_id2_selected) {
		var $form = $(form);
		var product_id = $form.find('input[name=product_id]').val();
		var $sele1 = $form.find('select[name=classcategory_id1]');
		var $sele2 = $form.find('select[name=classcategory_id2]');
		eccube.setClassCategories($form, product_id, $sele1, $sele2, classcat_id2_selected);
	}
	// 並び順を変更
	function fnChangeOrderby(orderby) {
		eccube.setValue('orderby', orderby);
		eccube.setValue('pageno', 1);
		eccube.submitForm();
	}
	// 表示件数を変更
	function fnChangeDispNumber(dispNumber) {
		eccube.setValue('disp_number', dispNumber);
		eccube.setValue('pageno', 1);
		eccube.submitForm();
	}
	// カゴに入れる
	function fnInCart(productForm) {
		var searchForm = $("#form1");
		var cartForm = $(productForm);
		// 検索条件を引き継ぐ
		var hiddenValues = ['mode','category_id','maker_id','name','orderby','disp_number','pageno','rnd'];
		$.each(hiddenValues, function(){
			// 商品別のフォームに検索条件の値があれば上書き
			if (cartForm.has('input[name='+this+']').length != 0) {
				cartForm.find('input[name='+this+']').val(searchForm.find('input[name='+this+']').val());
			}
			// なければ追加
			else {
				cartForm.append($('<input type="hidden" />').attr("name", this).val(searchForm.find('input[name='+this+']').val()));
			}
		});
		// 商品別のフォームを送信
		cartForm.submit();
	}
</script>

<div id="undercolumn">

	<ol class="breadcrumb">
		<li><a href="<!--{$smarty.const.TOP_URL}-->">トップ</a></li>
		<li class="active"><!--{$tpl_title|h}--></li>
	</ol>

	<form name="form1" id="form1" method="get" action="?">
		<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
		<input type="hidden" name="mode" value="<!--{$mode|h}-->" />
		<!--{* ▼検索条件 *}-->
		<input type="hidden" name="category_id" value="<!--{$arrSearchData.category_id|h}-->" />
		<input type="hidden" name="maker_id" value="<!--{$arrSearchData.maker_id|h}-->" />
		<input type="hidden" name="name" value="<!--{$arrSearchData.name|h}-->" />
		<!--{* ▲検索条件 *}-->
		<!--{* ▼ページナビ関連 *}-->
		<input type="hidden" name="orderby" value="<!--{$orderby|h}-->" />
		<input type="hidden" name="disp_number" value="<!--{$disp_number|h}-->" />
		<input type="hidden" name="pageno" value="<!--{$tpl_pageno|h}-->" />
		<!--{* ▲ページナビ関連 *}-->
		<input type="hidden" name="rnd" value="<!--{$tpl_rnd|h}-->" />
	</form>

	<!--★タイトル★-->
	<h2 class="cat_title"><!--{$tpl_subtitle|h}--></h2>
	
	<!--▼検索条件-->
	<!--{if $tpl_subtitle == "検索結果"}-->
		<ul class="pagecond_area list-inline">
			<li>【検索結果】</li>
			<li><strong>商品カテゴリ：</strong><!--{$arrSearch.category|h}--></li>
		<!--{if $arrSearch.maker|strlen >= 1}--><li><strong>メーカー：</strong><!--{$arrSearch.maker|h}--></li><!--{/if}-->
			<li><strong>商品名：</strong><!--{$arrSearch.name|h}--></li>
		</ul>
	<!--{/if}-->
	<!--▲検索条件-->

	<!--▼ページナビ(本文)-->
	<!--{capture name=page_navi_body}-->
		<div class="pagenumber_area clearfix">
			<ul class="change list-inline">
				<!--{if $orderby != 'price'}-->
					<li><a href="javascript:fnChangeOrderby('price');">価格順</a></li>
				<!--{else}-->
					<li><strong>価格順</strong></li>
				<!--{/if}-->&nbsp;
				<!--{if $orderby != "date"}-->
					<li><a href="javascript:fnChangeOrderby('date');">新着順</a></li>
				<!--{else}-->
					<li><strong>新着順</strong></li>
				<!--{/if}-->
				<li>
					表示件数
					<select name="disp_number" onchange="javascript:fnChangeDispNumber(this.value);">
						<!--{foreach from=$arrPRODUCTLISTMAX item="dispnum" key="num"}-->
							<!--{if $num == $disp_number}-->
								<option value="<!--{$num}-->" selected="selected" ><!--{$dispnum}--></option>
							<!--{else}-->
								<option value="<!--{$num}-->" ><!--{$dispnum}--></option>
							<!--{/if}-->
						<!--{/foreach}-->
					</select>
				</li>
				<li>
					<div class="navi"><!--{$tpl_strnavi}--></div>
				</li>
			</ul>
		</div>
	<!--{/capture}-->
	<!--▲ページナビ(本文)-->
	
	<!--{foreach from=$arrProducts item=arrProduct name=arrProducts}-->
	
		<!--{if $smarty.foreach.arrProducts.first}-->
		<div class="page_infomation">
		<div class="row">
			<!--▼件数-->
			<div class="col-xs-5">
				<span class="attention"><!--{$tpl_linemax}-->件</span>の商品がございます。
			</div>
			<!--▲件数-->

			<!--▼ページナビ(上部)-->
			<div class="col-xs-7 text-right">
				<form name="page_navi_top" id="page_navi_top" action="?">
					<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
					<!--{if $tpl_linemax > 0}--><!--{$smarty.capture.page_navi_body|smarty:nodefaults}--><!--{/if}-->
				</form>
			</div>
			<!--▲ページナビ(上部)-->
		</div>
		</div>
		<!--{/if}-->
			
		<!--{assign var=id value=$arrProduct.product_id}-->
		<!--{assign var=arrErr value=$arrProduct.arrErr}-->
		<!--▼商品-->
		<form class="form-inline" name="product_form<!--{$id|h}-->" action="?" onsubmit="return false;">
			<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
			<input type="hidden" name="product_id" value="<!--{$id|h}-->" />
			<input type="hidden" name="product_class_id" id="product_class_id<!--{$id|h}-->" value="<!--{$tpl_product_class_id[$id]}-->" />
			
			
			<div class="list_area">
			<div class="row">
				<a name="product<!--{$id|h}-->"></a>
				
				<div class="listphoto col-xs-12 col-sm-3">
					<!--★画像★-->
					<a href="<!--{$smarty.const.P_DETAIL_URLPATH}--><!--{$arrProduct.product_id|u}-->">
						<img src="<!--{$smarty.const.IMAGE_SAVE_URLPATH}--><!--{$arrProduct.main_list_image|sfNoImageMainList|h}-->" alt="<!--{$arrProduct.name|h}-->" class="picture" /></a>
				</div>

				<div class="listrightbloc col-xs-12 col-sm-9">
					<!--▼商品ステータス-->
					<!--{if count($productStatus[$id]) > 0}-->
						<ul class="status_icon list-inline">
							<!--{foreach from=$productStatus[$id] item=status}-->
								<li>
									<img src="<!--{$TPL_URLPATH}--><!--{$arrSTATUS_IMAGE[$status]}-->" width="60" height="17" alt="<!--{$arrSTATUS[$status]}-->"/>
								</li>
							<!--{/foreach}-->
						</ul>
					<!--{/if}-->
					<!--▲商品ステータス-->

					<!--★商品名★-->
					<h3 class="title">
						<a href="<!--{$smarty.const.P_DETAIL_URLPATH}--><!--{$arrProduct.product_id|u}-->"><!--{$arrProduct.name|h}--></a>
					</h3>
					
					<div class="detail_area">
						<!--★価格★-->
						<div class="pricebox sale_price">
							<!--{$smarty.const.SALE_PRICE_TITLE}-->(税込)：
							<span class="price">
								<span id="price02_default_<!--{$id}-->"><!--{strip}-->
									<!--{if $arrProduct.price02_min_inctax == $arrProduct.price02_max_inctax}-->
										<!--{$arrProduct.price02_min_inctax|number_format}-->
									<!--{else}-->
										<!--{$arrProduct.price02_min_inctax|number_format}-->～<!--{$arrProduct.price02_max_inctax|number_format}-->
									<!--{/if}-->
								</span><span id="price02_dynamic_<!--{$id}-->"></span><!--{/strip}-->
								円</span>
						</div>
						
						<!--★コメント★-->
						<div class="listcomment"><!--{$arrProduct.main_list_comment|h|nl2br}--></div>
						
						<!--★商品詳細を見る★-->
						<div class="detail_btn">
							<!--{assign var=name value="detail`$id`"}-->
							<a href="<!--{$smarty.const.P_DETAIL_URLPATH}--><!--{$arrProduct.product_id|u}-->" class="btn btn-default btn-sm">商品詳細を見る</a>
						</div>
					</div>
					
					<!--▼買い物かご-->
					<div class="cart_area">
						<!--{if $tpl_stock_find[$id]}-->
							<!--{if $tpl_classcat_find1[$id]}-->
								<div class="classlist">
										<!--▼規格1-->
									<ul class="size01 list-inline">
											<li><!--{$tpl_class_name1[$id]|h}-->：</li>
											<li>
												<select name="classcategory_id1" style="<!--{$arrErr.classcategory_id1|sfGetErrorColor}-->">
													<!--{html_options options=$arrClassCat1[$id] selected=$arrProduct.classcategory_id1}-->
												</select>
												<!--{if $arrErr.classcategory_id1 != ""}-->
													<p class="attention">※ <!--{$tpl_class_name1[$id]}-->を入力して下さい。</p>
												<!--{/if}-->
											</li>
									</ul>
									<!--▲規格1-->
									<!--{if $tpl_classcat_find2[$id]}-->
											<!--▼規格2-->
										<ul class="size02 list-inline">
											<li><!--{$tpl_class_name2[$id]|h}-->：</li>
											<li>
												<select name="classcategory_id2" style="<!--{$arrErr.classcategory_id2|sfGetErrorColor}-->">
												</select>
												<!--{if $arrErr.classcategory_id2 != ""}-->
													<p class="attention">※ <!--{$tpl_class_name2[$id]}-->を入力して下さい。</p>
												<!--{/if}-->
											</li>
										</ul>
										<!--▲規格2-->
									<!--{/if}-->
								</div>
							<!--{/if}-->
							<div class="cartin">
								<div class="quantity">
									数量：<input type="text" name="quantity" class="box form-control" value="<!--{$arrProduct.quantity|default:1|h}-->" maxlength="<!--{$smarty.const.INT_LEN}-->" style="<!--{$arrErr.quantity|sfGetErrorColor}-->" />
									<!--{if $arrErr.quantity != ""}-->
										<br /><span class="attention"><!--{$arrErr.quantity}--></span>
									<!--{/if}-->
								</div>
								<div class="cartin_btn">
									<!--★カゴに入れる★-->
									<div id="cartbtn_default_<!--{$id}-->">
										<input type="submit" value="カートに入れる" id="cart<!--{$id}-->" onclick="fnInCart(this.form); return false;" class="btn btn-default" />
									</div>
								</div>
							</div>
							
							<div class="attention" id="cartbtn_dynamic_<!--{$id}-->"></div>
						<!--{else}-->
							<div class="cartbtn attention">申し訳ございませんが、只今品切れ中です。</div>
						<!--{/if}-->
					</div>
					<!--▲買い物かご-->
					
				</div>
				<!-- /listrightbloc -->
			</div><!-- row -->
			</div>
			<!-- /list_area -->
		</form>
		<!--▲商品-->

		<!--{if $smarty.foreach.arrProducts.last}-->
			<!--▼ページナビ(下部)-->
			<div class="col-xs-12 text-right">
				<form name="page_navi_bottom" id="page_navi_bottom" action="?">
					<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
					<!--{if $tpl_linemax > 0}--><!--{$smarty.capture.page_navi_body|smarty:nodefaults}--><!--{/if}-->
				</form>
			</div>
			<!--▲ページナビ(下部)-->
		<!--{/if}-->

	<!--{foreachelse}-->
		<!--{include file="frontparts/search_zero.tpl"}-->
	<!--{/foreach}-->
</div>
