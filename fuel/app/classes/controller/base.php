<?php

use Auth\Auth;
use Fuel\Core\Controller_Template;
use Fuel\Core\Controller_Hybrid;
use Fuel\Core\Response;
use Fuel\Core\Uri;
use Fuel\Core\View;

class Controller_Base extends Controller_Hybrid
{
	protected int $_header_status = 200;
	protected string $_title_page = 'Demo FuelPhp';
	protected array $_jsFiles = [];
	protected array $_cssFiles = [];
	public function before()
	{
		parent::before();
		$this->check_access_permissions();

		$this->addCssFiles([
			'vendors/@coreui/icons/css/free.min.css',
			'vendors/simplebar/css/simplebar.css',
			'vendors/simplebar.css',
			'style.css'
		]);

		$this->addJsFiles([
			'config.js',
			'color-modes.js',
			'vendors/@coreui/coreui/js/coreui.bundle.min.js',
			'vendors/simplebar/js/simplebar.min.js',
		]);

		$this->template->title_page = $this->_title_page;
		$this->template->sidebar = View::forge('common/sidebar');
	}

	private function check_access_permissions()
	{
		$current_page = Uri::string();

		if ($current_page == 'login' && Auth::check()){
			Response::redirect('/');
		}

		if ($current_page != 'login' && !Auth::check()){
			Response::redirect('/login');
		}
	}

	public function after($response) :Response{
		$response = parent::after($response);
		$response->set_status($this->_header_status);
		return $response;
	}

	protected function set_response_status($code = 200)
	{
		$this->_header_status = $code;
	}

	protected function addJsFiles(array $files)
	{
		$view = View::forge();
		$this->_jsFiles = array_merge($this->_jsFiles, $files);
		$view->set_global('_jsFiles', $this->_jsFiles);
	}

	protected function addCssFiles(array $files)
	{
		$view = View::forge();
		$this->_cssFiles = array_merge($this->_cssFiles, $files);
		$view->set_global('_cssFiles', array_merge($this->_cssFiles, $files));
	}
}