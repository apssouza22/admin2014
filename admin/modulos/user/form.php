<?php require_once '../../config/bootstrap.php'; ?>
<?php require_once DIR_ROOT .'admin/includes/authenticate.php'; ?>
<?php

$sPage = '\\Asouza\\Admin\\User';
$error = false;

if (isset($_REQUEST['id'])) {
	$id = $_REQUEST['id'];
	$tituloPagina = 'Editar usuário';
	$linkCancelar = $sPage::getPgDetalhe(). '?id=' . $id;
} else {
	$id = null;
	$tituloPagina = 'Novo usuário';
	$linkCancelar = $sPage::getPgListar();
}
	$oPage = new $sPage($id);
	
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	if($obj = $oPage->store($_POST)){
		header('Location: ' . $sPage::getPgDetalhe(). '?id=' . $obj->id.'&success=1');
		exit;
	}
	$error = true;
}
	
?>
<!DOCTYPE html>
<html>
    
    <head>
       <?php require_once DIR_ROOT .'admin/includes/head.php'; ?>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <?php require_once DIR_ROOT .'admin/includes/menu-header.php'?>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <?php require_once DIR_ROOT .'admin/includes/menu-sidebar.php';?>
                <!--/span-->
                <div class="span9" id="content">
                      <!-- morris stacked chart -->
                    <div class="row-fluid">
						
						<div class="alert">
							<button class="close" data-dismiss="alert">×</button>
							<strong>Atenção!</strong> Os campos marcados com * são obrigatórios.
						</div>
						<?php if($error){?>
							<div class="alert alert-error alert-block">
								<a class="close" data-dismiss="alert" href="#">×</a>
								<h4 class="alert-heading">Erro!</h4>
								Erro ao cadastrar os dados.
							</div>
						<?}?>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left"><?php echo $tituloPagina?></div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<form class="form-horizontal" id="formCadastro" method="post">
										 <input type="hidden" name="id" value="<?php echo $id?>" />
                                      <fieldset>
																				
										<div class="control-group">
											<div class="span4">
                                                <label >Nome<span class=''> *</span></label>
												<input class="span12 required" value="<?php echo $oPage->name?>" name="name" type="text" placeholder="digite seu nome">
											</div>
											<div class="span4">
												<label >Email</label>
												<input class="span12 required" value="<?php echo $oPage->email?>" name="email" type="email" placeholder="digite seu email">
											</div>
											<div class="span4">
												<label >Senha</label>
												<input class="span12 required" name="password" type="password" placeholder="digite sua senha">
												
											</div>
										</div>
																				
										<div class="control-group">
											<div class="span4">
												<label >Perfil</label>
												<select name="role" class="span12 required" >
													<option value="user">Usuário</option>
													<option value="gerente">Gerente</option>
													<option value="admin">Admin</option>
												  </select>
											</div>
											
											<div class="span4">
												<label >Foto</label>
												<input class="input-file uniform_on" name="picture"  type="file">
											</div>
										</div>
										
										
										
                                        <div class="form-actions">
                                          <button type="submit" class="btn btn-primary offset3">Salvar</button>
                                          <a href="<?php echo $linkCancelar?>" class="btn">Cancelar</a>
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
                <?php require_once DIR_ROOT .'admin/includes/footer.php'; ?>
            </footer>
        </div>
               
		<?php require_once DIR_ROOT .'admin/includes/js-footer.php'; ?>
		
		<script type="text/javascript"> 

			//VALIDATE FORM
			var validate = $('#formCadastro').configForm({
				validateErro: function(){
					alert('Erro no cadastro');
				}
				
			});

        
        
        $(function() {
            $(".datepicker").datepicker({
				format: 'dd/mm/yyyy'
			});
			
            $(".uniform_on").uniform();//personalização do file imput
            $(".chzn-select").chosen();//multi select
    //        $('.textarea').wysihtml5();
			// Tiny MCE
			tinymce.init({
				language : "pt_BR",
				selector: ".textarea",
				plugins: [
					"advlist autolink lists link image charmap print preview anchor",
					"searchreplace visualblocks code fullscreen",
					"insertdatetime media table contextmenu paste"
				],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
			});
			
			
        });
        </script>
    </body>

</html>