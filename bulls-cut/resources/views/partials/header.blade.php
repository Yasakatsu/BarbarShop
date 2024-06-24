    <header id="header" class="py-6 ">
        <div class="container md:flex mx-auto justify-between items-center ">
            <p class="flex justify-center font-bold md:hidden pb-4 ">さあ、大人の男の空間へ</p>
            <a id="header-img" href="{{ route('main') }}">
                <img src="{{ asset('/images/BULLSCUT_logo.png') }}" alt="Header Image"
                    class=" w-40 md:w-44 lg:w-44   mx-auto md:pr-4 items-center "
                    style=" filter: brightness(0) invert(1);">
            </a>
            <div x-data="{ open: false }" @click.away="open = false">
                <!-- ハンバーガーメニュー -->
                <div class="md:hidden flex justify-center pt-10" @click="open = !open">
                    <i class="fas fa-bars fa-2x"></i>
                </div>
                <!-- リンクタグ -->
                <div id="header-link":class="{ 'hidden': !open, 'flex flex-col items-center justify-center bg-stone-900 bg-opacity-90 h-screen w-full fixed top-0 tracking-widest': open }"
                    class=" md:flex md:items-center md:justify-between md:space-x-10 font-bold md:text-lg font-sans">
                    <a href="https://beauty.hotpepper.jp/slnH000520434/">
                        <button
                            class="px-8 py-2 bg-theme-color hover:bg-purple-600 duration-300 rounded-sm text-3xl md:text-2xl my-4"
                            @click="open = false">Reserve
                        </button>
                    </a>
                    <a href="#concept"
                        class=" hover:text-selected-text transition-all md:duration-300 text-3xl md:text-2xl my-4"
                        @click="open = false">Concept</a>
                    <a href="#service"
                        class=" hover:text-selected-text transition-all duration-300 text-3xl md:text-2xl my-4"
                        @click="open = false">Service</a>
                    <a href="#menu"
                        class=" hover:text-selected-text transition-all duration-300 text-3xl md:text-2xl my-4"
                        @click="open = false">Menu</a>
                    <a href="#hours"
                        class=" hover:text-selected-text transition-all duration-300 text-3xl md:text-2xl my-4"
                        @click="open = false">OPEN/CLOSE</a>
                    <a href="#address"
                        class=" hover:text-selected-text transition-all duration-300 text-3xl md:text-2xl my-4"
                        @click="open = false">Address</a>
                    <a href="https://www.instagram.com/bullscut0205?igsh=bjd6ejFxczM2cWJt" target="_blank"
                        class="fa-brands fa-instagram fa-2x hover:text-selected-text duration-300 text-5xl my-4"
                        @click="open = false"></a>
                </div>
            </div>
            <!-- Reserve -->
            <div class="md:hidden flex justify-center pt-10  ">
                <button class="px-8 py-2 bg-theme-color  hover:bg-purple-600 duration-300 rounded-sm font-bold">
                    <a href="https://beauty.hotpepper.jp/slnH000520434/">ご予約はコチラ</a>
                </button>
            </div>

    </header>
