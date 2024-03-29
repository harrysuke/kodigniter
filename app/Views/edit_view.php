<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<style>
    .container {
    }
    .error {
      display: block;
      padding-top: 5px;
      font-size: 14px;
      color: red;
    }
  </style>

  <div class="container mt-5">
    <form method="post" id="update_user" name="update_user" 
    action="<?= site_url('/update') ?>">
      <input type="hidden" name="id" id="id" value="<?php echo $user_obj['id']; ?>">
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $user_obj['name']; ?>">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?php echo $user_obj['email']; ?>">
      </div>
      <div class="form-group">
      <?php if (session()->get('isLoggedIn')) : ?>
        <button type="submit" class="btn btn-danger btn-block">Save Data</button>
        <?php endif; ?>
      </div>
    </form>
  </div>
  <script src="<?= base_url('js/jquery-3.5.1.slim.min.js')?>"></script>
  <script src="<?= base_url('js/jquery.validate.js')?>"></script>
  <script src="<?= base_url('js/additional-methods.min.js')?>"></script>
  <script>
    if ($("#update_user").length > 0) {
      $("#update_user").validate({
        rules: {
          name: {
            required: true,
          },
          email: {
            required: true,
            maxlength: 60,
            email: true,
          },
        },
        messages: {
          name: {
            required: "Name is required.",
          },
          email: {
            required: "Email is required.",
            email: "It does not seem to be a valid email.",
            maxlength: "The email should be or equal to 60 chars.",
          },
        },
      })
    }
  </script>

<?= $this->endSection() ?>