<?php

function renderPagination($currentPage) {
    echo '<nav aria-label="Page navigation">';
    echo '<ul class="pagination justify-content-center">';
    if ($currentPage > 1) {
        echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage - 1) . '">Anterior</a></li>';
    }
    echo '<li class="page-item disabled"><span class="page-link">Página ' . $currentPage . '</span></li>';
    echo '<li class="page-item"><a class="page-link" href="?page=' . ($currentPage + 1) . '">Siguiente</a></li>';
    echo '</ul></nav>';
}
