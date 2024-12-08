<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>지진 대피소 찾기</title>
    <!-- Pretendard 폰트 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/pretendard@1.3.2/dist/webfont.css" rel="stylesheet">
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
        <form action="search_results.php" method="GET" class="d-flex justify-content-center">
            <div class="input-group w-100" style="max-width: 800px;">
                <!-- Dropdown Menu -->
                <select name="search_type" class="form-select" style="max-width: 150px;">
                    <option value="facility" selected>시설명</option>
                    <option value="road_address">도로명주소</option>
                    <option value="lot_address">지번주소</option>
                </select>
                <!-- Search Input -->
                <input type="text" name="q" class="form-control" placeholder="검색어를 입력하세요" aria-label="Search">
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
            // 예제 데이터 (DB나 API를 통해 불러오는 데이터)
            $results = [
                ['name' => '서울시청', 'road_address' => '서울특별시 중구 세종대로 110', 'lot_address' => '서울특별시 중구 태평로1가 31'],
                ['name' => '부산시청', 'road_address' => '부산광역시 연제구 중앙대로 1001', 'lot_address' => '부산광역시 연제구 연산동 1000'],
                ['name' => '대구시청', 'road_address' => '대구광역시 중구 공평로 88', 'lot_address' => '대구광역시 중구 동인동1가 101'],
            ];

            // 리스트 항목 출력
            foreach ($results as $item) {
                echo "<a href='#' class='list-group-item list-group-item-action'>";
                echo "<h5 class='mb-1'>{$item['name']}</h5>";
                echo "<p class='mb-0'>도로명 주소: {$item['road_address']}</p>";
                echo "<p class='mb-0'>지번 주소: {$item['lot_address']}</p>";
                echo "</a>";
            }
            ?>
        </div>
    </div>
</body>
</html>