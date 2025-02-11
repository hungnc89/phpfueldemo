<?php


use Fuel\Core\Format;
use Fuel\Core\Input;
use Fuel\Core\Response;
use Fuel\Core\Session;
use Fuel\Core\Uri;
use Fuel\Core\Validation;
use Fuel\Core\View;

class Controller_Customer extends Controller_Base
{
	const TITLE_PAGE_CUSTOMER_LIST = 'Customer list';
	const TITLE_PAGE_CUSTOMER_EDIT = 'Customer edit';
	const TITLE_PAGE_CUSTOMER_NOT_FOUND = 'Customer not found';
	const TITLE_PAGE_CUSTOMER_CREATE = 'Customer create';
	const INPUT_FIELD_CUSTOMER_NAME_LABEL = 'customer_name';
	const INPUT_FIELD_CUSTOMER_EMAIL_LABEL = 'customer_email';
	const INPUT_FIELD_CUSTOMER_PHONE_LABEL = 'customer_phone';
	const INPUT_FIELD_CUSTOMER_ADDRESS_LABEL = 'customer_address';
	const INPUT_FIELD_CUSTOMER_SEX_LABEL = 'customer_sex';
	private Repository_Customer $customer_repo;
	public function before()
	{
		parent::before();
		$this->customer_repo = new Repository_Customer(
			new Model_Customer()
		);
	}
	public function action_list_view()
	{
		$this->addJsFiles([
			'pages/customer/list_view.js',
		]);

		$this->template->title_page = self::TITLE_PAGE_CUSTOMER_LIST;

		$current_page = Input::get('page', 1);

		$content_data = [
			'create_customer_success' => Session::get_flash('create_customer_success'),
			'delete_customer_success' => Session::get_flash('delete_customer_success'),
			'current_page' => $current_page,
			'list_customers' => $this->customer_repo->get_page($current_page),
		];

		$this->template->content = View::forge('customer/list_view', $content_data);
	}

	public function action_create_view()
	{
		$content_data['customer_name'] = '';
		$content_data['customer_email'] = '';
		$content_data['customer_address'] = '';
		$content_data['customer_phone'] = '';
		$content_data['customer_sex'] = 1;
		$this->template->title_page = self::TITLE_PAGE_CUSTOMER_LIST;
		$this->template->content = View::forge('customer/create_view', $content_data);
	}

