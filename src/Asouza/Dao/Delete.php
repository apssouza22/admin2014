<?php

namespace Asouza\Dao;

/**
 * Description of Delete
 *
 * @author Alexsandro Souza
 */
class Delete extends DB
{

	private $from;
	private $class;
	protected $filter;

	public function __construct($conn, $table = null, $class = null)
	{
		$this->setConnection($conn);
		$this->class = $class;
		$this->from = $table;
		$this->filter = new Filter();
	}

	public function from($from = null)
	{
		if (!$from) {
			if ($this->class) {
				$from = constant("{$this->class}::TB_NAME");
			}
		}
		$this->from = $from;
		return $this;
	}

	private function getFrom()
	{
		try {
			if (!$this->from) {
				if ($this->class) {
					$this->from = constant("{$this->class}::TB_NAME");
				} else {
					throw new Exception("Informe uma tabela");
				}
			}
			return " FROM " . $this->from;
		} catch (Exception $exc) {
			echo $exc->getTraceAsString();
		}
	}

	public function limit($limit)
	{
		$this->filter->limit($limit);
		return $this;
	}
	
	public function getQuery()
	{
		$query = "DELETE";
		$query .= $this->getFrom();
		$query .= $this->filter->getFilter();
		return $query;
	}

	public function exec()
	{
		$stmte = $this->execute($this->getQuery());
		return $stmte->rowCount();
	}

}

?>
