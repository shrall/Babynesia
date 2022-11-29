<div class="relative h-36">
    <nav class="border-b bg-white shadow-sm py-6 fixed w-full" style="z-index: 5000">
        <div class="container mx-auto xl:px-20 hidden xl:block">
            <div class="flex justify-between items-center">
                <a href="/">
                    <h1 class="text-{{ $color[1] }}-600 text-4xl font-concert-one">
                        {{ config('app.name') }}
                    </h1>
                </a>
                <div class="rounded-md py-2 px-4 bg-neutral-100 w-136">
                    <form action="{{ route('list_products') }}">
                        <div class="flex justify-between w-full items-center">
                            <input type="text" placeholder="Search by keyword" name="keyword"
                                value="{{ !empty($keyword) ? $keyword : ''}}"
                                class="w-full mr-3 appearance-none font-encode-sans bg-neutral-100 outline-none text-slate-900">
                            <button type="submit">
                                <i class="bx bx-search text-xl text-gray-400"></i>
                            </button>
                        </div>
                    </form>
                </div>
                @if (Auth::check())
                <form action="{{ route('user.user.index') }}" id="formcheckernav"></form>
                <input type="hidden" name="checker" value="profile" form="formcheckernav">
                <button type="submit" form="formcheckernav" class=" ml-8 flex items-center text-slate-900 hover:text-{{ $color[1] }}-600">
                    <i class="bx bx-user-circle size text-3xl"></i>
                    <div class="mx-3 font-encode-sans font-bold">{{ Auth::user()->name }}</div>
                </button>
                @else
                <div>
                    <a href="{{ route('login') }}" class="font-encode-sans text-slate-900 hover:text-{{ $color[1] }}-600 font-bold">
                        Log In
                    </a>
                </div>
                <div>
                    <a href="{{ route('register') }}" class="font-encode-sans text-slate-900 hover:text-{{ $color[1] }}-600 font-bold">
                        Daftar
                    </a>
                </div>
                @endif
                <div>
                    <a href="{{ route('user.cart.index') }}">
                        <i class='bx bx-cart text-3xl text-slate-900 hover:text-{{ $color[1] }}-600' ></i>
                    </a>
                </div>
            </div>
    
            <ul class="w-full flex justify-between font-encode-sans mt-4">
                <li class="{{ !empty($page)&&$page == "home" ? 'text-'.$color[1].'-600 font-bold' : 'text-slate-900 font-bold' }} hover:text-{{ $color[1] }}-600">
                    <a href="/" aria-expanded="true">
                        Home
                    </a>
                </li>
                @foreach ($statmenus as $menu)
                <li class="{{ !empty($page)&&$page == "$menu->name" ? 'text-'.$color[1].'-600' : 'text-slate-900' }} hover:text-{{ $color[1] }}-600">
                    <form action="{{ route('list_products') }}" id="filtermenu{{ $menu->status_code }}"></form>
                    <input type="hidden" name="pagehighlight" value="{{ $menu->name }}" form="filtermenu{{ $menu->status_code }}">
                    <input type="hidden" name="filterproduct" value="{{ $menu->status_code }}" form="filtermenu{{ $menu->status_code }}">
                    <button type="submit" form="filtermenu{{ $menu->status_code }}" class="appearance-none {{ !empty($page)&&$page == $menu->name ? 'font-bold' : 'font-bold' }}">
                        {{ $menu->name }}
                    </button>
                </li>
                @endforeach
                <div class="group inline-block">
    
                    <li class="peer ml-4 font-encode-sans font-bold text-slate-900">
                        <div class="cursor-pointer">
                            Products
                        </div>
                    </li>
                    <div class="py-3 px-10 absolute">&nbsp;</div>
                    <div
                        class="invisible group-hover:visible z-50 pb-6 mt-5 absolute left-0 bg-white border-b w-full mx-auto xl:px-40">
                        <ul class="grid grid-rows-5 grid-cols-3 justify-center w-full mx-auto">
                            @foreach ($allkategoris as $kategori)
                            <li class="my-1 group">
                                <form action="{{ route('list_products') }}" method="get" id="kategorifilter"></form>
                                <input type="hidden" value="{{ $kategori->no_kategori }}" name="filter"
                                    form="kategorifilter">
                                <button type="submit" class="text-slate-900 hover:text-{{ $color[1] }}-600 font-bold font-encode-sans peer" form="kategorifilter"
                                    {{ !empty($kategori->subcategories[0]) ? 'disabled' : '' }}>
                                    {{ $kategori->nama_kategori }}
                                </button>
                                <ul class="hidden ml-2 text-gray-400 pt-1 hover:block absolute peer-hover:block">
                                    @foreach ($subkategoris as $sub)
                                    @if ($sub->kategori_id == $kategori->no_kategori)
                                    <form action="{{ route('list_products') }}" method="" id="subkategori{{ $sub->child_id }}"></form>
                                    <input type="hidden" name="subfilter" value="{{ $sub->child_id }}" form="subkategori{{ $sub->child_id }}">
                                    <input type="hidden" name="filter" value="{{ $kategori->no_kategori }}"
                                        form="subkategori{{ $sub->child_id }}">
                                    <li class="p-2 hover:text-{{ $color[1] }}-600 bg-white text-gray-400 hover:text-{{ $color[2] }}-400 first:rounded-t-md last:rounded-b-md">
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
                @if ($menu->no == 24 || $menu->no == 32)
                <li class="{{ !empty($page)&&$page == "$menu->code" ? 'text-'.$color[1].'-600 font-bold' : 'font-bold text-slate-900' }} hover:text-{{ $color[1] }}-600">
                    <a href="{{ route('showpage', $menu->no) }}" aria-expanded="true">
                        {{ $menu->code }}
                    </a>
                </li>
    
                @endif
                @endforeach
    
                <li class="{{ !empty($page)&&$page == "faq" ? 'text-'.$color[1].'-600 font-bold' : 'font-bold text-slate-900' }} hover:text-{{ $color[1] }}-600">
                    <a href="{{ route('faq.index') }}" aria-expanded="true">
                        FAQ
                    </a>
                </li>
    
                <li
                    class="{{ !empty($page)&&$page == "profile" ? 'text-'.$color[1].'-600 font-bold' : 'text-slate-900' }} font-bold hover:text-{{ $color[1] }}-600">
                    <form action="{{ route('user.user.index') }}" id="formchecker"></form>
                    <input type="hidden" name="checker" value="profile" form="formchecker">
                    <button type="submit" form="formchecker" class=" {{ !empty($page)&&$page == 'profile' ? 'font-bold' : 'font-bold' }}">
                        Account
                    </button>
                </li>
                <li
                    class="{{ !empty($page)&&$page == "history" ? 'text-'.$color[1].'-600 font-bold' : 'text-slate-900' }} font-bold hover:text-{{ $color[1] }}-600">
                    <a href="{{ route('user.user.index') }}">
                        Transaction History
                    </a>
                </li>
                
            </ul>
        </div>
    
        <div class="xl:hidden sm:px-10 px-3">
            <div class="flex justify-between items-center">
                <div>
                    <input type="checkbox" id="menu" class="hidden checked:">
                    <label for="menu" class="cursor-pointer">
                        <i class="bx bx-menu text-3xl text-slate-900"></i>
                    </label>
                </div>
                <a href="/">
                    <h1 class="text-3xl font-concert-one text-{{ $color[1] }}-600">
                        {{ config('app.name') }}
                    </h1>
                </a>
                <a href="{{ Auth::check() ? route('user.cart.index') : route('login') }}" class="cursor-pointer">
                    <i class="bx bx-cart text-3xl text-slate-900"></i>
                </a>
            </div>
            <div class="mt-3">
                <div class="py-3 px-4 rounded-md bg-neutral-100 w-full">
                    <div class="flex justify-between w-full items-center">
                        <input type="text" placeholder="Search by keyword"
                            class="w-full mr-3 appearance-none font-encode-sans bg-neutral-100 outline-none text-slate-900">
                        <button type="submit">
                            <i class="bx bx-search text-xl text-gray-400"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    
    </nav>
