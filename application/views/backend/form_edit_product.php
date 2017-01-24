<?php
    $id          = $product->id;
if ($this->input->post('is_submitted')) {
    $name        = set_value('name');
    $description = set_value('description');
    $price       = set_value('price');
    $stock       = set_value('stock');
} else {
    $name = $product->name;
    $description = $product->description;
    $price = $product->price;
    $stock = $product->stock;
}
?>
<!doctype html>
<html>
<head>
    <title>Admin Page | Edit Products</title>
    <!--Load bootstrap, jquery, datatables from cdn-->
    <script type="text/javascript" language="javascript" src="<?php echo base_url('assets/bootstrap/jquery-1.10.2.js')?>"></script>
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.4/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.js"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css')?>">
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/plug-ins/9dcbecd42ad/integration/bootstrap/3/dataTables.bootstrap.css">
    <style type="text/css">
        .row div{
            border:#000 0px solid;
        }
    </style>

</head>
<body>
<div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <h1>Edit Product</h1>
        <?php echo validation_errors() ?>
        <?php echo form_open_multipart('admin/products/update/' .$id, ['class'=>'form-horizontal'])  ?>
        <div class="form-group">
            <label for="nama_barang" class="col-sm-2 control-label">Product Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="name" placeholder="Product Name"
                       value="<?php echo $name ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="desc" class="col-sm-2 control-label">Description</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="description" placeholder="Description"><?php echo $description ?></textarea>
            </div>
        </div>
        <div class="form-group">
            <label for="price_label" class="col-sm-2 control-label">Price</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="price" placeholder="price"
                       value="<?php echo $price ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="stock_label" class="col-sm-2 control-label">Available Stock</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="stock" placeholder="stock"
                       value="<?php echo $stock ?>">
            </div>
        </div>
        <div class="form-group">
                <label for="product_image" class="col-sm-2 control-label">Product Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="userfile">
                </div>
            </div>


        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="hidden" name="is_submitted" value="1"/>
                <button type="submit" class="btn btn-default">Save</button>
            </div>
        </div>
        <?php echo form_close()  ?>
    </div>
    <div class="col-sm-1"></div>
</div>
</body>
</html>