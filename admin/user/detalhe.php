<?php require_once '../config/bootstrap.php'; ?>
<?php require_once '../includes/authenticate.php'; ?>
<?php

$sPage = '\\Asouza\\Admin\\User';
$error = false;

if (isset($_REQUEST['id'])) {
	$id = $_REQUEST['id'];
}

$oPage = new $sPage($id);
if(!isset($oPage->id)){
	header('Location: ' . $sPage::getPgListar());
	exit;
}
	
	
?>
<!DOCTYPE html>
<html>

    <head>
       <?php require_once '../includes/head.php';?>
    </head>

    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
               <?php require_once '../includes/menu-header.php'?>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <?php require_once '../includes/menu-sidebar.php';?>
                <!--/span-->
                <div class="span9" id="content">
					<!-- morris stacked chart -->
                    <div class="row-fluid">
						<?php if(isset($_GET['success'])){?>
							<div class="alert alert-success alert-block">
								<a class="close" data-dismiss="alert" href="#">×</a>
								<h4 class="alert-heading">Sucesso!</h4>
								Os dados foram cadastrados com sucesso.	
							</div>
						<?php }?>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Form Example</div>
								<div class="pull-right" style="margin-top: -5px;">
									<?php echo require '../includes/buttons_action.php'?>
                                </div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">

									<form class="form-horizontal">
										<fieldset>
											
											<div class="control-group">
												<div class="span6">
													<label><strong>Nome </strong></label>
													<span><?php echo $oPage->name?></span>
												</div>
												<div class="span6">
													<label><strong>Email</strong></label>
													<span><?php echo $oPage->email?></span>
												</div>
											</div>
											<div class="control-group">
												<div class="span4">
													<label><strong>Perfil</strong></label>
													<span><?php echo $oPage->role?></span>
												</div>
												<div class="span4">
													<label><strong>Foto</strong></label>
													<a href="<?php echo $oPage->picture?>" class="thumbnail">Foto</a>
												</div>
											</div>


											<div class="form-actions">
												<a class="btn offset3" href="<?php echo $sPage::getPgListar()?>"><i class="icon-arrow-left"></i>Voltar</a>
											</div>
										</fieldset>
                                    </form>

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
		
		
		<script src="../vendors/jGrowl/jquery.jgrowl.js"></script>
		<link href="../vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen">
		
		<!--ligthbox-->
		<script src="../vendors/colorbox-master/jquery.colorbox-min.js"></script>
		<link href="../vendors/colorbox-master/colorbox.css" rel="stylesheet"/>


        <script src="../assets/js/scripts.js"></script>
        <script>
			$(function() {
				$(".thumbnail").colorbox({rel: 'thumbnail'});

				$('.js-visibility').click(function() {
					$.jGrowl("Visibilidade alterada com sucesso", {header: 'Important'});
				});
			});
        </script>
    </body>

</html>