<?php
interface Repository_Base_Interface
{
	public function create(array $data);

	public function get_page($page = 1, $limit = 20);

	public function get_by_id(int $id);

	public function total_pages();
}