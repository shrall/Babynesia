<nav class="bg-{{ $color[0] }}-300 shadow-sm py-6">
    <div class="container mx-auto xl:px-32 hidden xl:block">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <a href="/">
                    <h1 class="font-concert-one text-white text-5xl mr-5">TokoBayiFiv</h1>
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
                <a href="{{ route('user.user.index') }}" class=" ml-8 flex items-center">
                    <i class="fa fa-user-circle size text-4xl text-white"></i>
                    <div class="mx-3 font-encode-sans font-bold text-white">{{ Auth::user()->name }}</div>
                </a>
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
        <ul class="mt-4">
            @if (!empty($page)&&$page == "home")
            <li class="inline-block font-encode-sans py-1 px-2 rounded-full bg-white text-{{ $color[2] }}-400 font-bold">
                <a href="/" aria-expanded="true">
                    Home
                </a>
            </li>
            @else
            <li class="inline-block font-encode-sans text-white">
                <a href="/" aria-expanded="true">
                    Home
                </a>
            </li>
            @endif
            @if (!empty($page)&&$page == "about")
            <li class="ml-4 inline-block font-encode-sans py-1 px-2 rounded-full bg-white text-{{ $color[2] }}-400 font-bold">
                <a href="" aria-expanded="true">
                    About
                </a>
            </li>
            @else
            <li class="ml-4 inline-block font-encode-sans text-white">
                <a href="" aria-expanded="true">
                    About
                </a>
            </li>
            @endif
            @if (!empty($page)&&$page == "article")
            <li class="ml-4 inline-block font-encode-sans py-1 px-2 rounded-full bg-white text-{{ $color[2] }}-400 font-bold">
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
            @endif
            @if (!empty($page)&&$page == "faq")
            <li class="ml-4 inline-block font-encode-sans py-1 px-2 rounded-full bg-white text-{{ $color[2] }}-400 font-bold">
                <a href="{{ route('faq.index') }}" aria-expanded="true">
                    FAQ
                </a>
            </li>
            @else
            <li class="ml-4 inline-block font-encode-sans text-white">
                <a href="{{ route('faq.index') }}" aria-expanded="true">
                    FAQ
                </a>
            </li>
            @endif
            @if (!empty($page)&&$page == "contact")
            <li class="ml-4 inline-block font-encode-sans py-1 px-2 rounded-full bg-white text-{{ $color[2] }}-400 font-bold">
                <a href="{{ route('contact') }}" aria-expanded="true">
                    Contact
                </a>
            </li>
            @else
            <li class="ml-4 inline-block font-encode-sans text-white">
                <a href="{{ route('contact') }}" aria-expanded="true">
                    Contact
                </a>
            </li>
            @endif
            @if (!empty($page)&&$page == "guestbook")
            <li class="ml-4 inline-block font-encode-sans py-1 px-2 rounded-full bg-white text-{{ $color[2] }}-400 font-bold">
                <a href="{{ route('user.guestbook.index') }}" aria-expanded="true">
                    Guestbook
                </a>
            </li>
            @else
            <li class="ml-4 inline-block font-encode-sans text-white">
                <a href="{{ route('user.guestbook.index') }}" aria-expanded="true">
                    Guestbook
                </a>
            </li>
            @endif
            <div class="group inline-block">

                <li class="peer ml-4 font-encode-sans text-white">
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
                            <form action="{{ route('list_products') }}" method="get" id="kategorifilter"></form>
                            <input type="hidden" value="{{ $kategori->no_kategori }}" name="filter"
                                form="kategorifilter">
                            <button type="submit" class="text-white font-encode-sans peer" form="kategorifilter"
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
                                <li class="bg-neutral-100 p-2 hover:bg-white text-gray-400 hover:text-{{ $color[2] }}-400 first:rounded-t-md last:rounded-b-md">
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
        </ul>


    </div>

    <div class="xl:hidden sm:px-10 px-3">
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
            <h1 class="text-3xl font-concert-one text-white">
                TokoBayiFiv
            </h1>
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
            <div class="py-3 px-4 rounded-full bg-white w-full">
                <div class="flex justify-between w-full items-center">
                    <input type="text" placeholder="Search by keyword"
                        class="w-full mr-3 appearance-none font-encode-sans bg-white outline-none text-gray-400">
                    <button type="submit">
                        <i class="fas fa-search text-gray-400"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>

