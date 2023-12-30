<x-app-layout>
    
    <script type="text/javascript">
        // filter book based on language
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
        // empty all 
        function reSetAll() {
            $("#validationMSG").html("");
            $("#validationMSG1").html("");
            $("#validationMSG2").html("");
            $("#validationMSG3").html("");
            $("#validationMSG4").html("");
            $("#bookIssueToVolunteerFrm").val(0);
            $("#bookReturnByVolunteerFrm").val(0);
            $("#bookAvailabeVal").val(0);
            $("#issued_quantity").val(0);
            //$("#book_id").val(0);
            
        }
        $(document).ready(function(){
             $('#issued_quantity').focus();
            // get book based on lang selected
            // $("#volunteer_id").change( function() {
            //     reSetAll();
            //     $("#language_id").val('');
            //     $("#book_id").val('');
            // });

            // get book based on lang selected
            $("#language_id").change( function() {
                filterSelectOptions($("#book_id"), "data-attribute", $(this).val());
                reSetAll();
            });

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
                // check this book into stock
                var $bookId = $("#book_id").val();
                if($bookId != ''){
                    $.getJSON("/Book_Issue/"+ $bookId +"/book_available", function(jsonData){
                        $.each(jsonData, function(i,data){
                           $totalAvailableBook += data.received_quantity;
                        });
                        
                        $("#validationMSG").html("Total Stock Qty = " + $totalAvailableBook);
                        
                    });
                    
                    // check this book how many issued                
                    $.getJSON("/Book_Issue/"+ $bookId +"/book_issue_to_volunteer", function(jsonData){
                        //console.log(jsonData);
                        $.each(jsonData, function(i,data){
                           $sum_of_issueBook += data.issued_quantity;
                        });
                        $("#bookIssueToVolunteerFrm").val($sum_of_issueBook);
                        $("#validationMSG2").html("Issued Qty = " + $sum_of_issueBook);
                    });

                    // check this book how many returns
                    $.getJSON("/Book_Issue/"+ $bookId +"/book_return_by_volunteer", function(jsonData){

                        console.log(jsonData);            
                        $.each(jsonData, function(i,data){
                           $sum_of_returnBook += data.returned_quantity;
                        });
                        $("#bookReturnByVolunteerFrm").val($sum_of_returnBook);
                        
                        $("#validationMSG3").html("Returned Qty =  " + $sum_of_returnBook);
                        
                        $remainBook = ($totalAvailableBook + $sum_of_returnBook) - $sum_of_issueBook;

                        $("#validationMSG4").html("Total Available Book for Issue =  " + $remainBook);
                        // $("#bookIssueToVolunteerFrm").val($sum_of_issueBook - $sum_of_returnBook);
                        $("#validationMSG2").html("Issued Qty = " + ($sum_of_issueBook - $sum_of_returnBook));
                        $("#bookAvailabeVal").val($remainBook);
                        $("#issued_quantity").val($remainBook);
                    });
                }else{
                    reSetAll();
                }
            });
        });
    </script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Issue Book' }}
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

                        $defaule_issued_date =  date('Y-m-d');
                        if(session()->has('session_issued_date')){
                            $defaule_issued_date = session()->get('session_issued_date');
                        }

                        $defaule_remarks = '';
                        if(session()->has('session_remarks')){
                            $defaule_remarks = session()->get('session_remarks');
                        }

                        
                        
                    ?>
                   
                    @if(session()->has('success'))
                        <div style="color: green;" class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
                          <span class="font-medium">Success alert! &nbsp; </span> 
                          {{ session()->get('success') }}
                        </div>
                        
                        <script type="text/javascript">
                            $(document).ready(function(){
                                $('#language_id').change();
                            });
                        </script>
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

                    <form action="{{ route('Book_Issue.store') }}" method="POST" enctype="multipart/form-data">
                        
                        @csrf

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="volunteer id" class="block text-gray-600 font-medium">Select Volunteer<span style="color:red"> *</span></label>
                                <select id="volunteer_id" name="volunteer_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">--Choose one option--</option>
                                    @foreach($userResult as $userData)
                                        <option  value="{{ $userData->id }}"  {{   $userData->id == $defaul_volunteer_id ? 'Selected' : '' }}> {{ $userData->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="language_id" class="block text-gray-600 font-medium">Select Language<span style="color:red"> *</span></label>
                                <select id="language_id" name="language_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option value="">--Choose one option--</option>
                                    @foreach($languageResults as $languageData)
                                        <option value="{{ $languageData->id }}"  {{   $languageData->id == $defaule_language_id ? 'Selected' : '' }}> {{ $languageData->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="Book stock" class="block text-gray-600 font-medium">Select Book<span style="color:red"> *</span></label>
                                <select id="book_id" name="book_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <!-- totalStock  totalIssue totalReturn-->
                                    <option value="">--Choose one option--</option>
                                    @foreach($bookResult as $bookData)
                                        @if ($bookData->totalStock > $bookData->totalIssue )
                                            <option  data-attribute="{{ $bookData->language_id }}" value="{{ $bookData->id }}"> 
                                                {{ $bookData->name }} [{{ $bookData->languageName }} - {{ $bookData->price }}] 
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="Issued" class="block text-gray-600 font-medium">Issue Qty<span style="color:red"> *</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                <span id="validationMSG" style="color: red;"></span>&nbsp;&nbsp;
                                <span id="validationMSG2" style="color: blue;"></span>&nbsp;&nbsp;
                                <span id="validationMSG3" style="color: green;"></span>&nbsp;&nbsp;
                                </label>
                                <input type="number" name="issued_quantity" id="issued_quantity" value="{{$defaule_qty}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                                <label for="Issued" class="block text-gray-600 font-medium">
                                    <span id="validationMSG4" style="color: green;"></span>
                                </label>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="issued_date" class="block text-gray-600 font-medium">Issue Date<span style="color:red"> *</span></label>
                                <input type="date" name="issued_date" id="issued_date" value="{{ $defaule_issued_date }}" class="border rounded-md w-full py-2 px-3 text-gray-700">  
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="remarks" class="block text-gray-600 font-medium">Remarks</label>
                                <input type="text" name="remarks" id="remarks" value="{{ $defaule_remarks }}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div>
                        </div>
                        
                        <div class="mb-4" align="center">

                            <input id="saveBtn" name="saveBtn" type="submit" class="px-5 py-2 mr-2 mb-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 saveBtn" value="Issue">

                            <input id="saveAndContinueBtn" name="saveAndContinueBtn" type="submit" class="px-5 py-2 mr-2 mb-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 saveBtn" value="Save And Continue">

                            <a href="{{ route('Book_Issue.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{ __('Go Back') }}</a>

                        </div>
                    
                    <input type="hidden" name="bookAvailabeVal" id="bookAvailabeVal" value="0">
                    
                    <input type="hidden" name="bookIssueToVolunteerFrm" id="bookIssueToVolunteerFrm" value="0">

                    <input type="hidden" name="bookReturnByVolunteerFrm" id="bookReturnByVolunteerFrm" value="0">

                    </form>

                    <!-- show the latest 10 record  -->
                    <div class="mb-4" align="left">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ 'Latest 10 Issued Books' }}<br>
                        </h2>
                    </div>

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-100 dark:bg-gray-700 dark:text-gray-400">         
                                <tr>
                                    <th scope="col" class="px-6 py-3">Book</th>
                                    <th scope="col" class="px-6 py-3">Language</th>
                                    <th scope="col" class="px-6 py-3">Volunteer</th>
                                    <th scope="col" class="px-6 py-3" align="center">Issued Qty</th>
                                    <th scope="col" class="px-6 py-3" align="center">Unit Price</th>
                                    <th scope="col" class="px-6 py-3" align="center">Amount</th>
                                    <th scope="col" class="px-6 py-3">Remarks</th>
                                    <th scope="col" class="px-6 py-3">Issued Date</th>
                                </tr>
                            </thead>
                            <tbody id="dataListTable">
                                @foreach($results as $data)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $data->bookName}} [ {{ $data->bookPrice}} ]
                                        </td>
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{$data->langName}}
                                        </td>
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $data->volunteerName }}
                                        </td>
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" align="center">
                                            {{ $data->issued_quantity }}
                                        </td>
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" align="center">
                                            {{$data->bookPrice}}
                                        </td>
                                        <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" align="center">
                                            {{$data->bookPrice * $data->issued_quantity}}
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
                    <!-- end show the latest 10 record  -->
                </div> 
            </div>
        </div>
    </div>
</x-app-layout>
<script type="text/javascript">
    $(document).ready(function(){
        $("#book_id option").each(function() {
            $(this).siblings('[value="'+ this.value +'"]').remove();
        });
    });
</script>

