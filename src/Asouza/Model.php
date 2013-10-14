<?php

namespace Asouza;



/**
 * Class that handle CRUD
 *
 * @author Alexsandro Souza
 */
class Model
{

	private $registry;
	private $reflationObj;

	public function __construct($id = null)
	{
		$this->registry = \Asouza\Registry::getInstance();
		$this->reflationObj = new \ReflectionObject($this);
		if (isset($id) && !empty($id)) {

			if ($obj = $this->fetch($id)) {
				foreach (get_object_vars($obj) as $key => $value) {
					$this->$key = $value;
				}
			}
		}
	}

	public function insert($data)
	{
//		$oData = new \ArrayObject($data, \ArrayObject::STD_PROP_LIST);
		$oData = new \ArrayObject($data);
		$this->registry['mapper']->{static::TABLE_NAME}->persist($oData);
		$this->registry['mapper']->flush();
		return $oData;
	}

	public function fetch($id)
	{
		return $this->registry['mapper']->{static::TABLE_NAME}[$id]->fetch();
		$this->registry['db']->select('*')
				->from(static::TABLE_NAME)
				->where(array('id' => $id))
				->fetchAll($this->reflationObj->getName());
	}

	public function fetchAll($where = '1')
	{
//		$all = $this->registry['mapper']->{static::TABLE_NAME}(
//				array('id' => 11)
//			)->fetchAll();

		$all = $this->registry['db']->select('*')
				->from(static::TABLE_NAME)
				->where($where)
				->fetchAll($this->reflationObj->getName());
		return $all;
	}

	public function update($data, $id)
	{
		$oData = new \ArrayObject($data);
		$this->registry['mapper']->{static::TABLE_NAME}[$id]->fetch();
		$this->registry['mapper']->{static::TABLE_NAME}->persist($oData);
		$this->registry['mapper']->flush();
		return $oData;
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
		$this->registry['mapper']->{static::TABLE_NAME}->remove($std);
		return $this->registry['mapper']->flush();
	}

	public function count($where = '1')
	{
		$fetch = $this->registry['db']
						->select('count(*) total')
						->from(static::TABLE_NAME)
						->where($where)->fetch();
		return $fetch->total;
	}

}

?>
