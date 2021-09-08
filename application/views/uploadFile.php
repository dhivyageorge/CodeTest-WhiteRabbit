<!DOCTYPE html>
<html lang="en">  
	<head>
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
	</head>
	<body>
        <div class="container">
            <h2>File Uploads</h2>
            <div class="row">
                <div class="col-lg-12">	
                    <?php echo $error;?> <!-- Error Message will show up here -->
                    <?php echo form_open_multipart( base_url('FileManagement/insertFile'));?>
                    <?php 
                
                    echo "<input type='file' name='userfile' size='20' class='form-control' />"; ?>
                    <br>
                    <?php echo "<input type='submit' name='submit' value='upload' class='btn btn-info'/> ";?>
                    <?php echo "</form>"?>
                </div>
            </div>
        </div>
	</body>
</html>