<?php

namespace Asouza\Dao;

/**
 * Description of DB_Query
 *
 * @author User
 */
class Query
{

	private $operation;
	private $class;
	private $conn; 

	public static function create($conn, $class = null)
	{
		$self = new self();
		$self->class = $class;
		$self->conn = $conn;
		return $self;
	}
	
	public function setClass($classname)
	{
		$this->class = $classname;
		return $this;
	}

	public function select($sqlSelect = '*')
	{
		$this->operation = new Select($this->conn, $sqlSelect, $this->class);
		return $this->operation;
	}

	public function insert($table = '')
	{
		$this->operation = new Insert($this->conn, $table, $this->class);
		return $this->operation;
	}

	public function update($table = '')
	{
		$this->operation = new Update($this->conn, $table, $this->class);
		return $this->operation;
	}

	public function delete($table = '')
	{
		$this->operation = new Delete($this->conn, $table, $this->class);
		return $this->operation;
	}

}

?>
