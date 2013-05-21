<?php defined('SYSPATH') or die('No direct script access.');

class Simpleauth{


	public static function logoff(){ 
	    Session::instance()->destroy();
	}
	
	
	public static function is_logged($group = FALSE){

		if(!$group){
			$group = Kohana::config('simpleauth.session_name'); 
		}
		

		$prefix = Kohana::config('simpleauth.session_prefix');
		$u = Session::instance()->get($prefix.$group);
		if(is_null($u)){
			return FALSE;
		}else{
			return TRUE;
		}		
	}
	
	public static function check_login($redirect_path='auth', $group=FALSE){

		if(!$group){
			$group = Kohana::config('simpleauth.session_name'); 
		}

		if(!Simpleauth::is_logged($group)){
			$request = Request::instance();
			$destiny = $request->uri;
			Session::instance()->set('temp_url', $destiny);  
			$request->redirect($redirect_path);
		}
	}
	
	public static function set_user($user, $group=FALSE){

		if(!$group){
			$group = Kohana::config('simpleauth.session_name'); 
		}

		$prefix = Kohana::config('simpleauth.session_prefix');
		Session::instance()->set($prefix.$group, $user);
		
	}
	
	public static function get_user($group=FALSE){

		if(!$group){
			$group = Kohana::config('simpleauth.session_name'); 
		}

		$prefix = Kohana::config('simpleauth.session_prefix');
		return Session::instance()->get($prefix.$group);
	}

	
	
	
}