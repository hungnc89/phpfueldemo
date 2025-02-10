<?php

use Auth\Auth;
use Fuel\Core\Input;
use Fuel\Core\Response;
use Fuel\Core\Validation;
use Fuel\Core\View;

class Controller_Authen extends Controller_Base
{
	const INPUT_FIELD_USERNAME_NAME = 'username';
	const INPUT_FIELD_USERNAME_LABEL = 'username';
	const INPUT_FIELD_PASSWORD_NAME = 'password';
	const INPUT_FIELD_PASSWORD_LABEL = 'password';
	public $template = 'template_login';

	public function before()
	{
		parent::before();
	}

	public function action_login_view()
	{
		$this->template->content = View::forge('login/login_form');
	}

	public function action_verify_credentials()
	{
		$has_errors = false;
		$content_data = [];
		$username = Input::post(self::INPUT_FIELD_USERNAME_NAME);
		$password = Input::post(self::INPUT_FIELD_PASSWORD_NAME);

		$validation_login_form = Validation::forge('validation_login_form');
		$validation_login_form->add(self::INPUT_FIELD_USERNAME_NAME, self::INPUT_FIELD_USERNAME_LABEL)->add_rule('required');
		$validation_login_form->add(self::INPUT_FIELD_PASSWORD_NAME, self::INPUT_FIELD_PASSWORD_LABEL)->add_rule('required');
		$validation_login_form->set_message('required', 'Field :label is required.');

		if (!$validation_login_form->run())
		{
			$has_errors = true;
			$content_data['errors'] = $validation_login_form->error();
		}
		else{
			if (!Auth::login($username, $password))
			{
				$has_errors = true;
				$content_data['errors'] = ['invalid' => 'Invalid username or password'];
			}
		}

		if (!$has_errors){
			Response::redirect('/');
		}

		$this->template->content = View::forge('login/login_form', $content_data);
	}

	public function action_logout()
	{
		Auth::logout();
		Response::redirect('/login');
	}
}