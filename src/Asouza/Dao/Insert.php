<?php

namespace Asouza\Dao;

/**
 * Description of Insert
 *
 * @author Alexsandro Souza
 */
class Insert extends DB
{

	private $table;
	protected $valueColumns = array();

	public function __construct($conn, $table = ' ', $class = null)
	{
		$this->setConnection($conn);
		$this->class = $class;
		$this->table = $table;
	}

	public function getQuery()
	{
		$sql = "INSERT INTO {$this->getTable()} (";
		$columns = implode(', ', array_keys($this->valueColumns));
		$sql .= $columns . ')';

		foreach ($this->valueColumns as $key => $value) {
			$bindValue[] = ":{$key}";
		}

		$values = implode(', ', $bindValue);
		$sql .= " VALUES ({$values})";
		return $sql;
	}

	private function getTable()
	{
		try {
			if (!$this->table) {
				if ($this->class) {
					$this->table = constant("{$this->class}::TB_NAME");
				} else {
					throw new Exception("Informe uma tabela");
				}
			}
			return $this->table;
		} catch (Exception $exc) {
			echo $exc->getTraceAsString();
		}
	}

	public function save()
	{
		$stmte = $this->execute($this->getQuery(), true);
		return $this->id;
	}

}

?>
