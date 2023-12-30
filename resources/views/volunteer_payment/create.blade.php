<x-app-layout>

    <script type="text/javascript">
        $(document).ready(function(){
             $("#saveBtn").click(function(){ 
                if ($("#volunteer_id").val() == ''){
                     alert('Please select volunteer')
                    return false;
                }else if($("#amount").val() == ''){
                     alert('Please select amount')
                    return false;
                }else{
                    return true;
                }
            });        
        });
    </script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Add Payment' }}
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

                    <form action="{{ route('Volunteer_payment.store') }}" method="POST" enctype="multipart/form-data">
                        
                        @csrf
                        <div class="mb-4">
                            <label for="volunteer id" class="block text-gray-600 font-medium">Select Volunteer<span style="color:red"> *</span></label>
                            <select id="volunteer_id" name="volunteer_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">--Choose one option--</option>
                                @foreach($userResult as $userData)
                                    @if(Auth::user()->type == 'admin' || Auth::user()->id == $userData->id)
                                        <option value="{{ $userData->id }}"> {{ $userData->name }} </option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-6">
                            <label for="amount" class="block text-gray-600 font-medium">Amount<span style="color:red"> *</span>
                                
                            </label>
                            <input type="number" name="amount" id="amount" value="" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            
                        </div>

                        <div class="mb-6">
                            <label for="payment_date" class="block text-gray-600 font-medium">Payment Date<span style="color:red"> *</span></label>
                            <input type="date" name="payment_date" id="payment_date" value="{{date('Y-m-d')}}" class="border rounded-md w-full py-2 px-3 text-gray-700">                            
                        </div>
                    
                        <div class="mb-6">
                            <label for="remarks" class="block text-gray-600 font-medium">Remarks</label>
                            <input type="text" name="remarks" id="remarks" value="" class="border rounded-md w-full py-2 px-3 text-gray-700">
                        </div>

                        <div class="mb-4" align="center">

                            <button id="saveBtn" type="submit" class="px-5 py-2 mr-2 mb-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> {{ 'Save' }}</button>
                            
                            <a href="{{ route('Volunteer_payment.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{ __('Go Back') }}</a>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>