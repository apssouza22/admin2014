<?php

namespace Asouza\Dao;

/**
 * Classe que gurdará todos os filtros
 *
 * @author apssouza
 */
class Filter
{

	/**
	 * @var string 
	 */
	private $where;

	/**
	 * @var string 
	 */
	private $group;

	/**
	 * @var string 
	 */
	private $order;

	/**
	 * @var string 
	 */
	private $limit;

	public function where($sqlWhere)
	{
		$this->where = $sqlWhere;
		return $this;
	}

	public function getWhere()
	{
		return $this->where ? " WHERE " . $this->where : " WHERE 1";
	}

	public function limit($limit, $offSet = 0)
	{
		$this->limit = " LIMIT " . $offSet . ' , ' . $limit;
		return $this;
	}

	public function orderBy($order)
	{
		$this->order = " ORDER BY " . $order;
		return $this;
	}

	public function groupBy($group)
	{
		$this->group = " GROUP BY " . $group;
		return $this;
	}

	public function getFilter()
	{
		$query = $this->getWhere();
		$query .=  $this->group;
		$query .= $this->order;
		$query .= $this->limit;
		return $query;
	}

}

?>
