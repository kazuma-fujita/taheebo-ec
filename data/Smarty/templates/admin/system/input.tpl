<!--{*
/*
 * This file is part of EC-CUBE
 *
 * Copyright(c) 2000-2013 LOCKON CO.,LTD. All Rights Reserved.
 *
 * http://www.lockon.co.jp/
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 */
*}-->
<!--{include file="`$smarty.const.TEMPLATE_ADMIN_REALDIR`admin_popup_header.tpl"}-->

<script type="text/javascript">
<!--
self.moveTo(20,20);self.focus();
//-->
</script>

<form name="form1" id="form1" method="post" action="">
    <input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
    <input type="hidden" name="mode" value="<!--{$tpl_mode|h}-->" />
    <input type="hidden" name="member_id" value="<!--{$tpl_member_id|h}-->" />
    <input type="hidden" name="pageno" value="<!--{$tpl_pageno|h}-->" />
    <input type="hidden" name="old_login_id" value="<!--{$tpl_old_login_id|h}-->" />

    <h2>代理店登録/編集</h2>

    <table>
        <col width="20%" />
        <col width="80%" />
        <tr>
            <th>名前</th>
            <td>
                <!--{if $arrErr.name}--><span class="attention"><!--{$arrErr.name}--></span><!--{/if}-->
                <input type="text" name="name" size="30" class="box30" value="<!--{$arrForm.name|h}-->" maxlength="<!--{$smarty.const.STEXT_LEN}-->" style="<!--{$arrErr.name|sfGetErrorColor}-->" />
                <span class="attention">※必須入力</span>
            </td>
        </tr>
        <tr>
            <th>所属</th>
            <td>
                <!--{if $arrErr.department}--><span class="attention"><!--{$arrErr.department}--></span><!--{/if}-->
                <input type="text" name="department" size="30" class="box30" value="<!--{$arrForm.department|h}-->" maxlength="<!--{$smarty.const.STEXT_LEN}-->" style="<!--{$arrErr.department|sfGetErrorColor}-->" />
            </td>
        </tr>
        <tr>
            <th>ログインＩＤ</th>
            <td>
                <!--{if $arrErr.login_id}--><span class="attention"><!--{$arrErr.login_id}--></span><!--{/if}-->
                <input type="text" name="login_id" size="20" class="box20" value="<!--{$arrForm.login_id|h}-->" maxlength="<!--{$smarty.const.STEXT_LEN}-->" style="<!--{$arrErr.login_id|sfGetErrorColor}-->" />
                <span class="attention">※必須入力</span><br />
                ※半角英数字<!--{$smarty.const.ID_MIN_LEN}-->～<!--{$smarty.const.ID_MAX_LEN}-->文字
            </td>
        </tr>
        <tr>
            <th>パスワード</th>
            <td>
                <!--{if $arrErr.password}--><span class="attention"><!--{$arrErr.password}--><!--{$arrErr.password02}--></span><!--{/if}-->
                <input type="password" name="password" size="20" class="box20" value="<!--{$arrForm.password}-->" onfocus="<!--{$tpl_onfocus}-->" maxlength="<!--{$smarty.const.STEXT_LEN}-->" style="<!--{$arrErr.password|sfGetErrorColor}-->" />
                <span class="attention">※必須入力</span><br />
                ※半角英数字<!--{$smarty.const.ID_MIN_LEN}-->～<!--{$smarty.const.ID_MAX_LEN}-->文字
                <br />
                <input type="password" name="password02" size="20" class="box20" value="<!--{$arrForm.password02}-->" onfocus="<!--{$tpl_onfocus}-->" maxlength="<!--{$smarty.const.STEXT_LEN}-->" style="<!--{$arrErr.password02|sfGetErrorColor}-->" />
                <p><span class="attention mini">確認のために2度入力してください。</span></p>
            </td>
        </tr>
        <tr>
            <th>権限</th>
            <td>
                <!--{if $arrErr.authority}--><span class="attention"><!--{$arrErr.authority}--></span><!--{/if}-->
                <select name="authority" style="<!--{$arrErr.authority|sfGetErrorColor}-->">
                    <option value="">選択してください</option>
                    <!--{html_options options=$arrAUTHORITY selected=$arrForm.authority}-->
                </select>
                <span class="attention">※必須入力</span>
            </td>
        </tr>
        <tr>
            <th>稼働/非稼働</th>
            <td>
                <!--{if $arrErr.work}--><span class="attention"><!--{$arrErr.work}--></span><!--{/if}-->
                <!--{assign var=key value="work"}-->
                <span style="<!--{$arrErr.work|sfGetErrorColor}-->">
                <input type="radio" id="<!--{$key}-->_1" name="<!--{$key}-->" value="1" <!--{$arrForm.work|sfGetChecked:1}--> /><label for="<!--{$key}-->_1"><!--{$arrWORK.1}--></label>
                <input type="radio" id="<!--{$key}-->_0" name="<!--{$key}-->" value="0" <!--{$arrForm.work|sfGetChecked:0}--> /><label for="<!--{$key}-->_0"><!--{$arrWORK.0}--></label>
                </span>
                <span class="attention">※必須入力</span>
            </td>
        </tr>
