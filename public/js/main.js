const questionInput = document.getElementById("question");
const searchBtn = document.getElementById("searchBtn");
const clearBtn = document.getElementById("clearBtn");
const answersContainer = document.getElementById("answers");
const autoContainer = document.getElementById("autocomplete-list");

let currentFocus = -1; // For keyboard navigation

// Event: click on Ask button
searchBtn.addEventListener("click", () => {
    ask();
    autoContainer.innerHTML = "";
});


clearBtn.addEventListener("click", () => {
  questionInput.value = "";   // clear input field
  answersContainer.innerHTML = "";  // clear answers shown
});









// Event: keyboard Enter and arrows
questionInput.addEventListener("keydown", function(e) {
    let items = autoContainer.getElementsByTagName("div");
    if (!items) return;

    if (e.key === "ArrowDown") {
        currentFocus++;
        addActive(items);
        e.preventDefault();
    } else if (e.key === "ArrowUp") {
        currentFocus--;
        addActive(items);
        e.preventDefault();
    } else if (e.key === "Enter") {
        e.preventDefault();
        if (currentFocus > -1) {
            items[currentFocus].click();
        } else {
            ask();
            autoContainer.innerHTML = "";
        }
    }
});

// Input event: autocomplete
questionInput.addEventListener("input", () => {
    let val = questionInput.value.trim();
    if (!val) {
        answersContainer.innerHTML = "";
        autoContainer.innerHTML = "";
    } else {
        autocomplete(val);
    }
});

// Highlight active autocomplete item
function addActive(items) {
    if (!items) return;
    removeActive(items);
    if (currentFocus >= items.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = items.length - 1;
    items[currentFocus].classList.add("autocomplete-active");
}

function removeActive(items) {
    for (let i = 0; i < items.length; i++) {
        items[i].classList.remove("autocomplete-active");
    }
}

// AJAX function to get top 3 answers
async function ask() {
    let q = questionInput.value.trim();
    if (!q) {
        answersContainer.innerHTML = "";
        autoContainer.innerHTML = "";
        return;
    }

    let res = await fetch("index.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify({ question: q })
    });

    let data = await res.json();
    answersContainer.innerHTML = "";

    data.forEach(a => {
        let div = document.createElement("div");
        div.className = "answer";
        div.innerHTML = `<b>Q:</b> ${a.question}<br><b>A:</b> ${a.answer}`;
        answersContainer.appendChild(div);
    });
}

// Autocomplete AJAX
async function autocomplete(term) {
    autoContainer.innerHTML = "";
    currentFocus = -1;
    if (!term) return;

    let res = await fetch(`keywords.php?term=${encodeURIComponent(term)}`);
    let data = await res.json();

    data.forEach((keyword) => {
        let div = document.createElement("div");
        div.innerText = keyword;
        div.style.cursor = "pointer";
        div.style.padding = "8px";

        div.onclick = () => {
            questionInput.value = keyword;
            autoContainer.innerHTML = "";
            ask();
        };

        autoContainer.appendChild(div);
    });
    



    


    
}
