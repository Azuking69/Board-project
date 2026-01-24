<?php
  // 文字化け防止 + 安全な出力
  function h(string $s): string {
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
  }
/**
 * ページ共通：上（head〜header〜main開始）
 * 使い方：page_head("페이지 제목");
 */
  function page_head(string $title): void { 
?>


<!doctype html>
<html lang="ko">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <!-- Tailwindow의 삽입 -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- <[?= ... ?>: PHP 생략 -->
  <!-- 그냥 문자라고 인식시키기 위해 -->
  <title><?= h($title) ?></title>
</head>

<!-- class: 모습
     min-h-screen: 화면의 높이 100%
     bg-slate-50: 맑은 배경
     text-slate-900: 글자 색 -->
<body class="min-h-screen bg-slate-50 text-slate-900">
  <header class="border-b bg-white">
    <!-- mx-auto: 중싱에 맞추기
         max-w-5xl: 가로 제한
         px-4 py-4: 안의 여백
         flex justify-between: 양쪽에 나누기 -->
    <div class="mx-auto max-w-5xl px-4 py-4 flex items-center justify-between">
      <a href="/front/list.php" class="leading-tight">
        <div class = "front-extrabold text-lg tracking-tight">
          <?= h("다이어트는 내일부터") ?>
        </div>
        <div class = "text-xs text-slate-500">
          <?= h("오늘도 맛있게, 같이 먹자🍰")?>
        </div>        
      </a>
      <!-- gap-3: 글자 사이의 크기 -->
      <nav class="flex items-center gap-2 text-sm">
        <!-- px-3 py-2: 버튼 여백
             rounded-md: 뿔을 둥글게
             border bg-white: 테두리+흰색 배경
             hover:bg-slate-50: 커서로 희미한 색 -->
        <a href = "/front/list.php" class="px-3 py-2 rounded-md border bg-white hover:bg-slate-50">
          리스트
        </a>
        <a href = "/front/insert.php" class="px-3 py-2 rounded-md border bg-white hover:bg-slate-50">
          글쓰기
        </a>
      </nav>
    </div>
  </header>
  <!-- list.php / read.php / insert.php의 내용은 다 넣는다 -->
  <main class="mx-auto max-w-5xl px-4 py-6">
<?php }

/**
 * ページ共通：下（main終了〜footer）
 */
function page_foot(): void { ?>
  </main>

  <footer class="border-t bg-white">
    <div class="mx-auto max-w-5xl px-4 py-6 text-xs text-slate-500 flex items-center justify-between">
      <div>
        <?= h("final · 다이어트는 내일부터") ?>
      </div>
      <div>
        <?= h("made by Azuki.I") ?>
      </div>
    </div>
  </footer>
</body>
</html>
<?php }