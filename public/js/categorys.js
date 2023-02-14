document.addEventListener("DOMContentLoaded", () => {

    const url = document.getElementById('baseURL').value;
    const myList = document.getElementById("myList");

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
            for (const lista of data[0].categories) {
                let category = lista.category;
                category = category.replace(/\s|[0-9_]|\W|[#$%^&*()]/g, '-');

                myList.innerHTML += `
                <a class="" href="${url}/category/${category}">${category}</a> `;
            }
        }).catch(console.error);
});

jQuery(document).ready(function ($) { });