<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
  'id' => $_GET['id']
])->findOneOrFail();

authorize($note['user_id'] === $currentUserId);

$errors = [];
if (! Validator::string($_POST['body'], 1, 1000)) {
  $errors['body'] = 'A body of no more than 1,000 is required';
}

if (!empty($errors)) {
  return view("notes/edit.view.php", [
    'heading' => 'Edit note',
    'errors' => $errors,
    'note' => $note
  ]);
}

$db->query("UPDATE notes SET body = :body WHERE id = :id", [
  'body' => htmlspecialchars($_POST['body']),
  'id' => $_GET['id']
]);

header('location: /note?id=' . $_GET['id']);
die();
