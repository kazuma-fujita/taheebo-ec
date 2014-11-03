<!--{if !$tpl_login}-->
<script type="text/javascript">
    $(function(){
        var $login_email = $('#header_login_area input[name=login_email]');

        if (!$login_email.val()) {
            $login_email
                .val('メールアドレス')
                .css('color', '#AAA');
        }

        $login_email
            .focus(function() {
                if ($(this).val() == 'メールアドレス') {
                    $(this)
                        .val('')
                        .css('color', '#000');
                }
            })
            .blur(function() {
                if (!$(this).val()) {
                    $(this)
                        .val('メールアドレス')
                        .css('color', '#AAA');
                }
            });

        $('#header_login_form').submit(function() {
            if (!$login_email.val()
                || $login_email.val() == 'メールアドレス') {
                if ($('#header_login_area input[name=login_pass]').val()) {
                    alert('メールアドレス/パスワードを入力して下さい。');
                }
                return false;
            }
            return true;
        });
    });
</script>
<!--{/if}-->
<!--{strip}-->
    <div class="block_outer">
        <div id="header_login_area" class="clearfix">
            <form name="header_login_form" id="header_login_form" method="post" action="<!--{$smarty.const.HTTPS_URL}-->frontparts/login_check.php"<!--{if !$tpl_login}--> onsubmit="return eccube.checkLoginFormInputted('header_login_form')"<!--{/if}-->>
                <input type="hidden" name="mode" value="login" />
                <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
                <input type="hidden" name="url" value="<!--{$smarty.server.REQUEST_URI|h}-->" />
                <div class="block_body clearfix">
                    <!--{if $tpl_login}-->
                        <ul class="list-inline">
<!--{if false}-->
                            <li>
                            	ようこそ <span class="user_name"><!--{$tpl_name1|h}--> <!--{$tpl_name2|h}--> 様</span>
                            </li>
                            <li>
                            	<!--{if !$tpl_disable_logout}-->
                            	    <input type="submit" class="btn btn-default" value="ログアウト" onclick="eccube.fnFormModeSubmit('header_login_form', 'logout', '', ''); return false;" />
                            	<!--{/if}-->
                            </li>
<!--{/if}-->
                            <li>
                                <a class="btn" href="/mypage/">マイページ</a>
                            </li>
                            <li>
                            	<!--{if $smarty.const.USE_POINT !== false}-->
				<a class="btn btn-success"><!--{$tpl_user_point|number_format|default:0}-->pt</a>
                            	<!--{/if}-->
                            </li>
                            <li>
                            	<a class="btn btn-danger" href="<!--{$smarty.const.CART_URL}-->">合計<!--{$arrCartList.0.ProductsTotal|number_format|default:0}-->円 購入へ</a>
                            </li>
                        </ul>
                    <!--{else}-->
                        <ul class="formlist list-inline">
                            <li class="mail">
                               	<input type="text" class="box150 form-control" placeholder="メールアドレス" name="login_email" value="<!--{$tpl_login_email|h}-->" style="ime-mode: disabled;" title="メールアドレスを入力して下さい" />
                            </li>
                            <li class="login_memory">
                                <div class="checkbox">
                                	<input type="checkbox" name="login_memory" id="header_login_memory" value="1" <!--{$tpl_login_memory|sfGetChecked:1}--> /><label for="header_login_memory"> 記憶</label>
                                </div>
                            </li>
                            <li class="password">
                            	<input type="password" class="box100 form-control" placeholder="パスワード" name="login_pass" title="パスワードを入力して下さい" />
                            </li>
                            <li>
                                <button type="submit" class="btn btn-default">ログイン</button>
                            </li>
                            <li class="forgot">
                                <a href="<!--{$smarty.const.HTTPS_URL}-->forgot/<!--{$smarty.const.DIR_INDEX_PATH}-->" onclick="eccube.openWindow('<!--{$smarty.const.HTTPS_URL}-->forgot/<!--{$smarty.const.DIR_INDEX_PATH}-->','forget','600','400',{scrollbars:'no',resizable:'no'}); return false;" target="_blank">パスワードを忘れた方</a>
                            </li>
                        </ul>
                    <!--{/if}-->
                </div>
            </form>
        </div>
    </div>
<!--{/strip}-->
