<?php
/**
 * Fuel is a fast, lightweight, community driven PHP 5.4+ framework.
 *
 * @package    Fuel
 * @version    1.8.2
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2019 Fuel Development Team
 * @link       https://fuelphp.com
 */

use Fuel\Core\Route;

return array(
	/**
	 * -------------------------------------------------------------------------
	 *  Default route
	 * -------------------------------------------------------------------------
	 *
	 */

	'_root_' => 'dashboard/index',

	/**
	 * -------------------------------------------------------------------------
	 *  Page not found
	 * -------------------------------------------------------------------------
	 *
	 */

	'_404_' => 'welcome/404',

	/**
	 * -------------------------------------------------------------------------
	 *  Example for Presenter
	 * -------------------------------------------------------------------------
	 *
	 *  A route for showing page using Presenter
	 *
	 */

	'login' => [
		['GET' , new Route('authen/login_view')],
		['POST' , new Route('authen/verify_credentials')],
	],
	'logout' => [
		['GET' , new Route('authen/logout')],
	],
	'customer(/list)?' => 'customer/list_view',
	'customer/create' => [
		['GET' , new Route('customer/create_view')],
		['POST' , new Route('customer/create_process')],
	],

	'customer/edit' => [
		['GET' , new Route('customer/edit_view')],
		['POST' , new Route('customer/edit_process')],
	],

	'customer/delete' => [
		['POST' , new Route('customer/ajax_delete_process')],
	],
);
