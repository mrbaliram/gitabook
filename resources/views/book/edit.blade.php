<x-app-layout>

    <script type="text/javascript">    
        $(document).ready(function(){
             $("#saveBtn").click(function(){     //backBtn      //saveBtn 
                //category_id language_id author_id name price
                if ($("#language_id").val() == ''){
                     alert('Please select language')
                    return false;
                }else if($("#category_id").val() == ''){
                     alert('Please select category')
                    return false;
                }else if($("#author_id").val() == ''){
                     alert('Please select author')
                    return false;
                }else if($("#name").val().trim() == ''){
                     alert('Please enter name')
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
            {{ 'Update Book' }}
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
                    
                    <form action="{{ route('book.update', $results->id) }}" 
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($results)
                            @method('PUT')

                        @endif

                        <!-- language -->
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="language_id" class="block text-gray-600 font-medium">Select Language<span style="color:red"> *</span></label>
                                <select id="language_id" name="language_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">--Choose one option--</option>
                                    @foreach($languageResults as $languageData)
                                        <option value="{{ $languageData->id }}" {{   $languageData->id == $results->language_id ? 'Selected' : '' }}> {{ $languageData->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- Category -->
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="category_id" class="block text-gray-600 font-medium">Select Category<span style="color:red"> *</span></label>
                                <select id="category_id" name="category_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">--Choose one option--</option>
                                    @foreach($categoryResults as $categoryData)
                                        <option value="{{ $categoryData->id }}" {{   $categoryData->id == $results->category_id ? 'Selected' : '' }}> {{ $categoryData->name }} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <!-- Author -->
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="Author" class="block text-gray-600 font-medium">Select Author<span style="color:red"> *</span></label>
                                <select id="author_id" name="author_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="">--Choose one option--</option>
                                    @foreach($authorsResults as $autherData)
                                        <option value="{{ $autherData->id }}" {{$autherData->id == $results->author_id ? 'Selected' : '' }}> {{ $autherData->name }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="relative z-0 w-full mb-6 group">
                                <label for="name" class="block text-gray-600 font-medium">Name<span style="color:red"> *</span></label>
                                <input type="text" name="name" id="name" value="{{old('name', $results->name ?? '')}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div> 
                        </div> 

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                
                                <label for="price" class="block text-gray-600 font-medium">Price<span style="color:red"> *</span></label>
                                <input type="text" name="price" id="price" value="{{old('price', $results->price ?? '')}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <div class="flex mb-4">
                                    <div class="flex items-center mr-4">
                                        <label class="block text-gray-600 font-medium">Book Image</label>
                                    </div>
                                    
                                    <div class="flex items-center mr-4">
                                        <input type="file" name="image_url" id="image_url"   class="border rounded-md w-full py-2 px-3 text-gray-700">
                                        
                                    </div>
                                </div>
                            </div> 
                        </div> 

                        <div class="flex">
                            <div class="flex items-center mr-4">
                                <label class="block text-gray-600 font-medium">Status<span style="color:red"> *</span></label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input type="radio" name="status" id="active" value="1" {{ (old('status', isset($results) ? $results->status : '') == '1') ? 'checked' : '' }} class="mr-2" checked>
                                <label for="active" class="text-gray-700">Yes</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input type="radio" name="status" id="inactive" value="0" {{ (old('status', isset($results) ? $results->status : '') == '0') ? 'checked' : '' }} class="mr-2">
                                <label for="inactive" class="text-gray-700">No</label>
                            </div>
                        </div>
                        

                        <div class="mb-4"></div>

                        <div class="mb-4" align="center">

                            <button id="saveBtn" type="submit" class="px-5 py-2 mr-2 mb-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> {{ 'Update' }}</button>
                            
                            <a href="{{ route('book.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{ __('Go Back') }}</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>