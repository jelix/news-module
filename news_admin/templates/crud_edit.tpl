{if $id === null}
<h1>{@news_admin~news.add.title@}</h1>
{else}
<h1>{@news_admin~news.update.title@}</h1>
{/if}

{form $form, $submitAction, array('id'=>$id)}
<table class="jforms-table">
<tr><th scope="row">{ctrl_label 'title'}</th><td width="80%">{ctrl_control 'title', array('size'=>40)}</td></tr>
    <tr><th scope="row">{ctrl_label 'slugurl'}</th><td>{ctrl_control 'slugurl'}</td></tr>
    <tr><th scope="row">{ctrl_label 'date_create'}</th><td>{ctrl_control 'date_create'}</td></tr>
    <tr><th scope="row">{ctrl_label 'abstract'}</th><td>{ctrl_control 'abstract'}</td></tr>
    <tr><th scope="row">{ctrl_label 'content'}</th><td>{ctrl_control 'content'}</td></tr>
    <tr><th scope="row">{ctrl_label 'lang'}</th><td>{ctrl_control 'lang'}</td></tr>
    <tr><th scope="row">{ctrl_label 'author'}</th><td>{ctrl_control 'author'}</td></tr>
</table>
<div class="jforms-submit-buttons">
    {formsubmit}
</div>
{/form}




<p><a href="{jurl $listAction}" class="crud-link">{@jelix~crud.link.return.to.list@}</a>.</p>