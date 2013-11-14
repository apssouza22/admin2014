<?php

namespace Asouza;

/**
 * Class that handle CRUD
 *
 * @author Alexsandro Souza
 */
class Model
{

	protected $crud;

	public function __construct($id = null)
	{
		$this->crud = new Crud($this);

		if (isset($id) && !empty($id)) {
			if ($obj = $this->crud->fetch($id)) {
				foreach (get_object_vars($obj) as $key => $value) {
					$this->$key = $value;
				}
			}
		}
	}
	
	public function __get($name)
	{
		return isset($this->$name) ? $this->$name : '';
	}

	public function insert($data)
	{
		return $this->crud->insert($data);
	}

	public function fetch($id)
	{
		return $this->crud->fetch($id);
	}

	public function fetchAll($where = '1')
	{
		return $this->crud->fetchAll($where);
	}

	public function fetchAllObject($where = '1')
	{
		return $this->crud->fetchAllObject($where);
	}

	public function update($data, $id)
	{
		return $this->crud->update($data, $id);
	}

	public function store($data)
	{
		return $this->crud->store($data);
	}

	public function delete($id = null)
	{
		$id = $id ?: $this->id;
		return $this->crud->delete($id);
	}

	public function count($where = '1')
	{
		return $this->crud->count($where);
	}

}

