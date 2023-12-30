<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Consolidated Report for Book' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    <div class="flex justify-end"  style="cursor: pointer;">
                       <a href="{{ route('Book_stocks.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{ __('Go Back') }}</a>
                    </div>


                    <!-- Start - new layout--------------- -->
                    <div id="accordion-collapse" data-accordion="open">                        
                        
                        <!-- Book Stock -------------- -->
                        <h2 id="accordion-collapse-heading-bookStock">
                            <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-bookStock" aria-expanded="true" aria-controls="accordion-collapse-body-bookStock">
                              <span>Stocks Available at Central Zone</span>
                              <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                              </svg>
                            </button>
                        </h2>
                    
                        <div id="accordion-collapse-body-bookStock" class="hidden" aria-labelledby="accordion-collapse-heading-book-issue">
                            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead class="text-xs text-gray-700 uppercase bg-white-100 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">Book Name</th>
                                            <th scope="col" class="px-6 py-3">Quantity</th>
                                            <th scope="col" class="px-6 py-3">Unit Price</th>
                                            <th scope="col" class="px-6 py-3">Remarks</th>
                                            <th scope="col" class="px-6 py-3">Received Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bookStockResult as $data)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $data->bookName}} [{{$data->langName}} - {{$data->authName}}]
                                                </td>
                                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $data->received_quantity }}
                                                </td>
                                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $data->bookPrice }}
                                                </td>
                                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $data->remarks }}
                                                </td>
                                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ date('d-m-Y', strtotime($data->received_date)) }}
                                                </td>                                 
                                                
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <!-- Book issued -------------- -->
                        <h2 id="accordion-collapse-heading-issued">
                            <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-issued" aria-expanded="true" aria-controls="accordion-collapse-body-issued">
                              <span>Books Issued to Volunteers</span>
                              <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                              </svg>
                            </button>
                        </h2>
                    
                        <div id="accordion-collapse-body-issued" class="hidden" aria-labelledby="accordion-collapse-heading-book-issue">
                            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead class="text-xs text-gray-700 uppercase bg-white-100 dark:bg-gray-700 dark:text-gray-400">
                                        <th scope="col" class="px-6 py-3">Book</th>
                                        <th scope="col" class="px-6 py-3">Issued To</th>
                                        <th scope="col" class="px-6 py-3">Quantity</th>
                                        <th scope="col" class="px-6 py-3">Unit Price</th>
                                        <th scope="col" class="px-6 py-3">Total Amount</th>
                                        <th scope="col" class="px-6 py-3">Remarks</th>
                                        <th scope="col" class="px-6 py-3">Issued Date</th>
                                    </thead>
                                    <tbody>
                                        @foreach($bookIssueResult as $data)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $data->bookName}} [{{$data->langName}} - {{$data->authName}}]
                                                </td>
                                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $data->volunteerName }}
                                                </td>
                                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $data->issued_quantity }}
                                                </td>
                                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $data->bookPrice}}
                                                </td>
                                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $data->bookPrice * $data->issued_quantity}}
                                                </td>
                                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ substr($data->remarks, 0, 40) }}..
                                                </td>
                                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ date('d-m-Y', strtotime($data->issued_date)) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <!-- ---------------Return------------------------------- -->
                        <h2 id="accordion-collapse-heading-Returned">
                            <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-Returned" aria-expanded="true" aria-controls="accordion-collapse-body-Returned">
                              <span>Books Returned by Volunteers</span>
                              <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                              </svg>
                            </button>
                        </h2>
                    
                        <div id="accordion-collapse-body-Returned" class="hidden" aria-labelledby="accordion-collapse-heading-book-issue">
                            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead class="text-xs text-gray-700 uppercase bg-white-100 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">Book</th>
                                            <th scope="col" class="px-6 py-3">Returned By</th>
                                            <th scope="col" class="px-6 py-3">Quantity</th>
                                            <th scope="col" class="px-6 py-3">Unit Price</th>
                                            <th scope="col" class="px-6 py-3">Total Amount</th>
                                            <th scope="col" class="px-6 py-3">Remarks</th>
                                            <th scope="col" class="px-6 py-3">Returned Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bookReturnResult as $data)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $data->bookName}} [{{$data->langName}} - {{$data->authName}}]
                                                </td>
                                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $data->volunteerName }}
                                                </td>
                                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $data->returned_quantity }}
                                                </td>
                                                
                                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $data->bookPrice}}
                                                </td>
                                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $data->bookPrice * $data->returned_quantity}}
                                                </td>

                                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ substr($data->remarks, 0, 40) }}..
                                                </td>
                                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ date('d-m-Y', strtotime($data->returned_date)) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                        <!-- ---------------Sell------------------------------- -->
                        <h2 id="accordion-collapse-heading-Sell">
                            <button type="button" class="flex items-center justify-between w-full p-5 font-medium text-left text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800" data-accordion-target="#accordion-collapse-body-Sell" aria-expanded="true" aria-controls="accordion-collapse-body-Sell">
                              <span>Books Distributed by Volunteers</span>
                              <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
                              </svg>
                            </button>
                        </h2>
                    
                        <div id="accordion-collapse-body-Sell" class="hidden" aria-labelledby="accordion-collapse-heading-book-issue">
                            <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                        <thead class="text-xs text-gray-700 uppercase bg-white-100 dark:bg-gray-700 dark:text-gray-400">
                                        <tr>
                                            <th scope="col" class="px-6 py-3">Book</th>
                                            <th scope="col" class="px-6 py-3">Distributed by</th>
                                            <th scope="col" class="px-6 py-3">Quantity</th>
                                            <th scope="col" class="px-6 py-3">Unit Price</th>
                                            <th scope="col" class="px-6 py-3">Total Amount</th>
                                            <th scope="col" class="px-6 py-3">Remarks</th>
                                            <th scope="col" class="px-6 py-3">Distributed Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($bookSellResult as $data)
                                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $data->bookName}} [{{$data->langName}} - {{$data->authName}}]
                                                </td>
                                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $data->volunteerName }}
                                                </td>
                                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $data->soled_quantity }}
                                                </td>
                                                
                                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $data->bookPrice}}
                                                </td>
                                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ $data->bookPrice * $data->soled_quantity}}
                                                </td>

                                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ substr($data->remarks, 0, 40) }}..
                                                </td>
                                                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    {{ date('d-m-Y', strtotime($data->soled_date)) }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <br>

                    </div>
                    <!-- end - new layout--------------- -->

                </div>
            </div>
        </div>
    </div>

   
</x-app-layout>