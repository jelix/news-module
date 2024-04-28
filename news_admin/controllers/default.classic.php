<?php
/**
* @package      news_admin
* @author       Laurent Jouanneau
* @copyright    2010 Laurent Jouanneau
* @link         http://jelix.org
* @licence      http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU General Public Licence, see LICENCE file
*/

class defaultCtrl extends jControllerDaoCrud {

    public $pluginParams=array(
        '*'=>array('auth.required'=>true),
        'index'      =>array('jacl2.right.or'=>array('news.view', 'news.manage')),
        'precreate'  =>array('jacl2.right'=>'news.manage'),
        'create'     =>array('jacl2.right'=>'news.manage'),
        'savecreate' =>array('jacl2.right'=>'news.manage'),
        'preupdate'  =>array('jacl2.right'=>'news.manage'),
        'editupdate' =>array('jacl2.right'=>'news.manage'),
        'saveupdate' =>array('jacl2.right'=>'news.manage'),
        'view'       =>array('jacl2.right.or'=>array('news.view', 'news.manage')),
        'delete'     =>array('jacl2.right'=>'news.manage'),
    );

    protected $dao = 'news~news';

    protected $form = 'news_admin~news';

    /**
     * the jDb profile to use with the dao
     */
    protected $dbProfile = '';

    /**
     * list of properties to show in the list page
     * if empty list (default), it shows all properties.
     * this property is only usefull when you use the default "list" template
     * @var array
     */
    protected $propertiesForList = array( 'title', 'lang', 'date_create');

    /**
     * list of properties which serve to order the record list.
     * if empty list (default), the list is in a natural order.
     * keys are properties name, and values are "asc" or "desc"
     * @var array
     */
    protected $propertiesForRecordsOrder = array('date_create'=>'desc');

    protected $listTemplate = 'news_admin~crud_list';
    protected $editTemplate = 'news_admin~crud_edit';
    protected $viewTemplate = 'news_admin~crud_view';

    /**
     * number of record to display in the list page
     * @var integer
     */
    //protected $listPageSize = 20;

    /**
     * the template variable name to display a CRUD content in the main template
     * of the html response
     * @var string
     */
    //protected $templateAssign = 'MAIN';

    /**
     * name of the parameter which contains the page offset, for the index action
     * @var string
     */
    //protected $offsetParameterName = 'offset';

    /**
     * full path to the directory where uploaded files will be stored
     * automatically by jForms.
     * Set it to false if you want to handle yourself the uploaded files.
     * Set it with an empty string if you want to stored files in the default
     * var/uploads directory.
     */
    protected $uploadsDirectory = false;


    /**
     * Returned a simple html response to display CRUD contents. You can redefine this
     * method to return a personnalized response
     * @return jResponseHtml the response
     */
    /*protected function _getResponse(){
        return $this->getResponse('html');
    }*/

    /**
     * create the form. You can redefine this method to modify dynamically the form
     * Typically, you call jForms::create and then you can call addControl or whatever.
     * Don't do a jForms::get or jForms::fill in this method !
     * called in methods: index, precreate, create, preupdate, view
     * @return jFormsBase the form
     */
    /*protected function _createForm($formId = null) {
        return jForms::create($this->form, $formId);
    }*/

    /**
     * get an existing form. You can redefine this method to modify dynamically the form
     * Typically, you call jForms::get and then you can call addControl or whatever.
     * Don't do a jForms::create or jForms::fill in this method !
     * called in methods: create, savecreate, editupdate, saveupdate
     * @return jFormsBase the form
     */
    /*protected function _getForm($formId = null) {
    }*/



    /**
     * you can do your own data check of a form by redefining this method.
     * You can also do some other things. It is called only if the $form->check() is ok.
     * and before the save of the data.
     * @param jFormsBase $form the current form
     * @param boolean $calltype   true for an update, false for a create
     * @return boolean true if it is ok.
     */
    /*protected function _checkData($form, $calltype)
    {
        return true;
    }*/

