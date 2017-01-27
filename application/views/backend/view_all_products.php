<!doctype html>
<html>
    <head>
        <title>Admin Page | Products</title>
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
                <h1>Products Table</h1>
        <table id="myTable" class="table table-striped table-bordered table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product Name</th>
                    <th>Product Image</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>
                        <?php 
                        echo anchor('admin/products/create','Add Product',['class'=>'btn btn-primary']); ?>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($products as $product) : ?>
                <tr>
                    <td><?php echo $product->id ; ?></td>
                    <td><?php echo $product->name ; ?></td>
                    <td>
                        <?php
                            $product_image = ['src'     => 'uploads/' . $product->image,
                                              'width'   => '100'
                            ];
                            echo img($product_image) ; ?>
                    </td>
                    <td><?php echo $product->price ; ?></td>
                    <td><?php echo $product->stock ; ?></td>
                    <td>
                        <?php
                            echo anchor('admin/products/update/' . $product->id, 'Edit', ['class'=>'btn btn-default btn-sm']); ?>
                        <?php
                            echo anchor('admin/products/delete/' . $product->id, 'Delete',
                            ['class'=>'btn btn-danger btn-sm',
                            'onclick'=>'return confirm(\'Apakah Anda Yakin?\')'
                            ]); ?>

                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
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