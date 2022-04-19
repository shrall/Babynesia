<nav class="border-b bg-white shadow-sm py-6">
    <div class="container mx-auto xl:px-32 hidden xl:block">
        <div class="flex justify-between items-center">
            <h1 class="text-{{ $color[1] }}-600 text-4xl font-concert-one">
                Babynesia
            </h1>
            <div class="rounded-md py-2 px-4 bg-neutral-100 w-136">
                <form action="{{ route('list_products') }}">
                    <div class="flex justify-between w-full items-center">
                        <input type="text" placeholder="Search by keyword" name="keyword"
                            value="{{ !empty($keyword) ? $keyword : ''}}"
                            class="w-full mr-3 appearance-none font-encode-sans bg-neutral-100 outline-none text-gray-400">
                        <button type="submit">
                            <i class="bx bx-search text-gray-400"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div>
                <a href="" class="font-encode-sans text-slate-900 font-bold">
                    Login
                </a>
            </div>
            <div>
                <a href="" class="font-encode-sans text-slate-900 font-bold">
                    Daftar
                </a>
            </div>
            <div>
                <a href="">
                    <i class='bx bx-cart text-3xl text-slate-900' ></i>
                </a>
            </div>
        </div>

        <ul class="w-full flex justify-between font-encode-sans mt-4">
            <li class="{{ !empty($page)&&$page == "home" ? 'text-'.$color[1].'-600 font-bold' : 'text-slate-900' }}">
                <a href="/" aria-expanded="true">
                    Home
                </a>
            </li>
            @foreach ($statmenus as $menu)
            @if ($menu->status_code != 'grd' && $menu->status_code != 'gpo')
            <li class="{{ !empty($page)&&$page == "$menu->name" ? 'text-'.$color[1].'-600' : 'text-slate-900' }}">
                <form action="{{ route('list_products') }}" id="filtermenu{{ $menu->status_code }}"></form>
                <input type="hidden" name="pagehighlight" value="{{ $menu->name }}" form="filtermenu{{ $menu->status_code }}">
                <input type="hidden" name="filterproduct" value="{{ $menu->status_code }}" form="filtermenu{{ $menu->status_code }}">
                <button type="submit" form="filtermenu{{ $menu->status_code }}" class="appearance-none {{ !empty($page)&&$page == $menu->name ? 'font-bold' : '' }}">
                    {{ $menu->name }}
                </button>
            </li>
            @endif
            @endforeach
            @foreach ($navmenus as $menu)
            @if ($menu->no == 23 || $menu->no == 32 || $menu->no == 4 || $menu->no == 17)
            <li class="{{ !empty($page)&&$page == "$menu->code" ? 'text-'.$color[1].'-600' : 'text-slate-900' }} hover:text">
                <a href="{{ route('showpage', $menu->no) }}" aria-expanded="true">
                    {{ $menu->code }}
                </a>
            </li>

            @endif
            @endforeach
            <li class="{{ !empty($page)&&$page == "faq" ? 'text-'.$color[1].'-600 font-bold' : 'text-slate-900' }}">
                <a href="{{ route('faq.index') }}" aria-expanded="true">
                    FAQ
                </a>
            </li>
        </ul>

    </div>
</nav>