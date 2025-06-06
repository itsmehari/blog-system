# 📘 BSERI Blog Management System

A custom-built blog management module developed for [BSERI](https://bseri.net), integrated into the organization's main website CMS. This PHP-MySQL based system is optimized for ISO-related content publishing and designed to be intuitive, secure, and easily manageable by non-technical users.

> 📍 Live Path: `/bseri.net/blog/`

---

## 🎯 Project Goals

- Enable BSERI's internal team to publish blog posts independently
- Improve SEO through structured content and optimized meta tags
- Maintain visual consistency with BSERI’s corporate branding
- Support knowledge sharing on ISO standards, audits, training, and compliance

---

## 🔧 Tech Stack

| Layer      | Technology                      |
|------------|----------------------------------|
| Backend    | PHP 8+                          |
| Database   | MySQL (via phpMyAdmin, cPanel)  |
| Frontend   | HTML5, CSS3, Vanilla JS         |
| Editor     | CKEditor 4.22.1                 |
| Auth       | PHP Sessions (admin protected)  |
| Hosting    | Shared Linux hosting (cPanel)   |

---

## 📁 Project Structure

\`\`\`
blog-system/
├── admin/               # Admin panel (CRUD, login)
├── assets/              # CSS, JS, images
├── includes/            # DB config, functions, header/footer includes
├── uploads/             # Uploaded media files
├── index.php            # Public blog listing
├── post.php             # Individual blog post
├── category.php         # Posts by category
├── tag.php              # Posts by tag
├── search.php           # Search results
├── rss.php              # RSS feed generator
├── 404.php              # Custom error page
\`\`\`

---

## ✅ Key Features

- 🔐 Simple admin login (session-based)
- ✍️ CKEditor-enabled post creation with live preview
- 🖼️ Client-side image validation and uploads
- 🏷️ Dynamic tag pills and categories
- 🌓 Light/Dark mode toggle (localStorage)
- 📚 Read-time estimator for each post
- 🧭 Breadcrumb navigation and OG meta generation
- 📱 Fully responsive layout with branded footer

---

## 🧪 Setup Instructions

1. Clone the repo:
   \`\`\`bash
   git clone https://github.com/itsmehari/blog-system.git
   \`\`\`

2. Import the MySQL database (SQL file to be added)

3. Update DB credentials in:
   - \`includes/config.php\`

4. Deploy files to:
   - \`/public_html/blog/\` or any subfolder

---

## 🔐 Admin Access

> Admin modules live inside the \`/admin/\` folder.

To change admin credentials, edit the validation logic in \`login.php\` and \`auth.php\`.

---

## 📜 License

This project is intended for BSERI internal use. Licensing terms can be added here based on organizational policy.

---

## 🤝 Contributing

For documentation or code enhancements, feel free to fork the repository and open a pull request.

---

## 📩 Contact

For questions or support, please reach out via:
- 💌 connect@bseri.net
- 🌐 [https://bseri.net](https://bseri.net)
