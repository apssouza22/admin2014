<div class="container-fluid">
	<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</a>
	<a class="brand" href="#">Admin </a>
	<div class="nav-collapse collapse">
		<ul class="nav pull-right">
			<li class="dropdown">
				<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><?php echo $_SESSION['userAuth']->name?><i class="caret"></i>

				</a>
				<ul class="dropdown-menu">
					<li>
						<a tabindex="-1" href="<?php echo DIR_HTM_ROOT ?>admin/user/detalhe.php?id=<?php echo $_SESSION['userAuth']->id ?>">Profile</a>
					</li>
					<li class="divider"></li>
					<li>
						<a tabindex="-1" href="<?php echo DIR_HTM_ROOT ?>admin/user/logout.php">Logout</a>
					</li>
				</ul>
			</li>
		</ul>
		<ul class="nav">

			<li class="dropdown">
				<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">Usuários <i class="caret"></i>

				</a>
				<ul class="dropdown-menu">
					<li>
						<a tabindex="-1" href="<?php echo DIR_HTM_ROOT ?>admin/user/listar.php">Listar</a>
					</li>
					<li>
						<a tabindex="-1" href="<?php echo DIR_HTM_ROOT ?>admin/user/form.php">Inserir</a>
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
	</div>
	<!--/.nav-collapse -->
</div>