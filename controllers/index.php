<?php

$_SESSION['name'] = "Fred";

view("index.view.php", [
  "heading" => 'Home'
]);