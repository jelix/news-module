<?php

/**
* @author      Jouanneau Laurent
* @copyright   2024 Jouanneau laurent
* @licence     MIT
*/

require_once (JELIX_LIB_PATH.'core/response/jResponseHtml.class.php');

class testResponse extends jResponseHtml {


   public $bodyTpl = 'test~main';

   // modifications communes aux actions utilisant cette reponses
   protected function doAfterActions()
   {
       $this->title .= ($this->title !=''?' - ':'').' Test News';

       $this->body->assignIfNone('MAIN','<p>Empty page</p>');
       $this->body->assignIfNone('menu','<p></p>');
       $this->body->assignIfNone('page_title','Application Test for News');
       $this->addCSSLink(jApp::config()->urlengine['basePath'].'design/screen.css');
   }
}
