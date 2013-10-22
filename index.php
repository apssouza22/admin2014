<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 'On');
ini_set('display_startup_errors', 'On');

$loader = require 'vendor/autoload.php';

$loader->add('App', './');//add path to namespace App
//echo htmlspecialchars('<>"&');
$akna = new \App\Models\IntegracaoAkna();
$akna->getListasContato();
exit;

$html = '
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Newsletter</title>
	</head>
	<body bgcolor="#ffffff">
		<table style="display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="610">
			<tbody>
				<tr>
					<td><a href="http://tr.delivery.whservidor.com/index.dma/DmaClick?6258,195,42486,4916,cb2d4ac9a6318a6b107ee01766a2fb7b,aHR0cDovL2xhYmRlZ2FyYWdlbS5jb20v" target="_blank"><img name="n1" src="http://www.labdegaragem.com.br/news/news_0910/1.jpg" width="610" height="234" id="n1" alt="" /></a></td>
				</tr>
				<tr>
					<td><a href="http://tr.delivery.whservidor.com/index.dma/DmaClick?6258,195,42486,4916,cb2d4ac9a6318a6b107ee01766a2fb7b,aHR0cDovL2xhYmRlZ2FyYWdlbS5jb20v" target="_blank"><img name="n2" src="http://www.labdegaragem.com.br/news/news_0910/2.jpg" width="610" height="216" id="n2" alt="" /></a></td>
				</tr>
				<tr>
					<td>
					<table style="display: inline-table;" align="" border="0" cellpadding="0" cellspacing="0" width="610">
						<tbody>
							<tr>
								<td><a href="http://tr.delivery.whservidor.com/index.dma/DmaClick?6258,195,42486,4917,cb2d4ac9a6318a6b107ee01766a2fb7b,aHR0cDovL2xhYmRlZ2FyYWdlbS5jb20vcHJvZmlsZXMvYmxvZ3MvZmFjYS12b2NlLW1lc21vLXNlbnNvci1kZS1wdWxzby1pbmZyYXZlcm1lbGhv" target="_blank"><img name="n3" src="http://www.labdegaragem.com.br/news/news_0910/3.jpg" width="305" height="375" id="n3" alt="" /></a></td>
								<td><a href="http://tr.delivery.whservidor.com/index.dma/DmaClick?6258,195,42486,4918,cb2d4ac9a6318a6b107ee01766a2fb7b,aHR0cDovL3d3dy5sYWJkZWdhcmFnZW0ub3JnL2xvamEvcmFzcGJlcnJ5LXBpLW1vZGVsby1iLmh0bWw=" target="_blank"><img name="n4" src="http://www.labdegaragem.com.br/news/news_0910/4.jpg" width="305" height="375" id="n4" alt="" /></a></td>
							</tr>
						</tbody>
					</table>
					</td>
				</tr>
				<tr>
					<td>
					<table style="display: inline-table;" align="" border="0" cellpadding="0" cellspacing="0" width="610">
						<tbody>
							<tr>
								<td><a href="http://tr.delivery.whservidor.com/index.dma/DmaClick?6258,195,42486,4919,cb2d4ac9a6318a6b107ee01766a2fb7b,aHR0cDovL3d3dy5sYWJkZWdhcmFnZW0ub3JnL2xvamEvbGNkLXNlcmlhbC1ncmFmaWNvLTEyOHg2NC5odG1s" target="_blank"><img name="n5" src="http://www.labdegaragem.com.br/news/news_0910/5.jpg" width="305" height="375" id="n5" alt="" /></a></td>
								<td><a href="http://tr.delivery.whservidor.com/index.dma/DmaClick?6258,195,42486,4920,cb2d4ac9a6318a6b107ee01766a2fb7b,aHR0cDovL2xhYmRlZ2FyYWdlbS5jb20vcHJvZmlsZXMvYmxvZ3MvcmVsb2dpby1jb20tbGVkcy1ncHMtZS1idXNzb2xhLWRhLWFkYWZydWl0" target="_blank"><img name="n6" src="http://www.labdegaragem.com.br/news/news_0910/6.jpg" width="305" height="375" id="n6" alt="" /></a></td>
							</tr>
						</tbody>
					</table>
					</td>
				</tr>
				<tr>
					<td>
					<table style="display: inline-table;" align="" border="0" cellpadding="0" cellspacing="0" width="610">
						<tbody>
							<tr>
								<td><a href="http://tr.delivery.whservidor.com/index.dma/DmaClick?6258,195,42486,4921,cb2d4ac9a6318a6b107ee01766a2fb7b,aHR0cDovL2xhYmRlZ2FyYWdlbS5jb20vcHJvZmlsZXMvYmxvZ3MvdHV0b3JpYWwtY29tby1zb2xkYXItY29tcG9uZW50ZXMtZWxldHJvbmljb3M="><img name="n7" src="http://www.labdegaragem.com.br/news/news_0910/7.jpg" width="305" height="373" id="n7" alt="" /></a></td>
								<td><a href="http://tr.delivery.whservidor.com/index.dma/DmaClick?6258,195,42486,4922,cb2d4ac9a6318a6b107ee01766a2fb7b,aHR0cDovL3d3dy5sYWJkZWdhcmFnZW0ub3JnL2xvamEvNDUtZXF1aXBhbWVudG9zL2ZlcnJvLWRlLXNvbGRhLWRlLXRlbXBlcmF0dXJhLXZhcmlhdmVsLTUwdy5odG1s" target="_blank"><img name="n8" src="http://www.labdegaragem.com.br/news/news_0910/8.jpg" width="305" height="373" id="n8" alt="" /></a></td>
							</tr>
						</tbody>
					</table>
					</td>
				</tr>
				<tr>
					<td>
					<table style="display: inline-table;" align="" border="0" cellpadding="0" cellspacing="0" width="610">
						<tbody>
							<tr>
								<td><a href="http://tr.delivery.whservidor.com/index.dma/DmaClick?6258,195,42486,4923,cb2d4ac9a6318a6b107ee01766a2fb7b,aHR0cDovL3d3dy5sYWJkZWdhcmFnZW0ub3JnL2xvamEvYmx1ZXRvb3RoLXNoaWVsZC5odG1s" target="_blank"><img name="n9" src="http://www.labdegaragem.com.br/news/news_0910/9.jpg" width="305" height="377" id="n9" alt="" /></a></td>
								<td><a href="http://tr.delivery.whservidor.com/index.dma/DmaClick?6258,195,42486,4924,cb2d4ac9a6318a6b107ee01766a2fb7b,aHR0cDovL2xhYmRlZ2FyYWdlbS5jb20vcHJvZmlsZXMvYmxvZ3MvcGVzcXVpc2Fkb3Jlcy1jcmlhbS1oZWFkcGhvbmVzLWZlaXRvcy1kZS1uYW5vdHViby1kZS1jYXJib25v" target="_blank"><img name="n10" src="http://www.labdegaragem.com.br/news/news_0910/10.jpg" width="305" height="377" id="n10" alt="" /></a></td>
							</tr>
						</tbody>
					</table>
					</td>
				</tr>
				<tr>
					<td>
					<table style="display: inline-table;" align="" border="0" cellpadding="0" cellspacing="0" width="610">
						<tbody>
							<tr>
								<td><a href="http://tr.delivery.whservidor.com/index.dma/DmaClick?6258,195,42486,4925,cb2d4ac9a6318a6b107ee01766a2fb7b,aHR0cDovL2xhYmRlZ2FyYWdlbS5jb20vcHJvZmlsZXMvYmxvZ3MvcmVwbGljYS1kYS1lbmlnbWEtZmVpdGEtY29tLWFyZHVpbm8=" target="_blank"><img name="n11" src="http://www.labdegaragem.com.br/news/news_0910/11.jpg" width="305" height="370" id="n11" alt="" /></a></td>
								<td><a href="http://tr.delivery.whservidor.com/index.dma/DmaClick?6258,195,42486,4926,cb2d4ac9a6318a6b107ee01766a2fb7b,aHR0cDovL3d3dy5sYWJkZWdhcmFnZW0ub3JnL2xvamEvNDUtZXF1aXBhbWVudG9zL2FuZHJvaWQtNC0wLW1pbmktcGMuaHRtbA==" target="_blank"><img name="n12" src="http://www.labdegaragem.com.br/news/news_0910/12.jpg" width="305" height="370" id="n12" alt="" /></a></td>
							</tr>
						</tbody>
					</table>
					</td>
				</tr>
				<tr>
					<td>
					<table style="display: inline-table;" align="" border="0" cellpadding="0" cellspacing="0" width="610">
						<tbody>
							<tr>
								<td><a href="http://tr.delivery.whservidor.com/index.dma/DmaClick?6258,195,42486,4916,cb2d4ac9a6318a6b107ee01766a2fb7b,aHR0cDovL2xhYmRlZ2FyYWdlbS5jb20v" target="_blank"><img name="n13" src="http://www.labdegaragem.com.br/news/news_0910/13.jpg" width="326" height="80" id="n13" alt="" /></a></td>
								<td><a href="http://tr.delivery.whservidor.com/index.dma/DmaClick?6258,195,42486,4929,cb2d4ac9a6318a6b107ee01766a2fb7b,aHR0cHM6Ly93d3cuZmFjZWJvb2suY29tL0xhYkRlR2FyYWdlbQ==" target="_blank"><img name="n14" src="http://www.labdegaragem.com.br/news/news_0910/14.jpg" width="91" height="80" id="n14" alt="" /></a></td>
								<td><a href="http://tr.delivery.whservidor.com/index.dma/DmaClick?6258,195,42486,4930,cb2d4ac9a6318a6b107ee01766a2fb7b,aHR0cHM6Ly90d2l0dGVyLmNvbS9sYWJkZWdhcmFnZW0v" target="_blank"><img name="n15" src="http://www.labdegaragem.com.br/news/news_0910/15.jpg" width="87" height="80" id="n15" alt="" /></a></td>
								<td><a href="http://tr.delivery.whservidor.com/index.dma/DmaClick?6258,195,42486,4928,cb2d4ac9a6318a6b107ee01766a2fb7b,aHR0cDovL3d3dy55b3V0dWJlLmNvbS9sYWJkZWdhcmFnZW0=" target="_blank"><img name="n16" src="http://www.labdegaragem.com.br/news/news_0910/16.jpg" width="106" height="80" id="n16" alt="" /></a></td>
							</tr>
						</tbody>
					</table>
					</td>
				</tr>
			</tbody>
		</table>
	</body>
</html>


';

$akna->criarCampanha();
//$akna->criarCategoria();
exit;



use \Asouza\Admin\Auth;
use Respect\Relational\Mapper;
use Respect\Relational\Db;

$mapper = new Mapper(new PDO("mysql:host=localhost; dbname=testeadmin; port=", 'root', ''));
$db = new Db(new PDO("mysql:host=localhost; dbname=testeadmin; port=", 'root', ''));


\Asouza\Registry::set('mapper', $mapper);
\Asouza\Registry::set('db', $db);
//
$model = new \Asouza\Model(13);
$model->count();

//$user = new \Asouza\Admin\User;
//$user->add(array(
//	'name' => "Alexsandro1",
//	'email' => 'alex@agenciasalve.com.br',
//	'role' => 'user',
//	'password' => '1234'
//));

		

$auth = new Auth();
if($auth->authenticate('apssouza22@gmail.com', '1234')){
	echo $auth->isAllowed('userAction', 'create') ? 'allowed' : 'denaid';
	echo 'logado';
}


?>
