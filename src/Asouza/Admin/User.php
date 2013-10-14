<?php
namespace Asouza\Admin;


/**
 * Handle User Admin
 *
 * @author Alexsandro
 */
class User extends Crud
{
	const TABLE_NAME = 'admin_user';
	
	public function add($data){
		$data['password'] = htmlspecialchars(Auth::generetePassWord($data['password']));
		$data['email'] = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
		if($data['email']){
			return $this->insert($data);
		}
		return false;
	}
	
}

?>
