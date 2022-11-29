<footer class="bg-{{ $color[0] }}-300 shadow-sm xl:pt-20 pt-8">
    <div class="container mx-auto xl:px-20 px-3 xl:flex xl:justify-between">
        <a href="/">
            <h1 class="font-concert-one text-4xl mt-3 text-white">
                {{ config('app.name') }}
            </h1>
        </a>
        <div class="flex xl:justify-end flex-wrap mt-5 xl:mt-0">
            <ul class="mr-24 mb-4">
                <li class="font-encode-sans font-bold mb-2 text-white text-sm sm:text-base">
                    {{ config('app.name') }}
                </li>
                @foreach ($navmenus as $menu)
                @if ($menu->no == 23 || $menu->no == 32)

                <li class="font-encode-sans text-white text-sm sm:text-base">
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
            <ul class="mr-24 mb-4">
                <li class="font-encode-sans font-bold mb-2 text-white text-sm sm:text-base">
                    Account Details
                </li>
                <li class="font-encode-sans text-white text-sm sm:text-base">
                    <form action="{{ route('user.user.index') }}" id="formchecker"></form>
                    <input type="hidden" name="checker" value="profile" form="formchecker">
                    <button type="submit" form="formchecker">
                        Account
                    </button>
                <li class="font-encode-sans text-white text-sm sm:text-base">
                    <a href="{{ route('user.user.index') }}">
                        Transaction History
                    </a>
                </li>
            </ul>
            <ul>
                <li class="font-encode-sans font-bold mb-2 text-white text-sm sm:text-base">
                    Customer Service
                </li>
                <li class="font-encode-sans text-white text-sm sm:text-base">
                    <a href="{{ route('faq.index') }}">
                        FaQ
                    </a> </li>
                <li class="font-encode-sans text-white text-sm sm:text-base">
                    <a href="">
                        Chat Us
                    </a> </li>
                <li class="font-encode-sans text-white text-sm sm:text-base">
                    <a href="{{ route('user.cart.index') }}">
                        Cart
                    </a> </li>
            </ul>
        </div>
    </div>
    <div class="xl:mt-20 mt-5 pb-10 container mx-auto xl:px-40 flex justify-center">
        <p class="font-encode-sans text-white text-sm sm:text-base">
            Copyright © 2021. <span class="font-bold">{{ config('app.name') }}</span>
        </p>
    </div>
</footer>