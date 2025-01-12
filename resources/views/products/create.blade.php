<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 w-full">
                	<form 
                		method="POST" 
                		action='{{ route('products.store') }}'
                		class='flex flex-col gap-4' 
                		enctype="multipart/form-data">
                		@csrf
                		<div>
		                	<x-input-label>Product Name</x-input-label>
		                	<x-text-input value="{{ old('name') }}" name='name' type='text' class='w-full'/>
            				<x-input-error :messages="$errors->get('name')" class="mt-2" />
                		</div>

                		<div>
	                		<x-input-label>Description</x-input-label>
	                		<x-text-input value="{{ old('description') }}" name='description' type='text' class='w-full'/>
            				<x-input-error :messages="$errors->get('description')" class="mt-2" />

                		</div>

                		<div>
		                	<x-input-label>Price</x-input-label>
		                	<x-text-input value="{{ old('price') }}" name='price' type='number' class='w-full'/>
            				<x-input-error :messages="$errors->get('price')" class="mt-2" />
                		</div>

                		<div>
		                	{{-- Categories --}}
		                	@php
		                		$categories = ['albums', 'merchandise', 'special edition', 'bundle'];
		                	@endphp
		                	<x-input-label>Specify Category</x-input-label>
		                	<select name='category' class='w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'>
		                		<option selected disabled>Please select</option>
		                		@foreach ($categories as $category)
			                		<option 
			                		class='capitalize'
			                		{{ $category == old('category') ? 'selected' : ''}}>{{ $category }}</option>
		                		@endforeach

		                	</select>
            				<x-input-error :messages="$errors->get('category')" class="mt-2" />
                		</div>

                		<div>
		                	<x-input-label>Stock</x-input-label>
		                	<x-text-input value="{{ old('stock') }}" name='stock' class='w-full' type='number'/>
            				<x-input-error :messages="$errors->get('stock')" class="mt-2" />

                		</div>

                		<div>
	                		<x-input-label>Image</x-input-label>
	                		<input 
	                			type="file" 
	                			name="image" 
	                			class='dropify' 
	                			data-show-remove="false"
	                			data-allowed-file-extensions="jpg png jpeg"
	                		>
            				<x-input-error :messages="$errors->get('image')" class="mt-2" />
                		</div>

	                	<x-primary-button class='block mt-4'>Submit</x-primary-button>
                	</form>

	            </div>                                                                  
            </div>
        </div>
    </div>

    <script type="text/javascript">
    	$('.dropify').dropify();
    </script>

</x-app-layout>
