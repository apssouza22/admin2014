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
	private $user;
	private $auth;
	const salt = '$23ACDe@%al*';

	public function __construct()
	{
		$this->configAcl();
		$this->configAuth();
	}

	private function configAuth()
	{
		$dbAdapter = new DbAdapter(array(
			'driver' => 'PDO_MYSQL',
			'hostname' => 'localhost',
			'username' => 'root',
			'password' => '',
			'dbname' => 'testeadmin'
		));

		$this->auth = new AuthAdapter($dbAdapter, 'usuario', 'email', 'senha');
	}

	private function configAcl()
	{
		$this->acl = new Acl();
		$this->acl->addRole(new Role('user'))
				->addRole(new Role('gerente'), 'user')//herdando permissao de user
				->addRole(new Role('admin'));

		$this->acl->addResource(new Resource('userAction'));
		$this->acl->addResource(new Resource('cms'));
		//$this->acl->deny('user', 'userAction'); //retirando permissão, já não tinha

		$this->acl->allow('gerente', 'userAction', array('create', 'edit')); //adicionando permissão
		$this->acl->allow('user', 'cms', array('edit', 'delete', 'create', 'view'));
		$this->acl->allow('admin'); //permitindo para o admin
	}

	public function isAllowed($resource, $permission)
	{
		return $this->acl->isAllowed($this->user->role, $resource, $permission);
	}

	public function authenticate($user, $pass)
	{
		$pass = sha1(self::salt . $pass);
		
		$this->auth
				->setIdentity($user)
				->setCredential($pass);
		
		$result = $this->auth->authenticate();
		//http://framework.zend.com/manual/2.0/en/modules/zend.authentication.adapter.dbtable.html
		if ($result->isValid()) {
			$this->user = $this->auth->getResultRowObject(null, array('senha'));
//			$storage = $this->auth->
//			$storage->write($this->user);
			return true;
		}
		return false;
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
