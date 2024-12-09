USE 지진대피시설;
SELECT 시설명, 상세주소, 도로명주소 FROM 시설정보 WHERE 시설명 LIKE '%화봉%';
SELECT 시설명, 상세주소, 도로명주소 FROM 시설정보 WHERE 도로명주소 LIKE '%%';
SELECT 시설명, 상세주소, 도로명주소 FROM 시설정보 WHERE 지번주소 LIKE '%%';

# shelter.php
SELECT 시설명, 최대수용인원수, 경도, 위도, 상세주소, 도로명주소, 상세시설명, 관리기관명
FROM 시설정보
INNER JOIN 상세시설정보
ON 시설정보.상세시설ID = 상세시설정보.상세시설ID
INNER JOIN 관리담당자
ON 시설정보.관리담당자ID = 관리담당자.관리담당자ID
WHERE 시설명 = '화봉초등학교' AND 도로명주소 = '울산광역시 북구 화산로 42(화봉동)' AND 상세주소 = '울산광역시 북구 화봉동 1339-0';