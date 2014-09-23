<!--{strip}-->
<!--{if count($arrBestProducts) > 0}-->
<div class="clearfix"></div>
<div class="block_outer">
	<div id="bc_ranking">
		<h4 class="title">セールスランキング</h4>
		<div class="content_panel co-xs-12">
			<div class="row">

			<!--{*
				ランキングの取得数はデフォルトで10位まで取得、変更するには以下の場所から設定する
				class/pages/frontparts/LC-xxx-BcRanking.php/lfGetRanking()
			*}-->
			<!--{foreach from=$arrBestProducts8 item=arrProduct name="bestseller"}-->
				<div class="item_panel col-xs-6 col-sm-3">

					<div class="item_image">
						<a href="<!--{$smarty.const.P_DETAIL_URLPATH}--><!--{$arrProduct.product_id|u}-->">
							<img src="<!--{$smarty.const.IMAGE_SAVE_URLPATH}--><!--{$arrProduct.main_list_image|sfNoImageMainList|h}-->" alt="<!--{$arrProduct.name|h}-->" />
						</a>
					</div>

					<div class="item_meta">
						<p class="title">
							<!--{* ループインデックスで順位表示 *}-->
							<span class="rank_num num-<!--{$smarty.foreach.bestseller.iteration}-->">
									<!--{$smarty.foreach.bestseller.iteration}-->位.
							</span>
							<a href="<!--{$smarty.const.P_DETAIL_URLPATH}--><!--{$arrProduct.product_id|u}-->">
								<!--{$arrProduct.name|h}-->
							</a>
						</p>
						
						<!--{*
							メーカー名の表示
						*}-->
						<!--{foreach from=$arrMakerList item=arrMaker key="key" name="maker_list"}-->
							<!--{if $arrMaker.product_id == $arrProduct.product_id}-->
								<p class="maker"><!--{$arrMaker.neme}--></p>
							<!--{/if}-->
						<!--{/foreach}-->

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
					</div>
				</div>
			<!--{/foreach}-->
			</div>
		</div>
	</div>
</div>
<!--{/if}-->
<!--{/strip}-->
