<?php

namespace Asouza;

/**
 * Class that handle CRUD
 *
 * @author Alexsandro Souza
 */
class Crud {

    private $registry;
    private $reflationObj;

    public function __construct($bj) {
        $this->registry = \Asouza\Registry::getInstance();
        $this->reflationObj = new \ReflectionObject($bj);
    }

    public function insert($data, $htmlspecialchars = true) {
        $result = \Asouza\Dao\Query::create($this->registry['pdo'])
                ->insert($this->reflationObj->getConstant('TABLE_NAME'))
                ->data($data, $htmlspecialchars)
                ->save();
        return $result;
    }

    public function fetch($id) {
        $select = new \Asouza\Dao\Select($this->registry['pdo'], '*');
        $select->from($this->reflationObj->getConstant('TABLE_NAME'));
        $select->where("id  = :id", array('id'=> $id));
        return $select->fetchOne();
    }
    
    public function fetchObject($id) {
        $select = new \Asouza\Dao\Select($this->registry['pdo'], '*', $this->reflationObj->getName());
        $select->from($this->reflationObj->getConstant('TABLE_NAME'));
        $select->where("id  = :id", array('id'=> $id));
        return $select->fetchObject();
    }
    

    public function fetchAll(\Asouza\Dao\Filter $filter = null, $columns = '*', $obj = false) {
        $select = \Asouza\Dao\Query::create($this->registry['pdo'])
                ->setClass($this->reflationObj->getName())
                ->select($columns)
                ->from($this->reflationObj->getConstant('TABLE_NAME'));

        if ($filter) {
            $select->setFilter($filter);
        }

        if ($obj) {
            return $select->fetchAllObject();
        } else {
            return $select->fetchAll();
        }
    }

    public function fetchAllObject(\Asouza\Dao\Filter $filter = null, $columns = '*') {
        return $this->fetchAll($filter, $columns, true);
    }

    public function update($data, $id, $htmlspecialchars = true) {
        unset($data['id']);
        $result = \Asouza\Dao\Query::create($this->registry['pdo'])
                ->update($this->reflationObj->getConstant('TABLE_NAME'))
                ->data($data, $htmlspecialchars)
                ->where('id = :id', array(
                    'id' => $id
                ))
                ->save();

        if ($result) {
            return $id;
        }

        return false;
    }

    public function store($data) {
        if (isset($data['id']) && !empty($data['id'])) {
            return $this->update($data, $data['id']);
        } else {
            return $this->insert($data);
        }
    }

    public function delete($id) {
        $result = \Asouza\Dao\Query::create($this->registry['pdo'])
                ->delete($this->reflationObj->getConstant('TABLE_NAME'))
		->where("id  = :id", array('id'=> $id))
		->exec();
        return $result;
    }

    public function count($where = '1') {
        $select = new \Asouza\Dao\Select($this->registry['pdo'], 'count(*) total');
        $select->from($this->reflationObj->getConstant('TABLE_NAME'));
        $select->where($where);
        $fetch =  $select->fetchObject();
        return $fetch->total;
    }

}
