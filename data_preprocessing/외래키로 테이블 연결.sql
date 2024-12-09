USE 지진대피시설;

# 외래키로 관리담당자 테이블하고 시설정보 연결
UPDATE 시설정보 
JOIN 관리담당자
ON 시설정보.담당자 = 관리담당자.담당자
SET 시설정보.관리담당자ID = 관리담당자.관리담당자ID;

# 외래키로 상세시설정보 테이블하고 시설정보 연결
UPDATE 시설정보 f
JOIN 상세시설정보 d
ON f.상세시설명 = d.상세시설명
SET f.상세시설ID = d.상세시설ID;

# 시설정보 테이블에서 담당자가 없으면 관리담당자ID도 NULL 값으로 채워놓음
UPDATE 시설정보 
SET 시설정보.담당자 = NULL
WHERE 시설정보.관리담당자ID IS NULL;

# 외래키로 관계 맺은 후 담당자, 상세시설명 컬럼 제거
ALTER TABLE 시설정보 DROP COLUMN 담당자;
ALTER TABLE 시설정보 DROP COLUMN 상세시설명;