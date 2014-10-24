<div class="container-fluid">
    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </a>
    <a class="brand" href="#">Admin </a>

    <div class="nav-collapse collapse">
        <ul class="nav">
           
            <li class="dropdown">
                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Usuários <i class="caret"></i>

                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a tabindex="-1" href="<?php echo DIR_HTM_ROOT ?>admin/modulos/user/listar.php">Listar</a>
                    </li>
                    <li>
                        <a tabindex="-1" href="<?php echo DIR_HTM_ROOT ?>admin/modulos/user/form.php">Inserir</a>
                    </li>

                    <li class="divider"></li>

                    <li class="dropdown-submenu">
                        <a href="#">More options</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a tabindex="2" href="#">Meu Perfil</a>
                            </li>
                        </ul>
                    </li>

                </ul>
            </li>
        </ul>

        <ul class="nav pull-right">
             <li class="dropdown messages-dropdown">
                 <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Mensagens"><i class="icon-envelope"></i>  <span class="badge">7</span> <b class="caret"></b></a>
                <ul class="dropdown-menu dropdown-menu-msg">
                    <li class="dropdown-header"><strong>7 New Messages</strong></li>
                    <li class="divider"></li>
                    <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                    <li class="divider"></li>
                    <li>
                            <a href="#">
                                <div>
                                    <strong>John Smith</strong>
                                    <span class="pull-right text-muted">
                                        <em>Yesterday</em>
                                    </span>
                                </div>
                                <div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>
                            </a>
                        </li>
                    <li class="divider"></li>
                    <li class="message-preview">
                        <a href="#">
                            <span class="avatar"><img src="http://placehold.it/50x50"></span>
                            <span class="name">John Smith:</span>
                            <span class="message">Hey there, I wanted to ask you something...</span>
                            <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="#"><strong>View Inbox <span class="badge">7</span></strong></a></li>
                </ul>
            </li>
            <li class="dropdown alerts-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Alertas"><i class="icon-bell"></i> <span class="badge">3</span> <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#">Default <span class="label label-default">Default</span></a></li>
                    <li><a href="#">Primary <span class="label label-primary">Primary</span></a></li>
                    <li><a href="#">Success <span class="label label-success">Success</span></a></li>
                    <li><a href="#">Info <span class="label label-info">Info</span></a></li>
                    <li><a href="#">Warning <span class="label label-warning">Warning</span></a></li>
                    <li><a href="#">Danger <span class="label label-danger">Danger</span></a></li>
                    <li class="divider"></li>
                    <li><a href="#">View All</a></li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i> <?php echo $_SESSION['userAuth']->name ?><i class="caret"></i>

                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a tabindex="-1" href="<?php echo DIR_HTM_ROOT ?>admin/modulos/user/detalhe.php?id=<?php echo $_SESSION['userAuth']->id ?>">Profile</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a tabindex="-1" href="<?php echo DIR_HTM_ROOT ?>admin/logout.php">Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!--/.nav-collapse -->
</div>