<?php $session = session(); ?>
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
	<!-- ============================================================== -->
	<!-- Start Page Content -->
	<!-- ============================================================== -->
	<div class="row">
		<!-- Column -->
		<div class="col-lg-12 col-xl-12 col-md-12">
			<div class="card">
				<div class="card-body">
					<div class="d-flex no-block align-items-center m-b-30">
						<h4 class="card-title">All Students</h4>
						<div class="ml-auto">
							<div class="btn-group">
								<a href="<?= base_url('teacher_dashboard/create') ?>" class="btn btn-dark">Add New Student </a>
							</div>
						</div>
					</div>
					<div class="table-responsive">
						<table id="file_export" class="table table-bordered nowrap display">
							<thead>
								<tr>
									<th>No.</th>
									<th>Name</th>
									<th>Email</th>
									<th>Age</th>
									<th>Standard</th>
									<th>Grades</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php if (!empty($students)) : ?>
									<?php $count = 0;
									foreach ($students as $row) : ?>
										<tr>
											<td>
												<center><?= ++$count; ?></center>
											</td>
											<td>
												<center>
													<a href="<?= base_url('teacher_dashboard/create/' . $row->id) ?>"><img src="<?= base_url() ?>/uploads/students/<?= $row->image ?>" alt="user" class="rounded-circle" width="30" />
														<?= $row->name ?></a>
												</center>
											</td>
											<td>
												<center><?= $row->email ?></center>
											</td>
											<td>
												<center><?= $row->age ?></center>
											</td>
											<td>
												<center><?= $row->standard ?></center>
											</td>
											<td>
												<center><?= $row->grades ?></center>
											</td>
											<td>
												<center>
													<a type="button" href="<?= base_url('teacher_dashboard/delete/' . $row->id) ?>" class="btn btn-sm btn-icon btn-pure btn-outline delete-row-btn" data-toggle="tooltip" data-original-title="Delete"><i class="ti-close" aria-hidden="true"></i></a>
												</center>
											</td>
										</tr>
									<?php endforeach; ?>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<!-- Column -->
	</div>
	<!-- ============================================================== -->
	<!-- End PAge Content -->
	<!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->