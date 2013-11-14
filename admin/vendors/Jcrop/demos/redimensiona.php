<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Basic Handler | Jcrop Demo</title>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />

        <script src="../js/jquery.min.js"></script>
        <script src="../js/jquery.Jcrop.js"></script>
        <script type="text/javascript">

            jQuery(function($){

            var jcrop_api;

            $('#target').Jcrop({
                onChange:   showCoords,
                onSelect:   showCoords,
                onRelease:  clearCoords,
                aspectRatio: '<?php echo $_GET['ratio'] ?>'
            },function(){
                jcrop_api = this;
            });

            $('#coords').on('change','input',function(e){
                var x1 = $('#x1').val(),
                x2 = $('#x2').val(),
                y1 = $('#y1').val(),
                y2 = $('#y2').val();
                jcrop_api.setSelect([x1,y1,x2,y2]);
            });

            });

            // Simple event handler, called from onChange and onSelect
            // event handlers, as per the Jcrop invocation above
            function showCoords(c)
            {
                $('#x1').val(c.x);
                $('#y1').val(c.y);
                $('#x2').val(c.x2);
                $('#y2').val(c.y2);
                $('#w').val(c.w);
                $('#h').val(c.h);
            };

            function clearCoords()
            {
                $('#coords input').val('');
            };
        </script>
        <link rel="stylesheet" href="demo_files/main.css" type="text/css" />
        <link rel="stylesheet" href="demo_files/demos.css" type="text/css" />
        <link rel="stylesheet" href="../css/jquery.Jcrop.css" type="text/css" />

    </head>
    <body>
            <div style="margin-left: 60px;">
                <div style="width: 662px;">
                    <div class="jc-demo-box">
                        <!-- This is the image we're attaching Jcrop to -->
                        <img src="../../../../src/Asouza/ImageEdit/output.php?file=<?php echo $_GET['file']?>&wmax=600&hmax=600" id="target" alt="[Jcrop Example]" />
                        <form id="coords"
                              class="coords"
                              onsubmit="return false;"
                              action="">

                            <div class="inline-labels">
                                <button type="submit" class="btn btn-primary offset3">Save changes</button>
                            </div>
                        </form>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
    </body>
</html>

