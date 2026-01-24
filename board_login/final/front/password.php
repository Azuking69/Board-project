<?php
	require_once __DIR__ .'/_layout.php';
	page_head("다이어트는 내일부터 · 비밀번호 확인");
?>

    <h1 class="text-2xl font-bold mb-4">이 글, 네가 쓴 거 맞지?</h1>
    <p class="text-sm mb-6">✏️확인을 위해 비밀번호를 입력해주세요</p>

    <!--🧾パスワード確認フォーム-->
    <form action="../back/password_process.php" method="post" class="max-w-sm">
  <input type="hidden" name="id" value="<?= h($_GET['id']) ?>">

  <label class="block text-sm mb-2">비밀번호</label>
  <input
    type="password"
    name="password"
    placeholder="비밀번호를 입력하세요"
    class="w-full rounded-md border border-slate-300 p-2 text-sm
           focus:border-slate-500 focus:outline-none"
    required
  >

  <div class="mt-4">
    <?= btn_primary("확인") ?>
  </div>
</form>
<?php page_foot();?>