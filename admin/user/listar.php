<?php require_once '../config/bootstrap.php'; ?>
<?php require_once '../includes/authenticate.php'; ?>
<?php

$sPage = '\\Asouza\\Admin\\User';
$oPage = new $sPage;

$aUsers = $oPage->fetchAllObject();
?>
<!DOCTYPE html>
<html>

	<head>
		<?php require_once '../includes/head.php'; ?>
		<link href="../assets/css/DT_bootstrap.css" rel="stylesheet" media="screen">
	</head>

	<body>
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<?php require_once '../includes/menu-header.php'; ?>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row-fluid">
				<?php require_once '../includes/menu-sidebar.php'; ?>

				<!--/span-->
				<div class="span9" id="content">


					<div class="row-fluid">
						<!-- block -->
						<div class="block">
							<div class="navbar navbar-inner block-header">
								<div class="muted pull-left">Bootstrap dataTables</div>
							</div>
							<div class="block-content collapse in">
								<div class="span12">
									<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
										<thead>
											<tr>
												<th>Nome</th>
												<th>Email</th>
												<th>Perfil</th>
												<th>Acão</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($aUsers as $oItem) { ?>
												<tr class="odd gradeX">
													<td><?php echo $oItem->name ?></td>
													<td><?php echo $oItem->email ?></td>
													<td><?php echo $oItem->role ?></td>
													<td class="center" width="95">
															<?php echo require  '../includes/buttons_action.php'?>
													</td>
												</tr>

											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- /block -->
					</div>

				</div>
			</div>
			<hr>
			<footer>
				<?php require_once '../includes/footer.php'; ?>
			</footer>
		</div>
		<!--/.fluid-container-->

		<?php require_once '../includes/js-footer.php'; ?>

		<script src="../vendors/datatables/js/jquery.dataTables.min.js"></script>
		<script src="../assets/js/DT_bootstrap.js"></script>

	</body>

</html>