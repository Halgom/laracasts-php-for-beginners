<?php

// Validate inputs

use Core\App;
use Core\Database;
use Core\Validator;

$errors = [];
$email = $_POST['email'];
if (! Validator::email($email)) {
  $errors['email'] = "Please provide a valid email address";
}

$password = $_POST['password'];
if (! Validator::string($password, 8, 255)) {
  $errors['password'] = "Please choose a password of at least 8 characters";
}

if (!empty($errors)) {
  return view('registrations/create.view.php', [
    'errors' => $errors
  ]);
}

// Check uniqueness
$db = App::resolve(Database::class);

$user = $db->query("SELECT * FROM users WHERE email = :email", [
  'email' => $email
])->find();

if ($user) {
  header('location: /');
  exit();
}

// Store new user
$db->query("INSERT INTO users(email, password) VALUES(:email, :password)", [
  'email' => $email,
  'password' => $password
]);

// Login new User
$_SESSION['user'] = [
  'email' => $email
];

// Redirect to home page
header('location: /');
exit();
