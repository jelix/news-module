<h1>{@news_admin~news.details.title@}</h1>

{formdata $form}
<div class="card">
    <div class="card-body form-horizontal jforms-view">
        <div class="form-group">{ctrl_label 'title'}
            <div class="controls col-sm-10">{ctrl_value 'title'}</div></div>
        <div class="form-group">{ctrl_label 'slugurl'}
            <div class="controls col-sm-10">{ctrl_value 'slugurl'}</div></div>
        <div class="form-group">{ctrl_label 'date_create'}
            <div class="controls col-sm-10">{ctrl_value 'date_create'}</div></div>
        <div class="form-group">{ctrl_label 'abstract'}
            <div class="controls col-sm-10">{ctrl_value 'abstract'}</div></div>
        <div class="form-group">{ctrl_label 'content'}
            <div class="controls col-sm-10">{ctrl_value 'content'}</div></div>
        <div class="form-group">{ctrl_label 'lang'}
            <div class="controls col-sm-10">{ctrl_value 'lang'}</div></div>
        <div class="form-group">{ctrl_label 'author'}
            <div class="controls col-sm-10">{ctrl_value 'author'}</div></div>
    </div>

    <div class="card-footer">

    {ifacl2 'news.manage'}
        <a href="{jurl $editAction, array('id'=>$id)}" class="btn btn-primary">{@jelix~crud.link.edit.record@}</a>
        <a href="{jurl $deleteAction, array('id'=>$id)}" class="btn btn-danger" onclick="return confirm('{@jelix~crud.confirm.deletion@}')">{@jelix~crud.link.delete.record@}</a>
    {/ifacl2}
        <a href="{jurl $listAction}" class="btn btn-secondary">{@jelix~crud.link.return.to.list@}</a>

    </div>
</div>
{/formdata}