    /**
     * redefine this method if you wany to do additionnal things on the response and on the list template
     * during the index action.
     * @param jResponseHtml $resp the response
     * @param jtpl $tpl the template to display the record list
     */
    /*protected function _index($resp, $tpl)
    {
    }*/

    /**
     * redefine this method if you wan to do additionnal conditions to the index's select
     * during the index action.
     * @param jDaoConditions $cond the conditions
     */
    /*protected function _indexSetConditions($cond)
    {

    }*/

    /**
     * redefine this method if you want to do additionnal during the precreate action
     * @param jFormsBase $form the form
     */
    /*protected function _preCreate($form) {

    }*/

    /**
     * redefine this method if you want to do additionnal things on the response and on the edit template
     * during the create action.
     * @param jFormsBase $form the form
     * @param jResponseHtml $resp the response
     * @param jtpl $tpl the template to display the edit form 
     */
    /*protected function _create($form, $resp, $tpl) {

    }*/

    /**
     * redefine this method if you wan to do additionnal things on the dao generated by the 
     * jFormsBase::prepareDaoFromControls method
     * @param jFormsBase $form the form
     * @param jDaoRecordBase $form_daorec
     */
    protected function _beforeSaveCreate($form, $form_daorec)
    {
        if ($form_daorec->slugurl == '') {
            $form_daorec->slugurl = jUrl::escape($form_daorec->title, true);
        }
    }

    /**
     * redefine this method if you want to do additionnal things after the creation of
     * a record. For example, you can handle here the uploaded files. If you do
     * such handling, set the uploadsDirectory property to false, to prevent
     * the default behavior on uploaded files in the controller.
     * @param jFormsBase $form the form object
     * @param mixed $id the new id of the inserted record
     * @param jResponseHtml $resp the response
     */
    /*protected function _afterCreate($form, $id, $resp) {
    }*/

    /**
     * redefine this method if you want to do additionnal things during preupdate action
     * @param jFormsBase $form the form object
     */
    /*protected function _preUpdate($form) {

    }*/

    /**
     * redefine this method if you wan to do additionnal things on the response and on the edit template
     * during the editupdate action.
     * @param jFormsBase $form the form
     * @param jResponseHtml $resp the response
     * @param jtpl $tpl the template to display the edit form 
     */
    /*protected function _editUpdate($form, $resp, $tpl)
    {
    }*/

    /**
     * redefine this method if you wan to do additionnal things on the dao generated by the 
     * jFormsBase::prepareDaoFromControls method
     * @param jFormsBase $form the form
     * @param jDaoRecordBase $form_daorec
     * @param mixed $id the new id of the updated record
     */
    protected function _beforeSaveUpdate($form, $form_daorec, $id)
    {
        if ($form_daorec->slugurl == '') {
            $form_daorec->slugurl = jUrl::escape($form_daorec->title, true);
        }
    }

    /**
     * redefine this method if you wan to do additionnal things after the update of
     * a record. For example, you can handle here the uploaded files. If you do
     * such handling, set the uploadsDirectory property to false, to prevent
     * the default behavior on uploaded files in the controller.
     * @param jFormsBase $form the form object
     * @param mixed $id the new id of the updated record
     * @param jResponseHtml $resp the response
     */
    /*protected function _afterUpdate($form, $id, $resp) {
    }*/

    /**
     * redefine this method if you want to do additionnal things on the response and on the view template
     * during the view action.
     * @param jFormsBase $form the form
     * @param jResponseHtml $resp the response
     * @param jtpl $tpl the template to display the form content
     */
    /*protected function _view($form, $resp, $tpl) {
    }*/

    /**
     * redefine this method if you want to do additionnal things before the deletion of a record
     * @param mixed $id the id of the record to delete
     * @return boolean true if the record can be deleted
     * @param jResponseHtml $resp the response
     */
    /*protected function _delete($id, $resp) {
        return true;
    }*/

}
