<h1>{@news_admin~news.details.title@}</h1>

{formdata $form}
<table class="jforms-table">
    <tr><th scope="row">{ctrl_label 'title'}</th><td>{ctrl_value 'title'}</td></tr>
    <tr><th scope="row">{ctrl_label 'slugurl'}</th><td>{ctrl_value 'slugurl'}</td></tr>
    <tr><th scope="row">{ctrl_label 'date_create'}</th><td>{ctrl_value 'date_create'}</td></tr>
    <tr><th scope="row">{ctrl_label 'abstract'}</th><td>{ctrl_value 'abstract'}</td></tr>
    <tr><th scope="row">{ctrl_label 'content'}</th><td>{ctrl_value 'content'}</td></tr>
    <tr><th scope="row">{ctrl_label 'lang'}</th><td>{ctrl_value 'lang'}</td></tr>
    <tr><th scope="row">{ctrl_label 'author'}</th><td>{ctrl_value 'author'}</td></tr>
</table>
{/formdata}

<ul class="crud-links-list">
{ifacl2 'news.manage'}
    <li><a href="{jurl $editAction, array('id'=>$id)}" class="crud-link">{@jelix~crud.link.edit.record@}</a></li>
    <li><a href="{jurl $deleteAction, array('id'=>$id)}" class="crud-link" onclick="return confirm('{@jelix~crud.confirm.deletion@}')">{@jelix~crud.link.delete.record@}</a></li>
{/ifacl2}
    <li><a href="{jurl $listAction}" class="crud-link">{@jelix~crud.link.return.to.list@}</a></li>
</ul>
