<x-app-layout>

    <script type="text/javascript">    
        $(document).ready(function(){
             $("#saveBtn").click(function(){
                if ($("#first_name").val() == ''){
                     alert('Please enter event name')
                    return false;
                }else if($("#price").val().trim() == ''){
                     alert('Please enter the price')
                    return false;                
                }else{
                    return true;
                }
            });           
        });
    </script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Create Contact' }}
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

                    <form action="{{ route('Contact_info.store') }}" method="POST" enctype="multipart/form-data">
                    
                        @csrf
                       
                        <!-- start othere input ----------------------- -->

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="event id" class="block text-gray-600 font-medium">Select Event<span style="color:red"> *</span></label>
                                <select id="event_id" name="event_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">--Choose one option--</option>
                                    @foreach($eventsResult as $evemtData)
                                        <option value="{{ $evemtData->id }}"> {{ $evemtData->event_name }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <label for="volunteer id" class="block text-gray-600 font-medium">Select Volunteer<span style="color:red"> *</span></label>
                                <select id="volunteer_id" name="volunteer_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">--Choose one option--</option>
                                    @foreach($userResult as $userData)
                                        <option value="{{ $userData->id }}"> {{ $userData->name }} </option>
                                    @endforeach
                                </select>
                            </div>

                            
                        </div>

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="first_name" class="block text-gray-600 font-medium">First Name<span style="color:red"> *</span></label>
                                <input type="text" name="first_name" id="first_name" value="{{old('first_name')}}" class="border rounded-md w-full py-2 px-3 text-gray-700" required>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="last_name" class="block text-gray-600 font-medium">Last Name <span style="color:red"> *</span></label>
                                <input type="text" name="last_name" id="last_name" value="{{old('last_name')}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div>
                        </div>
                        
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="address1" class="block text-gray-600 font-medium">Address 1 <span style="color:red"> *</span></label>
                                <input type="text" name="address1" id="address1" value="{{old('address1')}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="address2" class="block text-gray-600 font-medium">Address 2</label>
                                <input type="text" name="address2" id="address2" value="{{old('address2')}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div>
                        </div>
                        
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="city" class="block text-gray-600 font-medium">City <span style="color:red"> *</span></label>
                                <input type="text" name="city" id="city" value="Bangalore" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="State" class="block text-gray-600 font-medium">State <span style="color:red"> *</span></label>
                                <input type="text" name="state" id="state" value="Karnataka" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="pin_code" class="block text-gray-600 font-medium">Pin Code</label>
                                <input type="text" name="pin_code" id="pin_code" value="{{old('pin_code')}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div>    
                        </div>

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="contact_no" class="block text-gray-600 font-medium">Contact No </label>
                                <input type="text" name="contact_no" id="contact_no" value="{{old('contact_no')}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="alternate_no" class="block text-gray-600 font-medium">Alternate No</label>
                                <input type="text" name="alternate_no" id="alternate_no" value="{{old('alternate_no')}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div>
                        </div>

                        <div class="grid md:grid-cols-1 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="remarks" class="block text-gray-600 font-medium">Remarks </label>
                                <input type="text" name="remarks" id="remarks" value="{{old('remarks')}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div>                            
                        </div>

                        <!-- end others input ------------------------ -->
                      
                        <div class="mb-6" align="center">

                            <button id="saveBtn" type="submit" class="px-5 py-2 mr-2 mb-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> {{ 'Save' }}</button>

                            <button id="saveBtn" type="reset" class="px-5 py-2 mr-2 mb-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> {{ 'Reset' }}</button> 
                            
                            <a href="{{ route('Contact_info.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{ __('Go Back') }}</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>