<div class="bgmenu xl:hidden fixed bg-slate-900 h-screen opacity-20 w-full -left-full top-0">
    <label for="menu" class="inline-block w-full h-full"></label>
</div>
<div class="transition-all duration-300 menulist xl:hidden sm:w-3/4 w-5/6 h-screen fixed -left-full top-0">
    <div class="bg-{{ $color[0] }}-300 py-4 w-full">
        <div class="flex justify-between px-4">
            <div class="flex items-center">
                <label for="menu" class="flex items-center cursor-pointer">
                    <i class="fas fa-times sm:text-4xl text-3xl text-white"></i>
                </label>
                @if (Auth::checK())
                <a href="{{ route('user.user.index') }}" class="ml-5 flex items-center">
                    <i class="fa fa-user-circle size sm:text-4xl text-3xl text-white"></i>
                    <div class="mx-3 font-encode-sans font-bold text-white text-sm sm:text-base">
                        {{ Auth::user()->name }}
                    </div>
                </a>
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
    <div class="bg-white py-4 px-4 h-full overflow-y-auto">
        <a href="/">
            <div class="my-3 font-encode-sans font-bold {{ !empty($page)&&$page == "home" ? 'text-'.$color[1].'-500' : 'text-slate-900' }} hover:text-{{ $color[1] }}-500">
                Home
            </div>
        </a>
        <hr>
        <a href="">
            <div class="my-3 font-encode-sans font-bold {{ !empty($page)&&$page == "about" ? 'text-'.$color[1].'-500' : 'text-slate-900' }} hover:text-{{ $color[1] }}-500">
                About
            </div>
        </a>
        <hr>
        <a href="{{ route('article') }}">
            <div class="my-3 font-encode-sans font-bold {{ !empty($page)&&$page == "article" ? 'text-'.$color[1].'-500' : 'text-slate-900' }} hover:text-{{ $color[1] }}-500">
                Article
            </div>
        </a>
        <hr>
        <a href="{{ route('faq.index') }}">
            <div class="my-3 font-encode-sans font-bold {{ !empty($page)&&$page == "faq" ? 'text-'.$color[1].'-500' : 'text-slate-900' }} hover:text-{{ $color[1] }}-500">
                FAQ
            </div>
        </a>
        <hr>
        <a href="{{ route('contact') }}">
            <div class="my-3 font-encode-sans font-bold {{ !empty($page)&&$page == "contact" ? 'text-'.$color[1].'-500' : 'text-slate-900' }} hover:text-{{ $color[1] }}-500">
                Contact
            </div>
        </a>
        <hr>
        <a href="{{ route('user.guestbook.index') }}">
            <div class="my-3 font-encode-sans font-bold {{ !empty($page)&&$page == "guestbook" ? 'text-'.$color[1].'-500' : 'text-slate-900' }} hover:text-{{ $color[1] }}-500">
                Guestbook
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
                        <button type="submit" class="text-slate-900 hover:text-{{ $color[1] }}-500 font-encode-sans"
                            {{ !empty($kategori->subcategories[0]) ? 'disabled' : '' }}>
                            {{ $kategori->nama_kategori }}
                        </button>
                    </form>
                    @foreach ($subkategoris as $sub)
                    @if ($sub->kategori_id == $kategori->no_kategori)
                    <form action="{{ route('list_products') }}" method="">
                        <input type="hidden" name="subfilter" value="{{ $sub->child_id }}">
                        <input type="hidden" name="filter" value="{{ $kategori->no_kategori }}">
                        <ul class="ml-2 text-gray-400 pt-1 space-y-1 hover:text-{{ $color[1] }}-500">
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


