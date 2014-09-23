<!--{*
* 管理画面表示制御プラグイン
* Copyright © 2012/05/17 BOKUBLOCK.INC MUKAI YUTO
* http://www.bokublock.jp / ec-cube@bokublock.jp
*
* This library is free software; you can redistribute it and/or
* modify it under the terms of the GNU Lesser General Public
* License as published by the Free Software Foundation; either
* version 2.1 of the License, or (at your option) any later version.
*
* This library is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
* Lesser General Public License for more details.
*
* You should have received a copy of the GNU Lesser General Public
* License along with this library; if not, write to the Free Software
* Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA
*}-->
<!--{include file="`$smarty.const.TEMPLATE_ADMIN_REALDIR`admin_popup_header.tpl"}-->
<script type="text/javascript">
</script>

<h2><!--{$tpl_subtitle}--></h2>
<p style="color:red;">※[システム設定]が表示される権限を必ず1つは残して下さい。</p>
<table border="0" cellspacing="1" cellpadding="8" summary=" ">
    <tr >
        <th>権限名</th>
        <th>表示ページ</th>
        <th>編集</th>
    </tr>
    <!--{foreach from=$arrAdminViewsControl item=AdminViewsControl key=AuthKey}-->
    <tr >
        <td><!--{$arrAuthority[$AuthKey]}--></td>
        <td>
            <ul>
                <!--{if $AdminViewsControl.basis_page == 1}--><li>基本情報管理</li><!--{/if}-->
                <!--{if $AdminViewsControl.products_page == 1}--><li>商品管理</li><!--{/if}-->
                <!--{if $AdminViewsControl.customer_page == 1}--><li>会員管理</li><!--{/if}-->
                <!--{if $AdminViewsControl.order_page == 1}--><li>受注管理</li><!--{/if}-->
                <!--{if $AdminViewsControl.total_page == 1}--><li>売上集計</li><!--{/if}-->
                <!--{if $AdminViewsControl.mail_page == 1}--><li>メルマガ管理</li><!--{/if}-->
                <!--{if $AdminViewsControl.contents_page == 1}--><li>コンテンツ管理</li><!--{/if}-->
                <!--{if $AdminViewsControl.design_page == 1}--><li>デザイン管理</li><!--{/if}-->
                <!--{if $AdminViewsControl.system_page == 1}--><li>システム設定</li><!--{/if}-->
                <!--{if $AdminViewsControl.ownersstore_page == 1}--><li>オーナーズストア</li><!--{/if}-->
            </ul>
        </td>
        <td>
            <!--{if $AuthKey != $authority_id}-->
            <a href="/admin/load_plugin_config.php?plugin_id=<!--{$plugin_id}-->&authority_id=<!--{$AuthKey}-->">編集</a>
            <!--{else}-->
            編集中
            <!--{/if}-->
        </td>
    </tr>
    <!--{/foreach}-->
</table>

<form name="form1" id="form1" method="post" action="<!--{$smarty.server.REQUEST_URI|h}-->">
<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
<input type="hidden" name="mode" value="edit">
<input type="hidden" name="authority_id" value="<!--{$authority_id}-->">

