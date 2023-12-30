<x-app-layout>

    <script type="text/javascript">    
        $(document).ready(function(){
             $("#saveBtn").click(function(){
                if ($("#event_name").val() == ''){
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
            {{ 'Create Event' }}
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

                    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                    
                        @csrf
                       
                        <div class="mb-6">
                            <label for="name" class="block text-gray-600 font-medium">Event Name<span style="color:red"> *</span></label>
                            <input type="text" name="event_name" id="event_name" value="{{old('name')}}" class="border rounded-md w-full py-2 px-3 text-gray-700" required>
                        </div>

                        <!-- start othere input ----------------------- -->                       
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="S date" class="block text-gray-600 font-medium">Start Date <span style="color:red"> *</span></label>
                                <input type="date" name="start_date" id="start_date" value="{{date('Y-m-d')}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="E date" class="block text-gray-600 font-medium">End Date<span style="color:red"> *</span></label>
                                <input type="date" name="end_date" id="end_date" value="{{date('Y-m-d')}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
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
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="leader_name" class="block text-gray-600 font-medium">Leader Name</label>
                                <input type="text" name="leader_name" id="leader_name" value="{{old('leader_name')}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="leader_contact_no" class="block text-gray-600 font-medium">Leader Contact No </label>
                                <input type="text" name="leader_contact_no" id="leader_contact_no" value="{{old('leader_contact_no')}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="leader_alternate_no" class="block text-gray-600 font-medium">Leader Alternate No</label>
                                <input type="text" name="leader_alternate_no" id="leader_alternate_no" value="{{old('leader_alternate_no')}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="place_contact_person" class="block text-gray-600 font-medium">Place Contact Person </label>
                                <input type="text" name="place_contact_person" id="place_contact_person" value="{{old('place_contact_person')}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="leader_alternate_no" class="block text-gray-600 font-medium">Leader Alternate No</label>
                                <input type="text" name="leader_alternate_no" id="leader_alternate_no" value="{{old('leader_alternate_no')}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="place_contact_no" class="block text-gray-600 font-medium">Place Cntact No </label>
                                <input type="text" name="place_contact_no" id="place_contact_no" value="{{old('place_contact_no')}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="place_alternate_no" class="block text-gray-600 font-medium">Place Alternate No</label>
                                <input type="text" name="place_alternate_no" id="place_alternate_no" value="{{old('place_alternate_no')}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
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
                            <a href="{{ route('events.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{ __('Go Back') }}</a>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>