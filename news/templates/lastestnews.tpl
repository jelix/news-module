{if $news}
<h3>{$news->title}</h3>
<div class="news-infos"><a href="{jurl 'news~default:article', array('newsid'=>$news->slugurl,'lang'=>$lang)}"
title="{@news~news.permanent.link@}"># {$news->date_create|jdatetime}</a>, {$news->author|escxml}.</div>


{if $news->abstract ==''}
<div class="news-content">{$news->content}</div>
{else}
<div class="news-content">{$news->abstract}</div>
<p><a href="{jurl 'news~default:article',array('newsid'=>$news->slugurl,'lang'=>$lang)}">{@news~news.full.article.label@}</a></p>
{/if}

{else}
<p>No news.</p>
{/if}