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
	<h2>Upload File History</h2>
    <div class="row">
        <div class="col-sm-12" >
           
            <a href="<?php echo base_url('FileManagement/index')  ?>" class="btn btn-default" style="float: right">Back</a>
        </div>
    </div>
    <br/>
    <div class="row">

        <table id="item-list" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>File Name</th>
                    <th>Ceated At</th>
                    <th>Deleted At</th>
                    <th> Status </th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($fileHistory as $file) { ?>
                    <tr>
                        <td><?= $file['file_name'] ?></td>
                        <td><?= $file['created_at'] ?> </td>
                        <td><?= $file['updated_at'] ?></td>
                        <td><?= $file['status'] == '1' ? 'Active' : 'Delected' ?></td>
                    </tr>
                    <?php } ?>

            </tbody>
        </table>
        <ul class="pagination" style="float: right">
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