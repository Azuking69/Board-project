# 📝 Board Project (PHP + SQL + Docker)
## 📌 프로젝트 개요
- 이 프로젝트는 PHP 기본 문법과 SQL 데이터베이스 연동 흐름을 이해하기 위해 제작한 게시판 프로젝트입니다.
- Docker 환경에서 실행되도록 구성하여, 로컬 환경에 서버나 DB를 직접 설치하지 않아도 동작하도록 설계했습니다.
- PHP를 사용한 서버 처리 흐름과 데이터베이스 활용의 기초를 보여주는 것을 목표로 합니다.

---

## 🎯 제작 목적
이 프로젝트를 통해 다음 내용을 학습하고 구현했습니다.
- PHP 기본 문법 활용
- SQL을 이용한 데이터 저장 및 조회
- Docker / Docker Compose를 이용한 개발 환경 구성
- 게시판 형태의 기본 웹 흐름 이해 (입력 → 서버 처리 → DB → 화면 출력)

---

## 🛠 사용 기술
<p align="left">
  <!-- PHP -->
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg" width="48" height="48" alt="PHP"/>

  <!-- SQL Database (MySQL代表) -->
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg" width="48" height="48" alt="SQL Database"/>

  <!-- Docker -->
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original.svg" width="48" height="48" alt="Docker"/>

  <!-- Nginx -->
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nginx/nginx-original.svg" width="48" height="48" alt="Nginx"/>
</p>

---

## 📂 디렉토리 구성
프로젝트는 다음과 같은 구조로 구성되어 있습니다. 
- [board_login/](board_login/)
  → 게시판 PHP 소스 코드
- [nginx/](nginx)
  → 웹 서버 설정 파일
- [Dockerfile](Dockerfile)
  → PHP 실행 환경 설정
- [docker-compose.yml](docker-compose.yml)
  → 컨테이너 구성 및 실행 설정

---

## 📌 디렉토리 운영 방침
- [history/](history/)
  → 제작 과정과 학습 기록을 날짜별로 보존
- [history/250608](history/250608)
  → 현재 기준 누구나 클론 후 바로 실행하여 확인 가능한 버전
- [final/](final/)
  → Tailwind CSS를 적용한 최종 제출용 결과물로 추후 완성 예정

---

## ⚙️ 주요 기능 (250608 기준)
- 게시글 작성
- 게시글 목록 조회
- 게시글 상세 조회
- 게시글 수정
- 게시글 삭제
- 댓글 작성 / 수정 / 삭제 (비밀번호 기반)

※ 로그인 기능은 포함하지 않은 기초 게시판 구조입니다.

---

## 🚀 실행 방법 (Docker)
사전에 Docker / Docker Compose가 설치되어 있어야 합니다.

1️⃣ 프로젝트 클론
git clone https://github.com/Azuking69/Board-project.git
cd Board-project

2️⃣ 컨테이너 실행
docker compose up -d --build

3️⃣ 브라우저 접속
http://localhost


기본 접속 시 history/250608/front/list.php가 표시됩니다.

---

## 🗄 데이터베이스 정보 (250608)
- DB Host: db
- DB Name: board_pass
- DB User: app
- DB Password: app

초기 테이블은 다음 SQL 파일로 자동 생성됩니다.

board_login/history/250608/sql/init.sql


생성 테이블: 
- board
- comments

---

## 📎 느낀 점 및 개선 방향
✔ 배운 점
- PHP와 SQL을 직접 연결하며 서버와 DB의 역할을 명확히 이해
- Docker를 사용해 환경 차이로 인한 문제를 최소화
- 웹 애플리케이션의 기본 흐름을 구조적으로 이해

---

## 🔧 향후 개선 예정
- Tailwind CSS를 적용한 화면 개선 (final 디렉토리)
- 입력값 검증 강화
- 페이지네이션 개선
- 간단한 로그인 기능 추가

---

##📌 참고
이 저장소는 학습 및 제작 과정 자체를 포트폴리오로 남기는 목적을 가지고 있으며,

최종 결과물은 final/ 디렉토리에서 완성될 예정입니다。
