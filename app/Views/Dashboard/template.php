<!DOCTYPE html>
<html>
<?php echo view('Dashboard/include-head.php'); ?>
<?php echo view('Dashboard/include-sidebar.php'); ?>
<?php echo view('App\Modules\\' . $main_modules . '\Views\\' . $main_page); ?>
<?php echo view('Dashboard/include-footer.php'); ?>

</html>