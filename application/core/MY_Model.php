<?php

class MY_Model extends CI_Model
{
	protected $_table;

	public function __construct()
	{
		parent::__construct();
	}

	/**
	 * Find Data
	 *
	 * @param  string tableName but is optional
	 * @param  string or array $value
	 * @return object
	 */
	public function find($value = '')
	{
		$condition = [];
		if (func_num_args() == 2) {
			$table     = func_get_arg(0);
			$condition = func_get_arg(1);
		} else {
			$table = $this->_table;
			if (is_array($value)) {
				$condition = $value;
			} else {
				$condition = [$this->primaryKey => $value];
			}
		}

		return $this->db->get_where($table, $condition);
	}

	/**
	 * @return mixed
	 */
	public function findAll()
	{
		if (func_num_args() > 0) {
			$table = func_get_arg(0);
		} else {
			$table = $this->_table;
		}

		return $this->db->get($table);
	}

	public function get_all()
	{
		$data = $this->db->get($this->_table);

		$res = new stdClass;
		if ($data->num_rows() > 0) {
			$res = $data->result();
		}

		return $res;
	}

	public function insert($data)
	{
		return $this->db->insert($this->_table, $data);
	}

	public function insert_batch($data)
	{
		return $this->db->insert_batch($this->_table, $data);
	}

	public function update($data, $condition)
	{
		return $this->db->update($this->_table, $data, $condition);
	}

	public function delete($condition)
	{
		return $this->db->delete($this->_table, $condition);
	}

	public function is_exist($condition)
	{
		$row = $this->db->get_where($this->_table, $condition)->num_rows();

		$exist = false;
		if ($row > 0) {
			$exist = true;
		}

		return $exist;
	}

	public function id_exist($id)
	{
		$row = $this->db->get_where($this->_table, ['id' => $id])->num_rows();

		$exist = true;
		if ($row > 0) {
			$exist = false;
		}

		return $exist;
	}
}
