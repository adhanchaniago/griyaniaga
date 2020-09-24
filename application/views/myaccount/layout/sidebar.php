<?php
$id = $this->session->userdata('id');
$user = $this->user_model->user_detail($id);
$meta = $this->meta_model->get_meta();
?>



<!-- Sidebar -->
		<div class="sidebar">

			<div class="sidebar-background"></div>
			<div class="sidebar-wrapper scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="<?php echo base_url('assets/img/avatars/'.$user->user_image);?>" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									<?php echo $user->user_name;?>
									<span class="user-level"><?php echo $user->role;?></span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="<?php echo base_url('myaccount/profile');?>">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="<?php echo base_url('myaccount/profile/update');?>">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav">
						<li class="nav-item active">
							<a href="<?php echo base_url('myaccount');?>">
								<i class="ri-home-5-line"></i>
								<p>Home</p>
								<span class="badge badge-count">5</span>
							</a>
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Listing</h4>
						</li>


            <li class="nav-item">
							<a href="<?php echo base_url('myaccount/property');?>">
								<i class="ri-building-2-line"></i>
								<p>Iklan Saya</p>

							</a>
						</li>

            <li class="nav-item">
							<a href="<?php echo base_url('myaccount/package');?>">
								<i class="ri-shopping-bag-3-line"></i>
								<p>Paket</p>

							</a>
						</li>


						<li class="nav-item">
							<a href="<?php echo base_url('myaccount/profile');?>">
								<i class="ri-user-line"></i>
								<p>Akun saya</p>

							</a>
						</li>

						<li class="nav-item">
							<a href="<?php echo base_url('auth/logout');?>">
								<i class="ri-shut-down-line"></i>
								<p>Logout</p>

							</a>
						</li>








					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

    <div class="main-panel">
    			<div class="content">
    				<div class="page-inner">
    					<div class="page-header">



                <h4 class="page-title"><?php echo $title;?></h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="<?php echo base_url('myaccount');?>">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="<?php echo base_url('admin/' . $this->uri->segment(1)) ?>"><?php echo ucfirst(str_replace('_', ' ', $this->uri->segment(1))) ?></a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<?php echo $title ?>
							</li>
						</ul>




    					</div>
