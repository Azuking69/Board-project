<?php
	require_once __DIR__ .'/_layout.php';
	page_head("다이어트는 내일부터 · 수정/삭제");

    //📇database指定
    include ("../back/db_connect_pass.php");

    $id = isset($_POST['id']) ? intval($_POST['id']): 0;
    $password = isset($_POST['password']) ? $_POST['password'] : "";

    if ($id > 0){
        $sql = "SELECT name, subject, content FROM board WHERE id = $id";
        $result = $conn -> query($sql);

        if ($result -> num_rows > 0){
            $row = $result -> fetch_assoc();
        } else {
            echo "게시글이 존재하지 않습니다.";
            exit;
        }
    } else {
        echo "<script> alert ('잘못된 접근입니다.'); history.back();</script>";
    }
    //$conn: 接続の窓口 -> 接続終了
    $conn -> close();

?>

    <h1 class="text-2xl font-bold mb-4">이제 어떻게 할래?</h1>
    <p class="text-sm mb-6">✏️수정할지, 🗑️삭제할지 골라주세요</p>

    <!--📝フォーム作成-->
    <form action="../back/update_process.php" method="post" class="space-y-4 max-w-lg">
        <input type="hidden" name="id" value="<?= h($id) ?>">
        <div>
            <label class="block text-sm mb-1">이름</label>
            <input
            type="text"
            name="name"
            value="<?= h($row['name']) ?>"
            class="w-full rounded-md border p-2 text-sm"
            >
        </div>

        <div>
            <label class="block text-sm mb-1">제목</label>
            <input
            type="text"
            name="subject"
            value="<?= h($row['subject']) ?>"
            class="w-full rounded-md border p-2 text-sm"
            >
        </div>

        <div>
            <label class="block text-sm mb-1">내용</label>
            <textarea
            name="content"
            rows="5"
            class="w-full rounded-md border p-2 text-sm"
            ><?= h($row['content']) ?></textarea>
        </div>

        <?= btn_primary("수정") ?>
        </form>

        <hr class="my-8">

        <!-- 🗑️ 삭제 폼 -->
        <form action="../back/delete_process.php" method="post">
        <input type="hidden" name="id" value="<?= h($id) ?>">
        <input type="hidden" name="password" value="<?= h($password) ?>">

        <?= btn_danger("삭제") ?>
    </form>
<?php page_foot();?>