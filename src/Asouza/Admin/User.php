<?php

namespace Asouza\Admin;

use Asouza\Model;

/**
 * Handle User Admin
 *
 * @author Alexsandro
 */
class User extends Model implements IAdmin {

    const TABLE_NAME = 'admin_user';

    public function store($data) {
        $data['password'] = htmlspecialchars(Auth::generetePassWord($data['password']));
        $data['email'] = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
        if ($data['email']) {
            return parent::store($data);
        }
        return false;
    }

    public static function getPgFolder() {
        return DIR_HTM_ROOT . 'admin/user/';
    }

    public static function getPgListar() {
        return self::getPgFolder() . 'listar.php';
    }

    public static function getPgDetalhe() {
        return self::getPgFolder() . 'detalhe.php';
    }

    public static function getPgEditar() {
        return self::getPgFolder() . 'form.php';
    }

}

?>
