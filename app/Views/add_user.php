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
    <form method="post" id="add_create" name="add_create" action="<?= site_url('/submit-form') ?>">
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" class="form-control">
      </div>
      <div class="form-group">
        <label>Email</label>
        <input type="text" name="email" class="form-control">
      </div>
      <div class="form-group">
      <?php if (session()->get('isLoggedIn')) : ?>
        <button type="submit" class="btn btn-primary btn-block">Submit Data</button>
        <?php endif; ?>
      </div>
    </form>
  </div>
  <script src="<?= base_url('js/jquery-3.5.1.slim.min.js')?>"></script>
  <script src="<?= base_url('js/jquery.validate.js')?>"></script>
  <script src="<?= base_url('js/additional-methods.min.js')?>"></script>
  <script>
    if ($("#add_create").length > 0) {
      $("#add_create").validate({
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