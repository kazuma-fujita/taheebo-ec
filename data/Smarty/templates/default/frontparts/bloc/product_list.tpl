<style type="text/css">
div#productlist_area h2 {
    background-color:#de5e17;
    text-align:center;
    color:#fff;
    padding:7px 0 7px 0;
}
div#productlist_area div.productImage {
    float:left;
    width:40px;
    padding:0 8px 0 0;
}
div#productlist_area div.productContents {
    float:left;
    width:100px;
}
div#productlist_area div.product_item {
    padding:5px 0 5px 5px;
}
</style>
<!--{if count($arrProducts) > 0}-->
    <div class="bloc_outer clearfix">
        <div id="productlist_area">
            <h2>商品一覧リスト</h2>
            <div class="bloc_body clearfix">
                <!--{foreach from=$arrProducts item=arrProduct}-->
                    <div class="product_item clearfix">
                        <div class="productImage">
                            <a href="<!--{$smarty.const.P_DETAIL_URLPATH}--><!--{$arrProduct.product_id|u}-->"><img src="<!--{$smarty.const.ROOT_URLPATH}-->resize_image.php?image=<!--{$arrProduct.main_list_image|sfNoImageMainList|h}-->&width=40&height=40" alt="<!--{$arrProduct.name|h}-->" /></a>
                        </div>
                        <div class="productContents">
                            <h3>
                                <a href="<!--{$smarty.const.P_DETAIL_URLPATH}--><!--{$arrProduct.product_id|u}-->"><!--{$arrProduct.name|h}--></a>
                            </h3>
                            <p class="sale_price">
                                <span class="price"><!--{$arrProduct.price02_min|sfCalcIncTax:$arrInfo.tax:$arrInfo.tax_rule|number_format}--> 円</span>
                            </p>
                        </div>
                    </div>
                </dl>
                <div class="clear"></div>
                <!--{/foreach}-->
            </div>
        </div>
    </div>
<!--{/if}-->

