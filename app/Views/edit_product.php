<!-- edit_product.php -->

<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

    <div class="container mt-5">
        <h1>Edit Product</h1>
        <form action="<?= site_url('/update-product'); ?>" method="post">
            <div class="form-group">
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" class="form-control" value="<?php echo $user_obj->name; ?>" required>
            </div>
            <div class="form-group">
                <label for="price">Price:</label><br>
                <input type="text" id="price" name="price" class="form-control" value="<?php echo $user_obj->price; ?>" required>
            </div>
            <div class="form-group">
                <label for="quantity">Quantity:</label><br>
                <input type="text" id="quantity" name="quantity" class="form-control" value="<?php echo $user_obj->quantity; ?>" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Update" class="btn btn-primary btn-block">
                <input type="hidden" name="id" value="<?php echo $user_obj->id; ?>">
            </div>
        </form>
    </div>

    <?= $this->endSection() ?>