	public function action_create_process()
	{
		$has_errors = false;
		$this->template->title_page = self::TITLE_PAGE_CUSTOMER_CREATE;
		$customer_name = Input::post(self::INPUT_FIELD_CUSTOMER_NAME_LABEL);
		$customer_email = Input::post(self::INPUT_FIELD_CUSTOMER_EMAIL_LABEL);
		$customer_address = Input::post(self::INPUT_FIELD_CUSTOMER_ADDRESS_LABEL);
		$customer_phone = Input::post(self::INPUT_FIELD_CUSTOMER_PHONE_LABEL);
		$customer_sex = Input::post(self::INPUT_FIELD_CUSTOMER_SEX_LABEL);

		$validation_customer_create_form = Validation::forge('validation_create_customer_form');
		$validation_customer_create_form->add(self::INPUT_FIELD_CUSTOMER_NAME_LABEL, self::INPUT_FIELD_CUSTOMER_NAME_LABEL)->add_rule('required');
		$validation_customer_create_form->add(self::INPUT_FIELD_CUSTOMER_EMAIL_LABEL, self::INPUT_FIELD_CUSTOMER_EMAIL_LABEL)->add_rule('required');
		$validation_customer_create_form->add(self::INPUT_FIELD_CUSTOMER_ADDRESS_LABEL, self::INPUT_FIELD_CUSTOMER_ADDRESS_LABEL)->add_rule('required');
		$validation_customer_create_form->add(self::INPUT_FIELD_CUSTOMER_PHONE_LABEL, self::INPUT_FIELD_CUSTOMER_PHONE_LABEL)->add_rule('required');
		$validation_customer_create_form->add(self::INPUT_FIELD_CUSTOMER_SEX_LABEL, self::INPUT_FIELD_CUSTOMER_SEX_LABEL)->add_rule('required');
		$validation_customer_create_form->set_message('required', 'Field :label is required.');

		$content_data['customer_name'] = $customer_name;
		$content_data['customer_email'] = $customer_email;
		$content_data['customer_address'] = $customer_address;
		$content_data['customer_phone'] = $customer_phone;
		$content_data['customer_sex'] = $customer_sex;

		if (!$validation_customer_create_form->run()) {
			$has_errors = true;
			$content_data['errors'] = $validation_customer_create_form->error();
		}
		else{
			try {
				$this->customer_repo->create([
					'name' => $validation_customer_create_form->validated(self::INPUT_FIELD_CUSTOMER_NAME_LABEL),
					'email' => $validation_customer_create_form->validated(self::INPUT_FIELD_CUSTOMER_EMAIL_LABEL),
					'phone' => $validation_customer_create_form->validated(self::INPUT_FIELD_CUSTOMER_PHONE_LABEL),
					'address' => $validation_customer_create_form->validated(self::INPUT_FIELD_CUSTOMER_ADDRESS_LABEL),
					'sex' => $validation_customer_create_form->validated(self::INPUT_FIELD_CUSTOMER_SEX_LABEL),
				]);
			}
			catch (Exception $e) {
				$has_errors = true;
				if ($e->getCode() == Repository_Customer::CREATE_ERROR_DUPLICATE_EMAIL_ENTRY_CODE) {
					$content_data['errors'] = [
						self::INPUT_FIELD_CUSTOMER_EMAIL_LABEL => Repository_Customer::CREATE_ERROR_DUPLICATE_EMAIL_ENTRY_MSG
					];
				}
			}

		}

		if (!$has_errors){
			Session::set_flash('create_customer_success', true);
			Response::redirect('/customer/list_view');
		}

		$this->template->content = View::forge('customer/create_view', $content_data);
	}

	public function action_edit_view()
	{
		$customer_id = Input::get('id');
		if (empty($customer_id)) {
			Response::redirect('customer/list_view');
		}

		$customer = $this->customer_repo->get_by_id($customer_id);
		if (empty($customer)) {
			$this->set_response_status(404);
			$this->template->title_page = self::TITLE_PAGE_CUSTOMER_NOT_FOUND;
			$this->template->content = View::forge('customer/404');
			return;
		}

		$content_data['customer_name'] = $customer->name;
		$content_data['customer_email'] = $customer->email;
		$content_data['customer_address'] = $customer->address;
		$content_data['customer_phone'] = $customer->phone;
		$content_data['customer_sex'] = $customer->sex;
		$content_data['update_customer_success'] = Session::get_flash('update_customer_success');

		$this->addJsFiles([
			'pages/customer/edit_view.js',
		]);

		$this->template->title_page = self::TITLE_PAGE_CUSTOMER_EDIT;
		$this->template->content = View::forge('customer/edit_view', $content_data);
	}

