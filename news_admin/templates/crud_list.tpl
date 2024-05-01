<h1>{@news_admin~news.list.title@}</h1>

<table class="table table-bordered table-hover">
<thead>
<tr>
    {foreach $properties as $propname}
    {if isset($controls[$propname])}
    <th>{$controls[$propname]->label|eschtml}</th>
    {else}
    <th>{$propname|eschtml}</th>
    {/if}
    {/foreach}
    <th>&nbsp;</th>
</tr>
</thead>
<tbody>
{foreach $list as $record}
<tr class="{cycle array('odd','even')}">
    {foreach $properties as $propname}
    <td>{$record->$propname|eschtml}</td>
    {/foreach}
    <td>
        <a class="btn btn-block btn-info" href="{jurl $viewAction,array('id'=>$record->$primarykey)}">{@jelix~crud.link.view.record@}</a>
    </td>
</tr>
{/foreach}
</tbody>
</table>
{if $recordCount > $listPageSize}
    <nav>{pagelinksadminui $listAction, array(),  $recordCount, $page, $listPageSize, $offsetParameterName }</nav>
{/if}

{ifacl2 'news.manage'}
<p><a href="{jurl $createAction}" class="btn btn-primary">{@news_admin~news.list.add.new@}</a></p>
{/ifacl2}

