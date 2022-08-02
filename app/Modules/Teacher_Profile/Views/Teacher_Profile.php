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
            						<?php if (!empty($teacher->image)) : ?>
            							<img src="<?= base_url() ?>/uploads/teachers/<?= $teacher->image ?>" class="rounded-circle" width="150" />
            						<?php else : ?>
            							<img src="<?= base_url() ?>/theme/assets/images/users/1.jpg" class="rounded-circle" width="150" />
            						<?php endif; ?>
            						<?php if (!empty($teacher->name)) : ?>
            							<h4 class="card-title m-t-10"><?= $teacher->name ?></h4>
            						<?php endif; ?>
            					</center>
            				</div>
            				<div>
            					<hr>
            				</div>
            				<div class="card-body">
            					<center>
            						<?php if (!empty($teacher->email)) : ?>
            							<small class="text-muted">Email address </small>
            							<h6><?= $teacher->email ?></h6>
            						<?php endif; ?>
            						<?php if (!empty($teacher->contact)) : ?>
            							<small class="text-muted p-t-30 db">Phone</small>
            							<h6>+91 <?= $teacher->contact ?></h6>
            						<?php endif; ?>
            						<?php if (!empty($teacher->address)) : ?>
            							<small class="text-muted p-t-30 db">Address</small>
            							<h6><?= $teacher->address ?></h6>
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