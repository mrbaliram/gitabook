<x-app-layout>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#saveBtn").click(function(){     //backBtn      //saveBtn 
                if ($("#volunteer_id").val() == ''){
                     alert('Please select volunteer')
                    return false;
                }else if($("#book_id").val() == ''){
                     alert('Please select book')
                    return false;
                }else if(Number($("#issued_quantity").val()) < 1){
                     alert('Issue quantity should be grater than 0')
                    return false;
                }else if($("#bookAvailabeVal").val() == 0){
                    alert('This books are not into stock (0 stock)')
                    return false;               
                }else if(Number($("#bookAvailabeVal").val()) < Number($("#issued_quantity").val())){
                    alert('Issue quantity ('+$("#issued_quantity").val()+') should be less than Books available ('+$("#bookAvailabeVal").val()+')')
                    return false;
                }else{
                    return true;
                }

            });


            $( "#book_id" ).change(function(){
                var $totalAvailableBook = 0;
                var $sum_of_issueBook = 0;
                var $sum_of_returnBook = 0;
                var $bookId = $("#book_id").val();
                var $oldIssueQty = {{$bookIssueResult->issued_quantity}};
                if($bookId != ''){           
                    $.getJSON("/Book_Issue/"+ $bookId +"/book_available", function(jsonData){
                        $.each(jsonData, function(i,data){
                           $totalAvailableBook += data.received_quantity;
                        });
                        $("#validationMSG").html("Total Stock Qty = " + $totalAvailableBook);
                    });
                    
                    // check this book how many issued            
                    $.getJSON("/Book_Issue/"+ $bookId +"/book_issue_to_volunteer", function(jsonData){
                        // $totalAvailableBook = 0;
                        $.each(jsonData, function(i,data){
                           $sum_of_issueBook += data.issued_quantity;
                        });
                        $("#bookIssueToVolunteerFrm").val($sum_of_issueBook);
                        //if($sum_of_issueBook > 0)
                            $("#validationMSG2").html("Issued Qty = " + $sum_of_issueBook);
                    });
                    // check this book how many returns
                    
                    $.getJSON("/Book_Issue/"+ $bookId +"/book_return_by_volunteer", function(jsonData){
                        $.each(jsonData, function(i,data){
                           $sum_of_returnBook += data.returned_quantity;
                        });
                        $("#bookReturnByVolunteerFrm").val($sum_of_returnBook);
                            $("#validationMSG3").html("Returned Qty = " + $sum_of_returnBook); 
                        //$remainBook = ($totalAvailableBook + $sum_of_returnBook) - $sum_of_issueBook;
                        $remainBook = ($totalAvailableBook + $oldIssueQty + $sum_of_returnBook)  - ($sum_of_issueBook);
                        $("#validationMSG2").html("Issued Qty = " + ($sum_of_issueBook - $sum_of_returnBook));
                        $("#bookAvailabeVal").val($remainBook);
                        $("#validationMSG4").html("Total Available Book for Issue = " + $remainBook);
                    });

                }else{
                    $("#validationMSG").html("");
                    $("#validationMSG1").html("");
                    $("#validationMSG2").html("");
                    $("#validationMSG3").html("");
                    $("#validationMSG4").html("");
                    $("#bookIssueToVolunteerFrm").val(0);
                    $("#bookReturnByVolunteerFrm").val(0);
                    $("#bookAvailabeVal").val(0);
                }
            });
        });

    </script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Update Issued Book' }}
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

                    <form action="{{ route('Book_Issue.update', $bookIssueResult->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                        <!-- userResult -->

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="volunteer id" class="block text-gray-600 font-medium">Select Volunteer<span style="color:red"> *</span></label>
                                <select disabled id="volunteer_id" name="volunteer_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">--Choose one option--</option>
                                    @foreach($userResult as $userData)
                                        <option value="{{ $userData->id }}" {{ $bookIssueResult->volunteer_id == $userData->id ? 'Selected' : '' }}> {{ $userData->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="Book stock" class="block text-gray-600 font-medium">Select Book<span style="color:red"> *</span></label>
                                <select disabled id="book_id" name="book_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">--Choose one option--</option>
                                    @foreach($bookResult as $bookData)
                                        <option value="{{ $bookData->id }}" {{ $bookIssueResult->book_id == $bookData->id ? 'Selected' : '' }}> {{ $bookData->name }} [{{ $bookData->price }}]</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="Issued" class="block text-gray-600 font-medium">Issue Qty <span style="color:red"> *</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                    <span id="validationMSG" style="color: red;"></span>&nbsp;&nbsp;
                                    <span id="validationMSG2" style="color: blue;"></span>&nbsp;&nbsp;
                                    <span id="validationMSG3" style="color: green;"></span>
                                </label>
                                <input type="number" name="issued_quantity" id="issued_quantity" value="{{$bookIssueResult->issued_quantity}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                                <label for="Issued" class="block text-gray-600 font-medium">
                                    <span id="validationMSG4" style="color: green;"></span>
                                </label>
                           </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="issued_date" class="block text-gray-600 font-medium">Issue Date<span style="color:red"> *</span></label>
                                <input type="date" name="issued_date" id="issued_date" value="{{date('Y-m-d', strtotime($bookIssueResult->issued_date))}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label for="remarks" class="block text-gray-600 font-medium">Remarks</label>
                            <input type="text" name="remarks" id="remarks" value="{{$bookIssueResult->remarks}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                        </div>

                        <div class="mb-4" align="center">
                            <button id="saveBtn" type="submit" class="px-5 py-2 mr-2 mb-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> {{ 'Update Issue' }}</button>
                            
                            <a href="{{ route('Book_Issue.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{ __('Go Back') }}</a>

                        </div>

                        <input type="hidden" name="bookAvailabeVal" id="bookAvailabeVal" value="0">
                    
                        <input type="hidden" name="bookIssueToVolunteerFrm" id="bookIssueToVolunteerFrm" value="0">

                        <input type="hidden" name="bookReturnByVolunteerFrm" id="bookReturnByVolunteerFrm" value="0">

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script type="text/javascript">

    $(document).ready(function(){
         $('#book_id').change();
    });

</script>
