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
										<label class="control-label" for="kode_matkul">Kode Mata Kuliah </label>
										<div class="controls">
											<input type="text" name="kode_matkul" value="<?php echo (!empty($matkul->kode_matkul)) ? $matkul->kode_matkul : ""; ?>" class="span6 kode_matkul" id="kode_matkul" />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="nama_matkul">Nama Mata Kuliah </label>
										<div class="controls">
											<input type="text" name="nama_matkul" value="<?php echo (!empty($matkul->nama_matkul)) ? $matkul->nama_matkul : ""; ?>" class="span6 nama_matkul" id="nama_matkul" />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="dosen">Dosen Pengajar </label>
										<div class="controls">
											<input type="text" name="dosen" value="<?php echo (!empty($matkul->nama_dosen)) ? $matkul->nama_dosen : ""; ?>" class="span6 dosen" id="dosen" />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="jml_sks">Jumlah SKS </label>
										<div class="controls">
											<input type="text" name="jml_sks" value="<?php echo (!empty($matkul->jumlah_sks)) ? $matkul->jumlah_sks : ""; ?>" class="span6 jml_sks" id="jml_sks" />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="semester">Semester</label>
										<div class="controls">
											<select name="semester">
												<?php
												if(!empty($semester)):
													foreach ($semester as $semester):
														$smt = isset($matkul->semester_id) ? $matkul->semester_id : '';
														$pilih = ($semester->semester_id==$smt) ? ' selected': '';
												?>
												<option<?php echo $pilih;?> value="<?php echo $semester->semester_id;?>">
													<?php echo $semester->semester;?>
												</option>
												<?php
													endforeach;
												else:
												?>
												<option>-None-</option>
												<?php
												endif;
												?>
											</select>
										</div>
									</div>

									<div class="form-actions">
										<input type="submit" class="btn btn-primary" name="oke" value="Simpan">
										<a href="<?php echo $this->location('admin/matkul');?>"><button class="btn">Batal</button></a>
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