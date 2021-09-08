<!DOCTYPE html>
<html>
<head>
	<title>Codeigniter 3 Datatables Ajax Example</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
</head>
<body>


<div class="container">
	<h2>Directory Files</h2>
    <br/>
    <div class="row">
        <div class="col-sm-12" >
        <form action="<?= base_url('FileManagement/index') ?>" method="get">
            <input type="text" name="search" value=""/>
            <button class="btn btn-success" type="submit">Search</button>
        </form>
            <a href="<?php echo base_url('FileManagement/uploadFile')  ?>" class="btn btn-default" style="float: right">Upload File</a>
            <a href="<?php echo base_url('FileManagement/history')  ?>" class="btn btn-default" style="float: right">History </a>
        </div>
    </div>
    <br/>
    <div class="row">

        <table id="item-list" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>File Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($files as $file) { ?>
                    <tr>
                        <td><?= $file ?></td>
                        <td>
                        <a href="<?php echo base_url('FileManagement/deleteFile/'.$file)  ?>" class="btn btn-default" style="float: right">DELETE</a>
                        </td>
                    </tr>
                    <?php } ?>

            </tbody>
        </table>
        <ul class="pagination" style="float: right">
            <?= $links ?>
        </ul>
    </div>
</div>


</body>


<script type="text/javascript">
$(document).ready(function() {
    // $('#item-list').DataTable({
    //     "ajax": {
    //         url : "/get_items",
    //         type : 'GET'
    //     },
    });
});
</script>


</html>