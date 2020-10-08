<div class="row">

	<div class="col-md-12 mb-4">
		<a href="<?php echo base_url('myaccount/property/create'); ?>" class="btn btn-lg btn-info btn-block"><i class="ti-plus"></i> Pasang iklan Baru</a>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<a href="<?php echo base_url('myaccount/property'); ?>" style="text-decoration: none;">
			<div class="card border-left-primary shadow h-100 py-2 bg-primary">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-2">
							<div class="text-xs font-weight-bold text-white text-uppercase mb-1">Total Iklan</div>
							<div class="h5 mb-0 font-weight-bold text-white"><?php echo count($total_property); ?></div>
						</div>
						<div class="col-auto">
							<i class="ri-building-line fa-2x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</a>
	</div>


	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-success shadow h-100 py-2 bg-success">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-white text-uppercase mb-1">Iklan Tayang</div>
						<div class="h5 mb-0 font-weight-bold text-white"><?php echo count($property_active); ?></div>
					</div>
					<div class="col-auto">
						<i class="ri-shield-check-line fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-danger shadow h-100 py-2 bg-danger">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-white text-uppercase mb-1">Iklan Expired</div>
						<div class="h5 mb-0 font-weight-bold text-white"><?php echo count($property_inactive); ?></div>
					</div>
					<div class="col-auto">
						<i class="ri-close-circle-line fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Earnings (Monthly) Card Example -->
	<div class="col-xl-3 col-md-6 mb-4">
		<div class="card border-left-info shadow h-100 py-2 bg-info">
			<div class="card-body">
				<div class="row no-gutters align-items-center">
					<div class="col mr-2">
						<div class="text-xs font-weight-bold text-white text-uppercase mb-1">Paket Iklan</div>
						<div class="h5 mb-0 font-weight-bold text-white"><?php echo $user->post_count; ?></div>
					</div>
					<div class="col-auto">
						<i class="ri-close-circle-line fa-2x text-gray-300"></i>
					</div>
				</div>
			</div>
		</div>
	</div>



</div>