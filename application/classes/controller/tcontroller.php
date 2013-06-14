<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of tiwari
 *
 * @author shrinath
 */
class Controller_Tcontroller extends Controller {

    public function action_index()
    {
        $mdl_tiwari = new Model_Tmodel;
        $res        = $mdl_tiwari->do_tiwari_insert($_GET);

        $mdl_tiwari->do_tiwari_select();

        $this->response->body($res);
    }

}