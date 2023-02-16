document.addEventListener("DOMContentLoaded", () => {

    const url = document.getElementById('baseURL').value;
    const title = document.getElementById('title').value;
    const navHome = document.getElementById("home-nav-link");
    const navHomeMob = document.getElementById("home-nav-link-mob");
    const navCat = document.getElementById("cat-nav-link");
    const navCatMob = document.getElementById("cat-nav-link-mob");
    const navStars = document.getElementById("stars-nav-link");
    const navStarsMob = document.getElementById("stars-nav-link-mob");
    const nav = document.getElementById("nav");
    const navMobile = document.getElementById("mobile-nav");
    const navCatsMobile = document.getElementById("nav-mobile");
    const closeMenu = document.getElementById("close-menu");
    const openMenu = document.getElementById("open-menu");
    const header = document.getElementById("header");
    const search_videos = document.getElementById('search_videos');

    if (title == 'Home') {
        navHome.classList.add('text-ffbf00')
        navHomeMob.classList.add('text-ffbf00')
    }
    if (title == 'Categories') {
        navCat.classList.add('text-ffbf00')
        navCatMob.classList.add('text-ffbf00')
    }
    if (title == 'Pornstars') {
        navStars.classList.add('text-ffbf00')
        navStarsMob.classList.add('text-ffbf00')
    }

    // open menu

    function openmenu() {
        closeMenu.classList.remove("d-none");
        closeMenu.classList.add("d-flex");
        openMenu.classList.add("d-none");
        openMenu.classList.remove("d-flex");
        navMobile.classList.remove("d-none");
        navMobile.classList.add("d-flex");
    };

    // close menu

    function closemenu() {
        openMenu.classList.remove("d-none");
        openMenu.classList.add("d-flex");
        closeMenu.classList.add("d-none");
        closeMenu.classList.remove("d-flex");
        navMobile.classList.add("d-none");
        navMobile.classList.remove("d-flex");
    };

    // events

    openMenu.onclick = function () {
        openmenu();
    }

    closeMenu.onclick = function () {
        closemenu();
    }

    document.addEventListener("scroll", () => {
        if (window.pageYOffset === 0) {
            header.classList.remove("header-menor");
            header.classList.add("header-maior");
            if (window.innerWidth < 529) {
                search_videos.classList.add('d-flex');
                search_videos.classList.remove('d-none');
            }
        } else {
            header.classList.add("header-menor");
            header.classList.remove("header-maior");
            if (window.innerWidth < 529) {
                search_videos.classList.remove('d-flex');
                search_videos.classList.add('d-none')
            }
        }
    });

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

                nav.innerHTML += `
                <a class="dropdown-item bg-dark" href="${url}/category/${category}/page/1">${category}</a>
                <div class="dropdown-divider bg-dark"></div>
                `;
                navCatsMobile.innerHTML += `
                <a class="dropdown-item bg-dark" href="${url}/category/${category}/page/1">${category}</a>
                <div class="dropdown-divider bg-dark"></div>
                `;
                count++;
                if (count >= 10) break;
            }
        }).catch(console.error);
});

jQuery(document).ready(function ($) { });