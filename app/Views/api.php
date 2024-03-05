<?= $this->extend('layout/page_layout') ?>

<?= $this->section('content') ?>

<div class="container mt-5">
    <h1 class="title">
        API
    </h1>
    <p>GET: http://localhost:8080/apicontroller</p>
    <p>GET: http://localhost:8080/apicontroller/1</p>
    <p>POST: http://localhost:8080/apicontroller</p>
    <p>PUT: http://localhost:8080/apicontroller/3</p>
    <p>DELETE: http://localhost:8080/apicontroller/11</p>
</div>

<?= $this->endSection() ?>