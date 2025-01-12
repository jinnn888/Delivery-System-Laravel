@extends('welcome')
@section('content')

<section class='mt-4'>
	<div class='mt-6 w-full flex items-center justify-center flex-wrap'>
		{{-- Item --}}
		<div class='animate shadow-sm  flex flex-row gap-4 p-4'>
			{{-- Product Image --}}
			<img width='450' class=' object-cover rounded' src="{{ $product->getFirstMediaUrl('product_images')}}">
			{{-- Product Description --}}
			<div class='flex flex-col items-center justify-between'>
				<div>
					<h2 class='text-gray-600 font-semibold text-5xl'>{{ $product->name  }}</h2>
					<span class='text-gray-500 text-sm block mt-4'>Description: </span>
					<p class='text-gray-600  text-lg '>{{ $product->description  }}</p>
					<br>
					<p class='text-gray-600  text-lg '>Category: <span class='font-semibold text-green-700 capitalize'>{{ $product->category  }}</span></p>
					<p class='text-gray-600  text-lg '>Stock: <span class='font-semibold text-green-700 capitalize'>{{ $product->stock  }}</span></p>
						
				</div>
				{{-- <p>{{ Str::limit($product->description, 40) }}</p> --}}
				<div>
					<span class='text-green-700 font-bold text-2xl'>₱{{ $product->price }}</span>
					<a 
						href='{{ route('home.product.show', $product) }}' 
						class='bg-green-800 text-md text-white rounded shadow-md px-4 py-1 mt-2'>
						<i class="fas fa-shopping-cart"></i>
						 Add to cart
					</a>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection
