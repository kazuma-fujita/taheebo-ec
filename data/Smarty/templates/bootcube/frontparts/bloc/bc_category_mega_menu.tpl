<script type="text/javascript">
		$(function(){
				//下層カテゴリがない場合、ul、class-nameを削除
				$('ul.dropdown-menu:not(:has(li))').addClass('removeThis');
				$('.removeThis').remove();
				$('li.dropdown-submenu:not(:has(ul))').removeClass('dropdown-submenu');
		});
</script>
<!--{strip}-->
<div class="block_outer">
<div class="container">
	
	<div id="bc_category_mega_menu">
		<ul class="list-unstyled">
			<li class="dropdown">
				<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					カテゴリー選択　<i class="fa fa-angle-down"></i>
				</a>
				<ul class="dropdown-menu">
					<!--{foreach from=$arrCatLevel1 item=cat1}-->
						<li class="dropdown-submenu">
							<a href="<!--{$smarty.const.ROOT_URLPATH}-->products/list.php?category_id=<!--{$cat1.category_id}-->">
								<!--{$cat1.category_name|h}-->
							</a>
							<ul class="dropdown-menu mega_menu">
							<!--{foreach from=$arrCatLevel2 item=cat2}-->
								<!--{if $cat1.category_id == $cat2.parent_category_id}-->
									<li class="col-xs-6">
										<a class="title" href="<!--{$smarty.const.ROOT_URLPATH}-->products/list.php?category_id=<!--{$cat2.category_id}-->">
											<!--{$cat2.category_name|h}-->
										</a>
										<ul>
											<!--{foreach from=$arrCatLevel3 item=cat3}-->
												<!--{if $cat2.category_id == $cat3.parent_category_id}-->
													<li>
														<a href="<!--{$smarty.const.ROOT_URLPATH}-->products/list.php?category_id=<!--{$cat3.category_id}-->">
															<!--{$cat3.category_name|h}-->
														</a>
													</li>
												<!--{/if}-->
											<!--{/foreach}-->
										</ul>
									</li>
								<!--{/if}-->
							<!--{/foreach}-->
							</ul>
						</li>
					<!--{/foreach}-->
				</ul>
			</li>
		</ul>
		<!-- /pc.tablet-nav -->
	</div>
	<!-- /category_mega_menu -->

</div>
<!-- /container -->
</div>
<!-- /bloc_outer -->
<!--{/strip}-->