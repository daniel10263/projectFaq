# FAQ Italian Restaurant Project

## Project Overview
This is a small project with a FAQ system for an Italian restaurant. Users can type questions in the frontend, and the system returns the top 3 most relevant answers
Also, added an automcomplete function using AJAX so user can see keywords from db
For example, user can put "do you have delivery?" and the system will return the answers accordingly. 

User also can user the keyword arrows in order to select the autocompleted words
User also has the "Clear button", in order to reset the form.

I used JS, PHP, MySql, and CSS in order to make the project.
I also tried to used the MVC, or Model-View-Controller model in order to abstract and factor code.

## Setup
1. Install Required Tools (XAMPP) to use a local server
2. Create database with tables
3. Install all the files
4. Go to http://localhost/projectFaq/public/frontend.html

5. To request Endpoint GET /search?q= you can use: http://localhost/projectFaq/public/search.php?q=kids and will return JSON response
   


## Project Layout

- `config/db.php` → Database connection.
- `controllers/FaqController.php` → Handles API requests.
- `models/Faq.php` → FAQ model with database queries.
- `services/FaqMatcher.php` → Matching logic for user queries.
- `public/` → Frontend HTML, JS, CSS, and endpoint scripts.
- `js/main.js` → Frontend logic for dynamic search.
- `README.md` → Project documentation.


faq-italian-restaurant/
│
├─ config/
│   └─ db.php               # Database connection (30 min)
│
├─ controllers/
│   └─ FaqController.php    # Handles API requests (45 min)
│
├─ models/
│   └─ Faq.php               # FAQ model (30 min)
│
├─ services/
│   └─ FaqMatcher.php       # Matching algorithm for queries (3 hours)
│
├─ public/
│   ├─ frontend.html         # Frontend interface (2 hours)
│   ├─ keywords.php          # Keyword endpoint (2 hours)
│   ├─ search.php            # Search endpoint (3 hours)
│   └─ style.css             # Styling (1.5 hours)
│
├─ js/
│   └─ main.js               # Frontend logic (3 hours)
│
└─ README.md                 # Project documentation
---

