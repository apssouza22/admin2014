<?php require_once '../config/bootstrap.php';?>
<!DOCTYPE html>
<html>
	<head>
		<?php require_once DIR_ROOT .'admin/includes/head.php'; ?>
	</head>

	<body>
		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<?php require_once DIR_ROOT .'admin/includes/menu-header.php'; ?>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row-fluid">
				<?php require_once DIR_ROOT .'admin/includes/menu-sidebar.php'; ?>
				
				<!--/span-->
				<div class="span9" id="content">
					<div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Form Example</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<form class="form-horizontal">
										<fieldset>
											<legend>Form Horizontal</legend>
											<div class="control-group">
												<div class="span12">
													<label class="">Nome campo</label>
													<input class="span12 " id="focusedInput" type="text" value="This is focused...">
												</div>
											</div>

											
											<div class="control-group success">
												<label class="control-label" for="selectError">Select with success</label>
												<div class="controls">
													<select id="selectError">
														<option>1</option>
														<option>2</option>
														<option>3</option>
														<option>4</option>
														<option>5</option>
													</select>
													<span class="help-inline">Woohoo!</span>
												</div>
											</div>
											<div class="form-actions">
												<button type="submit" class="btn btn-primary">Save changes</button>
												<button type="reset" class="btn">Cancel</button>
											</div>
										</fieldset>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
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
												<th>Rendering engine</th>
												<th>Browser</th>
												<th>Platform(s)</th>
												<th>Engine version</th>
												<th>CSS grade</th>
											</tr>
										</thead>
										<tbody>
											<?php for($i =10; $i; $i--){?>
											<tr class="odd gradeX">
												<td><em class="hidden">1</em>22/01/2013</td>
												<td>Internet
													Explorer 4.0</td>
												<td>Win 95+</td>
												<td class="center"> 4</td>
												<td class="center">X</td>
											</tr>
											<tr class="even gradeC">
												<td><em  class="hidden">2</em>22/02/2013</td>
												<td>Internet
													Explorer 5.0</td>
												<td>Win 95+</td>
												<td class="center">5</td>
												<td class="center">C</td>
											</tr>
											<tr class="odd gradeA">
												<td><em  class="hidden">3</em>01/03/2013</td>
												<td>Internet
													Explorer 5.5</td>
												<td>Win 95+</td>
												<td class="center">5.5</td>
												<td class="center">A</td>
											</tr>
											<tr class="even gradeA">
												<td><em  class="hidden">4</em>22/04/2013</td>
												<td>Internet
													Explorer 6</td>
												<td>Win 98+</td>
												<td class="center">6</td>
												<td class="center">A</td>
											</tr>
											<tr class="odd gradeA">
												<td><em class="hidden">5</em>22/05/2013</td>
												<td>Internet Explorer 7</td>
												<td>Win XP SP2+</td>
												<td class="center">7</td>
												<td class="center">A</td>
											</tr>
											<tr class="even gradeA">
												<td><em  class="hidden"></em>2/06/2013</td>
												<td>AOL browser (AOL desktop)</td>
												<td>Win XP</td>
												<td class="center">6</td>
												<td class="center">A</td>
											</tr>
<!--											<tr class="gradeA">
												<td>Gecko</td>
												<td>Firefox 1.0</td>
												<td>Win 98+ / OSX.2+</td>
												<td class="center">1.7</td>
												<td class="center">A</td>
											</tr>
											<tr class="gradeA">
												<td>Gecko</td>
												<td>Firefox 1.5</td>
												<td>Win 98+ / OSX.2+</td>
												<td class="center">1.8</td>
												<td class="center">A</td>
											</tr>
											<tr class="gradeA">
												<td>Gecko</td>
												<td>Firefox 2.0</td>
												<td>Win 98+ / OSX.2+</td>
												<td class="center">1.8</td>
												<td class="center">A</td>
											</tr>
											<tr class="gradeA">
												<td>Gecko</td>
												<td>Firefox 3.0</td>
												<td>Win 2k+ / OSX.3+</td>
												<td class="center">1.9</td>
												<td class="center">A</td>
											</tr>-->
											<?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<!-- /block -->
					</div>
					
					<div class="row-fluid" >
						<div class="span12" style="text-align: center">
							Utilize a páginação abaixo para  navegar em registros antigos
						</div>
						
						<div class="span12">
							<div class="pagination">
								<ul>
									<li><a href="#">Prev</a></li>
									<li class="active">
										<a href="#">3000</a>
									</li>
									<li><a href="#">6000</a></li>
									<li><a href="#">9000</a></li>
									<li><a href="#">9000</a></li>
									<li><a href="#">9000</a></li>
									<li><a href="#">9000</a></li>
									<li><a href="#">9000</a></li>
									<li><a href="#">4</a></li>
									<li><a href="#">Next</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<hr>
			<footer>
				<?php require_once DIR_ROOT .'admin/includes/footer.php'; ?>
			</footer>
		</div>
		<?php require_once DIR_ROOT .'admin/includes/js-footer.php'; ?>
	</body>

</html>