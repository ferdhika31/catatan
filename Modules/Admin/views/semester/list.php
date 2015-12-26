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
							<h2><i class="icon-align-justify"></i><span class="break"></span><?php echo $heading_title;?></h2>
							<div class="box-icon">
								<a href="#" class="btn-minimize"><i class="icon-chevron-up"></i></a>
								<a href="#" class="btn-close"><i class="icon-remove"></i></a>
							</div>
						</div>
						<div class="box-content">
							<?php echo $notif;?>
							<table class="table table-bordered table-striped table-condensed">
								<thead>
									<tr>
										<th>No</th>
										<th>Semester</th>
										<th>Tahun</th>
										<th>Aksi</th>                                          
									</tr>
								</thead>   
								<tbody>
								<?php
									if(!empty($dataSemester)):
										$no=1;
										foreach ($dataSemester as $data):
								?>
									<tr>
										<td><?php echo $no++;?></td>
										<td><?php echo $data->semester;?></td>
										<td class="center"><?php echo $data->tahun;?></td>
										<td class="center">
											<a class="btn btn-info" href="<?php echo $this->location('admin/semester/ubah/'.$data->semester_id);?>">
												<i class="icon-edit "></i>                                            
											</a>
											<a class="btn btn-danger" href="<?php echo $this->location('admin/semester/hapus/'.$data->semester_id);?>">
												<i class="icon-trash "></i> 
											</a>
										</td>                                       
									</tr>
								<?php
										endforeach;
									else:
								?>
									<tr>
										<td colspan="6"><center>Belum ada data.</center></td>                                      
									</tr>
								<?php
									endif;
								?>     
								<thead>
									<tr>
										<th colspan="6">
											<center>
												<a class="btn btn-success" title="Tambah data" href="<?php echo $this->location('admin/semester/tambah');?>">
													<i class="icon-plus"></i> Tambah Data                                           
												</a>
											</center>
										</th>                                          
									</tr>
								</thead>     
								</tbody>
							</table>  
						</div>
					</div><!--/span-->
				</div><!--/row-->
					
			</div>
			<!-- end: Content -->
				
		</div><!--/fluid-row-->
				
		
		<div class="clearfix"></div>