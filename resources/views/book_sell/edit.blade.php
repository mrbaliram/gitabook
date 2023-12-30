<x-app-layout>
    <script type="text/javascript">
        $(document).ready(function(){
             $("#saveBtn").click(function(){
                if ($("#volunteer_id").val() == ''){
                     alert('Please select volunteer')
                    return false;
                }else if($("#book_id").val() == ''){
                     alert('Please select book')
                    return false;
                }else if(Number($("#soled_quantity").val()) < 1){
                     alert('Issue quantity should be grater than 0')
                    return false;
                }else if($("#bookCanSell").val() == 0){
                    alert('This books are not into stock (0 stock)')
                    return false;
                }else if(Number($("#bookCanSell").val()) < Number($("#soled_quantity").val())){
                    alert('Sell quantity ('+$("#soled_quantity").val()+') should be less than Books available for sell quantity ('+$("#bookCanSell").val()+')')
                    return false;
                }else{
                    return true;
                }

            });

            // $( "#volunteer_id" ).change(function(){
            //     var $varVolunteerId = Number($("#volunteer_id").val());
            //     if($varVolunteerId != ''){
            //         $.getJSON("/Book_Return/"+ $varVolunteerId +"/get_book_base_on_volunteer", function(jsonData){
            //             $('#book_id').find('option:not(:first)').remove();
            //             $.each(jsonData, function(i,data){
            //                 $('#book_id').append($("<option></option>")
            //                     .attr("value", data.book_id)
            //                     .text(data.bookName+' ['+data.langName+' - '+data.authName+']'));
            //             });
            //         });
            //     }
            // });

            $( "#book_id" ).change(function(){
                var $sum_of_issueBook = 0;
                var $sum_of_returnBook = 0;
                var $sum_of_sellBook = 0;
                var $remainBook = 0;
                var $bookId = Number($("#book_id").val());
                var $varVolunteerId = Number($("#volunteer_id").val());
                if($bookId != ''){
                    // check this book how many issued $varVolunteerId
                    $.getJSON("/Book_Return/"+ $bookId +"/volunteerId/"+ $varVolunteerId +"/get_issure_book_base_on_volunteer", function(jsonData){
                        $varBookPrice = "";
                        $.each(jsonData, function(i,data){
                           $sum_of_issueBook += data.issued_quantity;
                           $varBookPrice = data.bookPrice;
                        });

                        $("#bookIssueToVolunteerFrm").val($sum_of_issueBook);
                        $("#validationMSG1").html("Issued Qty = " + $sum_of_issueBook);
                        $("#bookPriceFrm").val($varBookPrice);
                        
                    });

                    // check this book how many returns
                    $.getJSON("/Book_Return/"+ $bookId +"/volunteerId/"+ $varVolunteerId +"/get_return_book_base_on_volunteer", function(jsonData){
                        $.each(jsonData, function(i,data){
                           $sum_of_returnBook += data.returned_quantity;
                        });
                        $("#bookReturnByVolunteerFrm").val($sum_of_returnBook);
                        $("#validationMSG2").html("Returned Qty = " + $sum_of_returnBook);
                        
                    });

                    $.getJSON("/Book_Return/"+ $bookId +"/volunteerId/"+ $varVolunteerId +"/get_sell_book_base_on_volunteer", function(jsonData){
                        $.each(jsonData, function(i,data){
                           $sum_of_sellBook += data.soled_quantity;
                        });
                        $("#validationMSG3").html("Sold Qty = " + $sum_of_sellBook);

                        $bookQTY = parseFloat($('#soled_quantity').val());
                        $remainBook = ($sum_of_issueBook + $bookQTY)  - ($sum_of_returnBook + $sum_of_sellBook);

                        $("#bookCanSell").val($remainBook);
                        $("#validationMSG4").html("Available Book for Sell = " + $remainBook);
                        
                        $("#totalBookPrice").html("Unit Price  ("+$varBookPrice+ ") * Qty (" + $bookQTY+") = " + $bookQTY * $varBookPrice);


                    });


                }
            });

            $('#soled_quantity').keyup(function() {
                $bookQTY = parseFloat($('#soled_quantity').val());
                $eachBookPrice = parseFloat($("#bookPriceFrm").val())
                $(".bookPriceTotal").val($bookQTY * $eachBookPrice);
                $("#totalBookPrice").html("Unit Price  ("+$eachBookPrice+ " ) * Qty ( " + $bookQTY+") = " + $bookQTY * $eachBookPrice);
                
            });

            $("#optionalInfoHeader").click(function(){
                $('#optionalInfoBody').toggle(1000);
            });
            
        });

    </script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Update Sold Book' }}
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

                    <form action="{{ route('Book_Sell.update', $bookSellResult->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') 
                    
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="volunteer id" class="block text-gray-600 font-medium">Select Volunteer<span style="color:red"> *</span></label>
                                <select disabled id="volunteer_id" name="volunteer_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">--Choose one option--</option>
                                    @foreach($userResult as $userData)
                                        <option value="{{ $userData->id }}"  {{ $bookSellResult->volunteer_id == $userData->id ? 'Selected' : '' }}> {{ $userData->name }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <label for="Book stock" class="block text-gray-600 font-medium">Select Book<span style="color:red"> *</span></label>
                                <select id="book_id" name="book_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach($bookResult as $bookData)
                                        @if($bookData->id == $bookSellResult->book_id)
                                            <option value="{{ $bookData->id }}" > {{ $bookData->name }} [{{ $bookData->price }}] </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>


                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="Issued" class="block text-gray-600 font-medium">Sell Qty<span style="color:red"> *</span>
                                    &nbsp;&nbsp;&nbsp;&nbsp;<span id="validationMSG1" style="color: red;"></span>&nbsp;&nbsp;
                                    <span id="validationMSG2" style="color: blue;"></span>&nbsp;&nbsp;
                                    <span id="validationMSG3" style="color: green;"></span>&nbsp;&nbsp;
                                </label>
                                <input type="number" name="soled_quantity" id="soled_quantity" value="{{$bookSellResult->soled_quantity}}" class="border rounded-md w-full py-2 px-3 text-gray-700" >
                                <label for="Issued" class="block text-gray-600 font-medium">
                                    <span id="validationMSG4" style="color: green;"></span>
                                </label>
                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <label for="price" class="block text-gray-600 font-medium">Total Amount <!-- (Book price * quintity) --> <span id="totalBookPrice" style="color: green;"></span></label>
                                <input type="hidden" name="price" value="{{$bookSellResult->price}}" class="border rounded-md w-full py-2 px-3 text-gray-700 bookPriceTotal">
                                <input id="soled_price" type="number" name="soled_price" value="{{$bookSellResult->soled_price}}" class="border rounded-md w-full py-2 px-3 text-gray-700 bookPriceTotal">

                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="soled_date" class="block text-gray-600 font-medium">Sell Date<span style="color:red"> *</span></label>
                            <input type="date" name="soled_date" id="soled_date" value="{{date('Y-m-d', strtotime($bookSellResult->soled_date))}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                        </div>
                        
                        <div class="mb-4" id="optionalInfoHeader">Other Optional Information</div>
                        
                        <div id="optionalInfoBody" style="display: none;">
                            <div class="grid md:grid-cols-2 md:gap-6">
                                <div class="relative z-0 w-full mb-6 group">
                                    <label for="name" class="block text-gray-600 font-medium">Customer Name</label>
                                    <input type="text" name="name" id="name" value="{{$bookSellResult->name}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <label for="phone" class="block text-gray-600 font-medium">Phone / Mobile</label>
                                    <input type="text" name="phone" id="phone" value="{{$bookSellResult->phone}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                                </div>
                            </div>
                            <div class="grid md:grid-cols-2 md:gap-6">
                                <div class="relative z-0 w-full mb-6 group">
                                    <label for="Address" class="block text-gray-600 font-medium">Address</label>
                                    <input type="text" name="address" id="address" value="{{$bookSellResult->address}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                                </div>
                                <div class="mb-6">
                                    <label for="remarks" class="block text-gray-600 font-medium">Remarks</label>
                                    <input type="text" name="remarks" id="remarks" value="{{$bookSellResult->remarks}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                                </div>
                            </div>
                        </div>

                        <div class="mb-4" align="center">
                            
                            <button id="saveBtn" type="submit" class="px-5 py-2 mr-2 mb-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> {{ 'Update' }}</button>
                            
                            <a href="{{ route('Book_Sell.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{ __('Go Back') }}</a>

                            <!-- <button type="submit" id="saveBtn" class="bg-blue-500 text-red rounded-md py-2 px-4"> {{ 'Update' }}</button>
                            <button type="submit"  id="backBtn" class="bg-blue-500 text-red rounded-md py-2 px-4">
                                <x-nav-link :href="route('Book_Sell.index')">
                                    {{ __('Go Back') }}
                                </x-nav-link>
                            </button> -->
                        </div>
                    
                    <input type="hidden" name="bookCanSell" id="bookCanSell" value="0">

                    <input type="hidden" name="bookIssueToVolunteerFrm" id="bookIssueToVolunteerFrm" value="0">

                    <input type="hidden" name="bookReturnByVolunteerFrm" id="bookReturnByVolunteerFrm" value="0">

                    <input type="hidden" name="bookPriceFrm" id="bookPriceFrm" value="0">

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script type="text/javascript">

    $(document).ready(function(){
        $('#book_id').change();
        //$('#volunteer_id').change();
    });

</script>
