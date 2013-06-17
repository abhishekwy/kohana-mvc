<?php

/**
 * Controller of the sql-schema script
 *
 * @author shrinath, abhishek
 */
class Controller_Tcontroller extends Controller {

    public function action_index()
    {
        $mdl = new Model_Tmodel;
        $res = $mdl->schema_dump($_GET);
        
        
        $this->response->body($res);
    }

}