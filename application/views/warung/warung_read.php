<!doctype html>
<html>
    <head>
        <title>harviacode.com - codeigniter crud generator</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>"/>
        <style>
            body{
                padding: 15px;
            }
        </style>
    </head>
    <body>
        <h2 style="margin-top:0px">Warung Read</h2>
        <table class="table">
	    <tr><td>Pemilik</td><td><?php echo $pemilik; ?></td></tr>
	    <tr><td>Nama Warung</td><td><?php echo $nama_warung; ?></td></tr>
	    <tr><td>Letak</td><td><?php echo $letak; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('warung') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table>
        </body>
</html>