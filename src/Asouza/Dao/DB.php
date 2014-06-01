<?php

namespace Asouza\Dao;

/**
 * Description of DB
 *
 * @author Alexsandro Souza
 */
abstract class DB {

    public static $utf8Convert = false;
    public static $debug = false;
    protected $valueColumns;
    protected $conn;

    protected function setConnection($conn) {
        $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $this->conn = $conn;
    }

    public function execute($query, $isInsert = false) {
        try {
            $stmte = $this->conn->prepare($query);
            if (is_array($this->valueColumns)) {
                foreach ($this->valueColumns as $key => &$value) {
                    $stmte->bindParam($key, $value);
                }
            }
            $stmte->execute();
        } catch (\PDOException $e) {
            if (self::$debug) {
                echo $e->getMessage();
                echo '<br>';
                echo $query;
            }
            throw new \Exception($e->getMessage());
            return false;
        }

        if ($isInsert) {
            $this->id = $this->conn->lastInsertId();
        }

        return $stmte;
    }

    public function set($column, $value) {
        $this->valueColumns[$column] = $value;
        return $this;
    }

    protected function assignData($data) {
        foreach ($data as $column => $value) {
            $this->setRowData($column, $value);
        }
    }

    /**
     * Armazena no vetor $valueColumns cada par coluna/valor do array ou objeto
     * com a opção de aplicar htmlspecialchars em cada valor antes de armazenar no banco
     * Usado apenas em INSERT e UPDATE
     * @param array/Object $data 
     * @param boolean $htmlspecialchars transformar os campos os caracteres especiais em codigos html 
     */
    public function data($data, $htmlspecialchars = true) {
        try {
            if (!is_array($data)) {
                if (is_object($data)) {
                    $data = get_object_vars($data);
                } else {
                    throw new Exception("Data deve ser um array associativo ou um objeto");
                }
            }
            $this->assignData($data);
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }

        if ($htmlspecialchars) {
            foreach ($this->valueColumns as $chave => $value) {
                if (in_array($value, $data)) {
                    $this->valueColumns[$chave] = htmlspecialchars($value, ENT_QUOTES);
                }
            }
        }

        return $this;
    }

    /**
     * Armazena no vetor $valueColumns cada par coluna/valor
     * Usado apenas em INSERT e UPDATE
     * @param unknown_type $column 
     * @param unknown_type $value
     */
    public function setRowData($column, $value) {
        //as vezes vem y e x do form, não sei por q, estou evitando eles
        if ($column == 'y' || $column == 'x') {
            return false;
        }

        if (is_scalar($value)) {
            if (is_string($value) && !empty($value)) {
                $this->valueColumns[$column] = self::$utf8Convert ? utf8_decode($value) : $value;
            } else {
                $this->valueColumns[$column] = $value;
            }
        }
    }

    /**
     * M�todo que recebe a clausula Where da query, com a opção de passar os valores num array associativo
     * que ser� usado no m�todo prepare do PDO
     */
    public function where($sqlWhere, $bindParam = null) {
        $this->filter->where($sqlWhere);

        if (is_array($bindParam)) {
            foreach ($bindParam as $key => $value) {
                $this->valueColumns[$key] = $value;
            }
        }
        return $this;
    }

}
