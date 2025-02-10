<?php

use Fuel\Core\View;

class Controller_Dashboard extends Controller_Base
{
    public function action_index()
    {
		$this->template->content = View::forge('dashboard/index');
    }
}