<div class=" relative h-36">
    <nav class="bg-{{ $color[0] }}-300 shadow-sm py-6 fixed w-full" style="z-index: 5000">
        <div class="container mx-auto xl:px-20 hidden xl:block">
            <div class="flex items-center space-x-5">
                <div class="w-28">
                    <img src="{{ asset('images/logofiv.jpeg') }}" alt="" class="object-cover w-full mr-4 rounded-full">
                </div>
                <div class="w-full">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <a href="/">
                                <h1 class="font-concert-one text-white text-5xl mr-5">{{ config('app.name') }}</h1>
                            </a>
                            <div class="py-2 px-4 rounded-full bg-white w-80">
                                <form action="{{ route('list_products') }}">

                                    <div class="flex justify-between w-full items-center">
                                        <input type="text" placeholder="Search by keyword" name="keyword"
                                            value="{{ !empty($keyword) ? $keyword : ''}}"
                                            class="w-full mr-3 appearance-none font-encode-sans bg-white outline-none text-gray-400">
                                        <button type="submit">
                                            <i class="fas fa-search text-gray-400"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="flex items-center">
                            @if (Auth::check())
                            <form action="{{ route('user.user.index') }}" id="formcheckernav"></form>
                            <input type="hidden" name="checker" value="profile" form="formcheckernav">
                            <button type="submit" form="formcheckernav" class=" ml-8 flex items-center">
                                <i class="fa fa-user-circle size text-4xl text-white"></i>
                                <div class="mx-3 font-encode-sans font-bold text-white">{{ Auth::user()->name }}</div>
                            </button>
                            @else
                            <a href="{{ route('login') }}" class=" ml-8 flex items-center">
                                <i class="fa fa-user-circle size text-4xl text-white"></i>
                                <div class="mx-3 font-encode-sans font-bold text-white">Log In</div>
                            </a>
                            @endif
                            <a href="{{ route('user.cart.index') }}" class="ml-4 flex items-center">
                                <i class="fa fa-shopping-cart size text-4xl text-white"></i>
                                <div class="mx-3 font-encode-sans font-bold text-white">Cart</div>
                            </a>
                            @if (Auth::check())

                            @else
                            <a href="{{ route('register') }}"
                                class="ml-4 bg-white hover:bg-{{ $color[2] }}-400 hover:text-white focus:ring-{{ $color[2] }}-300 focus:ring-2 font-bold font-encode-sans text-{{ $color[2] }}-400 px-4 py-2 rounded-full">
                                Daftar
                            </a>

                            @endif
                        </div>
                    </div>
                    <div class="flex items-center justify-between">
                        <ul class="mt-4">
                            @if (!empty($page)&&$page == "home")
                            <li
                                class="inline-block font-encode-sans py-1 px-2 rounded-full bg-white text-{{ $color[2] }}-400 font-bold">
                                <a href="/" aria-expanded="true">
                                    Home
                                </a>
                            </li>
                            @else
                            <li class="inline-block font-encode-sans text-white font-bold">
                                <a href="/" aria-expanded="true">
                                    Home
                                </a>
                            </li>
                            @endif

                            @foreach ($statmenus as $menu)
                            <li
                                class="ml-4 inline-block font-encode-sans {{ !empty($page)&&$page == $menu->name ? 'font-bold py-1 px-2 rounded-full bg-white text-'.$color[2].'-400' : 'text-white font-bold' }}">
                                <form action="{{ route('list_products') }}" id="filtermenu{{ $menu->status_code }}">

                                </form>
                                <input type="hidden" name="pagehighlight" value="{{ $menu->name }}"
                                    form="filtermenu{{ $menu->status_code }}">
                                <input type="hidden" name="filterproduct" value="{{ $menu->status_code }}"
                                    form="filtermenu{{ $menu->status_code }}">
                                <button type="submit" form="filtermenu{{ $menu->status_code }}"
                                    class="appearance-none {{ !empty($page)&&$page == $menu->name ? 'font-bold' : 'font-bold' }}">
                                    {{ $menu->name }}
                                </button>
                            </li>
                            @endforeach

                            <div class="group inline-block">

                                <li class="peer ml-4 font-encode-sans text-white font-bold">
                                    <div class="cursor-pointer">
                                        Products
                                    </div>
                                </li>
                                <div class="py-3 px-10 absolute">&nbsp;</div>
                                <div
                                    class="invisible group-hover:visible z-50 pb-6 mt-5 absolute left-0 bg-{{ $color[0] }}-300 w-full mx-auto xl:px-40">
                                    <ul class="grid grid-rows-5 grid-cols-3 justify-center w-8/10 mx-auto">
                                        @foreach ($allkategoris as $kategori)
                                        <li class="my-1 group">
                                            <form action="{{ route('list_products') }}" method="get"
                                                id="kategorifilter"></form>
                                            <input type="hidden" value="{{ $kategori->no_kategori }}" name="filter"
                                                form="kategorifilter">
                                            <button type="submit"
                                                class="text-white font-bold text-left font-encode-sans peer"
                                                form="kategorifilter"
                                                {{ !empty($kategori->subcategories[0]) ? 'disabled' : '' }}>
                                                {{ $kategori->nama_kategori }}
                                            </button>
                                            <ul
                                                class="hidden ml-2 text-gray-400 pt-1 hover:block absolute peer-hover:block">
                                                @foreach ($subkategoris as $sub)
                                                @if ($sub->kategori_id == $kategori->no_kategori)
                                                <form action="{{ route('list_products') }}" method=""
                                                    id="subkategori{{ $sub->child_id }}"></form>
                                                <input type="hidden" name="subfilter" value="{{ $sub->child_id }}"
                                                    form="subkategori{{ $sub->child_id }}">
                                                <input type="hidden" name="filter" value="{{ $kategori->no_kategori }}"
                                                    form="subkategori{{ $sub->child_id }}">
                                                <li
                                                    class="bg-neutral-100 p-2 hover:bg-white text-gray-400 hover:text-{{ $color[2] }}-400 first:rounded-t-md last:rounded-b-md">
                                                    <button type="submit" form="subkategori{{ $sub->child_id }}"
                                                        class="text-left appearance-none block whitespace-no-wrap">{{ $sub->child_name }}</button>
                                                </li>
                                                @endif
                                                @endforeach

                                            </ul>
                                        </li>

                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            @foreach ($navmenus as $menu)
                            @if ($menu->no == 23 || $menu->no == 32)
                            <li
                                class="ml-4 inline-block font-encode-sans {{ !empty($page)&&$page == $menu->code ? 'py-1 px-2 rounded-full bg-white text-'.$color[2].'-400 font-bold' : 'text-white font-bold' }}">
                                <a href="{{ route('showpage', $menu->no) }}" aria-expanded="true">
                                    {{ $menu->code }}
                                </a>
                            </li>

                            @endif
                            @endforeach
                            {{-- @if (!empty($page)&&$page == "article")
                        <li class="ml-4 inline-block font-encode-sans py-1 px-2 rounded-full bg-white text-{{ $color[2] }}-400
                            font-bold">
                            <a href="{{ route('article') }}" aria-expanded="true">
                                Article
                            </a>
                            </li>
                            @else
                            <li class="ml-4 inline-block font-encode-sans text-white">
                                <a href="{{ route('article') }}" aria-expanded="true">
                                    Article
                                </a>
                            </li>
                            @endif --}}
                            @if (!empty($page)&&$page == "faq")
                            <li
                                class="ml-4 inline-block font-encode-sans py-1 px-2 rounded-full bg-white text-{{ $color[2] }}-400 font-bold">
                                <a href="{{ route('faq.index') }}" aria-expanded="true">
                                    FAQ
                                </a>
                            </li>
                            @else
                            <li class="ml-4 inline-block font-encode-sans text-white font-bold">
                                <a href="{{ route('faq.index') }}" aria-expanded="true">
                                    FAQ
                                </a>
                            </li>
                            @endif

                        </ul>

                        <ul class="mt-4">
                            <li
                                class="inline-block font-encode-sans {{ !empty($page)&&$page == 'profile' ? 'py-1 px-2 rounded-full bg-white text-'.$color[2].'-400' : 'text-white' }}">
                                <form action="{{ route('user.user.index') }}" id="formchecker"></form>
                                <input type="hidden" name="checker" value="profile" form="formchecker">
                                <button type="submit" form="formchecker"
                                    class=" {{ !empty($page)&&$page == 'profile' ? 'font-bold' : 'font-bold' }}">
                                    Account
                                </button>
                            </li>
                            <li
                                class="inline-block ml-4 font-encode-sans {{ !empty($page)&&$page == 'history' ? 'py-1 px-2 rounded-full bg-white text-'.$color[2].'-400 font-bold' : 'text-white font-bold' }}">
                                <a href="{{ route('user.user.index') }}">
                                    Transaction History
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>





        </div>

        <div class="xl:hidden sm:px-10 px-3 pb-3">
            <div class="flex justify-between items-center">
                <div>
                    <input type="checkbox" id="menu" class="hidden checked:">
                    <label for="menu" class="flex items-center cursor-pointer">
                        <i class="fas fa-bars text-2xl text-white"></i>
                        <h6 class="ml-2 text-white font-bold">
                            Menu
                        </h6>
                    </label>
                </div>
                <a href="/" class="text-3xl font-concert-one text-white">
                    {{ config('app.name') }}
                </a>
                @if (Auth::check())
                <a href="{{ route('user.cart.index') }}" class="flex items-center">
                    <i class="fas fa-shopping-cart text-2xl text-white"></i>
                    <h6 class="ml-2 text-white font-bold">
                        Cart
                    </h6>
                </a>
                @else
                <a href="{{ route('login') }}" class="flex items-center">
                    <i class="fas fa-shopping-cart text-2xl text-white"></i>
                    <h6 class="ml-2 text-white font-bold">
                        Cart
                    </h6>
                </a>
                @endif
            </div>
            <div class="mt-3">
                <div class="py-2 px-4 rounded-full bg-white w-full">

                    <form action="{{ route('list_products') }}">
                        <div class="flex justify-between w-full items-center">
                            <input type="text" placeholder="Search by keyword" name="keyword"
                                value="{{ !empty($keyword) ? $keyword : ''}}"
                                class="w-full mr-3 appearance-none font-encode-sans bg-white outline-none text-gray-400">
                            <button type="submit">
                                <i class="fas fa-search text-gray-400"></i>
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </nav>
</div>

