<?php
    require_once __DIR__ .'/_layout.php';
    page_head("다이어트는 내일부터 · 리스트");

    //📇database指定
    include ("../back/db_connect_pass.php");

    //🧾1ページあたりの表示件数
    $perpage = 5;
    
    //🧭現在のページ番号（未指定なら1ページ目）
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    if ($page < 1) $page = 1;


    //🧮OFFSETを計算
    $start = ($page - 1) * $perpage;

    //🔍 検索機能
    $type = isset($_GET['type']) ? $_GET['type'] : '';
    $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';
    $search_condition = "";

    if ($type && $keyword) {
        $keyword_esc = $conn->real_escape_string($keyword);
        if ($type === 'subject') {
            $search_condition = "WHERE subject LIKE '%$keyword_esc%'";
        } elseif ($type === 'content') {
            $search_condition = "WHERE content LIKE '%$keyword_esc%'";
        } elseif ($type === 'all') {
            $search_condition = "WHERE subject LIKE '%$keyword_esc%' OR content LIKE '%$keyword_esc%'";
        }
    }

    //📦データ取得（ページ分だけ）
    $sql = "SELECT * FROM board $search_condition ORDER BY id DESC LIMIT $perpage OFFSET $start";
    $result = $conn->query($sql);
    $total_sql = "SELECT COUNT(*) AS total FROM board $search_condition";


    //📊全件数取得
    $total_result = $conn->query($total_sql);
    $total_row = $total_result->fetch_assoc();
    $total_posts = $total_row['total'];
    $total_pages = ceil($total_posts / $perpage);
?>

    <h1 class="text-2xl font-bold mb-4">오늘 뭐 먹었어?</h1>
    <p class="text-sm mb-6">🍰오늘의 맛있는 기록</p>

    <!--🔍 検索フォーム -->
    <form method="get" action="list.php" class="flex flex-wrap items-center gap-2 mb-4">
        <select name = "type" class = "h-10 rounded-md border px-3">
            <option value="subject" <?php if(isset($_GET['type']) && $_GET['type'] === 'subject') echo 'selected'; ?>>제목</option>
            <option value="content" <?php if(isset($_GET['type']) && $_GET['type'] === 'content') echo 'selected'; ?>>내용</option>
            <option value="all" <?php if(isset($_GET['type']) && $_GET['type'] === 'all') echo 'selected'; ?>>제목+내용</option>
        </select>
        <input type="text" name="keyword" class = "h-10 rounded-md border px-3"
            placeholder="검색어를 입력하세요" 
            value="<?php echo isset($_GET['keyword']) ? htmlspecialchars($_GET['keyword']) : ''; ?>">
        <input type="submit" value="검색" class="h-10 rounded-md bg-slate-900 text-white text-sm px-4 cursor-pointer hover:bg-slate-700">
        <a href="list.php" class="inline-flex items-center h-10 px-4 rounded-md border text-sm hover:bg-slate-100">
            초기화
        </a>
    </form>


    <!--📇リスト化-->
    <table class="w-full border-collapse border">
        <tr class="bg-white">
            <th class="bg-white">번호</th>
            <th class="bg-white">이름</th>
            <th class="bg-white">제목</th>
            <th class="bg-white">작성일</th>
        </tr>

        <!--🔔databaseから呼び出し-->
        <?php
        $count = $total_posts - ($page - 1) * $perpage;
        if ($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td class='border px-3 py-2'>" . $count-- . "</td>";
                echo "<td class='border px-3 py-2'>{$row['name']}</td>";
                echo "<td class='border px-3 py-2'><a href='read.php?id={$row['id']}'>{$row['subject']}</a></td>";
                echo "<td class='border px-3 py-2'>{$row['created_at']}</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td class='border px-3 py-3' colspan='4'>검색 결과가 없습니다.</td></tr>";
        }
        ?>
    </table>

    <br>
    <br>

    <!--📄Pagenation-->
    <div class="mt-4 flex flex-wrap gap-2 items-center">
    <?php
    $pageRange = 5;  //１セットの表示数
    $startPage = floor(($page - 1) / $pageRange) * $pageRange + 1;
    $endPage = min($startPage + $pageRange - 1, $total_pages);

    // <<: 最初のページ
    if ($startPage > 1) {
        echo "<a class='px-3 py-2 border rounded-md hover:bg-slate-100' href='?page=1'>&laquo;</a>";
    }

    // <: 前のページグループ
    if ($startPage > 1) {
        $prevSet = $startPage - 1;
        echo "<a class='px-3 py-2 border rounded-md hover:bg-slate-100' href='?page=$prevSet'>&lt;</a>";
    }

    // ページ番号表示
    for ($i = $startPage; $i <= $endPage; $i++) {
        if ($i == $page) {
            echo "<span class='px-3 py-2 border rounded-md font-bold bg-slate-900 text-white'>$i</span> ";
        } else {
            echo "<a class='px-3 py-2 border rounded-md hover:bg-slate-100' href='?page=$i'>$i</a>";
        }
    }

    // >: 次のページグループ
    if ($endPage < $total_pages) {
        $nextSet = $endPage + 1;
        echo "<a class='px-3 py-2 border rounded-md hover:bg-slate-100' href='?page=$nextSet'>&gt;</a>";
    }

    // >>: 最後のページ
    if ($endPage < $total_pages) {
        echo "<a class='px-3 py-2 border rounded-md hover:bg-slate-100' href='?page=$total_pages'>&raquo;</a>";
    }
    ?>
    </div>
    <br>
    <br>


    <a href="insert.php" class="inline-flex items-center mt-6 px-4 py-2 rounded-md bg-slate-900 text-white text-sm hover:bg-slate-700">
        글쓰기
    </a>
<?php page_foot();?>