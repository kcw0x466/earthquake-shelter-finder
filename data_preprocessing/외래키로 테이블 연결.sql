USE 지진대피시설;

UPDATE 시설정보 
JOIN 관리담당자
ON 시설정보.담당자 = 관리담당자.담당자
SET 시설정보.관리담당자ID = 관리담당자.관리담당자ID;

UPDATE 시설정보 f
JOIN 상세시설정보 d
ON f.상세시설명 = d.상세시설명
SET f.상세시설ID = d.상세시설ID;

UPDATE 시설정보 
SET 시설정보.담당자 = NULL
WHERE 시설정보.관리담당자ID IS NULL;

ALTER TABLE 시설정보 DROP COLUMN 담당자;
ALTER TABLE 시설정보 DROP COLUMN 상세시설명;