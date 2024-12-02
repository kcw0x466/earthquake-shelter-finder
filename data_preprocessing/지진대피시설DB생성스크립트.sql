
-- DROP DATABASE IF EXISTS 한빛무역;

CREATE DATABASE 지진대피시설 DEFAULT CHARSET  utf8mb4 COLLATE  utf8mb4_general_ci;

USE 지진대피시설;

CREATE TABLE 시설정보(
	시설일련번호 INT PRIMARY KEY,
    시설명 VARCHAR(64),
    최대수용인원수 INT,
    경도 DOUBLE,
    위도 DOUBLE,
    상세주소 VARCHAR(128),
    도로명주소 VARCHAR(128),
    관리담당자ID INTEGER,
    상세시설ID INTEGER
) DEFAULT CHARSET=utf8mb4;

CREATE TABLE 관리담당자정보(
    관리담당자ID INTEGER PRIMARY KEY,
    담당자 VARCHAR(64),
    담당자연락처 VARCHAR(64),
    관리기관명 VARCHAR(64)
) DEFAULT CHARSET=utf8mb4;

CREATE TABLE 상세시설정보(
	상세시설ID INTEGER PRIMARY KEY,
    상세시설명 VARCHAR(64)
) DEFAULT CHARSET=utf8mb4;
  
  


