<?php
class Controller_Boom_Bang extends Controller {

    public function action_pow()
    {
        $this->response->body('In controller Boom_Bang, action pow!!!!');
    }

    public function action_scyther()
    {
	$use_this = $this->request->param('weapon');
	$this->response->body('<br>You better use '.$use_this.'.<br>');
#	$this->response->body('This is the scyther action in the controller');
    }
    
    public function action_index(){
	$this->response->body('You have a lousy trainer it seems! :P ');
    }       
}
