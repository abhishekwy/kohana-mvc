<?php
defined('SYSPATH') or die('No direct script access.');
/**
 * Description of defaulttemplate
 *
 * @author aquilax
 */
class Controller_DefaultTemplate extends Controller_Template {

  //The webpage title
  private $site_title = 'Kohana Hacker News';
  
  //The default template
  public $template = 'templates/default_tpl';

  //This variable will hold the data passed to the views
  public $data = array();

  public function before() {
    parent::before();

    if($this->auto_render) {
      $this->template->title            = '';
      $this->template->meta_keywords    = '';
      $this->template->meta_description = '';
      $this->template->meta_copywrite   = '';
      $this->template->content          = '';
    }
  }

  public function after() {
    /*
     * Set the page title to $site_title if title is not set,
     * otherwise create title 'path'
     */
    if ($this->template->title){
      $this->template->title = $this->template->title.' » '.$this->site_title;
    } else {
      $this->template->title = $this->site_title;
    }
    parent::after();
  }

  public function render($template = FALSE, $view = FALSE){
    /*
     * Force specific template
     */
    if ($template){
      $this->template = $template;
    }
    /*
     * Use default view logic if $view is not forced
     */
    if (!$view){
      $view = 'pages/'.$this->request->controller.'/'.$this->request->action.'_tpl';
    }
    $this->template->content = View::factory($view, $this->data);
  }
}
?>

