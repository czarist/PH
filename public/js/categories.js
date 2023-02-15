document.addEventListener("DOMContentLoaded", () => {

    const url = document.getElementById('baseURL').value;
    const normalList = document.getElementById("normalList");
    const gayList = document.getElementById("gayList");

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

                normalList.innerHTML += `
                <a class="category_tag text-dark" href="${url}/category/${category}/page/1"><b>${category}</b></a> `;
            }
            for (const lista of data[0].categories_gay) {
                let category = lista.category;
                category = category.replace(/\s|[0-9_]|\W|[#$%^&*()]/g, '-');

                gayList.innerHTML += `
                <a class="category_tag text-dark" href="${url}/category/${category}-gay/page/1"><b>${category}</b></a> `;
            }
        }).catch(console.error);
});

jQuery(document).ready(function ($) { });