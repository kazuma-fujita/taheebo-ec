<!--{strip}-->
	<div class="block_outer">
		<div id="bc_infomation">
			<h4 class="title">
				新着情報　
				<span class="rss">
					<a href="<!--{$smarty.const.ROOT_URLPATH}-->rss/<!--{$smarty.const.DIR_INDEX_PATH}-->" target="_blank"><i class="fa fa-rss"></i></a>
				</span>
			</h4>
			<div class="block_body">
				<div class="news_contents">
				<!--{section name=data loop=2}-->
				<!--{assign var="date_array" value="-"|explode:$arrNews[data].cast_news_date}-->
				<dl class="newslist">
					<dt class="date">
						<!--{$date_array[0]}-->年<!--{$date_array[1]}-->月<!--{$date_array[2]}-->日
					</dt>
					<dt class="text">
						<a
							<!--{if $arrNews[data].news_url}--> href="<!--{$arrNews[data].news_url}-->" <!--{if $arrNews[data].link_method eq "2"}--> target="_blank"
								<!--{/if}-->
							<!--{/if}-->
						>
							<!--{$arrNews[data].news_title|h|nl2br}--></a>
					</dt>

					<dd class="mini"><!--{$arrNews[data].news_comment|h|nl2br}--></dd>
				</dl>
				<!--{/section}-->
				</div>
			</div>
		</div>
	</div>
<!--{/strip}-->
