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
										<label class="control-label" for="nama">Nama User </label>
										<div class="controls">
											<input type="text" name="nama" value="<?php echo (!empty($user->nama)) ? $user->nama : ""; ?>" class="span6 nama" id="nama" />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="email">Email </label>
										<div class="controls">
											<input type="text" name="email" value="<?php echo (!empty($user->email)) ? $user->email : ""; ?>" class="span6 email" id="email" />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="username">Username </label>
										<div class="controls">
											<input type="text" name="username" value="<?php echo (!empty($user->username)) ? $user->username : ""; ?>" class="span6 username" id="username" <?php echo (!empty($user->username)) ? "disabled" : ""; ?> />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="password">Password </label>
										<div class="controls">
											<input type="password" name="password" value="<?php echo (!empty($user->password)) ? $user->password : ""; ?>" class="span6 password" id="password" />
										</div>
									</div>

									<div class="control-group">
										<label class="control-label" for="hak">Hak Akses </label>
										<div class="controls">
											<select name="hak" class="">
												<?php
												$haks = (isset($user->hak)) ? $user->hak: '';
												if($haks==1){
													$sel1 = "selected ";
													$sel2 = "";
												}else{
													$sel1 = "";
													$sel2 = "selected ";
												}
												?>
												<option <?php echo $sel1;?>value="1">Admin</option>
												<option <?php echo $sel2;?>value="2">Writer</option>
											</select>
										</div>
									</div>

									<div class="form-actions">
										<input type="submit" class="btn btn-primary" name="oke" value="Simpan">
										<a href="<?php echo $this->location('admin/user');?>"><button type="reset" class="btn">Batal</button></a>
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