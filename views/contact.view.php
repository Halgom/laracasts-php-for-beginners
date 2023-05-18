<?php
ob_start();
?>
<div class="min-h-full">

  <?php require('partials/nav.view.php') ?>

  <?php require('partials/banner.view.php') ?>

  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <h1>Contact us</h1>
    </div>
  </main>
</div>
<?php
$content = ob_get_clean();

require('partials/doctype.view.php');
