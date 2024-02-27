<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Codeigniter</title>

	<!-- Bootstrap CSS -->
	<link href="<?= base_url('css/bootstrap.min.css')?>" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <?= $this->include('layout/navbar') ?>
    <?= $this->include('layout/header') ?>
	
    <?= $this->renderSection('content') ?>
    
    <?= $this->include('layout/footer') ?>

	<!-- Jquery dan Bootsrap JS -->
	<script src="<?= base_url('js/bootstrap.bundle.min.js')?>" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>