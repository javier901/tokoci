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

    <!--holder js-->
    <!--<script src="holder.js"></script>-->

    <!--thumbnail fixed size css-->
    <!--http://stackoverflow.com/questions/23379318/have-thumbnails-with-different-images-sizes-bootstrap-->
    <style>
        .thumbnail img {
            width: 250px;
            height: 200px;
        }

        .thumbnail {
            width: 300px;
            height: 400px;
        }

        .thumbnail h3 {
            height: 30px;
        }
    </style>

</head>
<body>
<?php $this->load->view('layout/top_menu'); ?>
<div class="container">
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>#</th>
                <th>Product</th>
                <th>Qty</th>
                <th>Price</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody>
        <?php
            $i = 0;
            foreach ($this->cart->contents() as $items) :
            $i++;
        ?>
            <tr>
                <td><?php echo $i ;?></td>
                <td><?php echo $items['name'] ?></td>
                <td><?php echo $items['qty'] ?></td>
                <td align="right"><?php echo number_format($items['price'],0,',','.')  ?></td>
                <td align="right"><?php echo number_format($items['subtotal'],0,',','.') ?></td>
            </tr>
        <?php endforeach ?>
        </tbody>
        <tfoot>
            <td align="right" colspan="4"><strong>Total</strong></td>
            <td align="right">
                <strong><?php echo number_format($this->cart->total(),0,',','.'); ?></strong>
            </td>
        </tfoot>
    </table>
    <div align="center">
        <?php echo anchor('welcome/clear_cart', 'Clear Cart', ['class' => 'btn btn-danger']); ?>
        <?php echo anchor(base_url(), 'Continue Shopping', ['class' => 'btn btn-primary']) ?>
        <?php echo anchor('#', 'Chek Out', ['class' => 'btn btn-success']) ?>
    </div>
</div>
</body>
</html>