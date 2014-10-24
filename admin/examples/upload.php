<?php require_once '../config/bootstrap.php'; 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
         require_once '../upload/UserFile.php';
         foreach($_POST['fls'] as $file){
            $uf =  new UserFile();
            $uf->save('../upload/moved/'.$file);
         }
    }
?>
<!DOCTYPE html>
<html>

    <head>
        <?php require_once '../includes/head.php'; ?>
    </head>

    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
            </div>
        </div>
        <div class="container-fluid">
            <div class="row-fluid">
                <?php require_once '../includes/menu-sidebar.php'; ?>
                <!--/span-->
                <div class="span9" id="content">
                    <!-- morris stacked chart -->
                    <div class="row-fluid">

                        <div class="alert">
                            <button class="close" data-dismiss="alert">×</button>
                            <strong>Atenção!</strong> Os campos marcados com * são obrigatórios.
                        </div>

                        <div class="alert alert-error alert-block">
                            <a class="close" data-dismiss="alert" href="#">×</a>
                            <h4 class="alert-heading">Erro!</h4>
                            Erro ao cadastrar os dados.
                        </div>

                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Form Example</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                    <form class="form-horizontal" method="post">
                                        <fieldset>
                                            <div class="control-group">
                                                <div class="span3">
                                                    <a class="btn colorbox" href=""><i class="icon-eye-open"></i></a>
                                                    <span class="btn btn-success fileinput-button">
                                                        <i class="glyphicon glyphicon-plus"></i>
                                                        <span>Add files...</span>
                                                        <!-- The file input field used as target for the file upload widget -->
                                                        <input id="fileupload" type="file" name="files[]" multiple="">
                                                        
                                                    </span>
                                                    <div id="files"></div>
                                                </div>
                                            </div>
                                            <div class="form-actions">
                                                <button type="submit" class="btn btn-primary offset3">Save changes</button>
                                                <button type="reset" class="btn">Cancel</button>
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

         <!--upload-->
        <script src="../upload/js/jquery.ui.widget.js"></script>
        <script src="../upload/js/jquery.iframe-transport.js"></script>
        <script src="../upload/js/jquery.fileupload.js"></script>
        <script src="../upload/js/jquery.fileupload-process.js"></script>
        <script src="../upload/js/jquery.fileupload-validate.js"></script>
        <script src='../upload/js/myupload.js'></script>
        <script type="text/javascript">
            var up = FileUpload('#fileupload');
            up.init({
                url: "../upload/index.php",
                done : function done(e, data) {
                    var file = data.result.name;
                    var $wrap = $('<span class="fItem" />');
                    var $exibir = $('<a/>')
                            .attr('target', '_blank')
                            .prop('href', '../vendors/Jcrop/demos/redimensiona.php?file=<?php echo DIR_ROOT . 'admin/upload/temp/'?>'+file+'&ratio=1.5')
                            .addClass('lb-colorbox')
                            .text('editar');		
                    
                    var $del = $('<a/>')
                            .attr('target', '_blank')
                            .prop('href', '../upload/deletar.php?img=../upload/temp/'+file)
                            .text('del');	
                    
                    var $inputHidden = $('<input  type="hidden" name="fls[]" />').val(file);
                    
                    $del.click(function(){
                        $(this).parent()
                                .remove();
                    });
                    
                    $wrap.append($exibir);
                    $wrap.append('<span> - </span>');
                    $wrap.append($del);
                    
                    $('#fileupload')
                            .after($inputHidden)
                            .siblings('span').text('Add Files');
                    $('#files').append($wrap);
                    $(".lb-colorbox").off('click');
                    
                     //$(".lb-colorbox").colorbox({rel: 'lb-colorbox', width:"80%", height:"80%"});
                     $(".lb-colorbox").colorbox({iframe:true, width:"800px", height:"80%"});
                }
            });
            
           
        </script>
        
    </body>

</html>