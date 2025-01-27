@extends('welcome')
@section('content')

{{-- Hero Se'ction --}}
<section class='hero text-center flex flex-col items-center justify-center bg-gray-900 h-[65vh] w-100'>
	<div class='background'></div>
	<div class=''>
		<h2 class='animate text-5xl text-white font-bold'>Artists's e-com.</h2>
	</div>
</section>

<section class='mt-4'>
	<div class='animate w-full text-center flex flex-col items-center justify-center'>
		<h2 class=' text-4xl  text-green-800' style="font-family: 'Lora';">Albums, Merch, and More – All for the Fans.</h2>
		<div class='mt-4 flex flex-row items-center justify-center gap-4'>
			<a href='/' class='p-2 {{ request()->query() == [] ? "bg-green-700 text-white" : "border border-green-700 text-green-700" }}'>
				RECENT
			</a>
			<form action='/' method='GET'>
				@csrf
				<input type="hidden" name="category" value='merchandise'>
				<button class='p-2 {{ request()->get("category") == "merchandise" ? "bg-green-700 text-white" : "border border-green-700 text-green-700" }}'>
					MERCHANDISE
				</button>
			</form>
			<form action='/' method='GET'>
				@csrf
				<input type="hidden" name="category" value='albums'>
				<button class='p-2 {{ request()->get("category") == "albums" ? "bg-green-700 text-white" : "border border-green-700 text-green-700" }}'>
					ALBUMS
				</button>
			</form>
			<form action='/' method='GET'>
				@csrf
				<input type="hidden" name="category" value='bundle'>
				<button class='p-2 {{ request()->get("category") == "bundle" ? "bg-green-700 text-white" : "border border-green-700 text-green-700" }}'>
					BUNDLE
				</button>
			</form>
			<form action='/' method='GET'>
				@csrf
				<input type="hidden" name="category" value='special edition'>
				<button class='p-2 {{ request()->get("category") == "special edition" ? "bg-green-700 text-white" : "border border-green-700 text-green-700" }}'>
					SPECIAL EDITION
				</button>
			</form>
		</div>

	</div>  
	<div class='mt-6 w-full flex items-center justify-center flex-wrap'>
		@foreach ($products as $product)
		{{-- Item --}}
		<div class='animate shadow-sm  flex flex-col gap-4 p-4'>
			{{-- Product Image --}}
			<img width='250' class=' object-cover rounded' src="{{ $product->getFirstMediaUrl('product_images')}}">
			{{-- Product Description --}}
			<div class='flex flex-col items-center'>
				<h2 class='text-gray-600 text-lg '>{{ $product->name  }}</h2>
				{{-- <p>{{ Str::limit($product->description, 40) }}</p> --}}
				<span class='text-green-700 text-2xl'>₱{{ $product->price }}</span>
				<form action='{{ route('cart.store') }}' method="POST">
					@csrf
					<input id='_total' type="hidden" name="total_price" value="{{ $product->price }}">
					<input id='_total' type="hidden" name="product_id" value="{{ $product->id }}">
					<input id='_amount' type="hidden" name="amount" value="1">
					<button 
					type='submit'
					class='bg-green-800 text-md text-white rounded shadow-md px-4 py-1 mt-2'>
					 <i class="fas fa-shopping-cart"></i> Add to cart
				</button>
			</form>
			{{-- <a href='{{ route('home.product.show', $product) }}' class='bg-green-800 text-sm text-white rounded shadow-md px-4 py-1 mt-2'>View item</a> --}}
		</div>
	</div>
	@endforeach
</div>
</section>

@endsection