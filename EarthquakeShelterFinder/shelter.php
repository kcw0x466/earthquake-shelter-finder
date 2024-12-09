<?php
    include("./db_conn.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>시설 상세 정보</title>
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
    <!-- 카카오맵 API 호출 -->
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=64180b065efc7bd4003142d8dd945d64"></script>
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

            $con = connect_db();
            //$sql = "SELECT 시설명, 상세주소, 도로명주소 FROM 시설정보 WHERE {$_GET['search_type']} LIKE '%{$_GET['q']}%'";
            $sql = "
                SELECT 시설명, 최대수용인원수, 경도, 위도, 상세주소, 도로명주소, 상세시설명, 관리기관명
                FROM 시설정보
                INNER JOIN 상세시설정보
                ON 시설정보.상세시설ID = 상세시설정보.상세시설ID
                INNER JOIN 관리담당자
                ON 시설정보.관리담당자ID = 관리담당자.관리담당자ID
                WHERE 시설명 = '{$_GET['name']}' AND 도로명주소 = '{$_GET['road_address']}' AND 상세주소 = '{$_GET['lot_address']}'
            ";
            $ret = mysqli_query($con, $sql);

            if ($ret) {
                // 행 하나 가져오기
                $row = mysqli_fetch_assoc($ret); // 연관 배열로 가져오기
                $facility_info = [
                    'name' => $row['시설명'],
                    'road_address' => $row['도로명주소'],
                    'longitude' => $row['경도'],
                    'latitude' => $row['위도'],
                    'lot_address' => $row['상세주소'],
                    'capacity' => $row['최대수용인원수'],
                    'facility_detail' => $row['상세시설명'],
                    'management' => $row['관리기관명'],
                ];
            } 
            else {
                echo "쿼리 실패: " . mysqli_error($con);
            }

            mysqli_close($con);
        ?>
        <!-- Facility Details -->
        <div class="card">
            <div class="card-header bg-secondary text-white">
                <h2 class="mb-0"><?php echo $facility_info['name']; ?></h2>
            </div>
            <div class="card-body">
                <p>
                    <strong>위치</strong>
                    <div id="map" style="width:500px;height:400px;"></div>
                </p>
                <p><strong>도로명 주소:</strong> <?php echo $facility_info['road_address']; ?></p>
                <p><strong>지번 주소:</strong> <?php echo $facility_info['lot_address']; ?></p>
                <p><strong>최대 수용 인원수:</strong> <?php echo number_format($facility_info['capacity']); ?>명</p>
                <p><strong>상세 시설:</strong> <?php echo $facility_info['facility_detail']; ?></p>
            </div>
        </div>
    </div>
    <script>
        // 지도 설정
		var container = document.getElementById('map');
		var options = {
			center: new kakao.maps.LatLng(<?php echo $facility_info['latitude']; ?>, <?php echo $facility_info['longitude']; ?>),
			level: 3
		};

        // 지도 생성
		var map = new kakao.maps.Map(container, options);
	</script>
</body>
</html>