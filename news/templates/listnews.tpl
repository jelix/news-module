<div class="content-box" id="article">
    <h2>{@news~news.page_title@}</h2>

{if $listnews}
{foreach $listnews as $news}
<article class="news" id="news{$news->news_id}">
    <h3>{$news->title}</h3>
    <div class="news-infos"><a href="{jurl 'news~default:article', array('newsid'=>$news->slugurl, 'lang'=>$lang)}"
title="{@news~news.permanent.link@}"># {$news->date_create|jdatetime}</a>
         {$news->author|escxml}.</div>

{if $news->abstract ==''}
    <div class="news-content">{$news->content}</div>
{else}
    <div class="news-content">{$news->abstract}</div>
    <p><a href="{jurl 'news~default:article', array('newsid'=>$news->slugurl, 'lang'=>$lang)}">{@news~news.full.article.label@}</a></p>
{/if}
</article>
{/foreach}
{else}
<p>No news.</p>
{/if}

</div>