{{-- NAVBAR 2
<nav class="bg-white shadow-sm py-6">
    <div class="container mx-auto xl:px-40 hidden xl:block">
        <div class="flex justify-between items-center">
            <div class="py-3 px-4 rounded-full bg-neutral-100 w-128">
                <div class="flex justify-between w-full items-center">
                    <input type="text" placeholder="Search by keyword"
                        class="w-full mr-3 appearance-none font-encode-sans bg-neutral-100 outline-none text-gray-400">
                    <button type="submit">
                        <i class="fas fa-search text-gray-400"></i>
                    </button>
                </div>
            </div>
            <div class="flex items-center">
                @if (Auth::check())
                <a href="{{ route('user.user.index') }}" class=" ml-8 flex items-center">
<i class="fa fa-user-circle size text-4xl text-{{ $color[1] }}-500"></i>
<div class="mx-3 font-encode-sans font-bold text-slate-900">{{ Auth::user()->name }}</div>
</a>
@else
<a href="{{ route('login') }}" class=" ml-8 flex items-center">
    <i class="fa fa-user-circle size text-4xl text-{{ $color[1] }}-500"></i>
    <div class="mx-3 font-encode-sans font-bold text-slate-900">Log In</div>
</a>
@endif
<a href="{{ route('user.cart.index') }}" class="ml-4 flex items-center">
    <i class="fa fa-shopping-cart size text-4xl text-{{ $color[1] }}-500"></i>
    <div class="mx-3 font-encode-sans font-bold text-slate-900">Cart</div>
</a>
@if (Auth::check())
<a href="{{ route('user.faktur.index') }}"
    class="ml-4 border-2 border-{{ $color[2] }}-400 hover:bg-{{ $color[2] }}-400 hover:text-white focus:ring-{{ $color[2] }}-300 focus:ring-2 font-bold font-encode-sans text-{{ $color[2] }}-400 px-4 py-2 rounded-full">
    Tracking
</a>

@else
<a href="{{ route('register') }}"
    class="ml-4 border-2 border-{{ $color[2] }}-400 hover:bg-{{ $color[2] }}-400 hover:text-white focus:ring-{{ $color[2] }}-300 focus:ring-2 font-bold font-encode-sans text-{{ $color[2] }}-400 px-4 py-2 rounded-full">
    Daftar
</a>

@endif
</div>
</div>
<ul class="mt-4">
    <li class="inline-block font-encode-sans py-1 px-2 rounded-full bg-{{ $color[1] }}-500 text-white font-bold">
        <a href="/" aria-expanded="true">
            Home
        </a>
    </li>
    <li class="ml-4 inline-block font-encode-sans">
        <a href="" aria-expanded="true">
            About
        </a>
    </li>
    <li class="ml-4 inline-block font-encode-sans">
        <a href="{{ route('user.faq.index') }}" aria-expanded="true">
            FAQ
        </a>
    </li>
    <li class="ml-4 inline-block font-encode-sans">
        <a href="{{ route('user.guestbook.index') }}" aria-expanded="true">
            Contact
        </a>
    </li>
    <li class="ml-4 inline-block font-encode-sans">
        <a href="{{ route('user.guestbook.create') }}" aria-expanded="true">
            Guestbook
        </a>
    </li>
    <li class="peer ml-4 inline-block font-encode-sans">
        <div class="cursor-pointer">
            Kategori
        </div>
    </li>
    <div
        class="invisible peer-hover:visible hover:visible pt-0 pb-6 mt-5 absolute left-0 top-24 bg-white w-full mx-auto xl:px-40">
        <div class="flex justify-between">
            <ul>
                <li class="my-1">
                    <a href="" class="font-encode-sans text-slate-900">
                        Shoes
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="font-encode-sans text-slate-900">
                        Bedding Accesories
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="font-encode-sans text-slate-900">
                        Clothes
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="font-encode-sans text-slate-900">
                        Pajamas
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="font-encode-sans text-slate-900">
                        Sock and Legging
                    </a>
                </li>
            </ul>
            <ul>
                <li class="my-1">
                    <a href="" class="font-encode-sans text-slate-900">
                        Accesories
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="font-encode-sans text-slate-900">
                        Bento Tools
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="font-encode-sans text-slate-900">
                        Diaper Bag & Kids Bag
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="font-encode-sans text-slate-900">
                        Peralatan Renang & Mandi
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="font-encode-sans text-slate-900">
                        Storage and Organiser Items
                    </a>
                </li>
            </ul>
            <ul>
                <li class="my-1">
                    <a href="" class="font-encode-sans text-slate-900">
                        Baju Dewasa
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="font-encode-sans text-slate-900">
                        Casual Set
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="font-encode-sans text-slate-900">
                        Feeding and Breast Feeding Accesories
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="font-encode-sans text-slate-900">
                        Safety Tools
                    </a>
                </li>
                <li class="my-1">
                    <a href="" class="font-encode-sans text-slate-900">
                        Others
                    </a>
                </li>
            </ul>
        </div>
    </div>
</ul>


</div>

<div class="xl:hidden sm:px-10 px-3">
    <div class="flex justify-between">
        <div>
            <input type="checkbox" id="menu" class="hidden checked:">
            <label for="menu" class="flex items-center cursor-pointer">
                <i class="fas fa-bars text-2xl text-{{ $color[1] }}-500"></i>
                <h6 class="ml-2 text-slate-900 font-bold">
                    Menu
                </h6>
            </label>
        </div>
        <a href="{{ route('user.cart.index') }}" class="flex items-center">
            <i class="fas fa-shopping-cart text-2xl text-{{ $color[1] }}-500"></i>
            <h6 class="ml-2 text-slate-900 font-bold">
                Cart
            </h6>
        </a>
    </div>
    <div class="mt-3">
        <div class="py-3 px-4 rounded-full bg-neutral-100 w-full">
            <div class="flex justify-between w-full items-center">
                <input type="text" placeholder="Search by keyword"
                    class="w-full mr-3 appearance-none font-encode-sans bg-neutral-100 outline-none text-gray-400">
                <button type="submit">
                    <i class="fas fa-search text-gray-400"></i>
                </button>
            </div>
        </div>
    </div>
</div>
</nav>

<div class="bgmenu xl:hidden fixed bg-slate-900 h-screen opacity-20 w-full -left-full top-0">
    <label for="menu" class="inline-block w-full h-full"></label>
</div>
<div class="transition-all duration-300 menulist xl:hidden sm:w-3/4 w-5/6 h-screen fixed -left-full top-0">
    <div class="bg-{{ $color[1] }}-500 py-4 w-full">
        <div class="flex justify-between px-4">
            <label for="menu" class="flex items-center cursor-pointer">
                <i class="fas fa-times sm:text-4xl text-3xl text-white"></i>
            </label>
            @if (Auth::checK())
            <a href="{{ route('user.user.index') }}" class="flex items-center">
                <i class="fa fa-user-circle size sm:text-4xl text-3xl text-white"></i>
                <div class="mx-3 font-encode-sans font-bold text-white text-sm sm:text-base">{{ Auth::user()->name }}
                </div>
            </a>
            <a href="{{ route('user.faktur.index') }}"
                class="py-3 px-5 bg-white text-{{ $color[2] }}-400 font-bold font-encode-sans hover:bg-{{ $color[2] }}-400 hover:text-white focus:ring-{{ $color[2] }}-300 focus:ring-2 rounded-full text-sm sm:text-base">Tracking</a>

            @else
            <a href="{{ route('login') }}" class="flex items-center">
                <i class="fa fa-user-circle size sm:text-4xl text-3xl text-white"></i>
                <div class="mx-3 font-encode-sans font-bold text-white text-sm sm:text-base">Log In</div>
            </a>
            <a href="{{ route('register') }}"
                class="py-3 px-5 bg-white text-{{ $color[2] }}-400 font-bold font-encode-sans hover:bg-{{ $color[2] }}-400 hover:text-white focus:ring-{{ $color[2] }}-300 focus:ring-2 rounded-full text-sm sm:text-base">Daftar</a>

            @endif
        </div>
    </div>
    <div class="bg-white py-4 px-4 h-full">
        <a href="/">
            <div class="my-3 font-encode-sans font-bold text-slate-900">
                Home
            </div>
        </a>
        <hr>
        <a href="">
            <div class="my-3 font-encode-sans font-bold text-slate-900">
                About
            </div>
        </a>
        <hr>
        <a href="{{ route('user.faq.index') }}">
            <div class="my-3 font-encode-sans font-bold text-slate-900">
                FAQ
            </div>
        </a>
        <hr>
        <a href="{{ route('user.guestbook.index') }}">
            <div class="my-3 font-encode-sans font-bold text-slate-900">
                Contact
            </div>
        </a>
        <hr>
        <a href="{{ route('user.guestbook.create') }}">
            <div class="my-3 font-encode-sans font-bold text-slate-900">
                Guestbook
            </div>
        </a>
        <hr>
        <a href="">
            <div class="my-3 font-encode-sans font-bold text-slate-900">
                Kategori
            </div>
        </a>
        <hr>
    </div>
</div> --}}

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
