<?php
use Orm\Model;
class Repository_Customer extends Repository_Base implements Repository_Base_Interface, Repository_Customer_Interface
{
	const CREATE_ERROR_DUPLICATE_EMAIL_ENTRY_CODE = 1062;
	const CREATE_ERROR_DUPLICATE_EMAIL_ENTRY_MSG = 'Email is already exists';
	public function __construct(Model $model)
	{
		$this->model = $model;
	}
}