<div class="container-fluid-full">
		<div class="row-fluid">
				
			<!-- start: Main Menu -->
			<?php $this->output('menu');?>
			<!-- end: Main Menu -->
						
			<!-- start: Content -->
			<div id="content" class="span10">
			
				<div class="row-fluid">
					<div class="box span12">
						<div class="box-header">
							<h2><i class="icon-edit"></i><?php echo $heading_title;?></h2>
							<div class="box-icon">
								<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
								<a href="#" class="btn-close"><i class="icon-remove"></i></a>
							</div>
						</div>
						<div class="box-content">
							<?php echo $notif;?>
							<form class="form-horizontal" action="" method="POST">
								<fieldset>
									<div class="control-group">
										<label class="control-label" for="tahun">Tahun </label>
										<div class="controls">
											<input type="text" name="tahun" value="<?php echo (!empty($semester->tahun)) ? $semester->tahun : ""; ?>" class="span6 tahun" id="tahun" />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="semester">Semester </label>
										<div class="controls">
											<input type="text" name="semester" value="<?php echo (!empty($semester->semester)) ? $semester->semester : ""; ?>" class="span6 semester" id="semester" />
										</div>
									</div>

									<div class="form-actions">
										<input type="submit" class="btn btn-primary" name="oke" value="Simpan">
										<a href="<?php echo $this->location('admin/semester');?>"><button type="reset" class="btn">Batal</button></a>
									</div>
								</fieldset>
							</form>
						</div>
					</div><!--/span-->

				</div><!--/row-->
					
			</div>
			<!-- end: Content -->
				
		</div><!--/fluid-row-->
				
		
		<div class="clearfix"></div>