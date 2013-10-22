<?php

namespace Asouza\Admin;

/**
 * Description of IAdmin
 *
 * @author apssouza
 */
interface IAdmin
{
	/**
	 * Return the full url into admin
	 */
	public static function getPgFolder();
	
	/**
	 * Return the full url of datlhe page into admin
	 */
	public static function getPgDetalhe();
	
	/**
	 * Return the full url of list page into admin
	 */
	public static function getPgListar();
	
	/**
	 * Return the full url of edit page into admin
	 */
	public static function getPgEditar();
	
}

?>
