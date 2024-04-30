{if $id === null}
<h1>{@news_admin~news.add.title@}</h1>
{else}
<h1>{@news_admin~news.update.title@}</h1>
{/if}

{form $form, $submitAction, array('id'=>$id)}
    <div class="card">
        <div class="card-body">
            <div class="form-group">{ctrl_label 'title'}
                <div class="controls">{ctrl_control 'title'}</div></div>
            <div class="form-group">{ctrl_label 'slugurl'}
                <div class="controls">{ctrl_control 'slugurl'}</div></div>
            <div class="form-group">{ctrl_label 'date_create'}
                <div class="controls">{ctrl_control 'date_create'}</div></div>
            <div class="form-group">{ctrl_label 'abstract'}
                <div class="controls">{ctrl_control 'abstract'}</div></div>
            <div class="form-group">{ctrl_label 'content'}
                <div class="controls">{ctrl_control 'content'}</div></div>
            <div class="form-group">{ctrl_label 'lang'}
                <div class="controls">{ctrl_control 'lang'}</div></div>
            <div class="form-group">{ctrl_label 'author'}
                <div class="controls">{ctrl_control 'author'}</div></div>
        </div>
    </div>

    <div class="jforms-submit-buttons form-actions card-footer">
    {formsubmit}
        <a href="{jurl $listAction}" class="btn btn-secondary">{@jelix~ui.buttons.cancel@}</a>
    </div>
{/form}
