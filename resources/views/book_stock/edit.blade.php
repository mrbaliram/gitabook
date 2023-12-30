<x-app-layout>
    <script type="text/javascript">    
        $(document).ready(function(){
             $("#saveBtn").click(function(){     //backBtn      //saveBtn                 
                if ($("#book_id").val() == ''){
                     alert('Please select book')
                    return false;
                }else if(Number($("#received_quantity").val()) < 1){
                     alert('Quantity should be grater than 0')
                    return false;
                }else{
                    return true;
                }
            });

            // change book list based on lang selection
            $( "#language_id" ).change(function(){
                $language_id = $("#language_id").val();
                if($language_id != ''){
                    $.getJSON("/book/"+ $language_id +"/get_book_based_on_language", function(jsonData){
                        //$('#book_id').find('option:not(:first)').remove();
                        $('#book_id').empty().append('<option selected="selected" value="">--Choose one option--</option>');
;
                        $.each(jsonData, function(i,data){
                            if ( $("#book_id option[value="+data.id+"]").length == 0 ){
                                $('#book_id').append($("<option></option>")
                                .attr("value", data.id)
                                .text(data.name + ' [' + data.price+']'));
                                //languageName
                            }
                        });
                    });
                }
            });

        });
    </script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Update Order Transaction' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                        
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
                    
                    <form action="{{ route('Book_stocks.update', $bookStockResult->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT') 


                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="language_id" class="block text-gray-600 font-medium">Select Language<span style="color:red"> *</span></label>
                                <select id="language_id" name="language_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="">--Choose one option--</option>
                                    @foreach($languageResults as $languageData)
                                        <option value="{{ $languageData->id }}" {{   $languageData->id == $getBookDetails->language_id ? 'Selected' : '' }}> {{ $languageData->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="Book stock" class="block text-gray-600 font-medium">Select Book<span style="color:red"> *</span></label>
                                <select id="book_id" name="book_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                                  @foreach($bookResult as $bookData)
                                        <option value="{{ $bookData->id }}" {{ $bookStockResult->book_id == $bookData->id ? 'Selected' : '' }}> {{ $bookData->name }} [ {{ $bookData->price }}] </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="invoice_id" class="block text-gray-600 font-medium">Select Invoice<span style="color:red"> *</span></label>
                                <select id="invoice_id" name="invoice_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                  @foreach($invoiceResult as $invoiceData)
                                        <option  value="{{ $invoiceData->id }}"  {{ $bookStockResult->invoice_id == $invoiceData->id ? 'Selected' : '' }}> {{ $invoiceData->invoice_number }} [{{ $invoiceData->shipping_addres }}] </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="Received" class="block text-gray-600 font-medium">Received quantity<span style="color:red"> *</span></label>
                                <input type="number" name="received_quantity" id="received_quantity" value="{{$bookStockResult->received_quantity}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="received_date" class="block text-gray-600 font-medium">Received date<span style="color:red"> *</span></label>

                                <input type="date" name="received_date" id="received_date" value="{{date('Y-m-d', strtotime($bookStockResult->received_date))}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="remarks" class="block text-gray-600 font-medium">Remarks</label>
                                <input type="text" name="remarks" id="remarks" value="{{$bookStockResult->remarks}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div>
                        </div>
                            

                        <div class="mb-4" align="center">
                            
                            <button id="saveBtn" type="submit" class="px-5 py-2 mr-2 mb-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> {{ 'Update Order' }}</button>
                            
                            <a href="{{ route('Book_stocks.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{ __('Go Back') }}</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>