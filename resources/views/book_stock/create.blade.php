<x-app-layout>

    <script type="text/javascript">    
        $(document).ready(function(){
             $(".saveBtn").click(function(){     //backBtn      //saveBtn                 
                if ($("#language_id").val() == ''){
                     alert('Please select Language')
                    return false;
                }else if($("#book_id").val() == ''){
                     alert('Please select Book')
                    return false;
                }else if(Number($("#received_quantity").val()) < 1){
                     alert('Quantity should be grater than 0')
                    return false;
                }else{
                    return true;
                }
            });

            $( "#language_id" ).change(function(){
                $language_id = $("#language_id").val();
                if($language_id != ''){
                    $.getJSON("/book/"+ $language_id +"/get_book_based_on_language", function(jsonData){
                        $('#book_id').find('option:not(:first)').remove();
                        $.each(jsonData, function(i,data){
                            if ( $("#book_id option[value="+data.id+"]").length == 0 ){
                                $('#book_id').append($("<option></option>")
                                .attr("value", data.id)
                                .text(data.name + ' [ ' +data.price+ ' ]'));
                            }
                        });
                    });
                }
            });

        });
    </script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Add Order Transaction' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <?php 
                        $defaul_book_id =  0;
                        if(session()->has('session_book_id')){
                            $defaul_book_id =  session()->get('session_book_id');
                        }
                        $defaul_invoice_id =  0;
                        if(session()->has('session_invoice_id')){
                            $defaul_invoice_id =  session()->get('session_invoice_id');
                        }
                        $defaule_language_id =  0;
                        if(session()->has('session_language_id')){
                            $defaule_language_id =  session()->get('session_language_id');
                        }
                        $defaule_qty =  "";
                        if(session()->has('session_qty')){
                            $defaule_qty =  session()->get('session_qty');
                        }
                        $defaule_received_date =  date('Y-m-d');
                        if(session()->has('session_received_date')){
                            $defaule_received_date =  session()->get('session_received_date');
                        }
                        
                    ?>
                   
                    @if(session()->has('success'))
                        <div style="color: green;" class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                          <span class="font-medium">Success alert! &nbsp; </span> 
                          {{ session()->get('success') }}
                        </div>

                    @endif

                    @if (session('error'))
                        <div class="flex p-4 mb-4 text-sm text-asterisk border border-red-300 rounded-lg bg-red-50" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                    <div class="flex p-4 mb-4 text-sm text-asterisk border border-red-300 rounded-lg bg-red-50" role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li><b>{{ $error }}</b> can't be blank.</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('Book_stocks.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="language_id" class="block text-gray-600 font-medium">Select Language<span style="color:red"> *</span></label>
                                <select id="language_id" name="language_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="">--Choose one option--</option>
                                    @foreach($languageResults as $languageData)
                                        <option value="{{ $languageData->id }}" {{   $languageData->id == $defaule_language_id ? 'Selected' : '' }}> {{ $languageData->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="Book stock" class="block text-gray-600 font-medium">Select Book<span style="color:red"> *</span></label>
                                <select id="book_id" name="book_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">--Choose one option--</option>
                                </select>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="invoice_id" class="block text-gray-600 font-medium">Select Invoice<span style="color:red"> *</span></label>
                                <select id="invoice_id" name="invoice_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                  @foreach($invoiceResult as $invoiceData)
                                        <option value="{{ $invoiceData->id }}"  {{   $invoiceData->id == $defaul_invoice_id ? 'Selected' : '' }}> 
                                            {{ $invoiceData->invoice_number }} [ {{ date('d-m-Y', strtotime($invoiceData->invoice_date)) }} ] - {{ $invoiceData->shipping_addres }} 
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="Received" class="block text-gray-600 font-medium">Received Quantity<span style="color:red"> *</span></label>
                                <input type="number" name="received_quantity" id="received_quantity" value="{{$defaule_qty}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="received_date" class="block text-gray-600 font-medium">Received date<span style="color:red"> *</span></label>
                                <input type="date" name="received_date" id="received_date" value="{{$defaule_received_date}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="remarks" class="block text-gray-600 font-medium">Remarks</label>
                                <input type="text" name="remarks" id="remarks" value="" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div>
                        </div>
                        
                        <div class="mb-4" align="center">
                         
                            <input id="saveBtn" name="saveBtn" type="submit" class="px-5 py-2 mr-2 mb-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 saveBtn" value="Add Order">

                            <input id="saveAndContinueBtn" name="saveAndContinueBtn" type="submit" class="px-5 py-2 mr-2 mb-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 saveBtn" value="Save And Continue">

                            <a href="{{ route('Book_stocks.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{ __('Go Back') }}</a>

                        </div>
                    </form>

                    <!-- show the top 10 record recent added -->
                    <div class="mb-4" align="left">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ 'Latest 10 transactions' }}<br>
                        </h2>
                    </div>
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">
         
                                <tr>
                                    <th scope="col" class="px-6 py-3">Book Name</th>
                                    <th scope="col" class="px-6 py-3">Language</th>
                                    <th scope="col" class="px-6 py-3" align="center">Received Qty</th>
                                    <th scope="col" class="px-6 py-3" align="center">Unit Price</th>
                                    <th scope="col" class="px-6 py-3" align="center">Amount</th>
                                    <th scope="col" class="px-6 py-3">Received Date</th>
                                    <th scope="col" class="px-6 py-3">invoice number</th>
                                    
                                </tr>
                            </thead>
                            <tbody  id="dataListTable">
                                @foreach($results as $data)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $data->bookName}} [ {{ $data->bookPrice}} ]
                                        </td>
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$data->langName}}
                                        </td>
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" align="center">
                                            {{ $data->received_quantity }}
                                        </td>
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" align="center">
                                            {{$data->bookPrice}}
                                        </td>
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" align="center">
                                            {{$data->bookPrice * $data->received_quantity}}
                                        </td>
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ date('d-m-Y', strtotime($data->received_date)) }}
                                        </td>
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $data->invoiceNumber }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                      
                    </div>
                    <!-- end to show the record -->

                </div> 
            </div>
        </div>
    </div>
</x-app-layout>

<script type="text/javascript">

    $(document).ready(function(){
        $('#language_id').change();
        
    });

</script>