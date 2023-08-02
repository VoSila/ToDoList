<header>
    <nav class="nav-container">
        <a class="logo" href="{{ route('not.completed.notes') }}">
            <span>L</span>
            <span>O</span>
            <span>G</span>
            <span>O</span>
        </a>
        @php
            $name = session('username');
            $searchItem = session('search_history');
        @endphp

        <form method="get" action="{{ route('note.search') }}" id="searchform">
            <button type="submit" class="btn btn-outline-secondary" style="float: left">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
                     viewBox="0 0 16 16">
                    <path
                        d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
                </svg>
            </button>
            <input class="form-control me-2" id="search" name="search" type="search"
                   placeholder="{{ trans('translations.search') }}" aria-label="Search">
        </form>
        <ul id="menu">

            <li><h2>{{ trans('translations.hello') }}, {{ $name }}</h2></li>
            <li><a href="{{route('not.completed.notes')}}">{{ trans('translations.notes') }}</a></li>
            <li><a href="{{route('completed.notes')}}">{{ trans('translations.add_notes') }}</a></li>
            <li><a href="/note/add">{{ trans('translations.add') }}</a></li>
            <li><a href="/logout">{{ trans('translations.exit') }}</a>
            <li>
                <div class="language-selector">
                    <select id="language-select">
                        <option value="ru">Русский</option>
                        <option value="en">English</option>
                    </select>
                </div>
            </li>
        </ul>
    </nav>

</header>
{{--<div class="result_search" id="result_search">--}}
{{--    <ul id="result">--}}
{{--        @if($searchItem != null)--}}
{{--            <p>История поиска<a class="button" style="float: right; color: #4e73df" href="{{ route('search.button') }}">Очистить</a>--}}
{{--            </p>--}}
{{--            @foreach($searchItem as $search)--}}
{{--                <li><a href="?search={{$search}}">{{$search}}</a></li>--}}
{{--            @endforeach--}}
{{--        @endif--}}
{{--    </ul>--}}
{{--</div>--}}
<script>
    var languageSelect = document.getElementById("language-select");

    if (localStorage.getItem("selectedLanguage")) {
        languageSelect.value = localStorage.getItem("selectedLanguage");
    }

    languageSelect.addEventListener("change", function () {
        var selectedLanguage = this.value;
        localStorage.setItem("selectedLanguage", selectedLanguage);

        if (selectedLanguage === "ru") {
            window.location.href = "{{ route('lang.change', ['locale' => 'ru']) }}";
        } else if (selectedLanguage === "en") {
            window.location.href = "{{ route('lang.change', ['locale' => 'en']) }}";
        }
    });

    // const btnMenu = document.querySelector("#search");
    // const menu = document.querySelector(".result_search");
    // const toggleMenu = function () {
    //     menu.classList.toggle("open");
    // }
    //
    // btnMenu.addEventListener("click", function (e) {
    //     e.stopPropagation();
    //     toggleMenu();
    // });
    //
    // document.addEventListener("click", function (e) {
    //     const target = e.target;
    //     const its_menu = target === menu || menu.contains(target);
    //     const its_btnMenu = target === btnMenu;
    //     const menu_is_active = menu.classList.contains("open");
    //
    //     if (!its_menu && !its_btnMenu && menu_is_active) {
    //         toggleMenu();
    //     }
    // });

    var strGET = window.location.search.replace('?search=', '');
    var decodedStrGET = decodeURIComponent(strGET);
    const inputElement = document.querySelector('#search');
    inputElement.value = decodedStrGET;

</script>
