document.addEventListener("DOMContentLoaded", () => {

    const url = document.getElementById('baseURL').value;
    const myList = document.getElementById("nav");

    async function postData(url = '', data = {}) {
        const response = await fetch(url, {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            credentials: 'same-origin',
            headers: {
                'Content-Type': 'application/json'
            },
            redirect: 'follow',
            referrerPolicy: 'no-referrer',
            body: JSON.stringify(data)
        });
        return response.json();
    }

    postData(`${url}/api/CategoriesList`, { answer: 42 })
        .then((data) => {
            let count = 0;
            for (const lista of data[0].categories) {
                let category = lista.category;
                category = category.replace(/\s|[0-9_]|\W|[#$%^&*()]/g, '-');

                myList.innerHTML += `
                <a class="dropdown-item bg-dark" href="${url}/category/${category}/page/1">${category}</a>
                <div class="dropdown-divider bg-dark"></div>
                `;
                count++;
                if (count >= 10) break;
            }
        }).catch(console.error);
});

jQuery(document).ready(function ($) { });