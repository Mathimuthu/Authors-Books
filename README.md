# 📚 Authors & Books with Chatbot — Laravel Application

A Laravel-based web application to manage authors and their books, with a built-in chatbot to guide users through basic operations and queries.

---

## ✅ Features

- Add, edit, show and delete **authors** and **books**
- View a list of books by each author
- Simple chatbot interface to:
  - Assist in navigation
  - Answer basic usage questions
---

## 🤖 Chatbot Overview

## 🤖 Chatbot Functionality

This app includes a simple JavaScript-based chatbot integrated with Laravel. The chatbot allows users to ask basic questions and get real-time responses without reloading the page.

### ✨ Supported Queries

Users can type natural language-like commands in the chatbot, such as:

- `How many authors?` → returns total count of authors.
- `How many books?` → returns total count of books.
- `Top 5 authors` → returns the names of the five authors with the most books.

The chatbot is interactive and dynamic, using JavaScript to send messages via a POST request to Laravel’s `/chatbot/query` endpoint. The backend processes the message and responds with appropriate data.

### 🛠 How it Works

- The frontend JavaScript captures input and sends it to the Laravel route.
- The `ChatbotController` parses the message and checks for keywords.
- Based on the content, it responds with counts or top authors.
- If the input doesn't match a known pattern, it replies: _“Sorry, I didn’t understand that.”_

This chatbot can be extended further to support more advanced queries or even integrated with AI-based services like GPT in the future.
---

## 🛠️ Setup Instructions

```bash
git clone https://github.com/Mathimuthu/Authors-Books.git
cd Authors-Books
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve
