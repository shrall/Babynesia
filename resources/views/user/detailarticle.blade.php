@extends('layouts.app')
@section('content')

@include('inc.navbar1')
<div id="carouselExampleCaptions" class="carousel slide relative" data-bs-ride="carousel">
    <div class="carousel-inner relative w-full overflow-hidden">
        {{-- looping goes here --}}
        <div class="carousel-item active relative float-left w-full">
            <img src="https://mdbootstrap.com/img/Photos/Slides/img%20(22).jpg" class="block w-full h-vh-50 object-cover" alt="..." />
            {{-- <div class="carousel-caption hidden md:block absolute text-center">
                <h5 class="text-xl">First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
            </div> --}}
        </div>
    </div>
</div>
<div class="container mx-auto xl:px-32 px-3 xl:pt-6 xl:pb-10 pt-3 pb-5 sm:grid sm:grid-cols-3 sm:space-x-3">
    <div class="w-full bg-white rounded-lg shadow-sm pt-4 pb-6 px-6 col-span-2 h-fit">
        <h6 class="font-encode-sans font-bold text-xl text-slate-900 xl:text-2xl">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet, nam.
        </h6>
        <div class="mt-3">
            <p class="font-encode-sans text-gray-400 text-sm sm:text-base">
                22/40/2016
            </p>
        </div>
        <div class="mt-5 mb-7">
            <p class="font-encode-sans text-slate-900 text-sm text-bold">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa illo nostrum rem veniam voluptate eum ea
                necessitatibus incidunt. Explicabo ullam eum temporibus alias, corporis officiis tempora perspiciatis
                repellendus veritatis maxime expedita eos amet sequi magni iste molestias repudiandae repellat sit quod
                error placeat accusamus consectetur deleniti. Aut accusamus quisquam nostrum dolorum, molestiae
                voluptates incidunt possimus natus libero mollitia odio dicta minus ullam est, laborum optio fuga magnam
                animi necessitatibus enim? Autem aperiam distinctio, itaque sunt sequi ut nulla commodi facilis
                inventore? Modi neque optio magnam, libero eum corrupti dolor itaque tempora fugit velit ratione odit,
                <br> <br>
                veniam vitae laborum illo id? Similique explicabo ut facere ipsam non, a iste blanditiis exercitationem.
                Modi, illum reprehenderit cupiditate ex fugit beatae ab fugiat laborum quam tempore dolorum nobis
                consequuntur sint esse? Quidem magni, dignissimos iure voluptatem dolorem molestiae quos doloribus
                corrupti veniam laboriosam sint quam rem molestias praesentium sequi placeat vero asperiores aliquid
                omnis, nobis laudantium. Amet tenetur exercitationem repellendus atque veniam incidunt eius placeat esse
                quod culpa, molestias debitis neque, ab cupiditate perspiciatis doloribus temporibus quisquam iusto
                nihil voluptatibus vitae nisi? Fugiat saepe, recusandae minima tempora ipsa distinctio repudiandae,
                minus voluptatum aut quo quia voluptate, id sapiente nulla repellendus ipsum esse. Voluptate minima
                inventore corrupti quae fugit atque nostrum modi, repellendus harum veniam ex sunt commodi quisquam
                dolore vero illum omnis debitis cumque, voluptates consequatur hic non facere magnam tempore?
                <br> <br>
                Praesentium fugiat animi non nesciunt veritatis recusandae veniam voluptatum sint, necessitatibus
                voluptatibus debitis, commodi dolorem aut ea nihil iusto atque? Tenetur nam atque repellat eum labore
                autem cupiditate aspernatur nesciunt doloribus dignissimos fuga velit suscipit deleniti, ea illo
                exercitationem sit. Corrupti error provident quibusdam nostrum quaerat? Eius deserunt, dolorum dolor
                doloribus delectus harum expedita optio unde fugiat. Soluta atque ipsum esse aliquid, nulla ullam,
                quidem, nobis repudiandae magni sapiente voluptas ex explicabo eveniet.
            </p>
        </div>
    </div>
    <div class="w-full h-fit bg-white rounded-md shadow-sm pt-4 mt-3 sm:mt-0 pb-7 px-3">
        <h6 class="font-encode-sans mt-2 text-clip font-bold text-slate-900 text-base">
            Related Articles
        </h6>
        <div class="mt-5 space-y-5 px-4">
            <a href="" class="flex items-center">
                <img src="https://images.unsplash.com/5/unsplash-kitsune-4.jpg?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjEyMDd9&s=50827fd8476bfdffe6e04bc9ae0b8c02" alt="" 
                    class="w-24 aspect-square object-cover rounded-md">
                <div class="ml-2">
                    <h6 class="font-encode-sans text-clip text-slate-900 text-base">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident!
                    </h6>
                </div>
            </a>
            <a href="" class="flex items-center">
                <img src="https://images.unsplash.com/5/unsplash-kitsune-4.jpg?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjEyMDd9&s=50827fd8476bfdffe6e04bc9ae0b8c02" alt="" 
                    class="w-24 aspect-square object-cover rounded-md">
                <div class="ml-2">
                    <h6 class="font-encode-sans text-clip text-slate-900 text-base">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident!
                    </h6>
                </div>
            </a>
            <a href="" class="flex items-center">
                <img src="https://images.unsplash.com/5/unsplash-kitsune-4.jpg?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjEyMDd9&s=50827fd8476bfdffe6e04bc9ae0b8c02" alt="" 
                    class="w-24 aspect-square object-cover rounded-md">
                <div class="ml-2">
                    <h6 class="font-encode-sans text-clip text-slate-900 text-base">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident!
                    </h6>
                </div>
            </a>
            <a href="" class="flex items-center">
                <img src="https://images.unsplash.com/5/unsplash-kitsune-4.jpg?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&ixid=eyJhcHBfaWQiOjEyMDd9&s=50827fd8476bfdffe6e04bc9ae0b8c02" alt="" 
                    class="w-24 aspect-square object-cover rounded-md">
                <div class="ml-2">
                    <h6 class="font-encode-sans text-clip text-slate-900 text-base">
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident!
                    </h6>
                </div>
            </a>
        </div>
    </div>
</div>

@include('inc.footer1')

@endsection
