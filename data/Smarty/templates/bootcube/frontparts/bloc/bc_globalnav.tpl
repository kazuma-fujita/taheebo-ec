<!--{if $tpl_login}-->

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
<div class="container"><div class="row">
	
	<div id="bc_globalnav">
		<nav class="navbar navbar-default" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand visible-xs" href="#">カテゴリーメニュー</a>
				</div>

				<div class="collapse navbar-collapse" id="bs-navbar-collapse-1">

					<ul class="nav navbar-nav hidden-xs">
						<!--{foreach from=$arrCatLevel1 item=cat1}-->
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<!--{$cat1.category_name|h}-->　<i class="fa fa-angle-down"></i>
								</a>
								<ul class="dropdown-menu">
								<!--{foreach from=$arrCatLevel2 item=cat2}-->
									<!--{if $cat1.category_id == $cat2.parent_category_id}-->
										<li class="dropdown-submenu">
											<a href="<!--{$smarty.const.ROOT_URLPATH}-->products/list.php?category_id=<!--{$cat2.category_id}-->">
												<!--{$cat2.category_name|h}-->
											</a>
											<ul class="dropdown-menu">
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
					<!-- /pc.tablet-nav -->
					<ul class="nav navbar-nav visible-xs">
					<!--{foreach from=$arrCatLevel1 item=cat1}-->
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<!--{$cat1.category_name|h}-->　<i class="fa fa-angle-down"></i>
								</a>
								<!--{foreach from=$arrCatLevel2 item=cat2}-->
									<!--{if $cat1.category_id == $cat2.parent_category_id}-->
										<ul class="dropdown-menu mobile">
											<li>
												<a href="<!--{$smarty.const.ROOT_URLPATH}-->products/list.php?category_id=<!--{$cat2.category_id}-->">
													<i class="fa fa-angle-right"></i>　
													<!--{$cat2.category_name|h}-->
												</a>
												<!--{foreach from=$arrCatLevel3 item=cat3}-->
													<!--{if $cat2.category_id == $cat3.parent_category_id}-->
														<ul class="level3 mobile list-unstyled">
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
					<!-- /mobile-nav -->
			
				</div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
		</nav>
	</div>
</div></div>
<!-- /container -->
</div>
<!-- /bloc_outer -->
<!--{/strip}-->

<!--{/if}-->