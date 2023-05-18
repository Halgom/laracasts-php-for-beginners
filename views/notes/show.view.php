<?php
ob_start();
?>
<div class="min-h-full">
  
  <?php require base_path('views/partials/nav.view.php') ?>

  <?php require base_path('views/partials/banner.view.php') ?>

  <main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
      <p class="mb-6">
        <a href="/notes" class="text-blue-500 hover:underline">Go back...</a>
      </p>
      <p><?= $note['body'] ?></p>

      <footer class="mt-6 flex gap-2">
        <form action="/note?id=<?= $note['id'] ?>" method="POST">
          <input type="hidden" name="_method" value="DELETE">
          <button
            type="submit"
            class="inline-flex justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2"
          >Delete</button>
        </form>
        <a
          href="/note/edit?id=<?= $note['id'] ?>"
          class="inline-flex justify-center rounded-md border border-transparent bg-indigo-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
        >Edit</a>
      </footer>

    </div>
  </main>
</div>
<?php
$content = ob_get_clean();

require base_path('views/partials/doctype.view.php');
