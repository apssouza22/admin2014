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

    public function insert($data) {
        $this->registry['db']->insertInto($this->reflationObj->getConstant('TABLE_NAME'), $data)
                ->values($data)->exec();
        return $this->registry['db']->lastInsertId();
    }

    public function fetch($id) {
        return $this->registry['db']->select('*')
                ->from($this->reflationObj->getConstant('TABLE_NAME'))
                ->where(array('id' => $id))
                ->fetch($this->reflationObj->getName());
    }

    public function fetchAll($where = '1') {
        $all = $this->registry['db']->select('*')
                ->from($this->reflationObj->getConstant('TABLE_NAME'))
                ->where($where)
                ->fetchAll($this->reflationObj->getName());
        return $all;
    }

    public function update($data, $id) {
        return $this->registry['db']->update($this->reflationObj->getConstant('TABLE_NAME'))
                        ->set($data)->where(array('id' => $id))->exec();
    }

    public function store($data) {
        if (isset($data['id']) && !empty($data['id'])) {
            return $this->update($data, $data['id']);
        } else {
            return $this->insert($data);
        }
    }

    public function delete($id) {
       return  $this->registry['db']->deleteFrom($this->reflationObj->getConstant('TABLE_NAME'))
                ->where(array('id' => $id))->exec();
    }

    public function count($where = '1') {
        $fetch = $this->registry['db']
                        ->select('count(*) total')
                        ->from($this->reflationObj->getConstant('TABLE_NAME'))
                        ->where($where)->fetch();
        return $fetch->total;
    }

}
