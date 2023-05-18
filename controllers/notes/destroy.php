<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->query('SELECT * FROM notes WHERE id = :id', [
  'id' => $_GET['id']
])->findOneOrFail();

authorize($note['user_id'] === $currentUserId);

$db->query("delete from notes where id = :id", [
  'id' => $_GET['id']
]);

header('location: /notes');
