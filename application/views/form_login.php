<?php
/**
 * Created by PhpStorm.
 * User: hasyim
 * Date: 1/27/17
 * Time: 1:23 PM
 */
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to Toko Online</title>

    <!--Load bootstrap, jquery, datatables -->
    <link rel="stylesheet" type="text/css"
          href="<?php echo base_url('assets/bootstrap/css/bootstrap.css') ?>">
    <script type="text/javascript" language="javascript"
            src="<?php echo base_url('assets/bootstrap/jquery-1.10.2.js') ?>"></script>
    <script type="text/javascript" language="javascript"
            src="<?php echo base_url('assets/bootstrap/js/bootstrap.js') ?>"></script>

</head>
<body>
<?php $this->load->view('layout/top_menu') ; ?>
<div class="container">
    <div class="row">
        <!--looping product-->
        <div><?php echo validation_errors() ?></div>
        <div><?php echo $this->session->flashdata('error') ?></div>
         <?php echo form_open('login', ['class' => 'form-horizontal']) ; ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-default">Login</button>
         <?php form_close() ;?>
    </div>
</div>
</body>
</html>
