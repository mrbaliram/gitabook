<x-app-layout>
    <script type="text/javascript">

        $(document).ready(function(){
            $("#bookCanReturn").html("");
            $("#validationMSG1").html("");
            $("#validationMSG2").html("");
            $("#validationMSG3").html("");
            $("#validationMSG4").html("");
            $("#bookIssueToVolunteerFrm").val(0);
            $("#bookReturnByVolunteerFrm").val(0);
            $("#bookCanReturn").val(0);
            var $oldBookId = {{$bookReturnResult->book_id}};
            var $oldReturnQty = {{$bookReturnResult->returned_quantity}};

            $("#saveBtn").click(function(){
                if ($("#volunteer_id").val() == ''){
                     alert('Please select volunteer')
                    return false;
                }else if ($("#book_id").val() == ''){
                     alert('Please select book')
                    return false;
                }else if(Number($("#bookCanReturn").val()) < $("#returned_quantity").val()){
                     alert('Returned quantity ('+$("#returned_quantity").val()+') should be less than available in your account ('+$("#bookCanReturn").val()+')')
                    return false;
                }else if(Number($("#returned_quantity").val()) < 1 || Number($("#returned_quantity").val()) == 0){
                     alert('Issue quantity should be grater than 0')
                    return false;
                }else if($("#book_id").val() == ''){
                     alert('Please select book')
                    return false;
                }else{
                    return true;
                }
            });
            
            // ------------------------------ volunteer--------------------
            $( "#volunteer_id" ).change(function(){
                var $varVolunteerId = Number($("#volunteer_id").val());
                $.getJSON("/Book_Return/"+ $varVolunteerId +"/get_book_base_on_volunteer", function(jsonData){
                    //console.log(jsonData);
                    $('#book_id').find('option:not(:first)').remove();
                    $.each(jsonData, function(i,data){
                       console.log(data.issued_quantity);
                        $('#book_id').append($("<option></option>")
                            .attr("value", data.book_id)
                            .text(data.bookName+' ['+data.langName+' - '+data.authName+']'));
                    });
                    if($('#bodyOnload').val() == '1'){
                        $("#book_id").val($oldBookId);
                        $('#bodyOnload').val(0);
                    }
                });
                $("#bookCanReturn").html("");
                $("#validationMSG1").html("");
                $("#validationMSG2").html("");
                $("#validationMSG3").html("");
                $("#validationMSG4").html("");
                $("#bookIssueToVolunteerFrm").val(0);
                $("#bookReturnByVolunteerFrm").val(0);
                $("#bookCanReturn").val(0);
                $("#returned_quantity").val(0);
            });

            // -----------------------------------book---------------------------------
            $( "#book_id" ).change(function(){
                var $sum_of_issueBook = 0;
                var $sum_of_returnBook = 0;
                var $sum_of_sellBook = 0;
                var $bookId = Number($("#book_id").val());
                var $varVolunteerId = Number($("#volunteer_id").val());
                if($bookId != ''){

                    // check this book how many issued $varVolunteerId
                    $.getJSON("/Book_Return/"+ $bookId +"/volunteerId/"+ $varVolunteerId +"/get_issure_book_base_on_volunteer", function(jsonData){
                        $.each(jsonData, function(i,data){
                           $sum_of_issueBook += data.issued_quantity;
                        });
                        $("#bookIssueToVolunteerFrm").val($sum_of_issueBook);
                        $("#validationMSG1").html("Total Issued Books = " + $sum_of_issueBook);
                    });

                    // check this book how many returns
                    $.getJSON("/Book_Return/"+ $bookId +"/volunteerId/"+ $varVolunteerId +"/get_return_book_base_on_volunteer", function(jsonData){
                        $.each(jsonData, function(i,data){
                           $sum_of_returnBook += data.returned_quantity;
                        });
                        $("#bookReturnByVolunteerFrm").val($sum_of_returnBook);
                        $("#validationMSG2").html("Returned Books = " + $sum_of_returnBook);
                    });

                    $.getJSON("/Book_Return/"+ $bookId +"/volunteerId/"+ $varVolunteerId +"/get_sell_book_base_on_volunteer", function(jsonData){
                        $.each(jsonData, function(i,data){
                           $sum_of_sellBook += data.soled_quantity;
                        });
                        $("#validationMSG3").html("Sold Qty = " + $sum_of_sellBook);
                        $remainBook = $sum_of_issueBook  - ($sum_of_returnBook + $sum_of_sellBook);
                        $remainBook = ($sum_of_issueBook + $oldReturnQty)  - ($sum_of_returnBook + $sum_of_sellBook);
                        $("#oldReturnQTy").html("(Existing Issued Qty = " + $oldReturnQty+')');
                        $("#bookCanReturn").val($remainBook);
                        $("#returned_quantity").val($oldReturnQty);
                        $("#validationMSG4").html("Available Books for Return = " + $remainBook);
                    });
                }else{
                    $("#bookCanReturn").html("");
                    $("#validationMSG1").html("");
                    $("#validationMSG2").html("");
                    $("#validationMSG3").html("");
                    $("#validationMSG4").html("");
                    $("#bookIssueToVolunteerFrm").val(0);
                    $("#bookReturnByVolunteerFrm").val(0);
                    $("#bookCanReturn").val(0);
                }
            });
        });

    </script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Update Returned Book' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('Book_Return.update', $bookReturnResult->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                     @method('PUT')                         
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">

                                <label for="volunteer id" class="block text-gray-600 font-medium">Select Volunteer<span style="color:red"> *</span></label>
                                <select disabled id="volunteer_id" name="volunteer_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach($userResult as $userData)
                                        <option value="{{ $userData->id }}" {{ $bookReturnResult->volunteer_id == $userData->id ? 'Selected' : '' }}> {{ $userData->name }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <label for="Book stock" class="block text-gray-600 font-medium">Select Book<span style="color:red"> *</span></label>
                                <select disabled id="book_id" name="book_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    @foreach($bookResult as $bookData)
                                        <option value="{{ $bookData->id }}" {{ $bookReturnResult->book_id == $bookData->id ? 'Selected' : '' }}> {{ $bookData->name }} [{{ $bookData->price }}]</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="price" class="block text-gray-600 font-medium">Return Quantity
                                    <span style="color:red"> *</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span id="validationMSG1" style="color: red;"></span>&nbsp;&nbsp;
                                    <span id="validationMSG2" style="color: blue;"></span>&nbsp;&nbsp;
                                    <span id="validationMSG3" style="color: green;"></span>&nbsp;&nbsp;
                                    <span id="oldReturnQTy" style="color: red;"></span>
                                    
                                </label>
                                <input type="number" name="returned_quantity" id="returned_quantity" value="{{$bookReturnResult->returned_quantity}}" class="border rounded-md w-full py-2 px-3 text-gray-700">

                                <label for="Issued" class="block text-gray-600 font-medium">
                                    <span id="validationMSG4" style="color: green;"></span>
                                </label>
                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <label for="returned_date" class="block text-gray-600 font-medium">Returned Date<span style="color:red"> *</span></label>
                                <input type="date" name="returned_date" id="returned_date" value="{{date('Y-m-d', strtotime($bookReturnResult->returned_date))}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="remarks" class="block text-gray-600 font-medium">Remarks</label>
                            <input type="text" name="remarks" id="remarks" value="{{$bookReturnResult->remarks}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                        </div>
                        
                        <div class="mb-4" align="center">

                            <button id="saveBtn" type="submit" class="px-5 py-2 mr-2 mb-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> {{ 'Update Return' }}</button>
                            
                            <a href="{{ route('Book_Return.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{ __('Go Back') }}</a>

                        </div>

                        <input type="hidden" name="bookCanReturn" id="bookCanReturn" value="0">

                        <input type="hidden" name="bookIssueToVolunteerFrm" id="bookIssueToVolunteerFrm" value="0">

                        <input type="hidden" name="bookReturnByVolunteerFrm" id="bookReturnByVolunteerFrm" value="0">

                        <input type="hidden" name="bodyOnload" id="bodyOnload" value="1">

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script type="text/javascript">

    $(document).ready(function(){
        $('#book_id').change();
        $('#volunteer_id').change();
        if($('#volunteer_id') == '1'){
            $("#book_id").val($oldBookId);
        }
    });

</script>
