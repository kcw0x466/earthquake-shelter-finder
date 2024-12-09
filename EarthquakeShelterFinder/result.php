<?php
    include("./db_conn.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>지진 대피소 찾기</title>
    <!-- Pretendard 폰트 CDN -->
    <link rel="stylesheet" as="style" crossorigin href="https://cdn.jsdelivr.net/gh/orioncactus/pretendard@v1.3.8/dist/web/static/pretendard.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Pretendard', sans-serif;
        }
    </style>
</head>
<body class="bg-light">
    <!-- Header Section -->
    <header class="bg-primary text-white text-center py-3">
        <h3>
            <a href="index.php" class="text-white text-decoration-none">지진 대피소 찾기</a>
        </h3>
    </header>
    <!-- Search Section -->
    <div class="container my-4">
        <form action="result.php" method="GET" class="d-flex justify-content-center">
            <div class="input-group w-100" style="max-width: 800px;">
                <!-- Dropdown Menu -->
                <?php
                    if ($_GET['search_type'] == "시설명") {
                ?>
                        <select name="search_type" class="form-select" style="max-width: 150px;">
                            <option value="시설명" selected>시설명</option>
                            <option value="도로명주소">도로명 주소</option>
                            <option value="상세주소">지번 주소</option>
                        </select>
                <?php 
                    }   
                    else if($_GET['search_type'] == "도로명주소") {
                ?>
                        <select name="search_type" class="form-select" style="max-width: 150px;">
                            <option value="시설명">시설명</option>
                            <option value="도로명주소" selected>도로명 주소</option>
                            <option value="상세주소">지번 주소</option>
                        </select>
                <?php           
                    }
                    else if($_GET['search_type'] == "상세주소") {
                ?>
                        <select name="search_type" class="form-select" style="max-width: 150px;">
                            <option value="시설명">시설명</option>
                            <option value="도로명주소">도로명 주소</option>
                            <option value="상세주소" selected>지번 주소</option>
                        </select>
                <?php        
                    } 
                ?>

                <!-- Search Input -->
                <input type="text" name="q" value="<?=$_GET['q']?>" class="form-control" placeholder="검색어를 입력하세요" aria-label="Search">
                <!-- Search Button -->
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
    </div>
    <!-- Results Section -->
    <div class="container">
        <h2 class="mb-3">검색 결과</h2>
        <!-- Results List -->
        <div class="list-group">
            <?php
                $con = connect_db();
                $sql = "SELECT 시설명, 상세주소, 도로명주소 FROM 시설정보 WHERE {$_GET['search_type']} LIKE '%{$_GET['q']}%'";
                $ret = mysqli_query($con, $sql);
                
                while ($row = mysqli_fetch_array($ret)) {
                    echo "<a href='shelter.php?name={$row['시설명']}&road_address={$row['도로명주소']}&lot_address={$row['상세주소']}' class='list-group-item list-group-item-action'>";
                    echo "<h5 class='mb-1'>{$row['시설명']}</h5>";
                    echo "<p class='mb-0'>도로명 주소: {$row['도로명주소']}</p>";
                    echo "<p class='mb-0'>지번 주소: {$row['상세주소']}</p>";
                    echo "</a>";
                }

                mysqli_close($con);
            ?>
        </div>
    </div>
</body>
</html>