<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Stock Report') }}

        </h2>
    </x-slot>
    <div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto bg-grey-lighter min-h-screen">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @if(session()->has('success'))                        
                        <div style="color: green;" class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                          <span class="font-medium">Success alert!</span> 
                          {{ session()->get('success') }}
                        </div>
                    @endif
                    
                    <form action="{{ route('reports.stock_report') }}" method="POST" class="inline">
                        @csrf
                        @method('GET')
                        
                         <div class="mb-6">

                                <label for="invoice_id" class="block text-gray-600 font-medium">Select Invoice<span style="color:red"> *</span></label>
                                <select id="invoice_id" name="invoice_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                    <option value="0" {{ $invoiceId == 0 ? 'Selected' : '' }}>--Show All--</option>

                                    @foreach($invoiceResult as $invoiceData)
                                        <option value="{{ $invoiceData->id }}"  {{ $invoiceId == $invoiceData->id ? 'Selected' : '' }}> {{ $invoiceData->invoice_number }} [ {{ date('d-m-Y', strtotime($invoiceData->invoice_date)) }} ] - {{ $invoiceData->shipping_addres }} </option>
                                    @endforeach
                                </select>
                            </div>

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group flex">
                                <select id="language_id" name="language_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    
                                    <option value="0" {{ $langid == 0 ? 'Selected' : '' }}>--Show All--</option>
                                    @foreach($languageResults as $languageData)
                                        <option value="{{ $languageData->id }}"  {{ $langid == $languageData->id ? 'Selected' : '' }}> {{ $languageData->name }} </option>
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

                                    <th scope="col" class="px-6 py-3">Invoice</th>
                                    <th scope="col" class="px-6 py-3">Name</th>
                                    <th scope="col" class="px-6 py-3" align="center">Unit Price</th>
                                    <th scope="col" class="px-6 py-3" align="center">Received Qty</th>
                                    <th scope="col" class="px-6 py-3" align="center">Issued Qty</th>
                                    <th scope="col" class="px-6 py-3" align="center">Returned Qty</th>
                                    
                                    <th scope="col" class="px-6 py-3" align="center">Central Point Balance Qty</th>
                                    <th scope="col" class="px-6 py-3" align="center">Balance Amount</th>
                                </tr>
                            </thead>
                            
                            <tbody id="dataListTable">
                                    <?php $totalBalance_amt = 0 ?>
                                    <?php $totalStock_amt = 0 ?>
                                    <?php $totalIssue_amt = 0 ?>
                                    <?php $totalReturn_amt = 0 ?>
                                    <?php $totalBalance_qty = 0 ?>
                                    <?php $totalStock_allBook = 0 ?>
                                    <?php $totalIssue_allBook = 0 ?>
                                    <?php $totalReturn_allBook = 0 ?>
                                    
                                    @foreach($bookResult as $data)
                                       @if($data->totalStock > 0)

                                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" align="center">
                                                {{ $data->invoiceNum }}
                                            </td>

                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white flex">
                                                <?php 
                                                    $totalSold_allBook = 0;
                                                    $sentence = $data->name . '-' . $data->langName;
                                                    $allowedlimit = 50;

                                                    echo (mb_strlen($sentence)>$allowedlimit) ? mb_substr($sentence,0,$allowedlimit)."...." : $sentence;
                                                ?>
                                                 &nbsp;
                                                <a target="_new" title="Show Book Details" href="{{ route('book.show', $data->id) }}" class="text-blue-600 hover:underline">
                                                    <svg class="h-6 w-6 text-white-600"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <circle cx="12" cy="12" r="10" />  <line x1="12" y1="16" x2="12" y2="12" />  <line x1="12" y1="8" x2="12.01" y2="8" /></svg>
                                                </a>
                                                &nbsp;<a target="_new" title="Check Stock" href="{{ route('book.book_stock_check', $data->id) }}" class="text-blue-600 hover:underline">
                                                    <svg class="h-6 w-6 text-blue-600"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <line x1="3" y1="21" x2="21" y2="21" />  <line x1="3" y1="10" x2="21" y2="10" />  <polyline points="5 6 12 3 19 6" />  <line x1="4" y1="10" x2="4" y2="21" />  <line x1="20" y1="10" x2="20" y2="21" />  <line x1="8" y1="14" x2="8" y2="17" />  <line x1="12" y1="14" x2="12" y2="17" />  <line x1="16" y1="14" x2="16" y2="17" /></svg>
                                                </a>
                                            </td>
                                            
                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" align="center">
                                                {{ $data->price }}
                                            </td>

                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" align="center">
                                                {{ $data->totalStock}} &nbsp; ({{$data->totalStock * $data->price}})
                                                <?php $totalStock_amt += $data->totalStock * $data->price ?>
                                                <?php $totalStock_allBook += $data->totalStock ?>
                                            </td>

                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" align="center">
                                                {{ $data->totalIssue ?? 0}}  &nbsp;
                                                 ({{$data->totalIssue * $data->price}})
                                                 <?php $totalIssue_amt += $data->totalIssue * $data->price ?>
                                                 <?php $totalIssue_allBook += $data->totalIssue ?>
                                            </td>

                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" align="center">
                                                {{ $data->totalReturn ?? 0}} &nbsp;
                                                ({{$data->totalReturn * $data->price}}) 
                                                <?php $totalReturn_amt += $data->totalReturn * $data->price ?>
                                                 <?php $totalReturn_allBook += $data->totalReturn ?>
                                                
                                                
                                            </td>

                                            
                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white " align="center">
                                                <span class="flex"  align="center">
                                                    <?php $remainBook = ($data->totalStock + $data->totalReturn) - $data->totalIssue ?>
                                                {{ $remainBook }} &nbsp;
                                                
                                                <?php $totalBalance_qty += $remainBook ?>
                                                <svg data-tooltip-target="tooltip-default-{{$data->id}}" class="h-5 w-5 text-blue-600"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <circle cx="12" cy="12" r="9" />  <line x1="12" y1="17" x2="12" y2="17.01" />  <path d="M12 13.5a1.5 1.5 0 0 1 1 -1.5a2.6 2.6 0 1 0 -3 -4" /></svg>
                                            </td>

                                             <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" align="center">                             
                                                {{ ($data->price * $remainBook )}}
                                            </td>

                                        </tr>


                                        <!-- TootTips to show the calculation  -->
                                        <div id="tooltip-default-{{$data->id}}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                               Total Stock = {{ $data->totalStock }} <br>
                                               Total Return = {{ $data->totalReturn  ?? 0}}  <br>
                                               Total Issue = {{ $data->totalIssue ?? 0}} <br>
                                               (Stock + Retun) - Issue =  
                                               {{ ($data->totalStock + $data->totalReturn) - $data->totalIssue }}
                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                        </span> 
                                        <?php $totalBalance_amt += $data->price * $remainBook ?>
                                    @endif
                                @endforeach

                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            
                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" align="center">
                                               &nbsp;
                                            </td>
                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white flex" align="right"><b>Total</b>
                                            </td>
                                            
                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" align="center">
                                               &nbsp;
                                            </td>

                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" align="center">

                                               <b>{{$totalStock_allBook}}    ({{$totalStock_amt}})</b>
                                            </td>

                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" align="center">
                                                <b>{{$totalIssue_allBook}} ({{$totalIssue_amt}})</b>
                                            </td>

                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" align="center">
                                               <b>
                                                    {{$totalReturn_allBook}}
                                                    ({{$totalReturn_amt}})
                                               </b>
                                            </td>

                                            <!-- <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" align="center">
                                                {{ $data->totalSold ?? 0 }}
                                            </td> -->
                                            
                                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white " align="left">
                                                <b>{{$totalBalance_qty}}</b>
                                            </td>

                                             <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" align="center">                             
                                               <b>{{$totalBalance_amt}}</b>
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