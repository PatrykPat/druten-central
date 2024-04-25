<nav x-data="{ open: false }" class="">

    <!--top dropdown-->
            <div class="z-50 flex items-center lg:hidden lg:hidden absolute">
                <button @click="open = ! open"
                    class="inline-flex m-6 items-center justify-center p-2 rounded-md text-black bg-white hover:text-[#FF0000] hover:bg-white focus:outline-none focus:bg-white transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Navigation dropdown menu -->
            <div :class="{'block': open, 'hidden': ! open}" class="z-50 adsolute top-0">
                <div class="pt-4 ml-6 pb-1 bg-white absolute lg:hidden rounded-md w-[50%] max-w-[250px] top-20">
                    <div class="px-4 w-full">
                        <div class="font-medium text-base text-black"><p class="font-bold text-lg">{{ Auth::user()->name }}</p></div>
                        <div class="font-medium text-sm text-black"><p class="font-bold">Aantal punten: {{ Auth::user()->punten }}</p></div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <x-responsive-nav-link :href="route('dashboard')" >
                            {{ __('Home')}}
                        </x-responsive-nav-link>

                        <x-responsive-nav-link :href="route('profile.edit')">
                            {{ __('Profiel') }}
                        </x-responsive-nav-link>
                        
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
            </div>

    <!-- Primary Navigation Menu telefoon -->
    <div class="z-50 bg-[color:var(--prime-color)] fixed inset-x-0 lg:hidden shadow-md bottom-0  mx-auto px-4 px-8">
        <div class="flex justify-center h-16">
            <div class="flex items-center">

                <!-- Navigation Links -->
                <div class="space-x-8 flex">
                    @role('user')
                    <x-nav-link :href="route('nieuws.archief')" :active="request()->routeIs('nieuws.archief')">
                        <!-- {{ __('Nieuws Archief') }} -->
                        <img src="{{ URL::to('/') }}/images/Nieuws.png" alt="Image" class="min-w-[30px]" width="50px" height="50px"/>
                    </x-nav-link>

                    <x-nav-link :href="route('nieuws.kalender')" :active="request()->routeIs('nieuws.kalender')">
                        <!-- {{ __('Nieuws Kalender') }} -->
                        <img src="{{ URL::to('/') }}/images/calendar.png" alt="Image" class="min-w-[30px]" width="50px" height="50px"/>
                    </x-nav-link>
                    
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <!-- {{ __('Home') }} -->
                        <img src="{{ URL::to('/') }}/images/home.png" alt="Image" class="min-w-[30px]" width="50px" height="50px"/>
                    </x-nav-link>

                    <x-nav-link :href="route('coupons.showShop')" :active="request()->routeIs('coupons.showShop')">
                        <!-- {{ __('Coupon shop') }} -->
                        <img src="{{ URL::to('/') }}/images/coupon.png" alt="Image" class="min-w-[30px]" width="50px" height="50px"/>
                    </x-nav-link>
                    
                    <x-nav-link :href="route('feedbackvragen.show')" :active="request()->routeIs('coupons.showShop')">
                        <img src="{{ URL::to('/') }}/images/speech-bubble.png" alt="Image" class="min-w-[30px]" width="50px" height="50px"/>
                    </x-nav-link>

                    <!-- <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ __('Meer vragen') }}</div><br>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
        
                            <x-slot name="content">
                                <x-dropdown-link :href="route('feedbackvragen.show')">
                                    {{ __('feedbackvragen') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('meerkeuzevragen.showvraag')">
                                    {{ __('meerkeuzevragen') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                    </div> -->
                    @endrole

                    @role('admin')
                    <x-nav-link :href="route('admin.index')" :active="request()->routeIs('dashboard')">
                        {{ __('users') }}
                    </x-nav-link>

                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        <img src="{{ URL::to('/') }}/images/home.png" alt="Image" width="50px" height="50px"/>
                    </x-nav-link>

                    <x-nav-link :href="route('admin.create')" :active="request()->routeIs('dashboard')">
                        <!-- {{ __('Create bedrijf') }} -->

                        <img src="{{ URL::to('/') }}/images/menu.png" alt="Image" width="50px" height="50px"/>
                    </x-nav-link>

                    <x-nav-link :href="route('admin.roles.index')" :active="request()->routeIs('dashboard')">
                        <!-- {{ __('roles') }} -->

                    </x-nav-link>
                    @endrole

                    @role('bedrijf')
                    <x-nav-link :href="route('nieuws.create')" :active="request()->routeIs('dashboard')">
                        {{ __('Create nieuws') }}
                    </x-nav-link>

                    <x-nav-link :href="route('meerkeuzevragen.show')" :active="request()->routeIs('dashboard')">
                        {{ __('Create meerkeuze vraag') }}
                    </x-nav-link>

                    <x-nav-link :href="route('feedbackantwoorden.showAnt')" :active="request()->routeIs('dashboard')">
                        {{ __('Antwoord op feedback') }}
                    </x-nav-link>

                    <x-nav-link :href="route('coupons.form')" :active="request()->routeIs('coupons.form')">
                        {{ __(' create coupons') }}
                    </x-nav-link>

                    <x-nav-link :href="route('feedback.form')" :active="request()->routeIs('feedback.form')">
                        {{ __(' create feedback') }}
                    </x-nav-link>
                    @endrole
                </div>
            </div>
        </div>
    </div>


    <!-- Primary Navigation Menu groot scherm -->
    <div class="z-50 bg-[color:var(--prime-color)] inset-x-0 hidden fixed justify-center lg:flex shadow-md top-0 px-8">
        <div class="flex justify-center self-center h-16 max-w-4xl">
            <div class="flex">

                <!-- Navigation Links -->
                <div class="space-x-8 ml-10 flex">
                    @role('users')
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Home') }}
                    </x-nav-link>
                    @endrole

                    @role('admin')
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Home') }}
                    </x-nav-link>
                    @endrole

                    @role('user')
                    <x-nav-link :href="route('nieuws.archief')" :active="request()->routeIs('nieuws.archief')">
                        {{ __('Nieuws Archief') }}
                    </x-nav-link>
                    @endrole

                    @role('user')
                    <x-nav-link :href="route('nieuws.kalender')" :active="request()->routeIs('nieuws.kalender')">
                        {{ __('Nieuws Kalender') }}
                    </x-nav-link>
                    @endrole

                    @role('user')
                    <x-nav-link :href="route('nieuws.agenda')" :active="request()->routeIs('nieuws.agenda')">
                        {{ __('Agenda') }}
                    </x-nav-link>
                    @endrole

                    @role('admin')
                    <x-nav-link :href="route('admin.index')" :active="request()->routeIs('dashboard')">
                        {{ __('users') }}
                    </x-nav-link>
                    @endrole

                    @role('bedrijf')
                    <x-nav-link :href="route('nieuws.create')" :active="request()->routeIs('dashboard')">
                        {{ __('Create nieuws') }}
                    </x-nav-link>
                    @endrole

                    @role('bedrijf')
                    <x-nav-link :href="route('meerkeuzevragen.show')" :active="request()->routeIs('dashboard')">
                        {{ __('Create meerkeuze vraag') }}
                    </x-nav-link>
                    @endrole

                    @role('bedrijf')
                    <x-nav-link :href="route('feedbackantwoorden.showAnt')" :active="request()->routeIs('dashboard')">
                        {{ __('Antwoord op feedback') }}
                    </x-nav-link>
                    @endrole

                    @role('admin')
                    <x-nav-link :href="route('admin.create')" :active="request()->routeIs('dashboard')">
                        {{ __('Create bedrijf') }}
                    </x-nav-link>
                    @endrole

                    @role('admin')
                    <x-nav-link :href="route('admin.roles.index')" :active="request()->routeIs('dashboard')">
                        {{ __('roles') }}
                    </x-nav-link>
                    @endrole

                    @role('user')
                    <x-nav-link :href="route('coupons.showShop')" :active="request()->routeIs('coupons.showShop')">
                        {{ __('Coupon shop') }}
                    </x-nav-link>
                    @endrole

                    @role('bedrijf')
                    <x-nav-link :href="route('coupons.form')" :active="request()->routeIs('coupons.form')">
                        {{ __(' create coupons') }}
                    </x-nav-link>
                    @endrole

                    @role('bedrijf')
                    <x-nav-link :href="route('feedback.form')" :active="request()->routeIs('feedback.form')">
                        {{ __(' create feedback') }}
                    </x-nav-link>
                    @endrole

                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        @role('user')
                        <x-dropdown>
                            <x-slot name="trigger">
                                <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                                    <div>{{ __('Meer vragen') }}</div><br>
                                    <div class="ml-1">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </button>
                            </x-slot>
        
                            <x-slot name="content">
                                <x-dropdown-link :href="route('feedbackvragen.show')">
                                    {{ __('feedbackvragen') }}
                                </x-dropdown-link>
                                <x-dropdown-link :href="route('meerkeuzevragen.showvraag')">
                                    {{ __('meerkeuzevragen') }}
                                </x-dropdown-link>
                            </x-slot>
                        </x-dropdown>
                        @endrole
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>