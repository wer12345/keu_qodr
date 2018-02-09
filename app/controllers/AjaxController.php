<?php

use Phalcon\Mvc\View;

class AjaxController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
       $this->view->pick("ajax/index");
       $this->view->setRenderLevel(View::LEVEL_ACTION_VIEW);
    }

    /**
     * undocumented function
     *
     * @return void
     */
    public function getDataAction()
    {
       $akun = new ViewRekapAkun();
       $json_data = $akun->getRekapData();
       die(json_encode($json_data));
    }
    

}

