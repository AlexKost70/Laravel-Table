const searchInput = document.getElementById("search");
const dateInput = document.getElementById("date");
const clearButton = document.getElementById("submit");
const tbody = document.getElementById("tbody");
const sortButtons = document.getElementsByClassName("arrow");

const renderTable = users => {
    if (tbody.children.length > 0) {
        tbody.innerHTML = "";
    }

    for (let user of users) {
        let tr = document.createElement("tr");

        for (let key in user) {
            tr.innerHTML += `<td>${user[key]}</td>`
        }
        tbody.appendChild(tr);
    }
}

const handleSortButtonClick = e => {
    e.preventDefault();
    const sortType = e.target.classList.contains("asc") ? "asc" : "desc";
    const column = e.target.parentElement.classList[0];
    getUsersByFilter(searchInput.value, dateInput.value, [column, sortType]);
}

(async function getUsers() {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    const response = await fetch('/api/users', {
        method: 'GET',
        headers: {
            'X-CSRF-TOKEN': csrfToken
        }
    });
    const users = await response.json();

    if (response) {
        renderTable(users);
    }
})();

async function getUsersByFilter(search, date, sortColumn = null) {
    const csrfToken = document.querySelector('meta[name="csrf-token"]').content;
    let body = {
        search: search,
        date: date,
        sort_column: sortColumn
    }

    const response = await fetch('/api/filtredusers', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': csrfToken,
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(body)
    });
    const users = await response.json();

    if (response) {
        renderTable(users);
    }
}
clearButton.addEventListener("click", () => getUsersByFilter(searchInput.value = "", dateInput.value = ""));
searchInput.addEventListener("keyup", () => getUsersByFilter(searchInput.value, dateInput.value));
dateInput.addEventListener("change", () => getUsersByFilter(searchInput.value, dateInput.value));

for (let button of sortButtons) {
    button.addEventListener("click", handleSortButtonClick);
}

