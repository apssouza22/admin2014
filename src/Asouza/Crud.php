<?php

namespace Asouza;



/**
 * Class that handle CRUD
 *
 * @author Alexsandro Souza
 */
class Crud
{

	private $registry;
	private $reflationObj;
	

	public function __construct($bj)
	{
		$this->registry = \Asouza\Registry::getInstance();
		$this->reflationObj = new \ReflectionObject($bj);
	}

	public function insert($data)
	{
//		$oData = new \ArrayObject($data, \ArrayObject::STD_PROP_LIST);
		$oData = new \ArrayObject($data);
		$this->registry['mapper']->{$this->reflationObj->getConstant('TABLE_NAME')}->persist($oData);
		$this->registry['mapper']->flush();
		return $oData;
	}

	public function fetch($id)
	{
		return $this->registry['mapper']->{$this->reflationObj->getConstant('TABLE_NAME')}[$id]->fetch();
		$this->registry['db']->select('*')
				->from($this->reflationObj->getConstant('TABLE_NAME'))
				->where(array('id' => $id))
				->fetch($this->reflationObj->getName());
	}

	public function fetchAll($where = '1')
	{
//		$all = $this->registry['mapper']->{$this->reflationObj->getConstant('TABLE_NAME')}(
//				array('id' => 11)
//			)->fetchAll();

		$all = $this->registry['db']->select('*')
				->from($this->reflationObj->getConstant('TABLE_NAME'))
				->where($where)
				->fetchAll($this->reflationObj->getName());
		return $all;
	}

	public function update($data, $id)
	{
		$oData = new \ArrayObject($data);
		$item = $this->registry['mapper']
				->{$this->reflationObj->getConstant('TABLE_NAME')}[$id]
				->fetch();
				
		foreach ($data as $key => $value) {
			$item->$key = $value;
		}		
		
		$this->registry['mapper']
				->{$this->reflationObj->getConstant('TABLE_NAME')}
				->persist($item);
				
		$this->registry['mapper']->flush();
		return $item;
	}

	public function store($data)
	{
		if (isset($data['id']) && !empty($data['id'])) {
			return $this->update($data, $data['id']);
		} else {
			return $this->insert($data);
		}
		return false;
	}

	public function delete($id)
	{
		$std = new \stdClass();
		$std->id = $id;
		$this->registry['mapper']->{$this->reflationObj->getConstant('TABLE_NAME')}->remove($std);
		return $this->registry['mapper']->flush();
	}

	public function count($where = '1')
	{
		$fetch = $this->registry['db']
						->select('count(*) total')
						->from($this->reflationObj->getConstant('TABLE_NAME'))
						->where($where)->fetch();
		return $fetch->total;
	}

}