<table border="0" cellspacing="1" cellpadding="8" summary=" ">
    <tr >
        <th>権限名</th>
        <td>
            <!--{$arrAuthority[$authority_id]}-->
        </td>
    </tr>
    <tr >
        <th>基本情報管理</th>
        <td>
        	<!--{assign var=key value="basis_page"}-->
        	<input type="radio" name="<!--{$key}-->" value="1" <!--{if $arrForm.$key == 1}-->checked<!--{/if}--> >表示する
        	<input type="radio" name="<!--{$key}-->" value="0" <!--{if $arrForm.$key != 1}-->checked<!--{/if}--> >表示しない
        </td>
    </tr>
    <tr >
        <th>商品管理</th>
        <td>
        	<!--{assign var=key value="products_page"}-->
        	<input type="radio" name="<!--{$key}-->" value="1" <!--{if $arrForm.$key == 1}-->checked<!--{/if}--> >表示する
        	<input type="radio" name="<!--{$key}-->" value="0" <!--{if $arrForm.$key != 1}-->checked<!--{/if}--> >表示しない
        </td>
    </tr>
    <tr >
        <th>会員管理</th>
        <td>
        	<!--{assign var=key value="customer_page"}-->
        	<input type="radio" name="<!--{$key}-->" value="1" <!--{if $arrForm.$key == 1}-->checked<!--{/if}--> >表示する
        	<input type="radio" name="<!--{$key}-->" value="0" <!--{if $arrForm.$key != 1}-->checked<!--{/if}--> >表示しない
        </td>
    </tr>
    <tr >
        <th>受注管理</th>
        <td>
        	<!--{assign var=key value="order_page"}-->
        	<input type="radio" name="<!--{$key}-->" value="1" <!--{if $arrForm.$key == 1}-->checked<!--{/if}--> >表示する
        	<input type="radio" name="<!--{$key}-->" value="0" <!--{if $arrForm.$key != 1}-->checked<!--{/if}--> >表示しない
        </td>
    </tr>
    <tr >
        <th>売上集計</th>
        <td>
        	<!--{assign var=key value="total_page"}-->
        	<input type="radio" name="<!--{$key}-->" value="1" <!--{if $arrForm.$key == 1}-->checked<!--{/if}--> >表示する
        	<input type="radio" name="<!--{$key}-->" value="0" <!--{if $arrForm.$key != 1}-->checked<!--{/if}--> >表示しない
        </td>
    </tr>
    <tr >
        <th>メルマガ管理</th>
        <td>
        	<!--{assign var=key value="mail_page"}-->
        	<input type="radio" name="<!--{$key}-->" value="1" <!--{if $arrForm.$key == 1}-->checked<!--{/if}--> >表示する
        	<input type="radio" name="<!--{$key}-->" value="0" <!--{if $arrForm.$key != 1}-->checked<!--{/if}--> >表示しない
        </td>
    </tr>
    <tr >
        <th>コンテンツ管理</th>
        <td>
        	<!--{assign var=key value="contents_page"}-->
        	<input type="radio" name="<!--{$key}-->" value="1" <!--{if $arrForm.$key == 1}-->checked<!--{/if}--> >表示する
        	<input type="radio" name="<!--{$key}-->" value="0" <!--{if $arrForm.$key != 1}-->checked<!--{/if}--> >表示しない
        </td>
    </tr>
    <tr >
        <th>デザイン管理</th>
        <td>
        	<!--{assign var=key value="design_page"}-->
        	<input type="radio" name="<!--{$key}-->" value="1" <!--{if $arrForm.$key == 1}-->checked<!--{/if}--> >表示する
        	<input type="radio" name="<!--{$key}-->" value="0" <!--{if $arrForm.$key != 1}-->checked<!--{/if}--> >表示しない
        </td>
    </tr>
    <tr >
        <th>システム設定</th>
        <td>
        	<!--{assign var=key value="system_page"}-->
        	<input type="radio" name="<!--{$key}-->" value="1" <!--{if $arrForm.$key == 1}-->checked<!--{/if}--> >表示する
        	<input type="radio" name="<!--{$key}-->" value="0" <!--{if $arrForm.$key != 1}-->checked<!--{/if}--> >表示しない
        </td>
    </tr>
    <tr >
        <th>オーナーズストア</th>
        <td>
        	<!--{assign var=key value="ownersstore_page"}-->
        	<input type="radio" name="<!--{$key}-->" value="1" <!--{if $arrForm.$key == 1}-->checked<!--{/if}--> >表示する
        	<input type="radio" name="<!--{$key}-->" value="0" <!--{if $arrForm.$key != 1}-->checked<!--{/if}--> >表示しない
        </td>
    </tr>
</table>


<div class="btn-area">
    <ul>
        <li>
            <a class="btn-action" href="javascript:;" onclick="document.form1.submit();return false;"><span class="btn-next">この内容で登録する</span></a>
        </li>
    </ul>
</div>

</form>

<!--{include file="`$smarty.const.TEMPLATE_ADMIN_REALDIR`admin_popup_footer.tpl"}-->
