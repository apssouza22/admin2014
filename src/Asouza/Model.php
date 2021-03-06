<?php

namespace Asouza;

/**
 * Class that handle CRUD
 *
 * @author Alexsandro Souza
 */
class Model {

    protected $crud;

    public function __construct($id = null) {
        $this->crud = new Crud($this);

        if (isset($id) && !empty($id)) {
            if ($obj = $this->crud->fetchObject($id)) {
                foreach (get_object_vars($obj) as $key => $value) {
                    $this->$key = $value;
                }
            }
        }
    }

    public function __get($name) {
        return isset($this->$name) ? $this->$name : '';
    }

    public function changeStatus() {
        $obj = $this->crud->fetchObject($_REQUEST['id']);
        $status = !$obj->visible;
        $this->update(array(
            'visible' => (int) $status
                ), $_REQUEST['id']);

        return $status;
    }
    
    public function changeLike(){
        $obj = $this->crud->fetchObject($_REQUEST['id']);
        $status = !$obj->liked;
        
        $this->update(array(
            'liked' => (int)$status
        ), $_REQUEST['id']);
        
        return $status;
    }

    public function insert($data) {
        return $this->crud->insert($data);
    }

    public function fetch($id) {
        return $this->crud->fetch($id);
    }

    public function fetchObject($id) {
        return $this->crud->fetchObject($id);
    }

    public function fetchAll(\Asouza\Dao\Filter $filter = null, $columns = '*', $obj = false) {
        return $this->crud->fetchAll($filter, $columns = '*', $obj = false);
    }

    public function fetchAllObject(\Asouza\Dao\Filter $filter = null, $columns = '*') {
        return $this->crud->fetchAllObject($filter, $columns);
    }

    public function update($data, $id) {
        return $this->crud->update($data, $id);
    }

    public function store($data) {
        return $this->crud->store($data);
    }

    public function delete($id = null) {
        $id = $id ? : $this->id;
        return $this->crud->delete($id);
    }

    public function count($where = '1') {
        return $this->crud->count($where);
    }

}
