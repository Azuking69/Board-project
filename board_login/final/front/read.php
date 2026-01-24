<?php
    require_once __DIR__ .'/_layout.php';
    page_head("다이어트는 내일부터 · 상세보기");
?>

<?php
    //📇database指定
    include ("../back/db_connect_pass.php");
    
    //変数に受け取った'id'を入れる
    $id = $_GET['id'];

    //⚠️$id がなければエラー
    if (!$id) {
        echo "❗ ID가 지정되어 있지 않습니다.";
        exit;
    }

       $sql = "SELECT * FROM board WHERE id = $id";
       $result = $conn -> query($sql); //🔍データベースでの有無を確認
       
       //🚩結果が存在するかどうか
       if ($result && $result -> num_rows > 0){
            $row = $result -> fetch_assoc(); //⭕見つかったら
       } else {
        echo "❗포스트를 찾을 수 없습니다."; //❌見つからなければ
        exit;
    }
?>

    <h1 class="text-2xl font-bold mb-4">이거 먹었어!</h1>
    <p class="text-sm mb-6">🍴솔직한 한 끼 이야기</p>
    
    <!--🔔データベースから呼び出し-->
    <h2 class = "text-lg font-bold"><?php echo $row['subject']; ?></h2>
    <p>작성자: <?php echo $row['name']; ?></p>
    <p>작성일: <?php echo $row['created_at']; ?></p><br>
    <div class="mt-4 rounded-lg border bg-white p-4">
        <?= nl2br(h($row['content'])) ?>
    </div>

    <!--📝パスワード入力フォームへ-->
    <a href="password.php?id=<?= $row['id'] ?>" class="mt-4 inline-block">
        <?= btn_primary("변경") ?>
    </a>
    <br><br><hr>

    <!--コメント表示-->
    <h2 class = "text-lg font-bold">댓글</h2>
    <?php
    $comment_sql = "SELECT * FROM comments WHERE post_id = $id ORDER BY created_at ASC";
    $comment_result = $conn->query($comment_sql);

    // コメントがないときのメッセージ
    if ($comment_result->num_rows === 0) {
        echo '<p class = "text-sm text-slate-600">
            등록된 댓글이 없습니다.
        </p>';
    }
    // コメントがある場合表示
    while ($comment = $comment_result -> fetch_assoc()) {
    ?>
    <!--📝コメント表示-->
    <div id="comment-view-<?= $comment['id'] ?>" style="border-bottom:1px solid #ccc; padding:10px;">
    <p><?= $comment['name'] ?>(<?= $comment['created_at'] ?>)</p>
    <p class="mt-4 rounded-lg border bg-white p-4"><?= nl2br($comment['content']) ?></p>
    <button type="button" onclick="toggleEdit(<?= $comment['id'] ?>)" class="px-4 py-2 rounded-md bg-slate-900 text-white text-sm hover:bg-slate-700 mt-2">
        변경
    </button>
    </div>

    <!-- ✍️ 編集フォーム（最初は非表示） -->
    <div id="comment-edit-<?= $comment['id'] ?>" style="display: none; border-bottom:1px solid #ccc; padding:10px;">
        <form action="../back/comment_action.php" method="post">
            <input type="hidden" name="comment_id" value="<?= $comment['id'] ?>">
            <input type="hidden" name="post_id" value="<?= $id ?>">
            <textarea name="content" rows="3" cols="50" class="mt-4 rounded-lg border bg-white p-4"><?= $comment['content'] ?></textarea><br>
            <p>비밀번호: <input type="password" name="password" placeholder="비밀번호를 입력하세요" required></p><br>
            <button type="submit" name="action" value="update" class="mt-2">
                <?= btn_primary("수정") ?>
            </button>
            <button type="submit" name="action" value="delete" class="mt-2">
                <?= btn_danger("삭제") ?>
            </button>
        </form>
    </div>
    <?php
    }
    ?>
    <br><br><hr>

    <!--✏️コメント機能-->
    <h2 class = "text-lg font-bold">댓글 작성</h2>
    <form action="../back/comment_process.php" method="post">
        <input type="hidden" name="post_id" value="<?=$id ?>">
        <p>이름: <input type="text" name="name" placeholder="이름을 입력하세요" required></p>
        <p>비밀번호: <input type="password" name="password" placeholder="비밀번호를 입력하세요" required></p>
        <p>내용: </p>
        <textarea name="content" rows="5" cols="40" required
            class="w-full rounded-md border border-slate-300 p-3 text-sm
            focus:border-slate-500 focus:outline-none">
        </textarea>

        <button type="submit" class="mt-2">
            <?= btn_primary("작성") ?>
        </button>
    </form>

    <!--🏃最初の画面に戻る-->
    <p>게시판 목록으로 돌아가시곘습니까?  
        <a href="list.php" class="mt-2 inline-block">
            <?= btn_secondary("돌아가기") ?>
        </a>
    </p>


<script>
function toggleEdit(commentId) {
  const view = document.getElementById("comment-view-" + commentId);
  const edit = document.getElementById("comment-edit-" + commentId);

  if (edit.style.display === "none") {
    edit.style.display = "block";
    view.style.display = "none";
  } else {
    edit.style.display = "none";
    view.style.display = "block";
  }
}
</script>
<?php page_foot();?>