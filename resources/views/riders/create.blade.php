<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Rider') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 w-full">
                	<form 
                		method="POST" 
                		action='{{ route('riders.store') }}'
                		class='flex flex-col gap-4' 
                		enctype="multipart/form-data">
                		@csrf
                		<div>
		                	<x-input-label>Full Name</x-input-label>
		                	<x-text-input value="{{ old('name') }}" name='name' type='text' class='w-full'/>
            				<x-input-error :messages="$errors->get('name')" class="mt-2" />
                		</div>

                		<div>
	                		<x-input-label>Email</x-input-label>
	                		<x-text-input value="{{ old('email') }}" name='email' type='email' class='w-full'/>
            				<x-input-error :messages="$errors->get('email')" class="mt-2" />

                		</div>

                		<div>
		                	<x-input-label>Phone Number</x-input-label>
		                	<x-text-input placeholder='+63368302214' value="{{ old('phone_number') }}" name='phone_number' type='number' class='w-full'/>
            				<x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                		</div>

                		<div>
		                	{{-- Vehicle Type --}}
		                	@php
		                		$vehicle_types = ['motorcycle', 'bicycle', 'car'];
		                	@endphp
		                	<x-input-label>Vehicle Type</x-input-label>
		                	<select name='vehicle_type' class='w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'>
		                		<option selected disabled>Please select</option>
		                		@foreach ($vehicle_types as $vehicle)
			                		<option 
			                		class='capitalize'
			                		{{ $vehicle == old('vehicle_type') ? 'selected' : ''}}>{{ $vehicle }}</option>
		                		@endforeach

		                	</select>
            				<x-input-error :messages="$errors->get('vehicle_type')" class="mt-2" />
                		</div>

                		<div>
		                	<x-input-label>Date of birth</x-input-label>
		                	<x-text-input value="{{ old('birth_date') }}" name='birth_date' class='w-full' type='date'/>
            				<x-input-error :messages="$errors->get('birth_date')" class="mt-2" />

                		</div>

                		<div>
	                		<x-input-label>Address</x-input-label>
	                		<x-text-input value="{{ old('address') }}" name='address' class='w-full'/>
            				<x-input-error :messages="$errors->get('address')" class="mt-2" />

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
