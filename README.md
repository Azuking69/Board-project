# 🍰 다이어트는 내일부터 
PHP + SQL + Docker + Tailwind CSS

맛있는 것을 한 줄 코멘트로 공유하는  
**20대 여성을 타깃으로 한 심플하고 귀여운 게시판 프로젝트**입니다.  

PHP와 SQL의 기본적인 연동 흐름과  
Docker 기반 개발 환경 구성을 학습하는 것을 목적으로 제작했습니다.

---

## 📌 프로젝트 개요
- PHP 기본 문법과 SQL 데이터베이스 연동을 학습하기 위한 게시판 프로젝트
- Docker / Docker Compose 환경에서 실행
- 로그인 없이 사용 가능한 간단한 CRUD 구조
- 게시판을 통해 웹 애플리케이션의 기본 흐름 이해

---

## 🎀 콘셉트
- 카페, 디저트, 집밥 등 **‘맛있는 경험’을 공유**
- 조작이 단순하고 보기 쉬운 UI
- **20대 여성 사용자**를 고려한 부드럽고 깔끔한 디자인
- 수정 / 삭제는 비밀번호 방식

---

## ✨ 주요 기능 (250608 기준)
- 게시글 작성
- 게시글 목록 조회
- 게시글 상세 조회
- 게시글 수정 / 삭제
- 댓글 작성 / 수정 / 삭제 (비밀번호 기반)

※ 로그인 기능은 포함하지 않은 기초 게시판입니다.

---

## 🎨 UI / 디자인 (Tailwind CSS)
- `final/` 디렉토리에서 **Tailwind CSS를 적용한 화면 개선 버전**을 제작
- 디자인 방향
  - 넉넉한 여백과 읽기 쉬운 글자 크기
  - 둥근 버튼과 입력창
  - 과하지 않은 색상 사용
  - 전체적으로 심플하고 아기자기한 분위기

※ GitHub README 자체에 CSS를 적용한 것이 아니라,  
웹 화면(UI)에 Tailwind CSS를 적용한 프로젝트입니다.

---

## 🛠 사용 기술
| 구분 | 기술 |
| --- | --- |
| 서버 | PHP |
| 데이터베이스 | MySQL (SQL) |
| 웹 서버 | Nginx |
| 컨테이너 | Docker / Docker Compose |
| UI | Tailwind CSS |

---

## 📂 디렉토리 구성
| 경로 | 설명 |
| --- | --- |
| `board_login/` | 게시판 PHP 소스 코드 |
| `nginx/` | 웹 서버 설정 |
| `Dockerfile` | PHP 실행 환경 |
| `docker-compose.yml` | 컨테이너 구성 |
| `history/` | 제작 및 학습 기록 |
| `history/250608/` | 클론 후 바로 실행 가능한 버전 |
| `final/` | Tailwind 적용 최종 결과물 (예정) |

---

## 🚀 실행 방법 (Docker)
사전에 Docker / Docker Compose가 설치되어 있어야 합니다.

```bash
git clone https://github.com/Azuking69/Board-project.git
cd Board-project
docker compose up -d --build
