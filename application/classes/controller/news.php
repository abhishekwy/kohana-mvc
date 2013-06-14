
<?php
/**
 * Description of news
 *
 * @author aquilax
 */
class Controller_News extends Controller_DefaultTemplate{

  public function  __construct($request) {
    parent::__construct($request);
  }

  public function action_index(){
    $this->render();
  }
}
?>

