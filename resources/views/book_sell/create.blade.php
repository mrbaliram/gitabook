<x-app-layout>

    <script type="text/javascript">

        $(document).ready(function(){

            function filterSelectOptions(selectElement, attributeName, attributeValue) {
            
                if (selectElement.data("currentFilter") != attributeValue) {
                    selectElement.data("currentFilter", attributeValue);
                    var originalHTML = selectElement.data("originalHTML");
                    if (originalHTML)
                        selectElement.html(originalHTML)
                    else {
                        var clone = selectElement.clone();
                        clone.children("option[selected]").removeAttr("selected");
                        selectElement.data("originalHTML", clone.html());
                    }
                    if (attributeValue) {
                        selectElement.children("option:not([" + attributeName + "='" + attributeValue + "'],:not([" + attributeName + "]))").remove();
                    }
                }
            }

            
            function reSetAll() { //
                $("#totalBookPrice").html("");
                $("#validationMSG1").html("");
                $("#validationMSG2").html("");
                $("#validationMSG3").html("");
                $("#validationMSG4").html("");
                $("#bookIssueToVolunteerFrm").val(0);
                $("#bookReturnByVolunteerFrm").val(0);
                $("#bookCanSell").val(0);
                $("#soled_quantity").val(0);
                $("#soled_quantity").val(0);
                $("#soled_price").val(0);
                
            }

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

            // get book based on lang selected
            $("#language_id").change( function() {
                if($("#volunteer_id").val() == ''){
                    alert('Please select volunteer first');
                    $("#language_id").val('');
                    return false;
                }else{
                    filterSelectOptions($("#book_id"), "data-attribute", $(this).val());
                    reSetAll();
                }
            });

            $( "#volunteer_id" ).change(function(){
                reSetAll();
                $("#language_id").val('');
                $("#book_id").val('');
                var $varVolunteerId = Number($("#volunteer_id").val());
                if($varVolunteerId != ''){
                    $.getJSON("/Book_Return/"+ $varVolunteerId +"/get_book_base_on_volunteer", function(jsonData){
                        //console.log(jsonData);
                        $('#book_id').find('option:not(:first)').remove();
                        $.each(jsonData, function(i,data){
                           //console.log(data.issued_quantity);
                           if ( $("#book_id option[value="+data.book_id+"]").length == 0 ){
                            $('#book_id').append($("<option></option>")
                                .attr("value", data.book_id)
                                .attr("data-attribute", data.bookLangId)
                                .text(data.bookName+' [ '+data.bookPrice+' ]'));
                            }
                        });
                    });
                //}else{
                    
                }
            });

            $( "#book_id" ).change(function(){
                var $sum_of_issueBook = 0;
                var $sum_of_returnBook = 0;
                var $sum_of_sellBook = 0;
                var $remainBook = 0;
                var $bookId = Number($("#book_id").val());
                var $varVolunteerId = Number($("#volunteer_id").val());
                if($bookId != ''){
                    // check this book how many issued 
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

                    // check this book how many sell
                    $.getJSON("/Book_Return/"+ $bookId +"/volunteerId/"+ $varVolunteerId +"/get_sell_book_base_on_volunteer", function(jsonData){
                        $.each(jsonData, function(i,data){
                           $sum_of_sellBook += data.soled_quantity;
                        });
                        $("#validationMSG3").html("Sold Qty = " + $sum_of_sellBook);
                        $remainBook = $sum_of_issueBook  - ($sum_of_returnBook + $sum_of_sellBook);
                        $("#bookCanSell").val($remainBook);
                        $("#soled_quantity").val($remainBook);
                        $("#validationMSG4").html("Available Book for Sell = " + $remainBook);
                        $eachBookPrice = parseFloat($("#bookPriceFrm").val());
                        $(".bookPriceTotal").val($remainBook * $eachBookPrice);
                        $("#totalBookPrice").html("Unit Price ("+$eachBookPrice+ ") * Qty (" + $remainBook+") = " + $remainBook * $eachBookPrice);
                    });

                }else{
                    
                    reSetAll();
                }
            });

            $('#soled_quantity').keyup(function() {
                $bookQTY = parseFloat($('#soled_quantity').val());
                $eachBookPrice = parseFloat($("#bookPriceFrm").val())
                $(".bookPriceTotal").val($bookQTY * $eachBookPrice);
                $("#totalBookPrice").html("Unit Price ("+$eachBookPrice+ ") * Qty ( " + $bookQTY+") = " + $bookQTY * $eachBookPrice);
            });

            $("#optionalInfoHeader").click(function(){
                $('#optionalInfoBody').toggle(1000);
            });
            
        });

    </script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Sell Book' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!-- once user clicked on save and continue button -->
                    <?php 
                        $defaul_book_id =  0;
                        if(session()->has('session_book_id')){
                            $defaul_book_id =  session()->get('session_book_id');
                        }
                        $defaul_volunteer_id =  0;
                        if(session()->has('session_volunteer_id')){
                            $defaul_volunteer_id =  session()->get('session_volunteer_id');
                        }
                        $defaule_language_id =  0;
                        if(session()->has('session_language_id')){
                            $defaule_language_id =  session()->get('session_language_id');
                        }
                        $defaule_qty =  "";
                        if(session()->has('session_qty')){
                            $defaule_qty =  session()->get('session_qty');
                        }
                    ?>

                     @if(session()->has('success'))                        
                        <div style="color: green;" class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                          <span class="font-medium">Success alert! &nbsp; </span> 
                          {{ session()->get('success') }}
                        </div>
                    @endif

                    <!--  -->
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

                    <form action="{{ route('Book_Sell.store') }}" method="POST" enctype="multipart/form-data">
                        
                        @csrf

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="volunteer id" class="block text-gray-600 font-medium">Select Volunteer<span style="color:red"> *</span></label>
                                <select id="volunteer_id" name="volunteer_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">--Choose one option--</option>
                                    @foreach($userResult as $userData)
                                        @if(Auth::user()->type == 'admin' || Auth::user()->id == $userData->id)
                                        <option value="{{ $userData->id }}"  {{   $userData->id == $defaul_volunteer_id ? 'Selected' : '' }}> {{ $userData->name }} </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <!-- language -->
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="language_id" class="block text-gray-600 font-medium">Select Language<span style="color:red"> *</span></label>
                                <select id="language_id" name="language_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="">--Choose one option--</option>
                                    @foreach($languageResults as $languageData)
                                        <option value="{{ $languageData->id }}"  {{   $languageData->id == $defaule_language_id ? 'Selected' : '' }} > {{ $languageData->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="Book stock" class="block text-gray-600 font-medium">Select Book<span style="color:red"> *</span></label>
                                <select id="book_id" name="book_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">--Choose one option--</option>
                                </select>
                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <label for="Issued" class="block text-gray-600 font-medium">Sell Qty<span style="color:red"> *</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span id="validationMSG1" style="color: red;"></span>&nbsp;&nbsp;
                                    <span id="validationMSG2" style="color: blue;"></span>&nbsp;&nbsp;
                                    <span id="validationMSG3" style="color: green;"></span>&nbsp;&nbsp;
                                </label>
                                <input type="number" name="soled_quantity" id="soled_quantity" value="{{ $defaule_qty }}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                                <label for="Issued" class="block text-gray-600 font-medium">
                                    <span id="validationMSG4" style="color: green;"></span>
                                </label>
                            </div>
                        </div> 

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="price" class="block text-gray-600 font-medium">Total Amount &nbsp;&nbsp;&nbsp;<!-- (Actual Book price * quintity) --> <span id="totalBookPrice" style="color: green;"></span></label>
                                <input type="hidden" name="price" value="" class="border rounded-md w-full py-2 px-3 text-gray-700 bookPriceTotal">
                                <input id="soled_price" type="number" name="soled_price" value="" class="border rounded-md w-full py-2 px-3 text-gray-700 bookPriceTotal">
                                
                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <label for="soled_date" class="block text-gray-600 font-medium">Sell Date<span style="color:red"> *</span></label>
                                <input type="date" name="soled_date" id="soled_date" value="{{date('Y-m-d')}}" class="border rounded-md w-full py-2 px-3 text-gray-700">                            
                            </div>
                        </div>

                        <div class="mb-4" id="optionalInfoHeader">Other Optional Information</div>
                        
                        <div id="optionalInfoBody" style="display: none;">

                            <div class="grid md:grid-cols-2 md:gap-6">
                                <div class="relative z-0 w-full mb-6 group">
                                    <label for="name" class="block text-gray-600 font-medium">Customer Name</label>
                                    <input type="text" name="name" id="name" value="" class="border rounded-md w-full py-2 px-3 text-gray-700">
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <label for="phone" class="block text-gray-600 font-medium">Phone / Mobile</label>
                                    <input type="text" name="phone" id="phone" value="" class="border rounded-md w-full py-2 px-3 text-gray-700">
                                </div>
                            </div>
                            <div class="grid md:grid-cols-2 md:gap-6">
                                <div class="relative z-0 w-full mb-6 group">
                                    <label for="Address" class="block text-gray-600 font-medium">Address</label>
                                    <input type="text" name="address" id="address" value="" class="border rounded-md w-full py-2 px-3 text-gray-700">
                                </div>
                                <div class="relative z-0 w-full mb-6 group">
                                    <label for="remarks" class="block text-gray-600 font-medium">Remarks</label>
                                    <input type="text" name="remarks" id="remarks" value="" class="border rounded-md w-full py-2 px-3 text-gray-700">
                                </div>
                            </div>
                        </div>

                        <div class="mb-4" align="center">

                            <input id="saveBtn" name="saveBtn" type="submit" class="px-5 py-2 mr-2 mb-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 saveBtn" value="Save">

                            <input id="saveAndContinueBtn" name="saveAndContinueBtn" type="submit" class="px-5 py-2 mr-2 mb-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 saveBtn" value="Save And Continue">
                            
                            <a href="{{ route('Book_Sell.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{ __('Go Back') }}</a>
                            
                        </div>

                        <!-- Hidden data and information -->
                        <input type="hidden" name="bookCanSell" id="bookCanSell" value="0">
                        <input type="hidden" name="bookIssueToVolunteerFrm" id="bookIssueToVolunteerFrm" value="0">
                        <input type="hidden" name="bookReturnByVolunteerFrm" id="bookReturnByVolunteerFrm" value="0">
                        <input type="hidden" name="bookPriceFrm" id="bookPriceFrm" value="0">
                        
                    </form>

                    <!-- show the latest 10 record  -->
                    <div class="mb-4" align="left">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ 'Latest 10 Records' }}<br>
                        </h2>
                    </div>

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">         
                                <tr>
                                    <th scope="col" class="px-6 py-3">Book</th>
                                    <th scope="col" class="px-6 py-3">Language</th>
                                    <th scope="col" class="px-6 py-3">Volunteer</th>
                                    <th scope="col" class="px-6 py-3" align="center">Sold Qty</th>
                                    <th scope="col" class="px-6 py-3" align="center">Unit Price</th>
                                    <th scope="col" class="px-6 py-3" align="center">Amount</th>
                                    <th scope="col" class="px-6 py-3">Remarks</th>
                                    <th scope="col" class="px-6 py-3">Sold Date</th>
                                </tr>
                            </thead>
                            <tbody id="dataListTable">
                                @foreach($results as $data)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $data->bookName}}  [ {{ $data->bookPrice}} ]
                                        </td>
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$data->langName}}
                                        </td>
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $data->volunteerName }}
                                        </td>
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" align="center">
                                            {{ $data->soled_quantity }}
                                        </td>
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" align="center">
                                            {{ $data->bookPrice }}
                                        </td>
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" align="center">
                                            {{ $data->soled_price }}
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
                    <!-- result display end -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script type="text/javascript">
    $(document).ready(function(){

        $('#volunteer_id').change();

    });
</script>