<!-- ---------------------------- -->
        <tr>
            <th>代理店名<span class="attention"> *</span></th>
            <td>
                <!--{if $arrErr.agency_name}--><span class="attention"><!--{$arrErr.agency_name}--></span><!--{/if}-->
                <input type="text" name="agency_name" size="30" class="box30" value="<!--{$arrForm.agency_name|h}-->" maxlength="<!--{$smarty.const.STEXT_LEN}-->" style="<!--{$arrErr.agency_name|sfGetErrorColor}-->" />
            </td>
        </tr>
        <tr>
            <th>代理店（カナ）<span class="attention"> *</span></th>
            <td>
                <!--{if $arrErr.agency_name_kana}--><span class="attention"><!--{$arrErr.agency_name_kana}--></span><!--{/if}-->
                <input type="text" name="agency_name_kana" size="30" class="box30" value="<!--{$arrForm.agency_name_kana|h}-->" maxlength="<!--{$smarty.const.STEXT_LEN}-->" style="<!--{$arrErr.agency_name_kana|sfGetErrorColor}-->" />
            </td>
        </tr>

            <tr>
                <th>区分<span class="attention"> *</span></th>
                <td>
                    <span class="attention"><!--{$arrErr.agency_product_category_id}--></span>
                    <span <!--{if $arrErr.agency_product_category_id != ""}--><!--{sfSetErrorStyle}--><!--{/if}-->>
                        <!--{html_radios name="agency_product_category_id" options=$arrAgencyCategory separator=" " selected=$arrForm.agency_product_category_id}-->
                    </span>
                </td>
            </tr>
            <tr>
                <th>郵便番号<!--{if !$smarty.const.FORM_COUNTRY_ENABLE}--><span class="attention"> *</span><!--{/if}--></th>
                <td>
                    <span class="attention"><!--{$arrErr.zip01}--><!--{$arrErr.zip02}--></span>
                    〒 <input type="text" name="zip01" value="<!--{$arrForm.zip01|h}-->" maxlength="<!--{$smarty.const.ZIP01_LEN}-->" size="6" class="box6" <!--{if $arrErr.zip01 != ""}--><!--{sfSetErrorStyle}--><!--{/if}--> /> - <input type="text" name="zip02" value="<!--{$arrForm.zip02|h}-->" maxlength="<!--{$smarty.const.ZIP02_LEN}-->" size="6" class="box6" <!--{if $arrErr.zip02 != ""}--><!--{sfSetErrorStyle}--><!--{/if}--> />
                    <a class="btn-normal" href="javascript:;" name="address_input" onclick="eccube.getAddress('<!--{$smarty.const.INPUT_ZIP_URLPATH}-->', 'zip01', 'zip02', 'pref', 'addr01'); return false;">住所入力</a>
                </td>
            </tr>
            <tr>
                <th>住所<span class="attention"> *</span></th>
                <td>
                    <span class="attention"><!--{$arrErr.pref}--><!--{$arrErr.addr01}--><!--{$arrErr.addr02}--></span>
                    <select class="top" name="pref" <!--{if $arrErr.pref != ""}--><!--{sfSetErrorStyle}--><!--{/if}-->>
                        <option class="top" value="" selected="selected">都道府県を選択</option>
                        <!--{html_options options=$arrPref selected=$arrForm.pref}-->
                    </select><br />
                    <input type="text" name="addr01" value="<!--{$arrForm.addr01|h}-->" size="60" class="box60" <!--{if $arrErr.addr01 != ""}--><!--{sfSetErrorStyle}--><!--{/if}--> /><br />
                    <!--{$smarty.const.SAMPLE_ADDRESS1}--><br />
                    <input type="text" name="addr02" value="<!--{$arrForm.addr02|h}-->" size="60" class="box60" <!--{if $arrErr.addr02 != ""}--><!--{sfSetErrorStyle}--><!--{/if}--> /><br />
                    <!--{$smarty.const.SAMPLE_ADDRESS2}-->
                </td>
            </tr>
            <tr>
                <th>メールアドレス<span class="attention"> *</span></th>
                <td>
                    <span class="attention"><!--{$arrErr.email}--></span>
                    <input type="text" name="email" value="<!--{$arrForm.email|h}-->" size="60" class="box60" <!--{if $arrErr.email != ""}--><!--{sfSetErrorStyle}--><!--{/if}--> />
                </td>
            </tr>
            <tr>
                <th>電話番号<span class="attention"> *</span></th>
                <td>
                    <span class="attention"><!--{$arrErr.tel01}--><!--{$arrErr.tel02}--><!--{$arrErr.tel03}--></span>
                    <input type="text" name="tel01" value="<!--{$arrForm.tel01|h}-->" maxlength="<!--{$smarty.const.TEL_ITEM_LEN}-->" size="6" class="box6" <!--{if $arrErr.tel01 != ""}--><!--{sfSetErrorStyle}--><!--{/if}--> /> - <input type="text" name="tel02" value="<!--{$arrForm.tel02|h}-->" maxlength="<!--{$smarty.const.TEL_ITEM_LEN}-->" size="6" class="box6" <!--{if $arrErr.tel01 != "" || $arrErr.tel02 != ""}--><!--{sfSetErrorStyle}--><!--{/if}--> /> - <input type="text" name="tel03" value="<!--{$arrForm.tel03|h}-->" maxlength="<!--{$smarty.const.TEL_ITEM_LEN}-->" size="6" class="box6" <!--{if $arrErr.tel01 != "" || $arrErr.tel03 != ""}--><!--{sfSetErrorStyle}--><!--{/if}--> />
                </td>
            </tr>
<!-- ---------------------------- -->
    </table>

    <div class="btn-area">
        <ul>
            <li><a class="btn-action" href="javascript:;" onclick="if (!eccube.doConfirm()) return false; eccube.fnFormModeSubmit('form1', '<!--{$tpl_mode|h}-->', '', ''); return false;"><span class="btn-next">この内容で登録する</span></a></li>
        </ul>
    </div>
</form>

<!--{include file="`$smarty.const.TEMPLATE_ADMIN_REALDIR`admin_popup_footer.tpl"}-->
