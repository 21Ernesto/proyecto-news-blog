<?php
require_once "includes/api.php";
require_once "includes/functions.php";
require_once "includes/pagination.php";

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$articles = fetchNews($page);
$authors = fetchRandomUsers(count($articles['articles']));
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Blog Noticiero</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <h1 class="mb-4 text-center">Noticias del Día</h1>
  <div class="row">
    
  <?php if (!empty($articles['articles'])): ?>
  <?php foreach ($articles['articles'] as $index => $article): ?>
    <div class="col-md-4 mb-4">
      <div class="card h-100">
        <?php if ($article['urlToImage']): ?>
          <img src="<?= $article['urlToImage'] ?>" class="card-img-top" alt="Imagen">
        <?php endif; ?>
        <div class="card-body">
          <h5 class="card-title"><?= $article['title'] ?></h5>
          <p class="card-text"><?= $article['description'] ?? 'Sin descripción disponible.' ?></p>
        </div>
        <div class="card-footer text-muted">
          Autor: <?= formatAuthor($authors[$index]) ?>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
<?php else: ?>
  <div class="col-12">
    <div class="alert alert-warning text-center">
      No se encontraron noticias en este momento. Intenta más tarde o cambia el término de búsqueda.
    </div>
  </div>
<?php endif; ?>


    
  </div>

  <?php renderPagination($page); ?>
</div>
</body>
</html>
