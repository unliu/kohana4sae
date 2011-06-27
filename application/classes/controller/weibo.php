<?php defined('SYSPATH') or die('No direct script access.');
class Controller_Weibo extends Controller_Template {
	public $template = 'layout/site';
	public function action_login()
	{
		$weibo = new Weibo_Client(Kohana::config('oauth.weibo'));
		$request_token = $weibo->get_request_token();
		Session::instance()->set('WEIBO_REQUEST_TOKEN', serialize($request_token));
		$callback = URL::site('weibo/authorize', TRUE);
		$url = $weibo->get_authorize_url($request_token, $callback);
		Request::factory()->redirect($url);
	}
	
	public function action_authorize()
	{
		$this->template->title = 'Kohana OAuth for weibo demo';
		$request_token = unserialize(Session::instance()->get('WEIBO_REQUEST_TOKEN'));
		$oauth_verifier = $this->request->query('oauth_verifier');
		$weibo = new Weibo_Client(Kohana::config('oauth.weibo'));
		$access_token = $weibo->get_access_token($request_token, $oauth_verifier);
		//store token in databse and session
		Session::instance()->set('WEIBO_ACCESS_TOKEN', serialize($access_token));
		Session::instance()->delete('WEIBO_REQUEST_TOKEN');
		$resp = $weibo->verify_confidentials($access_token);
		$name = $resp->screen_name;
		$avatar = $resp->profile_image_url;
		$this->template->content = View::factory('weibo/index', array('name' => $name, 'avatar' => $avatar));
	}

	public function action_latestpost()
	{
		$this->template->title = 'latest posts';
		$this->template->content = NULL;
		$access_token = unserialize(Session::instance()->get('WEIBO_ACCESS_TOKEN'));
		$weibo = new Weibo_Client(Kohana::config('oauth.weibo'));
		$resp = $weibo->user_timeline($access_token);
		if ($this->request->is_ajax())
		{
			$this->auto_render =false;
			$this->response->body($resp);
		}
		else
		{
			$this->template->content = json_decode($resp);	
		}
	}
	
	public function action_friends()
	{
		$this->template->title = 'friends';
		$this->template->content = NULL;
		$access_token = unserialize(Session::instance()->get('WEIBO_ACCESS_TOKEN'));
		$weibo = new Weibo_Client(Kohana::config('oauth.weibo'));
		$resp = $weibo->friends($access_token);
		if ($this->request->is_ajax())
		{
			$this->auto_render =false;
			$this->response->body($resp);
		}
		else
		{
			$this->template->content = json_decode($resp);	
		}
	}
}