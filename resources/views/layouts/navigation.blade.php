<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>

<script type="text/javascript">
    $(document).ready(function(){  
        $('select').select2({ width: '100%', placeholder: "Select an Option", allowClear: true });
      
        $("#globalSearch").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#dataListTable tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        // $('.max-w-7xl ').css('max-width','80rem');
        // $('.max-w-7xl ').css('max-width','80rem');
    });
</script>

<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard.dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('dashboard.dashboard')" :active="request()->routeIs('dashboard.dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    @php $author = false;
                       if(request()->routeIs('authors.index') || request()->routeIs('authors.create') || request()->routeIs('authors.edit'))
                       $author = true;
                    @endphp
                   
                    @php $category = false;
                       if(request()->routeIs('category.index') || request()->routeIs('category.create') || request()->routeIs('category.edit'))
                       $category = true;
                    @endphp
                    
                    @php $lang = false;
                       if(request()->routeIs('language.index') || request()->routeIs('language.create') || request()->routeIs('language.edit'))
                       $lang = true;
                    @endphp
                    

                    @php $book = false;
                       if(request()->routeIs('book.index') || request()->routeIs('book.create') || request()->routeIs('book.edit') || request()->routeIs('book.show') || request()->routeIs('book.book_stock_check'))
                       $book = true;
                    @endphp
                    
                    @php $Book_stocks_report = false;
                       if(request()->routeIs('reports.stock_report'))
                       $Book_stocks_report = true;
                    @endphp

                    <x-nav-link :href="route('reports.stock_report')" :active="$Book_stocks_report">
                        {{ __('Stock') }}
                    </x-nav-link>

                    @php $Book_stocks = false;
                       if(request()->routeIs('Book_stocks.index') || request()->routeIs('Book_stocks.create') || request()->routeIs('Book_stocks.edit') || request()->routeIs('book.book_stock_check'))
                       $Book_stocks = true;
                    @endphp


                    <x-nav-link :href="route('Book_stocks.index')" :active="$Book_stocks">
                        {{ __('Order') }}
                    </x-nav-link>
                    @php $Book_Issue = false;
                       if(request()->routeIs('Book_Issue.index') || request()->routeIs('Book_Issue.create') || request()->routeIs('Book_Issue.edit'))
                       $Book_Issue = true;
                    @endphp
                    <x-nav-link :href="route('Book_Issue.index')" :active="$Book_Issue">
                        {{ __('Issue') }}
                    </x-nav-link>
                    @php $Book_Return = false;
                       if(request()->routeIs('Book_Return.index') || request()->routeIs('Book_Return.create') || request()->routeIs('Book_Return.edit'))
                       $Book_Return = true;
                    @endphp
                    <x-nav-link :href="route('Book_Return.index')" :active="$Book_Return">
                        {{ __('Return') }}
                    </x-nav-link>

                    @php $Book_Sell = false;
                       if(request()->routeIs('Book_Sell.index') || request()->routeIs('Book_Sell.create') || request()->routeIs('Book_Sell.edit'))
                       $Book_Sell = true;
                    @endphp
                    <x-nav-link :href="route('Book_Sell.index')" :active="$Book_Sell">
                        {{ __('Sell') }}
                    </x-nav-link>

                    @php $Volunteer_payment = false;
                    if(request()->routeIs('Volunteer_payment.index') || request()->routeIs('Volunteer_payment.create') || request()->routeIs('Volunteer_payment.edit'))
                       $Volunteer_payment = true;
                    @endphp
                    <x-nav-link :href="route('Volunteer_payment.index')" :active="$Volunteer_payment">
                        {{ __('Payment') }}
                    </x-nav-link>

                    <!-- volunteer_book_check -->
                    @php $user_profile = false;
                    if(request()->routeIs('volunteer.index') || request()->routeIs('book.volunteer_book_check') || request()->routeIs('volunteer.edit') || request()->routeIs('volunteer.add'))
                       $user_profile = true;
                    @endphp
                    
                    <x-nav-link :href="route('volunteer.index')" :active="$user_profile">
                        {{ __('Users') }}
                    </x-nav-link>

                </div>
            </div>
            
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                <!-- start  - drop down menu for Author contact and lang------------------- -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>Settings </div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content" :active="true">
                        <x-dropdown-link :href="route('book.index')">
                            {{ __('Book') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('authors.index')">
                            {{ __('Author') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('category.index')">
                            {{ __('Category') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('language.index')">
                            {{ __('Language') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('invoice.index')">
                            {{ __('Invoice') }}
                        </x-dropdown-link>
                       
                    </x-slot>
                </x-dropdown>

                <!-- start  - drop down menu for Reports------------------- -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>Reports </div>
                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content" :active="true">
                        <x-dropdown-link :href="route('reports.stock_report')">
                            {{ __('Stock Report') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('reports.volunteer_report')">
                            {{ __('Volunteer Report') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('reports.volunteer_sell_report')">
                            {{ __('Volunteer Sell Report') }}
                        </x-dropdown-link>

                    </x-slot>
                </x-dropdown>

                <!-- start  - drop down menu for event and contact------------------ -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>Event </div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content" :active="true">
                        <x-dropdown-link :href="route('events.index')">
                            {{ __('Organize Event') }}
                        </x-dropdown-link>

                        <x-dropdown-link :href="route('Contact_info.index')">
                            {{ __('Event Contact') }}
                        </x-dropdown-link>
                        
                    </x-slot>
                </x-dropdown>
                <!-- start  - drop down menu for User and profiles------------------- -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }} </div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }} [{{ Auth::user()->type }}]
                        </x-dropdown-link>
                       
                        <x-dropdown-link :href="route('book.volunteer_book_check', 0)">
                            {{ __('Consolidated Report') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard.dashboard')" :active="request()->routeIs('dashboard.dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-2 pb-3 space-y-1">
            <x-nav-link :href="route('authors.index')" :active="$author">
                {{ __('Author') }}
            </x-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-nav-link :href="route('category.index')" :active="$category">
                {{ __('Category') }}
            </x-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-nav-link :href="route('language.index')" :active="$lang">
                {{ __('Language') }}
            </x-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-nav-link :href="route('book.index')" :active="$book">
                {{ __('Books') }}
            </x-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-nav-link :href="route('Book_stocks.index')" :active="$Book_stocks">
                {{ __('Stocks') }}
            </x-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-nav-link :href="route('Book_Issue.index')" :active="$Book_Issue">
                {{ __('Issue') }}
            </x-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-nav-link :href="route('Book_Return.index')" :active="$Book_Return">
                {{ __('Return') }}
            </x-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-nav-link :href="route('Book_Sell.index')" :active="$Book_Sell">
                {{ __('Sell') }}
            </x-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-nav-link :href="route('Volunteer_payment.index')" :active="$Volunteer_payment">
                {{ __('Payment') }}
            </x-nav-link>
        </div>
        <div class="pt-2 pb-3 space-y-1">
            <x-nav-link :href="route('volunteer.index')" :active="$user_profile">
                {{ __('Volanteer') }}
            </x-nav-link>
        </div>
        
        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
