<!--{strip}-->
<div class="block_outer clearfix">

    <!--▼ページナビ(本文)-->
    <!--{foreach from=$arrProducts item=arrProduct name=arrProducts}-->

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
                        <img src="<!--{$smarty.const.IMAGE_SAVE_URLPATH}--><!--{$arrProduct.main_large_image|sfNoImageMainList|h}-->" alt="<!--{$arrProduct.name|h}-->" class="picture" /></a>
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
                            <!--div class="cartbtn attention">申し訳ございませんが、只今品切れ中です。</div-->
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
    <!--{/foreach}-->
</div>
<!--{/strip}-->