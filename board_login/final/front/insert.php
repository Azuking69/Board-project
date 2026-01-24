<?php
	require_once __DIR__ .'/_layout.php';
	page_head("다이어트는 내일부터 · 작성");
?>

    <h1 class="text-2xl font-bold mb-4">오늘 뭐 먹을지 말해줘~!</h1>
    <p class="text-sm mb-6">🍽️혼자만 알기 아까운 한 끼</p>

    <!--📝項目作成フォーム-->
    <form action="../back/insert_process.php" method="post" class = "space-y-4">
        <div>
            <label class = "block text-sm mb-1">이름</label>
            <input type="text" name = "name" require
            class = "w-full rounded-md border px-3 py-2 text-sm">
        </div>    
        
        <div>
            <label class="block text-sm mb-1">비밀번호</label>
            <input type="password" name="password" required
            class="w-full rounded-md border px-3 py-2 text-sm">
        </div>

        <div>
            <label class="block text-sm mb-1">제목</label>
            <input type="text" name="subject" required
            class="w-full rounded-md border px-3 py-2 text-sm">
        </div>

        <div>
            <label class="block text-sm mb-1">내용</label>
            <textarea name="content" rows="5" required
            class="w-full rounded-md border px-3 py-2 text-sm"></textarea>
        </div>

        <div class="flex gap-2">
            <?= btn_primary("저장") ?>
            <?= btn_secondary("초기화") ?>
        </div>
    </form>

    <p>게시판 목록으로 돌아가시곘습니까?  
        <a href="list.php" class="mt-2 inline-block">
            <?= btn_secondary("돌아가기") ?>
        </a>
    </p>

<?php page_foot();?>