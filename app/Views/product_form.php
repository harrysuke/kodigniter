<!-- add_product.php -->

<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h1>Add Product</h1>
    <form method="post" action="<?= site_url('submit-product') ?>">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="price">Price:</label>
            <input type="number" id="price" name="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" class="form-control" required>
        </div>
        <?php if (session()->get('isLoggedIn')) : ?>
        <button type="submit" class="btn btn-primary btn-block">Add Product</button>
        <?php endif; ?>
    </form>
</div>

<?= $this->endSection() ?>