<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>시설 상세 정보</title>
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
    <header class="bg-primary text-white py-3">
        <div class="container d-flex align-items-center">
            <!-- Home Icon -->
            <a href="index.php" class="text-white text-decoration-none me-3">
                <i class="bi bi-house-door-fill" style="font-size: 1.5rem;"></i>
            </a>
            <h1 class="mb-0">시설 상세 정보</h1>
        </div>
    </header>
    <!-- Detail Section -->
    <div class="container my-4">
        <?php
        // 예제 데이터 (실제로는 데이터베이스 또는 API에서 가져온 데이터)
        $facility_details = [
            'name' => '서울시청',
            'road_address' => '서울특별시 중구 세종대로 110',
            'lot_address' => '서울특별시 중구 태평로1가 31',
            'capacity' => 5000,
            'facilities' => '화장실, 급수대, 휴게실',
            'management' => '서울특별시 중구청',
        ];
        ?>
        <!-- Facility Details -->
        <div class="card">
            <div class="card-header bg-secondary text-white">
                <h2 class="mb-0"><?php echo $facility_details['name']; ?></h2>
            </div>
            <div class="card-body">
                <p><strong>도로명 주소:</strong> <?php echo $facility_details['road_address']; ?></p>
                <p><strong>지번 주소:</strong> <?php echo $facility_details['lot_address']; ?></p>
                <p><strong>최대 수용 인원수:</strong> <?php echo number_format($facility_details['capacity']); ?>명</p>
                <p><strong>상세 시설:</strong> <?php echo $facility_details['facilities']; ?></p>
                <p><strong>관리 기관명:</strong> <?php echo $facility_details['management']; ?></p>
            </div>
        </div>
    </div>
</body>
</html>