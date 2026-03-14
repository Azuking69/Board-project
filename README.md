# 🍰 ダイエットは明日から / Diet Starts Tomorrow / 다이어트는 내일부터

🇯🇵：美味しい食べ物を一言コメントで共有する  
**20代女性をターゲットにしたシンプルでかわいい掲示板プロジェクト**。  
PHP と SQL の基本的な連携と Docker を使った開発環境構築を学習することを目的として制作。

🇬🇧：A simple and cute bulletin board project designed for women in their 20s where users share delicious food experiences with short comments.  
The project was created to learn the basic integration of PHP and SQL and to practice building a development environment using Docker.

🇰🇷：맛있는 음식을 한 줄 코멘트로 공유하는  
**20대 여성을 타깃으로 한 심플하고 귀여운 게시판 프로젝트**.  
PHP와 SQL의 기본 연동과 Docker 기반 개발 환경 구성을 학습하기 위해 제작되었다.

---

# 🎯 プロジェクト目的 / Project Purpose / 프로젝트 목적

🇯🇵：PHP と SQL の基本連携を理解し、Docker 環境で Web アプリケーションを動作させる方法を学ぶ。

🇬🇧：The goal is to understand the basic integration of PHP and SQL and learn how to run web applications in a Docker environment.

🇰🇷：PHP와 SQL 연동을 이해하고 Docker 환경에서 웹 애플리케이션을 실행하는 방법을 학습한다.

---

# 🎀 コンセプト / Concept / 콘셉트

🇯🇵：カフェ・デザート・家庭料理など  
**「美味しい体験」を共有する掲示板**。

🇬🇧：A bulletin board for sharing **delicious experiences** such as cafés, desserts, and home cooking.

🇰🇷：카페, 디저트, 집밥 등  
**‘맛있는 경험’을 공유하는 게시판**.

| 日本語 | English | 한국어 |
|------|------|------|
| シンプルで見やすいUI | Simple and easy-to-use UI | 단순하고 보기 쉬운 UI |
| 20代女性向けデザイン | Soft design for women in their 20s | 20대 여성 사용자 중심 디자인 |
| 修正削除はパスワード方式 | Password-based edit/delete | 수정 삭제는 비밀번호 방식 |

---

# ✨ 主な機能 / Features / 주요 기능

| 日本語 | English | 한국어 |
|------|------|------|
| 投稿作成 | Create post | 게시글 작성 |
| 投稿一覧表示 | Post list | 게시글 목록 조회 |
| 投稿詳細表示 | Post detail | 게시글 상세 조회 |
| 投稿編集 | Edit post | 게시글 수정 |
| 投稿削除 | Delete post | 게시글 삭제 |
| コメント作成 | Create comment | 댓글 작성 |
| コメント編集 | Edit comment | 댓글 수정 |
| コメント削除 | Delete comment | 댓글 삭제 |

🇯🇵：ログイン機能は含まれていないシンプルな掲示板。  
🇬🇧：This is a simple bulletin board without a login system.  
🇰🇷：로그인 기능이 없는 단순한 게시판이다.

---

# 🛠 使用技術 / Tech Stack / 사용 기술

| 技術 | 内容 |
|-----|-----|
| Language | PHP |
| Database | MySQL |
| Web Server | Nginx |
| Container | Docker / Docker Compose |
| UI | Tailwind CSS |

---

# 🏗 システム構造 / System Architecture / 시스템 구조

```
Browser
   ↓
Nginx
   ↓
PHP
   ↓
MySQL
```

| Layer | 日本語 | English | 한국어 |
|------|------|------|------|
| Browser | ユーザーのアクセス | User access | 사용자 접속 |
| Nginx | Webサーバ | Web server | 웹 서버 |
| PHP | アプリケーション処理 | Application logic | 애플리케이션 처리 |
| MySQL | データ保存 | Data storage | 데이터 저장 |

---

# 📂 ディレクトリ構成 / Project Structure / 프로젝트 구조

```
BOARD-PROJECT
│
├─ board_login
│   ├─ final
│   │   ├─ back
│   │   └─ front
│   │
│   ├─ history
│   │   ├─ 250524
│   │   ├─ 250531
│   │   └─ 250608
│   │
│   └─ board_login.sql
│
├─ nginx
│   └─ default.conf
│
├─ Dockerfile
├─ docker-compose.yml
├─ .gitignore
└─ README.md
```

---

# 🐳 Docker構成 / Docker Setup / Docker 구성

| Service | 日本語 | English | 한국어 |
|------|------|------|------|
| php | PHPアプリケーション | PHP application container | PHP 애플리케이션 컨테이너 |
| nginx | Webサーバ | Web server container | 웹 서버 컨테이너 |
| db | MySQLデータベース | MySQL database container | MySQL 데이터베이스 |

---

# ⚙️ Dockerfile

```
FROM php:8.2-fpm

RUN docker-php-ext-install mysqli
```

---

# 🚀 実行方法 / Run / 실행 방법

Docker と Docker Compose が必要です。  
Docker and Docker Compose are required.  
Docker와 Docker Compose가 필요합니다.

```
git clone https://github.com/Azuking69/Board-project.git
cd Board-project
docker compose up -d --build
```

---

# 🌐 アクセス / Access / 접속

```
http://localhost
```

---

# 📚 学習ポイント / Learning Points / 학습 포인트

🇯🇵：このプロジェクトで次を学習できる。

🇬🇧：This project helps learning the following concepts.

🇰🇷：이 프로젝트를 통해 다음을 학습할 수 있다.

- PHP と SQL の連携 / PHP–SQL integration / PHP와 SQL 연동
- CRUD掲示板の基本構造 / CRUD board structure / CRUD 게시판 구조
- Docker 開発環境 / Docker development environment / Docker 개발 환경
- Nginx + PHP 構成 / Nginx + PHP structure / Nginx + PHP 구조
- コメント機能付き掲示板 / Comment system / 댓글 기능 게시판
