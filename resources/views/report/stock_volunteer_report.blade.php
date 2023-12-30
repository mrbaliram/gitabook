<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Balance Stock With Volunteer Report') }}

        </h2>
    </x-slot>
    <div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @if(session()->has('success'))                        
                        <div style="color: green;" class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                          <span class="font-medium">Success alert!</span> 
                          {{ session()->get('success') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('reports.volunteer_report') }}" method="POST" class="inline">
                        @csrf
                        @method('GET')
                        
                        <!-- volunteer -->

                        <div class="mb-4">
                            <label for="volunteer id" class="block text-gray-600 font-medium">Select Volunteer<span style="color:red"> *</span></label>
                            <select id="volunteer_id" name="volunteer_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="0" {{ $selected_volunteer_id == 0 ? 'Selected' : '' }}>--Show All--</option>
                                @foreach($userResult as $userData)
                                    @if(Auth::user()->type == 'admin' || Auth::user()->id == $userData->id)
                                    <option value="{{ $userData->id }}" {{ $selected_volunteer_id == $userData->id ? 'Selected' : '' }}> {{ $userData->name }} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <!-- language and genearte button -->
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group flex">
                                <select id="language_id" name="language_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    
                                    <option value="0" {{ $selected_langid == 0 ? 'Selected' : '' }}>--Show All--</option>
                                    @foreach($languageResults as $languageData)
                                        <option value="{{ $languageData->id }}"  {{ $selected_langid == $languageData->id ? 'Selected' : '' }}> {{ $languageData->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <button id="searchBtn" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" >
                                <span class="flex"><svg class="h-5 w-5 text-white-700"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="10" cy="10" r="7" />  <line x1="21" y1="21" x2="15" y2="15" /></svg>
                                &nbsp;&nbsp;Generate Report</span></button>
                            </div>
                        </div>

                    </form>
                    
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">         
                                <tr>
                                    <th scope="col" class="px-6 py-3">Name</th>
                                    <th scope="col" class="px-6 py-3">Issued Qty</th>
                                    <th scope="col" class="px-6 py-3">Returned Qty</th>
                                    <th scope="col" class="px-6 py-3">Sold Qty</th>
                                    <th scope="col" class="px-6 py-3">Balance Qty</th>
                                    <th scope="col" class="px-6 py-3">Balance Amount</th>
                                </tr>
                            </thead>
                            
                            <tbody>

                                        <?php 
                                            $issued_book_id_array = array();
                                            $total_issuedQty = 0;
                                         ?>


                                        @foreach($bookIssueResult as $data)

                                            <?php

                                            $total_issuedQty += $data->issued_quantity;

                                            if (!in_array($data->book_id, $issued_book_id_array)) {

                                                array_push($issued_book_id_array, $data->book_id);
                                            
                                                ?>
                                               
                                                <?php
                                            }

                                        ?>
                                        @endforeach


                                        <?php
                                            $book_total_issue   = 0;
                                            $book_total_return  = 0;
                                            $book_total_sell    = 0;
                                            $book_total_remain  = 0;
                                            $book_total_remain_all  = 0;

                                            foreach ($issued_book_id_array as $bookId) {
                                              //echo "$bookId <br>";
                                                $thisBookIssue = 0;
                                                $thisBookName = "";
                                                $total_bookPriceBalance = 0;
                                                foreach($bookIssueResult as $bookIssueData){
                                                    if($bookIssueData->book_id == $bookId){
                                                        $thisBookIssue += $bookIssueData->issued_quantity;
                                                        $thisBookName =  $bookIssueData->bookName .' ['. $bookIssueData->langName .'-'. $bookIssueData->bookPrice.']';
                                                        $total_bookPriceBalance = $bookIssueData->bookPrice;
                                                    }
                                                }
                                                $book_total_issue += $thisBookIssue;
                                                // get return record
                                                $thisBookReturn = 0;
                                                foreach($bookReturnResult as $bookReturnData){
                                                    if($bookReturnData->book_id == $bookId){
                                                        $thisBookReturn += $bookReturnData->returned_quantity;
                                                    }
                                                }
                                                $book_total_return += $thisBookReturn;
                                                // get sell record 
                                                $thisBookSell = 0;
                                                foreach($bookSellResult as $bookSellData){
                                                    if($bookSellData->book_id == $bookId){
                                                        $thisBookSell += $bookSellData->soled_quantity;
                                                    }
                                                }
                                                $book_total_sell += $thisBookSell;
                                                ?>

                                                 <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{$thisBookName}} 
                                                    </td>
                                                    
                                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white issued_quantity_sum">
                                                        {{$thisBookIssue}}
                                                    </td>
                                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{$thisBookReturn}}
                                                    </td>
                                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white issued_book_price_sum">
                                                       {{$thisBookSell}}
                                                    </td>
                                                    
                                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        <?php 
                                                        $remainThisBook = $thisBookIssue - ($thisBookReturn + $thisBookSell);
                                                        $book_total_remain += $remainThisBook;
                                                        ?>
                                                        {{$remainThisBook}}
                                                    </td>

                                                    <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                        {{$total_bookPriceBalance * $remainThisBook}}
                                                        <?php $book_total_remain_all += $total_bookPriceBalance * $remainThisBook; ?>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        ?>
                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-right">
                                                Total
                                            </td>
                                            
                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white issued_quantity_sum">
                                                {{$book_total_issue}}
                                            </td>
                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{$book_total_return}}
                                            </td>
                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white issued_book_price_sum">
                                               {{$book_total_sell}}
                                            </td>
                                            
                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{$book_total_remain}}
                                            </td>

                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                {{$book_total_remain_all}}
                                            </td>

                                        </tr>
                                    </tbody>
                            
                        </table>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>