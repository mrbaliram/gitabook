<x-app-layout>

    <script type="text/javascript">    
        $(document).ready(function(){
             $("#saveBtn").click(function(){     //backBtn      //saveBtn                 
                if ($("#name").val() == ''){
                     alert('Please enter name')
                    return false;
                }else if($("#email").val() == ''){
                     alert('Please enter email')
                    return false;
                }else if($("#type").val() == ''){
                     alert('Please enter user type')
                    return false;
                }else{
                    return true;
                }
            });            
        });
    </script>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ "Add User / Volunteer" }}
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

                    <form action="{{ route('volunteer.store') }}" method="POST" enctype="multipart/form-data">
                    
                        @csrf

                        <!-- Name -->
                        <div class="mt-6">
                           <label for="soled_date" class="block text-gray-600 font-medium">Name<span style="color:red"> *</span></label>
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <div class="mt-6">
                           <label for="soled_date" class="block text-gray-600 font-medium">Phone</label>
                            <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" autofocus autocomplete="phone" />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-6">
                            <label for="soled_date" class="block text-gray-600 font-medium">Email<span style="color:red"> *</span></label>
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mb-6">
                            <label for="user type" class="block text-gray-600 font-medium">Select User Type<span style="color:red"> *</span></label>
                            <select id="type" name="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="volunteer" selected>Volunteer</option>
                                <option value="admin">Admin</option>
                            </select>
                        </div>

                        <!-- Password -->
                        <div class="mt-6">
                            <label for="soled_date" class="block text-gray-600 font-medium">Password<span style="color:red"> *</span></label>
                            <x-text-input id="password" class="block mt-1 w-full"
                                            type="password"
                                            name="password"
                                            required autocomplete="new-password" />

                        </div>
                        

                        <div class="mb-4"></div>
                        <div class="mb-6" align="center">
                            
                            <button id="saveBtn" type="submit" class="px-5 py-2 mr-2 mb-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> {{ 'Save' }}</button>
                            
                            <a href="{{ route('volunteer.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{ __('Go Back') }}</a>

                        </div>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>