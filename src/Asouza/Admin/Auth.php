<?php

namespace Asouza\Admin;

use \Zend\Permissions\Acl\Acl;
use \Zend\Permissions\Acl\Role\GenericRole as Role;
use \Zend\Permissions\Acl\Resource\GenericResource as Resource;
use Zend\Db\Adapter\Adapter as DbAdapter;
use Zend\Authentication\Adapter\DbTable as AuthAdapter;

/**
 * Classe que cuida da autenticação e verificação de permissões
 * essa classe usa os componentes ACL e Auth do Zend
 *
 * @author Alexsandro
 * @subpackage Zend ACL, Zend Auth
 */
class Auth
{

	private $acl;
	private $auth;
	const salt = '$23ACDe@%al*';

	public function __construct()
	{
		$this->configAcl();
		$this->configAuth();
	}

	private function configAuth()
	{
            $registry = \Asouza\Registry::getInstance();
            $dbAdapter = new DbAdapter($registry['dbadapter']);

            $this->auth = new AuthAdapter($dbAdapter, 'admin_user', 'email', 'password');
	}

	private function configAcl()
	{
		$this->acl = new Acl();
		$this->acl->addRole(new Role('user'))
				->addRole(new Role('gerente'), 'user')//herdando permissao de user
				->addRole(new Role('admin'));

		$this->acl->addResource(new Resource('userAction'));
		$this->acl->addResource(new Resource('admin'));
		//$this->acl->deny('user', 'userAction'); //retirando permissão, já não tinha

		$this->acl->allow('gerente', 'userAction', array('all','create', 'edit')); //adicionando permissão
		$this->acl->allow('user', 'admin', array('all','edit', 'delete', 'create', 'view'));
		$this->acl->allow('admin'); //permitindo para o admin
	}

	public function isAllowed($resource, $permission)
	{
		if(isset($_SESSION['userAuth'])){
			return $this->acl->isAllowed($_SESSION['userAuth']->role, $resource, $permission);
		}
		return false;
	}

	public function authenticate($user, $pass)
	{
		$pass = self::generetePassWord($pass);
		
		$this->auth->setIdentity($user)
			->setCredential($pass);
		
		$result = $this->auth->authenticate();
		
		//http://framework.zend.com/manual/2.0/en/modules/zend.authentication.adapter.dbtable.html
		if ($result->isValid()) {
			$_SESSION['userAuth'] = $this->auth->getResultRowObject(null, array('password'));
			
			//TODO::Falta implementar storage Auth do zend
//			$storage = $this->auth->
//			$storage->write($this->user);
			return true;
		}
		return false;
	}
	
	public static function generetePassWord($pass){
		return sha1(self::salt . $pass);
	}

	

	private function genereteDynamicSalt(){
		$dynamicSalt = '';
		for ($i = 0; $i < 50; $i++) {
			$dynamicSalt .= chr(rand(33, 126));
		}
		return $dynamicSalt;
	}

}

?>
