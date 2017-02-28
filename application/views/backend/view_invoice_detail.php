<!doctype html>
<html>
    <head>
        <title>Admin Page | View Invoice Detail</title>
        <!--Load bootstrap, jquery, datatables from cdn-->
        <script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js"></script>
        
        <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css">
        <style type="text/css">
            .row div{
                border:#000 0px solid;
            }
        </style>

    </head>
    <body>

    <?php $this->load->view('backend/admin_menu.php') ; ?>

        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">

            <h1>Invoice</h1>
            <h3>Items Order in invoice #<?php echo $invoice->id ;?> </h3>
        <table id="myTable" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>Product ID</th>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Sub Total</th>
                     
                </tr>
            </thead>
            <tbody>
                <?php 
                    $total = 0;
                    foreach($orders as $order) : 
                    $subtotal = $order->qty * $order->price;
                    $total += $subtotal;
                ?>
                <tr>
                    <td><?php echo $order->product_id ;?></td>
                    <td><?php echo $order->product_name;?></td>
                    <td><?php echo $order->qty;?></td>
                    <td><?php echo $order->price;?></td>
                    <td><?php echo $subtotal;?></td>
                    
                </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4" align="right">Total</td>
                    <td><?php echo $total ;?></td>
                </tr>
            </tfoot>
        </table>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#myTable').DataTable();
            });
        </script>
            </div>
            <div class="col-sm-1"></div>
        </div>

    </body>
</html>