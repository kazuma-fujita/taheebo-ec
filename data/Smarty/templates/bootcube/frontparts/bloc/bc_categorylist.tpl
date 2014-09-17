<!--{strip}-->
<div class="block_outer">

	<div id="bc_categoryList">

		<h4 class="title">カテゴリ一覧</h4>
		<div class="block_body">
			<ul class="list_group list-unstyled">
			<!--{foreach from=$arrCatLevel1 item=cat1}-->
					<li class="list_item">
						<a href="<!--{$smarty.const.ROOT_URLPATH}-->products/list.php?category_id=<!--{$cat.category_id}-->">
							<i class="fa fa-angle-right"></i>　
							<!--{$cat1.category_name|h}-->
						</a>
						<!--{foreach from=$arrCatLevel2 item=cat2}-->
							<!--{if $cat1.category_id == $cat2.parent_category_id}-->
								<ul class="level2 list-unstyled">
									<li>
										<a href="<!--{$smarty.const.ROOT_URLPATH}-->products/list.php?category_id=<!--{$cat2.category_id}-->">
											<i class="fa fa-angle-right"></i>　
											<!--{$cat2.category_name|h}-->
										</a>
										<!--{foreach from=$arrCatLevel3 item=cat3}-->
											<!--{if $cat2.category_id == $cat3.parent_category_id}-->
												<ul class="level3 list-unstyled">
													<li>
														<a href="<!--{$smarty.const.ROOT_URLPATH}-->products/list.php?category_id=<!--{$cat3.category_id}-->">
															<i class="fa fa-angle-right"></i>　
															<!--{$cat3.category_name|h}-->
														</a>
													</li>
												</ul>
											<!--{/if}-->
										<!--{/foreach}-->
									</li>
								</ul>
							<!--{/if}-->
						<!--{/foreach}-->
					</li>
			<!--{/foreach}-->
			</ul>
		</div>
		
	</div>
	<!-- /bc_categoryList -->

</div>
<!--{/strip}-->