<div class="bgmenu xl:hidden fixed bg-slate-900 h-screen opacity-20 w-full -left-full top-0" style="z-index: 5001">
    <label for="menu" class="inline-block w-full h-full"></label>
</div>
<div class="transition-all duration-300 menulist xl:hidden sm:w-3/4 w-5/6 h-screen fixed -left-full top-0"
    style="z-index: 5002">
    <div class="bg-{{ $color[0] }}-300 py-4 w-full">
        <div class="flex justify-between px-4">
            <div class="flex items-center">
                <label for="menu" class="flex items-center cursor-pointer">
                    <i class="fas fa-times sm:text-4xl text-3xl text-white"></i>
                </label>
                @if (Auth::checK())
                <button type="submit" form="formcheckernav" class="ml-5 flex items-center">
                    <i class="fa fa-user-circle size sm:text-4xl text-3xl text-white"></i>
                    <div class="mx-3 font-encode-sans font-bold text-white text-sm sm:text-base">
                        {{ Auth::user()->name }}
                    </div>
                </button>
                @else
                <a href="{{ route('login') }}" class="ml-5 flex items-center">
                    <i class="fa fa-user-circle size sm:text-4xl text-3xl text-white"></i>
                    <div class="mx-3 font-encode-sans font-bold text-white text-sm sm:text-base">Log In</div>
                </a>
                @endif
            </div>
            @if (Auth::checK())

            @else
            <a href="{{ route('register') }}"
                class="py-3 px-5 bg-white text-{{ $color[2] }}-400 font-bold font-encode-sans hover:bg-{{ $color[2] }}-400 hover:text-white focus:ring-{{ $color[2] }}-300 focus:ring-2 rounded-full text-sm sm:text-base">Daftar</a>
            @endif
        </div>
    </div>
    <div class="bg-white pt-4 pb-28 px-4 h-full overflow-y-scroll">
        <a href="/">
            <div
                class="my-3 font-encode-sans font-bold {{ !empty($page)&&$page == "home" ? 'text-'.$color[1].'-500' : 'text-slate-900' }} hover:text-{{ $color[1] }}-500">
                Home
            </div>
        </a>
        <hr>

        <a href="">
            <div class="my-3 font-encode-sans font-bold text-slate-900 hover:text-{{ $color[1] }}-500">
                Product Type
            </div>
        </a>
        <div class="ml-4 mb-2">
            <ul class="font-encode-sans text-slate-900 text-sm md:text-base">
                @foreach ($statmenus as $menu)
                <li class="my-1">

                    <form action="{{ route('list_products') }}" id="filtermenu1{{ $menu->status_code }}">
                    </form>
                    <input type="hidden" name="pagehighlight" value="{{ $menu->name }}"
                        form="filtermenu1{{ $menu->status_code }}">
                    <input type="hidden" name="filterproduct" value="{{ $menu->status_code }}"
                        form="filtermenu1{{ $menu->status_code }}">

                    <button type="submit" form="filtermenu1{{ $menu->status_code }}"
                        class="font-bold font-encode-sans {{ !empty($page)&&$page == $menu->name ? 'text-'.$color[1].'-500' : 'text-slate-900' }} hover:text-{{ $color[1] }}-500">
                        {{ $menu->name }} Product
                    </button>
                </li>
                @endforeach


            </ul>
        </div>

        <hr>

        <a href="">
            <div class="my-3 font-encode-sans font-bold text-slate-900 hover:text-{{ $color[1] }}-500">
                Product Category
            </div>
        </a>
        <div class="ml-4 mb-2">
            <ul class="font-encode-sans text-slate-900 text-sm md:text-base">
                @foreach ($allkategoris as $kategori)
                <li class="my-1">
                    <form action="{{ route('list_products') }}" method="get">
                        <input type="hidden" value="{{ $kategori->no_kategori }}" name="filter">
                        <button type="submit"
                            class="{{ !empty($filter)&&$filter == $kategori->no_kategori ? 'text-'.$color[1].'-500' : 'text-slate-900' }} hover:text-{{ $color[1] }}-500 font-encode-sans font-bold"
                            {{ !empty($kategori->subcategories[0]) ? 'disabled' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </button>
                    </form>
                    @foreach ($subkategoris as $sub)
                    @if ($sub->kategori_id == $kategori->no_kategori)
                    <form action="{{ route('list_products') }}" method="">
                        <input type="hidden" name="subfilter" value="{{ $sub->child_id }}">
                        <input type="hidden" name="filter" value="{{ $kategori->no_kategori }}">
                        <ul
                            class="ml-2 {{ !empty($subfilter)&&$subfilter == $sub->child_id ? 'text-'.$color[1].'-500' : 'text-gray-400' }} pt-1 space-y-1 hover:text-{{ $color[1] }}-500 font-bold">
                            <li class="appearance-none block whitespace-no-wrap">
                                <button type="submit" class="text-left font-bold">{{ $sub->child_name }}</button>
                            </li>
                        </ul>
                    </form>
                    @endif
                    @endforeach
                </li>
                @endforeach
            </ul>
        </div>
        <hr>

        @foreach ($navmenus as $menu)
        @if ($menu->no == 23 || $menu->no == 32)

        <a href="{{ route('showpage', $menu->no) }}">
            <div
                class="my-3 font-encode-sans font-bold {{ !empty($page)&&$page == $menu->code ? 'text-'.$color[1].'-500' : 'text-slate-900' }} hover:text-{{ $color[1] }}-500">
                {{ $menu->code }}
            </div>
        </a>
        <hr>

        @endif
        @endforeach

        <a href="{{ route('faq.index') }}">
            <div
                class="my-3 font-encode-sans font-bold {{ !empty($page)&&$page == "faq" ? 'text-'.$color[1].'-500' : 'text-slate-900' }} hover:text-{{ $color[1] }}-500">
                FAQ
            </div>
        </a>
        <hr>

        <div class="my-3">
            <form action="{{ route('user.user.index') }}" id="formchecker"></form>
            <input type="hidden" name="checker" value="profile" form="formchecker">
            <button type="submit" form="formchecker"
                class="font-encode-sans font-bold {{ !empty($page)&&$page == 'profile' ? 'text-'.$color[1].'-500' : 'text-slate-900' }} hover:text-{{ $color[1] }}-500">
                Account
            </button>
        </div>
        <hr>

        <a href="{{ route('user.user.index') }}">
            <div
                class="my-3 font-encode-sans font-bold {{ !empty($page)&&$page == "history" ? 'text-'.$color[1].'-500' : 'text-slate-900' }} hover:text-{{ $color[1] }}-500">
                Transaction History
            </div>
        </a>
    </div>
</div>

<script>
    const checkbox = document.querySelector('#menu');
    const menulist = document.querySelector('.menulist');
    const bgmenu = document.querySelector('.bgmenu');

    checkbox.addEventListener('click', function () {
        if (checkbox.checked) {
            menulist.classList.remove('-left-full');
            menulist.classList.add('left-0');
            bgmenu.classList.remove('-left-full');
            bgmenu.classList.add('left-0');
        } else {
            menulist.classList.remove('left-0');
            menulist.classList.add('-left-full');
            bgmenu.classList.remove('left-0');
            bgmenu.classList.add('-left-full');
        }
    });

</script>
