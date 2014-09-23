<!--{strip}-->
<!--{if count($arrNewProducts) > 0}-->
<div class="block_outer clearfix">
	<div id="bc_newProducts">
		<h4 class="title">新着商品</h4>
		<div class="content_panel co-xs-12">
			<div class="row">
			<!--{*
				新着商品取得数はデフォルトで8まで取得、変更するには以下の場所から設定する
				class/pages/frontparts/LC-xxx-BcNewProducts.php/GetNewProducts()
			*}-->
			<!--{foreach from=$arrNewProducts item=arrProduct key="key" name="new_products"}-->
				<div class="item_panel col-xs-6 col-sm-3">
					<div class="item_image">
						<a href="<!--{$smarty.const.P_DETAIL_URLPATH}--><!--{$arrProduct.product_id|u}-->">
								<img src="<!--{$smarty.const.IMAGE_SAVE_URLPATH}--><!--{$arrProduct.main_list_image|sfNoImageMainList|h}-->" alt="<!--{$arrProduct.name|h}-->" />
						</a>
					</div>
					<div class="item_meta">
						<p class="title">
							<a href="<!--{$smarty.const.P_DETAIL_URLPATH}--><!--{$arrProduct.product_id|u}-->"><!--{$arrProduct.name|h}--></a>
						</p>
						<!--{*
							レビュー数の表示
							$arrReviewListの値を検索し、現在のproduct_idと同じなら、そのidのおすすめ度を出力
						*}-->
						<!--{foreach from=$arrReviewList item=arrReview key="key" name="review_list"}-->
							<!--{if $arrReview.product_id == $arrProduct.product_id}-->
								<p class="review">
									<!--{if $arrReview.recommend_level==5}-->
										<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
									<!--{elseif $arrReview.recommend_level==4}-->
										<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i>
									<!--{elseif $arrReview.recommend_level==3}-->
										<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
									<!--{elseif $arrReview.recommend_level==2}-->
										<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
									<!--{elseif $arrReview.recommend_level==1}-->
										<i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
									<!--{else}-->
										<i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i>
									<!--{/if}-->
									<span class="count"> (<!--{$arrReview.recommend_count}-->)</span>
								</p>
							<!--{/if}-->
						<!--{/foreach}-->
						<p class="sale_price">
							<span class="price">
								<!--{$arrProduct.price02_min_inctax|number_format}--> 円
							</span>
						</p>
						<p class="mini comment"><!--{$arrProduct.comment|h|nl2br}--></p>
					</div>
				</div>
				<!--{if $smarty.foreach.new_products.iteration % 4 === 0 and $smarty.foreach.new_products.last == false}-->
					</div>
					<div class="row">
				<!--{/if}-->
			<!--{/foreach}-->
			</div>
		</div>
	</div>
</div>
<!--{/if}-->
<!--{/strip}-->
