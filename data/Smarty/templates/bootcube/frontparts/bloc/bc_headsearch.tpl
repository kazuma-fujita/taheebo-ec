<!--{strip}-->
	<div class="block_outer col-xs-12 col-sm-8">
		<div id="bc_headSearch">
			<div class="block_body row">
				<!--検索フォーム-->
				<form class="form-inline" role="form" name="search_form" id="search_form" method="get" action="<!--{$smarty.const.ROOT_URLPATH}-->products/list.php">
					<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
					<div class="form-group category_select col-xs-4">
						<input type="hidden" name="mode" value="search" />
						<select name="category_id" class="col-xs-12 form-control">
							<option label="全ての商品" value="">全てのカテゴリー</option>
							<!--{html_options options=$arrCatList selected=$category_id}-->
						</select>
						<span class="carat"></span>
					</div>
					<div class="input-group col-xs-8">
						<input type="text" name="name" class="form-control" maxlength="50" value="<!--{$smarty.get.name|h}-->" />
						<span class="input-group-btn">
							<button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
						</span>
					</div>
				</form>
			</div>
		</div>
	</div>
<!--{/strip}-->
