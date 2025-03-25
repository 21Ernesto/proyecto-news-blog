<?php

function formatAuthor($user) {
    return ucfirst($user['name']['first']) . " " . ucfirst($user['name']['last']);
}
