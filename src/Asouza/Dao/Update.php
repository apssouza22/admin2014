<?php

namespace Asouza\Dao;

/**
 * Description of Update
 *
 * @author Alexsandro Souza
 */
class Update extends DB
{

	private $table;
	protected $filter;
	protected $valueColumns = array();

	public function __construct($conn, $table = ' ', $class = null)
	{
		$this->setConnection($conn);
		$this->class = $class;
		$this->table = $table;
		$this->filter = new Filter();
	}

	/**
	 * Gera a string sql 
	 * @return string Sql formatado pronto para executar 
	 */
	public function getQuery()
	{
//		foreach ($this->valueColumns as $column => $value) {
//			$this->setRowData($column, $value);
//		}

		if ($this->valueColumns) {
			foreach ($this->valueColumns as $column => $value) {
				$set[] = "{$column} = :{$column}";
			}
		}

		$sql = "UPDATE {$this->getTable()}";
		$sql .= ' SET ' . implode(', ', $set);
		$sql .= $this->filter->getWhere();
		return $sql;
	}

	/**
	 * retorna o nome da tabela no banco de dados da entidade
	 * @return string nome da tabela 
	 */
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

	/**
	 * executa a instru��o no banco de dados
	 * @return int retorna a quantidade de registros afetados
	 */
	public function save()
	{
		$stmte = $this->execute($this->getQuery());
		return $stmte->rowCount();
	}

}

?>
