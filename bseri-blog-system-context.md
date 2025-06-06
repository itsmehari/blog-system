## 📘 BSERI Blog System – Context and Specification Document

### 🏩 Project Overview

The BSERI Blog System is a PHP-MySQL powered content management system located under the subfolder `bseri.net/blog/`. This blog will serve as a thought leadership hub for topics related to ISO standards, compliance training, audits, risk management, and knowledge dissemination aligned with BSERI’s mission.

---

### 🎯 Goals

- Improve SEO for BSERI through consistent, keyword-rich blogging.
- Offer a clean, modern, and content-centric reading experience.
- Provide a simple yet powerful admin panel for non-technical users.

---

### 🔧 Tech Stack

- **Backend**: PHP 8+
- **Database**: MySQL 5.7/8 via phpMyAdmin (cPanel-based shared hosting)
- **Frontend**: HTML5, CSS3, Vanilla JS (extendable to Tailwind or Bootstrap if needed)
- **Editor**: CKEditor 4.22.1 (latest secure working version)
- **Authentication**: PHP sessions (basic admin login)
- **Hosting**: Shared cPanel server (same as main BSERI site)
- **DB Connection**: Handled via `config.php` (credentials) and `db.php` (mysqli connection wrapper)

---

## 📁 Folder Structure Template

```
bseri/
├── blog/
│   ├── admin/
│   │   ├── login.php
│   │   ├── logout.php
│   │   ├── index.php
│   │   ├── dashboard.php
│   │   ├── post-create.php
│   │   ├── post-edit.php
│   │   ├── media-upload.php
│   │   └── user-profile.php
│   ├── assets/
│   │   ├── css/style.css
│   │   ├── js/blog.js
│   │   └── images/
│   ├── includes/
│   │   ├── db.php
│   │   ├── config.php
│   │   ├── functions.php
│   │   ├── auth.php
│   │   ├── head.php           # Common <head> HTML
│   │   ├── header.php         # Site logo and heading
│   │   └── footer.php         # Common site footer (mimics BSERI corporate site)
│   ├── uploads/
│   ├── index.php
│   ├── post.php
│   ├── category.php
│   ├── tag.php
│   ├── search.php
│   ├── rss.php
│   └── 404.php
```

---

## 🧠 Core UI Modules (Updated)

### 🔸 Modular Layout

- `head.php`, `header.php`, `footer.php` used in all public pages
- Footer design visually mirrors main BSERI website branding, including contact info, links, and social icons

### 🔸 Responsive Footer Design

- Contains 6 columns (Training, Resources, Network, Examination, Certification, Company)
- Bottom bar with Terms, Privacy, and year copyright
- Logo and social icons included in styled layout
- Fully responsive across desktop and mobile

### 🔸 Theme Switcher

- Toggle with `#theme-toggle`, stores in `localStorage`

### 🔸 Breadcrumb Navigation

- Built with semantic `nav.breadcrumb`

### 🔸 OG Meta Generator

- Dynamic tags using `$og` array

### 🔸 Read Time Estimator

- Word count ÷- Word count \xf7 200 rounded up

### 🔸 Enhanced Post Create UI

- Live preview toggle beside "Publish Post"
- CKEditor 4.22.1 integration (with notice suppressed)
- Client-side image validation (max size, allowed types)
- Dynamic tag pill rendering as user types
- Success message shown via styled toast/alert
- Improved grouped form layout using BSERI brand styling (label + input styling in sections)
- All functionality included in updated `post-create.php`
