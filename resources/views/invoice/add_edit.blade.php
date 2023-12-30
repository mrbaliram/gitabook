<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $results ? 'Update Invoice' : 'Create Invoice' }}
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

                    <form action="{{ $results ? route('invoice.update', $results->id) : route('invoice.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if ($results)
                            @method('PUT')
                        @endif

                       
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="invoice_number" class="block text-gray-600 font-medium">Invoice Number<span style="color:red"> *</span></label>
                                <input type="text" name="invoice_number" id="invoice_number" value="{{old('invoice_number', $results->invoice_number ?? '')}}" class="border rounded-md w-full py-2 px-3 text-gray-700" required>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="invoice_date" class="block text-gray-600 font-medium">Invoice Date<span style="color:red"> *</span></label>
                                <input type="date" name="invoice_date" id="invoice_date" value="{{date('Y-m-d', strtotime($temp_invoice_date))}}" class="border rounded-md w-full py-2 px-3 text-gray-700" required>
                            </div>
                        </div>


                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                               <label for="total_qty" class="block text-gray-600 font-medium">Invoice qty<span style="color:red"> *</span></label>
                                <input type="number" name="total_qty" id="total_qty" value="{{old('total_qty', $results->total_qty ?? '')}}" class="border rounded-md w-full py-2 px-3 text-gray-700" required>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="total_amount" class="block text-gray-600 font-medium">Invoice Amount<span style="color:red"> *</span></label>
                                <input type="number" name="total_amount" id="total_amount" value="{{old('total_amount', $results->total_amount ?? '')}}" class="border rounded-md w-full py-2 px-3 text-gray-700" required>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 w-full mb-6 group">
                                 <label for="shipping_addres" class="block text-gray-600 font-medium">Invoice Address<span style="color:red"> *</span></label>
                                <input type="text" name="shipping_addres" id="shipping_addres" value="{{old('shipping_addres', $results->shipping_addres ?? '')}}" class="border rounded-md w-full py-2 px-3 text-gray-700" required>
                            </div>
                            <div class="relative z-0 w-full mb-6 group">
                                <label for="Remarks" class="block text-gray-600 font-medium">Remarks</label>
                                <input type="text" name="remarks" id="remarks" value="{{old('remarks', $results->remarks ?? '')}}" class="border rounded-md w-full py-2 px-3 text-gray-700">
                            </div>
                        </div>


                        <div class="flex">
                            <div class="flex items-center mr-4">
                                <label class="block text-gray-600 font-medium">Status<span style="color:red"> *</span></label>
                            </div>
                            <div class="flex items-center mr-4">
                                 <input required type="radio" name="status" id="active" value="1" {{ (old('status', isset($results) ? $results->status : '') == '1') ? 'checked' : '' }} class="mr-2" checked>
                                <label for="active" class="text-gray-700">Yes</label>
                            </div>
                            <div class="flex items-center mr-4">
                                <input type="radio" name="status" id="inactive" value="0" {{ (old('status', isset($results) ? $results->status : '') == '0') ? 'checked' : '' }} class="mr-2">
                                <label for="inactive" class="text-gray-700">No</label>
                            </div>
                        </div>

                        <div class="mb-4" align="center">

                            <button id="saveBtn" type="submit" class="px-5 py-2 mr-2 mb-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"> {{ $results ? 'Update' : 'Save' }}</button>
                            
                            <a href="{{ route('invoice.index') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">{{ __('Go Back') }}</a>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>