<?php

class Repository_Base implements Repository_Base_Interface
{
	protected $model;

	public function create(array $data)
	{
		foreach ($data as $field => $value){
			$this->model->$field = $value;
		}

		return $this->model->save();
	}

	public function get_page($page = 1, $limit = 20)
	{
		return $this->model->query()->rows_limit($limit)->offset(($page-1)*$limit)->order_by('id', 'DESC')->get();
	}

	public function get_by_id($id)
	{
		return $this->model->find($id);
	}

	public function update($id, array $data)
	{
		$this->model = $this->get_by_id($id);
		foreach ($data as $field => $value){
			$this->model->$field = $value;
		}

		return $this->model->save();
	}

	public function total_pages()
	{

	}
}