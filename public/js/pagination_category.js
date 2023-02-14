document.addEventListener("DOMContentLoaded", () => {

    const url = document.getElementById('baseURL').value;
    const page_search = document.getElementById('page_search').value;
    const search_query = document.getElementById('search_query').value;
    const total_pages = document.getElementById('total_pages').value;

    console.log(search_query);
    
    var Pagination = {
        code: '',
        Extend: function (data) {
            data = data || {};
            Pagination.size = data.size || 1;
            Pagination.page = data.page || 1;
            Pagination.step = data.step || 3;
        },
        Add: function (s, f) {
            for (var i = s; i < f; i++) {
                Pagination.code += '<a href="' + url + '/category/' + search_query + '/page/' + i + '" rel="nofollow">' + i + '</a>';
            }
        },
        Last: function () {
            Pagination.code += '<i>...</i><a href="' + url + '/category/' + search_query + '/page/' + Pagination.size + '" rel="nofollow">' + Pagination.size + '</a>';
        },
        First: function () {
            Pagination.code += '<a href="' + url + '/category/' + search_query + '/page/1" rel="nofollow">1</a><i>...</i>';
        },
        Click: function () {
            Pagination.page = +this.innerHTML;
            Pagination.Start();
        },
        Prev: function () {
            Pagination.page--;
            if (Pagination.page < 1) {
                Pagination.page = 1;
            }
            Pagination.Start();
        },
        Next: function () {
            Pagination.page++;
            if (Pagination.page > Pagination.size) {
                Pagination.page = Pagination.size;
            }
            Pagination.Start();
        },
        Bind: function () {
            var a = Pagination.e.getElementsByTagName('a');
            for (var i = 0; i < a.length; i++) {
                if (+a[i].innerHTML === Pagination.page) a[i].className = 'current';
                a[i].addEventListener('click', Pagination.Click, false);
            }
        },
        Finish: function () {
            Pagination.e.innerHTML = Pagination.code;
            Pagination.code = '';
            Pagination.Bind();
        },
        Start: function () {
            if (Pagination.size < Pagination.step * 2 + 6) {
                Pagination.Add(1, Pagination.size + 1);
            } else if (Pagination.page < Pagination.step * 2 + 1) {
                Pagination.Add(1, Pagination.step * 2 + 4);
                Pagination.Last();
            } else if (Pagination.page > Pagination.size - Pagination.step * 2) {
                Pagination.First();
                Pagination.Add(Pagination.size - Pagination.step * 2 - 2, Pagination.size + 1);
            } else {
                Pagination.First();
                Pagination.Add(Pagination.page - Pagination.step, Pagination.page + Pagination.step + 1);
                Pagination.Last();
            }
            Pagination.Finish();
        },
        Buttons: function (e) {
            var nav = e.getElementsByTagName('a');
            nav[0].addEventListener('click', Pagination.Prev, false);
            nav[1].addEventListener('click', Pagination.Next, false);
        },
        Create: function (e) {
            // tirar d-none das classes se quiser botar as flexas
            var html = [
                '<a rel="nofollow" class="d-none">&#9668;</a>',
                '<span></span>',
                '<a rel="nofollow" class="d-none">&#9658;</a>'
            ];
            e.innerHTML = html.join('');
            Pagination.e = e.getElementsByTagName('span')[0];
            Pagination.Buttons(e);
        },
        Init: function (e, data) {
            Pagination.Extend(data);
            Pagination.Create(e);
            Pagination.Start();
        }
    };
    var init = function (size, page, step) {
        Pagination.Init(document.getElementById('pagination'), {
            size: size,
            page: page,
            step: step
        });
    };


    var size = Math.round(total_pages - 1);
    init(size, parseInt(page_search), 3);
});

jQuery(document).ready(function ($) { });