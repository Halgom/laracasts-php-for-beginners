<?php
ob_start();
?>
<div class="min-h-full">
  
  <?php require base_path('views/partials/nav.view.php') ?>

  <?php require base_path('views/partials/banner.view.php') ?>

  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <ul>
        <?php foreach ($notes as $note) : ?>
          <li>
            <a href="/note?id=<?= $note['id'] ?>" class="text-blue-500 hover:underline">
              <?= $note['body'] ?>
            </a>
          </li>
        <?php endforeach ?>
      </ul>

      <p class="mt-6">
        <a href="/notes/create" class="text-blue-500 hover:underline">Create Note</a>
      </p>
    </div>
  </main>
</div>
<?php
$content = ob_get_clean();

require base_path('views/partials/doctype.view.php');
