<!--{*
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
 *}-->

<div id="undercolumn">
	<div id="undercolumn_contact">
	
		<ol class="breadcrumb">
			<li><a href="<!--{$smarty.const.TOP_URL}-->">トップ</a></li>
			<li class="active"><!--{$tpl_title|h}--></li>
		</ol>

		<h2 class="cat_title"><!--{$tpl_title|h}--></h2>

		<p>内容によっては回答をさしあげるのにお時間をいただくこともございます。<br />
		また、休業日は翌営業日以降の対応となりますのでご了承ください。</p>

		<form class="form-inline" name="form1" id="form1" method="post" action="?">
			<input type="hidden" name="<!--{$smarty.const.TRANSACTION_ID_NAME}-->" value="<!--{$transactionid}-->" />
			<input type="hidden" name="mode" value="confirm" />

			<table class="table table-bordered" summary="お問い合わせ">
				<tr>
					<th>お名前<span class="attention">※</span></th>
					<td>
						<span class="attention"><!--{$arrErr.name01}--><!--{$arrErr.name02}--></span>
						<div class="form-group">
						  <label class="col-sm-3 control-label">性</label>
						  <div class="col-sm-9">
							<input type="text" class="box120 form-control" name="name01" value="<!--{$arrForm.name01.value|default:$arrData.name01|h}-->" maxlength="<!--{$smarty.const.STEXT_LEN}-->" style="<!--{$arrErr.name01|sfGetErrorColor}-->; ime-mode: active;" />
						  </div>
						</div>
						<div class="form-group">
						  <label class="col-sm-3 control-label">名</label>
						  <div class="col-sm-9">
							<input type="text" class="box120 form-control" name="name02" value="<!--{$arrForm.name02.value|default:$arrData.name02|h}-->" maxlength="<!--{$smarty.const.STEXT_LEN}-->" style="<!--{$arrErr.name02|sfGetErrorColor}-->; ime-mode: active;" />
						  </div>
						</div>
					</td>
				</tr>
				<tr>
					<th>お名前(フリガナ)<span class="attention">※</span></th>
					<td>
						<span class="attention"><!--{$arrErr.kana01}--><!--{$arrErr.kana02}--></span>
						<div class="form-group">
							<label class="col-sm-3 control-label">セイ</label>
							<div class="col-sm-9">
							  <input type="text" class="box120 form-control" name="kana01" value="<!--{$arrForm.kana01.value|default:$arrData.kana01|h}-->" maxlength="<!--{$smarty.const.STEXT_LEN}-->" style="<!--{$arrErr.kana01|sfGetErrorColor}-->; ime-mode: active;" />
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-3 control-label">メイ</label>
							<div class="col-sm-9">
							  <input type="text" class="box120 form-control" name="kana02" value="<!--{$arrForm.kana02.value|default:$arrData.kana02|h}-->" maxlength="<!--{$smarty.const.STEXT_LEN}-->" style="<!--{$arrErr.kana02|sfGetErrorColor}-->; ime-mode: active;" />
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<th>郵便番号</th>
					<td>
						<span class="attention"><!--{$arrErr.zip01}--><!--{$arrErr.zip02}--></span>
						<div class="form-group">
							<label class="col-sm-2 control-label">〒</label>
							<div class="col-sm-10">
							  <input type="text" name="zip01" class="box60 form-control min" value="<!--{$arrForm.zip01.value|default:$arrData.zip01|h}-->" maxlength="<!--{$smarty.const.ZIP01_LEN}-->" style="<!--{$arrErr.zip01|sfGetErrorColor}-->; ime-mode: disabled;" /> - 
							  <input type="text" name="zip02" class="box60 form-control min" value="<!--{$arrForm.zip02.value|default:$arrData.zip02|h}-->" maxlength="<!--{$smarty.const.ZIP02_LEN}-->" style="<!--{$arrErr.zip02|sfGetErrorColor}-->; ime-mode: disabled;" />
							</div>
						</div>
						<p>
							<a href="http://search.post.japanpost.jp/zipcode/" target="_blank"><span class="mini">郵便番号検索</span></a>
						</p>
						<p class="zipimg">
							<a href="javascript:eccube.getAddress('<!--{$smarty.const.INPUT_ZIP_URLPATH}-->', 'zip01', 'zip02', 'pref', 'addr01');">
								<img src="<!--{$TPL_URLPATH}-->img/button/btn_address_input.jpg" alt="住所自動入力" /></a>
							<span class="mini">&nbsp;郵便番号を入力後、クリックしてください。</span>
						</p>
					</td>
				</tr>

				<tr>
					<th>住所</th>
					<td>
						<span class="attention"><!--{$arrErr.pref}--><!--{$arrErr.addr01}--><!--{$arrErr.addr02}--></span>
						
						<div class="form-group">
							<div class="col-sm-12">
								<select class="form-control" name="pref" style="<!--{$arrErr.pref|sfGetErrorColor}-->">
								  <option value="">都道府県を選択</option><!--{html_options options=$arrPref selected=$arrForm.pref.value|default:$arrData.pref|h}-->
								</select>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="form-group">
							<div class="col-sm-12">
							  <input type="text" class="box380 form-control" name="addr01" value="<!--{$arrForm.addr01.value|default:$arrData.addr01|h}-->" style="<!--{$arrErr.addr01|sfGetErrorColor}-->; ime-mode: active;" />&nbsp;
							  <!--{$smarty.const.SAMPLE_ADDRESS1}-->
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-12">
							  <input type="text" class="box380 form-control" name="addr02" value="<!--{$arrForm.addr02.value|default:$arrData.addr02|h}-->" style="<!--{$arrErr.addr02|sfGetErrorColor}-->; ime-mode: active;" />&nbsp;
							  <!--{$smarty.const.SAMPLE_ADDRESS2}-->
							</div>
						</div>
						<p class="mini"><span class="attention">住所は2つに分けてご記入ください。マンション名は必ず記入してください。</span></p>
					</td>
				</tr>
				<tr>
					<th>電話番号</th>
					<td>
						<span class="attention"><!--{$arrErr.tel01}--><!--{$arrErr.tel02}--><!--{$arrErr.tel03}--></span>
						<div class="form-group">
							<div class="col-sm-12">
							  <input type="text" class="box60 form-control min" name="tel01" value="<!--{$arrForm.tel01.value|default:$arrData.tel01|h}-->" maxlength="<!--{$smarty.const.TEL_ITEM_LEN}-->" style="<!--{$arrErr.tel01|sfGetErrorColor}-->; ime-mode: disabled;" />&nbsp;-&nbsp;
							  <input type="text" class="box60 form-control min" name="tel02" value="<!--{$arrForm.tel02.value|default:$arrData.tel02|h}-->" maxlength="<!--{$smarty.const.TEL_ITEM_LEN}-->" style="<!--{$arrErr.tel02|sfGetErrorColor}-->; ime-mode: disabled;" />&nbsp;-&nbsp;
							  <input type="text" class="box60 form-control min" name="tel03" value="<!--{$arrForm.tel03.value|default:$arrData.tel03|h}-->" maxlength="<!--{$smarty.const.TEL_ITEM_LEN}-->" style="<!--{$arrErr.tel03|sfGetErrorColor}-->; ime-mode: disabled;" />
							</div>
						</div>
					</td>
				</tr>
				<tr>
					<th>メールアドレス<span class="attention">※</span></th>
					<td>
						<span class="attention"><!--{$arrErr.email}--><!--{$arrErr.email02}--></span>
						<div class="form-group">
							<div class="col-sm-12">
							  <input type="text" class="box380 form-control" name="email" value="<!--{$arrForm.email.value|default:$arrData.email|h}-->" style="<!--{$arrErr.email|sfGetErrorColor}-->; ime-mode: disabled;" /><br />
							  <!--{* ログインしていれば入力済みにする *}-->
							  <!--{if $smarty.server.REQUEST_METHOD != 'POST' && $smarty.session.customer}-->
							  <!--{assign var=email02 value=$arrData.email}-->
							  <!--{/if}-->
							  <input type="text" class="box380 form-control" name="email02" value="<!--{$arrForm.email02.value|default:$email02|h}-->" style="<!--{$arrErr.email02|sfGetErrorColor}-->; ime-mode: disabled;" /><br />
							</div>
						</div>
						<p class="mini"><span class="attention">確認のため2度入力してください。</span></p>
					</td>
				</tr>
				<tr>
					<th>お問い合わせ内容<span class="attention">※</span><br />
					<span class="mini">（全角<!--{$smarty.const.MLTEXT_LEN}-->字以下）</span></th>
					<td>
						<span class="attention"><!--{$arrErr.contents}--></span>
						<div class="form-group">
							<div class="col-sm-12">
							  <textarea name="contents" class="box380 form-control" cols="60" rows="20" style="<!--{$arrErr.contents.value|h|sfGetErrorColor}-->; ime-mode: active;"><!--{"\n"}--><!--{$arrForm.contents.value|h}--></textarea>
							</div>
						</div>
						<p class="mini attention">※ご注文に関するお問い合わせには、必ず「ご注文番号」をご記入くださいますようお願いいたします。</p>
					</td>
				</tr>
			</table>

			<div class="btn_area">
				<ul class="list-unstyled">
					<li>
						<input type="submit" class="btn btn-primary" value="確認ページへ" alt="確認ページへ" name="confirm" />
					</li>
				</ul>
			</div>

		</form>
		
	</div>
</div>
