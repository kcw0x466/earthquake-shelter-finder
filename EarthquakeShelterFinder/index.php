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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        body {
            font-family: 'Pretendard', sans-serif;
        }
    </style>
</head>
<body class="d-flex flex-column align-items-center bg-light vh-100">
    <!-- Logo Section -->
    <div class="mt-5">
        <h1>지진 대피소 찾기</h1>
    </div>
    <!-- Search Bar Section -->
    <div class="mt-4 w-100 px-3" style="max-width: 600px;">
        <form action="result.php" method="GET">
            <div class="input-group">
                <select name="search_type" class="form-select" style="max-width: 150px;">
                    <option value="시설명" selected>시설명</option>
                    <option value="도로명주소">도로명 주소</option>
                    <option value="상세주소">지번 주소</option>
                </select>
                <input type="text" name="q" class="form-control" aria-label="Search">
                <button class="btn btn-outline-secondary" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </div>
        </form>
    </div>
    <br>
    <br>
    <br>
    <div class="animate__animated animate__fadeInUp animate__slow">
        <h3>대한민국, 이제 지진 안전지대는 아닙니다. 대비가 곧 생명입니다.</h3>
        <h3>언제 어디서든 대비된 한 걸음이 지진으로부터 당신을 지킵니다.</h3>
    </div>
    <!-- Buttons Section -->
    <div class="mt-3 animate__animated animate__fadeInUp animate__delay-1s">
        <button class="btn btn-primary me-2" onClick="location.href='statistics.php'">지진 통계 확인</button>
    </div>
</body>
</html>