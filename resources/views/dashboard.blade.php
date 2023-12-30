<x-app-layout>
   <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
   </x-slot>

   <div class="py-2">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <?php $showAddLink = "visibility: hidden;"?>
         @if(Auth::user()->type == 'admin')
            <?php $showAddLink = "visibility: none;"?>
         @endif
         <!-- start row 1 ----------------------------------------------- --> 
         <div class="flex py-2">
            <div class="w-1/4 p-2">
               <div class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                  <div class="flex justify-left">
                     <svg class="h-16 w-16 text-blue-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="3" y1="21" x2="21" y2="21" />  <path d="M3 7v1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1m0 1a3 3 0 0 0 6 0v-1h-18l2 -4h14l2 4" />  <path d="M5 21v-10.15" />  <path d="M19 21v-10.15" />  <path d="M9 21v-4a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v4" /></svg>
                  </div>
                  <div class="mb-1 flex justify-center">
                     <a href="{{route('Book_stocks.index')}}" class="inline-flex items-center text-blue-600 hover:underline">
                     <h5 class="mb-2 text-2xl font-semibold tracking-tight text-blue-900 dark:text-white"> {{ $bookStocksCount }} Order Transaction</h5>
                     </a>
                  </div> 
                  <div class="flex justify-end" style="{{$showAddLink}}">
                     <a href="{{route('Book_stocks.create')}}" class="inline-flex items-center text-blue-600 hover:underline">
                     <svg class="h-5 w-5 text-blue-700"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" />  <line x1="12" y1="8" x2="12" y2="16" />  <line x1="8" y1="12" x2="16" y2="12" /></svg>
                     </a>
                  </div>
               </div>
            </div>

            <div class="w-1/4 p-2">
               <div class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                  <div class="flex justify-left">
                     <svg class="h-16 w-16 text-blue-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="6" cy="6" r="2" />  <circle cx="18" cy="6" r="2" />  <circle cx="6" cy="18" r="2" />  <circle cx="18" cy="18" r="2" />  <line x1="6" y1="8" x2="6" y2="16" />  <line x1="8" y1="6" x2="16" y2="6" />  <line x1="8" y1="18" x2="16" y2="18" />  <line x1="18" y1="8" x2="18" y2="16" /></svg>
                  </div>
                  <div class="mb-1 flex justify-center">
                     <a href="{{route('Book_Issue.index')}}" class="inline-flex items-center text-blue-600 hover:underline">
                     <h5 class="mb-2 text-2xl font-semibold tracking-tight text-blue-900 dark:text-white"> {{ $bookIssueCount }} Book Issue</h5>
                     </a>
                  </div>
                  <div class="flex justify-end" style="{{$showAddLink}}">
                     <a href="{{route('Book_Issue.create')}}" class="inline-flex items-center text-blue-600 hover:underline">
                     <svg class="h-5 w-5 text-blue-700"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" />  <line x1="12" y1="8" x2="12" y2="16" />  <line x1="8" y1="12" x2="16" y2="12" /></svg>
                     </a>
                  </div>
               </div>
            </div>

            <div class="w-1/4 p-2">
               <div class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                  <div class="flex justify-left">
                     <svg class="h-16 w-16 text-blue-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="7" cy="17" r="2" />  <circle cx="17" cy="17" r="2" />  <path d="M5 17h-2v-11a1 1 0 0 1 1 -1h9v6h-5l2 2m0 -4l-2 2" />  <path d="M9 17h6" />  <path d="M13 6h5l3 5v6h-2" /></svg>
                  </div>
                  <div class="mb-1 flex justify-center">
                     <a href="{{route('Book_Return.index')}}" class="inline-flex items-center text-blue-600 hover:underline">
                     <h5 class="mb-2 text-2xl font-semibold tracking-tight text-blue-900 dark:text-white"> {{ $bookReturnCount }} Book Return</h5>
                     </a>
                  </div>
                  <div class="flex justify-end" style="{{$showAddLink}}">
                     <a href="{{route('Book_Return.create')}}" class="inline-flex items-center text-blue-600 hover:underline">
                     <svg class="h-5 w-5 text-blue-700"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" />  <line x1="12" y1="8" x2="12" y2="16" />  <line x1="8" y1="12" x2="16" y2="12" /></svg>
                     </a>
                  </div>
               </div>
            </div>

            <div class="w-1/4 p-2">
               <div class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                  <div class="flex justify-left">
                     <svg class="h-16 w-16 text-blue-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />  <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" /></svg>
                  </div>
                  <div class="mb-1 flex justify-center">
                     <a href="{{route('Book_Sell.index')}}" class="inline-flex items-center text-blue-600 hover:underline">
                     <h5 class="mb-2 text-2xl font-semibold tracking-tight text-blue-900 dark:text-white"> {{ $bookSellCount }} Book Sell</h5>
                     </a>
                  </div>
                  <div class="flex justify-end" style="{{$showAddLink}}">
                     <a href="{{route('Book_Sell.create')}}" class="inline-flex items-center text-blue-600 hover:underline">
                     <svg class="h-5 w-5 text-blue-700"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" />  <line x1="12" y1="8" x2="12" y2="16" />  <line x1="8" y1="12" x2="16" y2="12" /></svg>
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <!-- Start row 1 ----------------------------------------------- -->
         <div class="flex py-2">
            <div class="w-1/4 p-2">
               <div class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                  <div class="flex justify-left">
                     <svg class="h-16 w-16 text-blue-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M10 13l2.538-.003c2.46 0 4.962-2.497 4.962-4.997 0-3-1.89-5-4.962-5H7c-.5 0-1 .5-1 1L4 18c0 .5.5 1 1 1h2.846L9 14c.089-.564.43-1 1-1zm7.467-5.837C19.204 8.153 20 10 20 12c0 2.467-2.54 4.505-5 4.505h.021-2.629l-.576 3.65a.998.998 0 01-.988.844l-2.712-.002a.5.5 0 01-.494-.578L7.846 19" /></svg>
                  </div>
                  <div class="mb-1 flex justify-center">
                     <a href="{{route('Volunteer_payment.index')}}" class="inline-flex items-center text-blue-600 hover:underline">
                     <h5 class="mb-2 text-2xl font-semibold tracking-tight text-blue-900 dark:text-white"> {{ $volunteerPaymentCount }} Volunteers Payment</h5>
                     </a>
                  </div>
                  <div class="flex justify-end" style="{{$showAddLink}}">
                     <a href="{{route('Volunteer_payment.create')}}" class="inline-flex items-center text-blue-600 hover:underline">
                     <svg class="h-5 w-5 text-blue-700"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" />  <line x1="12" y1="8" x2="12" y2="16" />  <line x1="8" y1="12" x2="16" y2="12" /></svg>
                     </a>
                  </div>
               </div>
            </div>

            <div class="w-1/4 p-2">
               <div class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                  <div class="flex justify-left">
                     <svg class="h-16 w-16 text-blue-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />  <circle cx="9" cy="7" r="4" />  <path d="M23 21v-2a4 4 0 0 0-3-3.87" />  <path d="M16 3.13a4 4 0 0 1 0 7.75" /></svg>
                  </div>
                  <div class="mb-1 flex justify-center">
                     <a href="{{route('volunteer.index')}}" class="inline-flex items-center text-blue-600 hover:underline">
                     <h5 class="mb-2 text-2xl font-semibold tracking-tight text-blue-900 dark:text-white"> {{ $UserCount }} Users</h5>
                     </a>
                  </div>
                  <div class="flex justify-end" style="{{$showAddLink}}">
                     <a href="{{route('volunteer.add')}}" class="inline-flex items-center text-blue-600 hover:underline">
                     <svg class="h-5 w-5 text-blue-700"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" />  <line x1="12" y1="8" x2="12" y2="16" />  <line x1="8" y1="12" x2="16" y2="12" /></svg>
                     </a>
                  </div>
               </div>
            </div>

            <div class="w-1/4 p-2">
               <div class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                  <div class="flex justify-left">
                     <svg class="h-16 w-16 text-blue-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <rect x="4" y="5" width="16" height="16" rx="2" />  <line x1="16" y1="3" x2="16" y2="7" />  <line x1="8" y1="3" x2="8" y2="7" />  <line x1="4" y1="11" x2="20" y2="11" />  <rect x="8" y="15" width="2" height="2" /></svg>
                  </div>
                  <div class="mb-1 flex justify-center">
                     <a href="{{route('events.index')}}" class="inline-flex items-center text-blue-600 hover:underline">
                     <h5 class="mb-2 text-2xl font-semibold tracking-tight text-blue-900 dark:text-white"> {{ $eventInfoCount }} Event Info </h5>
                     </a>
                  </div>
                  <div class="flex justify-end" style="{{$showAddLink}}">
                     <a href="{{route('events.create')}}" class="inline-flex items-center text-blue-600 hover:underline">
                     <svg class="h-5 w-5 text-blue-700"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" />  <line x1="12" y1="8" x2="12" y2="16" />  <line x1="8" y1="12" x2="16" y2="12" /></svg>
                     </a>
                  </div>
               </div>
            </div>

            <div class="w-1/4 p-2">
               <div class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                  <div class="flex justify-left">
                     <svg class="h-16 w-16 text-blue-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M15.05 5A5 5 0 0 1 19 8.95M15.05 1A9 9 0 0 1 23 8.94m-1 7.98v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" /></svg>
                  </div>
                  <div class="mb-1 flex justify-center">
                     <a href="{{route('Contact_info.index')}}" class="inline-flex items-center text-blue-600 hover:underline">
                     <h5 class="mb-2 text-2xl font-semibold tracking-tight text-blue-900 dark:text-white"> {{ $contactInfoCount }} Contact Info</h5>
                     </a>
                  </div>
                  <div class="flex justify-end" style="{{$showAddLink}}">
                     <a href="{{route('Contact_info.create')}}" class="inline-flex items-center text-blue-600 hover:underline">
                     <svg class="h-5 w-5 text-blue-700"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" />  <line x1="12" y1="8" x2="12" y2="16" />  <line x1="8" y1="12" x2="16" y2="12" /></svg>
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <!-- Start row 3 ----------------------------------------------- -->
         <div class="flex py-2">
            <div class="w-1/4 p-2">
               <div class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                  <div class="flex justify-left">
                     <svg class="h-16 w-16 text-blue-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="7" r="4" />  <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" /></svg>
                  </div>
                  <div class="mb-1 flex justify-center">
                     <a href="{{route('authors.index')}}" class="inline-flex items-center text-blue-600 hover:underline">
                     <h5 class="mb-2 text-2xl font-semibold tracking-tight text-blue-900 dark:text-white"> {{ $authorCount }} Authors</h5>
                     </a>
                  </div>
                  <div class="flex justify-end" style="{{$showAddLink}}">
                     <a href="{{route('authors.create')}}" class="inline-flex items-center text-blue-600 hover:underline">
                     <svg class="h-5 w-5 text-blue-700"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" />  <line x1="12" y1="8" x2="12" y2="16" />  <line x1="8" y1="12" x2="16" y2="12" /></svg>
                     </a>
                  </div>
               </div>
            </div>

            <div class="w-1/4 p-2">
               <div class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                  <div class="flex justify-left">
                     <svg class="h-16 w-16 text-blue-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M7 9a2 2 0 1 1 2 -2v10a2 2 0 1 1 -2 -2h10a2 2 0 1 1 -2 2v-10a2 2 0 1 1 2 2h-10" /></svg>
                  </div>
                  <div class="mb-1 flex justify-center">
                     <a href="{{route('category.index')}}" class="inline-flex items-center text-blue-600 hover:underline">
                     <h5 class="mb-2 text-2xl font-semibold tracking-tight text-blue-900 dark:text-white"> {{ $categoryCount }} Category</h5>
                     </a>
                  </div>
                  <div class="flex justify-end" style="{{$showAddLink}}">
                     <a href="{{route('category.create')}}" class="inline-flex items-center text-blue-600 hover:underline">
                     <svg class="h-5 w-5 text-blue-700"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" />  <line x1="12" y1="8" x2="12" y2="16" />  <line x1="8" y1="12" x2="16" y2="12" /></svg>
                     </a>
                  </div>
               </div>
            </div>

            <div class="w-1/4 p-2">
               <div class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                  <div class="flex justify-left">
                     <svg class="h-16 w-16 text-blue-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <path d="M5 7h7m-2 -2v2a5 8 0 0 1 -5 8m1 -4a7 4 0 0 0 6.7 4" />  <path d="M11 19l4 -9l4 9m-.9 -2h-6.2" /></svg>
                  </div>
                  <div class="mb-1 flex justify-center">
                     <a href="{{route('language.index')}}" class="inline-flex items-center text-blue-600 hover:underline">
                     <h5 class="mb-2 text-2xl font-semibold tracking-tight text-blue-900 dark:text-white"> {{ $languageCount }} Language</h5>
                     </a>
                  </div>
                  <div class="flex justify-end" style="{{$showAddLink}}">
                     <a href="{{route('language.create')}}" class="inline-flex items-center text-blue-600 hover:underline">
                     <svg class="h-5 w-5 text-blue-700"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" />  <line x1="12" y1="8" x2="12" y2="16" />  <line x1="8" y1="12" x2="16" y2="12" /></svg>
                     </a>
                  </div>
               </div>
            </div>

            <div class="w-1/4 p-2">
               <div class="max-w-sm p-2 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                  <div class="flex justify-left">
                     <svg class="h-16 w-16 text-blue-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20" />  <path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z" /></svg>
                  </div>
                  <div class="mb-1 flex justify-center">
                     <a href="{{route('book.index')}}" class="inline-flex items-center text-blue-600 hover:underline">
                     <h5 class="mb-2 text-2xl font-semibold tracking-tight text-blue-900 dark:text-white"> {{ $bookCount }} Book</h5>
                     </a>
                  </div>
                  <div class="flex justify-end" style="{{$showAddLink}}">
                     <a href="{{route('book.create')}}" class="inline-flex items-center text-blue-600 hover:underline">
                     <svg class="h-5 w-5 text-blue-700"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" />  <line x1="12" y1="8" x2="12" y2="16" />  <line x1="8" y1="12" x2="16" y2="12" /></svg>
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <!-- End row 3 ----------------------------------------------- -->

      </div>
   </div>
</x-app-layout>