</div>


<div class="bgmenu xl:hidden fixed bg-slate-900 h-screen opacity-20 w-full z-50 -left-full top-0" style="z-index: 5001">
    <label for="menu" class="inline-block w-full h-full"></label>
</div>
<div class="transition-all duration-300 menulist xl:hidden z-50 sm:w-3/4 w-5/6 h-screen fixed -left-full top-0" style="z-index: 5002">
    <div class="bg-white py-4 w-full">
        <div class="flex justify-between px-4 items-center">
            <label for="menu" class="flex items-center cursor-pointer">
                <i class="bx bx-x sm:text-4xl text-3xl text-slate-900"></i>
            </label>
            <div class="flex items-center">
                @if (Auth::checK())
                <a href="{{ route('user.user.index') }}" class="flex items-center text-slate-900 hover:text-{{ $color[1] }}-600">
                    <i class="bx bx-user-circle size sm:text-4xl text-3xl"></i>
                    <div class="mx-2 font-encode-sans font-bold text-sm sm:text-base">
                        {{ Auth::user()->name }}
                    </div>
                </a>
                @else
                <a href="{{ route('login') }}" class="">
                    <div class="mx-3 font-encode-sans font-bold text-slate-900 text-sm hover:text-{{ $color[1] }}-600 sm:text-base">Log In</div>
                </a>
                <a href="{{ route('register') }}"
                    class="text-slate-900 font-bold font-encode-sans text-sm hover:text-{{ $color[1] }}-600 sm:text-base">Daftar</a>
                @endif
            </div>
        </div>
    </div>
    <div class="bg-white py-4 px-4 h-full overflow-y-auto">
        <a href="/">
            <div class="my-3 font-encode-sans {{ !empty($page)&&$page == "home" ? 'font-bold text-'.$color[1].'-500' : 'text-slate-900 font-bold' }} hover:text-{{ $color[1] }}-500">
                Home
            </div>
        </a>
        <hr>

        @foreach ($statmenus as $menu)
            <form action="{{ route('list_products') }}" id="filtermenu1{{ $menu->status_code }}">
            </form>
            <input type="hidden" name="pagehighlight" value="{{ $menu->name }}" form="filtermenu1{{ $menu->status_code }}">
            <input type="hidden" name="filterproduct" value="{{ $menu->status_code }}" form="filtermenu1{{ $menu->status_code }}">

            <button type="submit" form="filtermenu1{{ $menu->status_code }}" class="my-3 font-encode-sans {{ !empty($page)&&$page == $menu->name ? 'font-bold text-'.$color[1].'-500' : 'font-bold text-slate-900' }} hover:text-{{ $color[1] }}-500">
                {{ $menu->name }}
            </button>
            <hr>
            @endforeach

            @foreach ($navmenus as $menu)
            @if ($menu->no == 23 || $menu->no == 32)

            <a href="{{ route('showpage', $menu->no) }}">
                <div class="my-3 font-encode-sans {{ !empty($page)&&$page == $menu->code ? 'font-bold text-'.$color[1].'-500' : 'font-bold text-slate-900' }} hover:text-{{ $color[1] }}-500">
                    {{ $menu->code }}
                </div>
            </a>
            <hr>

            @endif
            @endforeach

        <a href="{{ route('faq.index') }}">
            <div class="my-3 font-encode-sans {{ !empty($page)&&$page == "faq" ? 'font-bold text-'.$color[1].'-500' : 'font-bold text-slate-900' }} hover:text-{{ $color[1] }}-500">
                FAQ
            </div>
        </a>
        <hr>
        <a href="">
            <div class="my-3 font-encode-sans font-bold text-slate-900 hover:text-{{ $color[1] }}-500">
                Products
            </div>
        </a>
        <div class="ml-4">
            <ul class="font-encode-sans text-slate-900 text-sm md:text-base">
                @foreach ($allkategoris as $kategori)
                <li class="my-1">
                    <form action="{{ route('list_products') }}" method="get">
                        <input type="hidden" value="{{ $kategori->no_kategori }}" name="filter">
                        <button type="submit" class="text-slate-900 font-bold hover:text-{{ $color[1] }}-500 font-encode-sans"
                            {{ !empty($kategori->subcategories[0]) ? 'disabled' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </button>
                    </form>
                    @foreach ($subkategoris as $sub)
                    @if ($sub->kategori_id == $kategori->no_kategori)
                    <form action="{{ route('list_products') }}" method="">
                        <input type="hidden" name="subfilter" value="{{ $sub->child_id }}">
                        <input type="hidden" name="filter" value="{{ $kategori->no_kategori }}">
                        <ul class="ml-2 text-gray-400 pt-1 font-bold space-y-1 hover:text-{{ $color[1] }}-500">
                            <li class="appearance-none block whitespace-no-wrap">
                                <button type="submit" class="text-left">{{ $sub->child_name }}</button>
                            </li>
                        </ul>
                    </form>
                    @endif
                    @endforeach
                </li>
                @endforeach
            </ul>
        </div>
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

