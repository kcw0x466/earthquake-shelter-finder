import json

# JSON 파일에서 데이터 읽기
with open('시설정보_외래키.json', 'r', encoding='utf-8') as file:
    unicode_json = file.read()

# JSON 디코딩
decoded_json = json.loads(unicode_json)

# 결과를 한글로 저장
with open('output.json', 'w', encoding='utf-8') as file:
    json.dump(decoded_json, file, ensure_ascii=False, indent=4)

print("한글로 변환된 JSON이 'output.json'에 저장되었습니다.")