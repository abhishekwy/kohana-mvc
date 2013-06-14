<?php

class Controller_Foo extends Controller {
    public function action_bar(){
        $parameter = $this->request->param('parameter1');
        if(!empty($parameter)){
            $this->response->body('In controller Foo, action Bar, with a Parameter of: '. $parameter);
        }else{
           $this->response->body("No parameter passed to Foo Controller, Bar action... but we're all good!");
        }
    }
}
