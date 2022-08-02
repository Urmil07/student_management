            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
            	<!-- ============================================================== -->
            	<!-- Start Page Content -->
            	<!-- ============================================================== -->
            	<!-- Row -->
            	<div class="row">
            		<!-- Column -->
            		<div class="col-lg-12 col-xlg-12 col-md-12">
            			<div class="card">
            				<div class="card-body">
            					<center class="m-t-30">
            						<?php if (!empty($student->image)) : ?>
            							<img src="<?= base_url() ?>/uploads/students/<?= $student->image ?>" class="rounded-circle" width="150" />
            						<?php else : ?>
            							<img src="<?= base_url() ?>/theme/assets/images/users/1.jpg" class="rounded-circle" width="150" />
            						<?php endif; ?>
            						<?php if (!empty($student->name)) : ?>
            							<h4 class="card-title m-t-10"><?= $student->name ?></h4>
            						<?php endif; ?>
            					</center>
            				</div>
            				<div>
            					<hr>
            				</div>
            				<div class="card-body">
            					<center>
            						<?php if (!empty($student->email)) : ?>
            							<small class="text-muted">Email address </small>
            							<h6><?= $student->email ?></h6>
            						<?php endif; ?>
            						<?php if (!empty($student->address)) : ?>
            							<small class="text-muted p-t-30 db">Address</small>
            							<h6><?= $student->address ?></h6>
            						<?php endif; ?>
            						<?php if (!empty($student->age)) : ?>
            							<small class="text-muted p-t-30 db">Age</small>
            							<h6><?= $student->age ?></h6>
            						<?php endif; ?>
            						<?php if (!empty($student->standard)) : ?>
            							<small class="text-muted p-t-30 db">Standard</small>
            							<h6><?= $student->standard ?></h6>
            						<?php endif; ?>
            						<?php if (!empty($student->grades)) : ?>
            							<small class="text-muted p-t-30 db">Grades</small>
            							<h6><?= $student->grades ?></h6>
            						<?php endif; ?>
            					</center>
            				</div>
            			</div>
            		</div>
            		<!-- Column -->
            	</div>
            	<!-- Row -->
            	<!-- ============================================================== -->
            	<!-- End PAge Content -->
            	<!-- ============================================================== -->
            	<!-- ============================================================== -->
            	<!-- Right sidebar -->
            	<!-- ============================================================== -->
            	<!-- .right-sidebar -->
            	<!-- ============================================================== -->
            	<!-- End Right sidebar -->
            	<!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->