<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Welcome extends Controller_Template {
	public $template = 'layout/site';
	public function action_index()
	{
		$this->template->title = 'Deploy Kohana framework on SAE';
		$this->template->content = View::factory("welcome");
	}

} // End Welcome
