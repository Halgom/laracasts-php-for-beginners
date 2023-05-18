<?php
ob_start();
?>
<div class="min-h-full">
  
  <?php require('partials/nav.view.php') ?>

  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <h1 class="text-2xl">Unauthorized</h1>
      <p><a class="text-blue-500 underline" href="/">Go back home.</a></p>
    </div>
  </main>
</div>
<?php
$content = ob_get_clean();

require('partials/doctype.view.php');
