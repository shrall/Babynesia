<footer class="bg-white border-t shadow-sm xl:pt-10 pt-8">
    <div class="container mx-auto xl:px-32 px-3 xl:flex xl:justify-between space-y-3 xl:space-y-0">
        <ul class="">
            <li
                class="font-encode-sans font-bold mb-2 text-slate-900 hover:text-{{ $color[1] }}-600 text-sm sm:text-base">
                Babynesia
            </li>

            @foreach ($navmenus as $menu)
            @if ($menu->no == 24 || $menu->no == 32 || $menu->no == 4 || $menu->no == 17)

            <li class="font-encode-sans text-slate-900 hover:text-{{ $color[1] }}-600 text-sm sm:text-base">
                <a href="{{ route('showpage', $menu->no) }}">
                    {{ $menu->code }}
                </a>
            </li>

            @endif
            @endforeach
            {{-- <li class="font-encode-sans text-white text-sm sm:text-base">
                    <a href="{{ route('article') }}">
            article
            </a>
            </li> --}}

        </ul>
        <ul class="">
            <li class="font-encode-sans font-bold mb-2 text-slate-900 text-sm sm:text-base">
                Account Details
            </li>
            <li class="font-encode-sans text-slate-900 hover:text-{{ $color[1] }}-600 text-sm sm:text-base">
                <a href="{{ route('user.user.index') }}">
                    account
                </a> </li>
            <li class="font-encode-sans text-slate-900 hover:text-{{ $color[1] }}-600 text-sm sm:text-base">
                <form action="{{ route('user.user.index') }}" id="formchecker"></form>
                <input type="hidden" name="checker" value="history" form="formchecker">
                <button type="submit" form="formchecker">
                    transaction history
                </button>
            </li>
        </ul>
        <ul>
            <li class="font-encode-sans font-bold mb-2 text-slate-900 text-sm sm:text-base">
                Customer Service
            </li>
            <li class="font-encode-sans text-slate-900 hover:text-{{ $color[1] }}-600 text-sm sm:text-base">
                <a href="{{ route('faq.index') }}">
                    faq
                </a> </li>
            <li class="font-encode-sans text-slate-900 hover:text-{{ $color[1] }}-600 text-sm sm:text-base">
                <a href="">
                    chat us
                </a> </li>
            <li class="font-encode-sans text-slate-900 hover:text-{{ $color[1] }}-600 text-sm sm:text-base">
                <a href="{{ route('user.cart.index') }}">
                    cart
                </a> </li>
        </ul>
    </div>
    <div class="xl:mt-10 mt-5 pb-10 container mx-auto xl:px-32 px-3 flex">
        <div class="flex items-end">
            <h1 class="text-{{ $color[1] }}-600 text-4xl font-concert-one">
                Babynesia
            </h1>
            <p class="ml-2 font-encode-sans text-slate-900 text-sm sm:text-base">
                Copyright © 2021. <span class="font-bold">Babynesia</span>
            </p>
        </div>

    </div>
</footer>


{{-- Footer 2 --}}
{{-- <footer class="bg-white shadow-sm xl:pt-20 pt-8">
    <div class="container mx-auto xl:px-40 px-3 xl:flex xl:justify-between">
        <h1 class="font-concert-one text-4xl mt-3 text-{{ $color[1] }}-500">
TokoBayiFiv
</h1>
<div class="flex xl:justify-end flex-wrap mt-5 xl:mt-0">
    <ul class="mr-24 mb-4">
        <li class="font-encode-sans font-bold mb-2">
            TokobayiFiv
        </li>
        <li class="font-encode-sans">
            <a href="">
                about us
            </a>
        </li>
        <li class="font-encode-sans">
            <a href="">
                about us
            </a> </li>
        <li class="font-encode-sans">
            <a href="">
                about us
            </a> </li>
    </ul>
    <ul class="mr-24 mb-4">
        <li class="font-encode-sans font-bold mb-2">
            TokobayiFiv
        </li>
        <li class="font-encode-sans">
            <a href="">
                about us
            </a> </li>
        <li class="font-encode-sans">
            <a href="">
                about us
            </a> </li>
        <li class="font-encode-sans">
            <a href="">
                about us
            </a> </li>
    </ul>
    <ul>
        <li class="font-encode-sans font-bold mb-2">
            TokobayiFiv
        </li>
        <li class="font-encode-sans">
            <a href="">
                about us
            </a> </li>
        <li class="font-encode-sans">
            <a href="">
                about us
            </a> </li>
        <li class="font-encode-sans">
            <a href="">
                about us
            </a> </li>
    </ul>
</div>
</div>
<div class="xl:mt-20 mt-5 pb-10 container mx-auto xl:px-40 flex justify-center">
    <p class="font-encode-sans">
        Copyright © 2021. <span class="font-bold">TokoBayiFiv</span>
    </p>
</div>
</footer> --}}
