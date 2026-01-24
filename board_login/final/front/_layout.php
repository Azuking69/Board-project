<?php
    function page_head($title) { 
?>

<!doctype html>
<html lang="ko">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title><?= htmlspecialchars($title) ?></title>
</head>

<body class="bg-slate-50 text-slate-900">
  <header class="border-b bg-white">
    <div class="mx-auto max-w-4xl px-4 py-4 flex items-center justify-between">
      <a href="/front/list.php" class="font-semibold">Board</a>
      <nav class="text-sm text-slate-600">
        <a class="hover:text-slate-900" href="/front/insert.php">글쓰기</a>
      </nav>
    </div>
  </header>
  <main class="mx-auto max-w-4xl px-4 py-6">
<?php }

function page_foot() { ?>
  </main>
  <footer class="mx-auto max-w-4xl px-4 py-10 text-xs text-slate-500">
    history/250608 → final
  </footer>
</body>
</html>
<?php } ?>