	public function action_edit_process()
	{
		$has_errors = false;
		$customer_id = Input::get('id');
		if (empty($customer_id)) {
			Response::redirect('customer/list_view');
		}

		$validation_customer_edit_form = Validation::forge('validation_edit_customer_form');
		$validation_customer_edit_form->add(self::INPUT_FIELD_CUSTOMER_NAME_LABEL, self::INPUT_FIELD_CUSTOMER_NAME_LABEL)->add_rule('required');
		$validation_customer_edit_form->add(self::INPUT_FIELD_CUSTOMER_EMAIL_LABEL, self::INPUT_FIELD_CUSTOMER_EMAIL_LABEL)->add_rule('required');
		$validation_customer_edit_form->add(self::INPUT_FIELD_CUSTOMER_ADDRESS_LABEL, self::INPUT_FIELD_CUSTOMER_ADDRESS_LABEL)->add_rule('required');
		$validation_customer_edit_form->add(self::INPUT_FIELD_CUSTOMER_PHONE_LABEL, self::INPUT_FIELD_CUSTOMER_PHONE_LABEL)->add_rule('required');
		$validation_customer_edit_form->add(self::INPUT_FIELD_CUSTOMER_SEX_LABEL, self::INPUT_FIELD_CUSTOMER_SEX_LABEL)->add_rule('required');
		$validation_customer_edit_form->set_message('required', 'Field :label is required.');

		if (!$validation_customer_edit_form->run()) {
			$has_errors = true;
			$content_data['errors'] = $validation_customer_edit_form->error();
		}
		else{
			try {
				$this->customer_repo->update($customer_id, [
					'name' => $validation_customer_edit_form->validated(self::INPUT_FIELD_CUSTOMER_NAME_LABEL),
					'email' => $validation_customer_edit_form->validated(self::INPUT_FIELD_CUSTOMER_EMAIL_LABEL),
					'phone' => $validation_customer_edit_form->validated(self::INPUT_FIELD_CUSTOMER_PHONE_LABEL),
					'address' => $validation_customer_edit_form->validated(self::INPUT_FIELD_CUSTOMER_ADDRESS_LABEL),
					'sex' => $validation_customer_edit_form->validated(self::INPUT_FIELD_CUSTOMER_SEX_LABEL),
				]);
			}
			catch (Exception $e) {
				$has_errors = true;
				if ($e->getCode() == Repository_Customer::CREATE_ERROR_DUPLICATE_EMAIL_ENTRY_CODE) {
					$content_data['errors'] = [
						self::INPUT_FIELD_CUSTOMER_EMAIL_LABEL => Repository_Customer::CREATE_ERROR_DUPLICATE_EMAIL_ENTRY_MSG
					];
				}
			}

		}
		if (!$has_errors){
			Session::set_flash('update_customer_success', true);
			Response::redirect(Uri::create('customer/edit', [], ['id' => $customer_id]));
		}

		$customer = $this->customer_repo->get_by_id($customer_id);
		if (empty($customer)) {
			$this->set_response_status(404);
			$this->template->title_page = self::TITLE_PAGE_CUSTOMER_NOT_FOUND;
			$this->template->content = View::forge('customer/404');
			return;
		}

		$content_data['customer_name'] = $validation_customer_edit_form->validated(self::INPUT_FIELD_CUSTOMER_NAME_LABEL);
		$content_data['customer_email'] = $validation_customer_edit_form->validated(self::INPUT_FIELD_CUSTOMER_EMAIL_LABEL);
		$content_data['customer_address'] = $validation_customer_edit_form->validated(self::INPUT_FIELD_CUSTOMER_ADDRESS_LABEL);
		$content_data['customer_phone'] = $validation_customer_edit_form->validated(self::INPUT_FIELD_CUSTOMER_PHONE_LABEL);
		$content_data['customer_sex'] = $validation_customer_edit_form->validated(self::INPUT_FIELD_CUSTOMER_SEX_LABEL);

		$this->template->title_page = self::TITLE_PAGE_CUSTOMER_EDIT;
		$this->template->content = View::forge('customer/edit_view', $content_data);
	}

	public function action_ajax_delete_process()
	{
		$msg_error = '';
		$success = true;
		$status_code = 200;
		$customer_id = Input::json('id');

		try {
			$this->customer_repo->delete($customer_id);
		}
		catch (Exception $e) {
			$success = false;
			$msg_error = 'Error deleting customer record: ' . $customer_id;
		}

		$response_data = [
			'success' => $success,
		];

		if (!$success) {
			$response_data['error'] = $msg_error;
		}
		else
		{
			Session::set_flash('delete_customer_success', true);
		}

		return Response::forge(Format::forge($response_data)->to_json(), $status_code);
	}
}