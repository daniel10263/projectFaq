# FAQ Italian Restaurant Project

## Project Layout

- `config/db.php` → Database connection.
- `controllers/FaqController.php` → Handles API requests.
- `models/Faq.php` → FAQ model with database queries.
- `services/FaqMatcher.php` → Matching logic for user queries.
- `public/` → Frontend HTML, JS, CSS, and endpoint scripts.
- `js/main.js` → Frontend logic for dynamic search.
- `README.md` → Project documentation.

- ## Setup
1. Install Required Tools (XAMPP) to use a local server
2. Create database with tables
3. Install all the files
4. Go to http://localhost/projectFaq/public/frontend.html
5. To request Endpoint GET /search?q= you can use: http://localhost/projectFaq/public/search.php?q=kids and will return JSON response
   

## Project Overview
This is a small project with a FAQ system for an Italian restaurant. 

## How it Works
Users can type questions in the frontend, and the system returns the top 3 most relevant answers
Also, added an automcomplete function using AJAX so user can see keywords from db
For example, user can put "do you have delivery?" and the system will return the answers accordingly. 

User also can user the keyword arrows in order to select the autocompleted words
User also has the "Clear button", in order to reset the form.

## Decisions
PHP + XAMPP: For backend and database and local server.
MySQL: To store the FAQ questions and answers.

JS: To handle user input and displays suggestions.

I also tried to used the MVC, or Model-View-Controller model in order to abstract and factor code.

 ## Time spent

Config/
  db.php ....................... 30 minutes to test DB

Controller/
  FaqController.php ............ 45 minutes

Models/
  Faq.php ...................... 30 minutes

Services/
  FaqMatcher.php ............... 3 hours

JS/
  main.js ...................... 3 hours

Public/

  frontend.html ............... 2 hours
  
  keywords.php ................. 2 hours
  
  search.php ................... 3 hours
  
  style.css .................... 1.5 hours

Total Development Time: 16 hours
---

