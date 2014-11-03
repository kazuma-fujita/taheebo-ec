<!--{strip}-->
<!--{if count($arrBestProducts) > 0}-->
<div class="block_outer clearfix">
	<div id="bc_recommend">
		<h4 class="title">オススメ</h4>
		<div class="content_panel co-xs-12">
			<div class="row">
			<!--{foreach from=$arrBestProducts item=arrProduct name="recommend_products"}-->
				<div class="item_panel col-xs-12 col-sm-3">
					<div class="item_image">
						<a href="<!--{$smarty.const.P_DETAIL_URLPATH}--><!--{$arrProduct.product_id|u}-->">
							<img src="<!--{$smarty.const.IMAGE_SAVE_URLPATH}--><!--{$arrProduct.main_large_image|sfNoImageMainList|h}-->" alt="<!--{$arrProduct.name|h}-->" class="img-responsive" />
						</a>
					</div>
					<div class="item_meta">
						<p class="title">
							<a href="<!--{$smarty.const.P_DETAIL_URLPATH}--><!--{$arrProduct.product_id|u}-->"><!--{$arrProduct.name|h}--></a>
						</p>
						<p class="sale_price">
							<span class="price">
								<!--{$arrProduct.price02_min_inctax|number_format}--> 円
							</span>
						</p>
						<p class="mini comment"><!--{$arrProduct.comment|h|nl2br}--></p>
					</div>
				</div>
				<!--{if $smarty.foreach.recommend_products.iteration % 4 === 0 and $smarty.foreach.recommend_products.last == false}-->
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
