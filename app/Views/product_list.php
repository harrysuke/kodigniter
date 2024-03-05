<!-- product_view.php -->

<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="container mt-4">
    <?php
     if(isset($_SESSION['msg'])){
        echo $_SESSION['msg'];
      }
     ?>
    <h1>Product List</h1>
    <table class="table table-bordered" id="products">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
        <?php if($products): ?>
        <?php foreach ($products as $product) : ?>
            <tr>
            <td><?php echo $product->id; ?></td>
            <td><?php echo $product->name; ?></td>
            <td><?php echo $product->price; ?></td>
            <td><?php echo $product->quantity; ?></td>
            <?php if (session()->get('isLoggedIn')) : ?>
            <td width="10%">
              <a href="<?php echo base_url('edit-product/'.$product->id);?>" class="btn btn-primary btn-sm">Edit</a>
              <a href="<?php echo base_url('delete-product/'.$product->id);?>" class="btn btn-danger btn-sm">Delete</a>
            </td>
            <?php endif; ?>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </table>
</div>
<script src="<?= base_url('js/jquery-3.5.1.slim.min.js')?>"></script>
<link rel="stylesheet" type="text/css" href="<?= base_url('css/jquery.dataTables.min.css')?>">
<script type="text/javascript" src="<?= base_url('js/jquery.dataTables.min.js')?>"></script>
<script>
    $(document).ready( function () {
      $('#products').DataTable();
  } );
</script>

<?= $this->endSection() ?>