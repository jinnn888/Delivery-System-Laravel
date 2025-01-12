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
				<div class='flex flex-col gap-2'>
					<span class='text-green-700 font-bold text-2xl'>₱{{ $product->price }}</span>
					<div class='flex flex-col'>
						<form action='{{ route('cart.store') }}' method="POST">
							@csrf
							<div>
								<button type='button' class='plus-amount bg-gray-200 px-4 py-2 text-gray-500'>
									+
								</button>
								<input id='amount' class='shadow-sm border-gray-200 rounded' type="number" name="amount" value='1' disabled class='w-fit'>
								<button type='button' class='minus-amount bg-gray-200 px-4 py-2 text-gray-500'>
									-
								</button>
							</div>
							<p>Total: <span id='total' class='text-green-700 font-semibold'>₱{{ $product->price }}</span></p>
							<input id='_total' type="hidden" name="total_price" value="{{ $product->price }}">
							<input id='_total' type="hidden" name="product_id" value="{{ $product->id }}">
							<input id='_amount' type="hidden" name="amount" value="1">
							<button 
								type='submit'
								class='bg-green-800 text-md text-white rounded shadow-md px-4 py-1 mt-2'>
								<i class="fas fa-shopping-cart"></i>
								 Add to cart
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<script type="text/javascript">
	const plus = document.querySelector('.plus-amount');
	const minus = document.querySelector('.minus-amount');
	const amount = document.querySelector('#amount')
	const total = document.querySelector('#total')
	const _total = document.querySelector('#_total')
	const _amount = document.querySelector('#_amount')
	const price = parseInt('{{ $product->price }}')
	const maxAmount = parseInt('{{ $product->stock }}')
	console.log(maxAmount)

		plus.addEventListener('click', () => {
			const currentVal = parseInt(amount.value);

			if (currentVal < maxAmount) {
				amount.value  = parseInt(amount.value) + 1;
				_amount.value = amount.value
				total.textContent = `₱${price*amount.value}`
				_total.value = price*amount.value
			}

		})

		minus.addEventListener('click', () => {
			const currentVal = parseInt(amount.value);

			if (currentVal > 0) {
				amount.value  = parseInt(amount.value) - 1;
				_amount.value = amount.value
				total.textContent = `₱${price*amount.value}`
				_total.value = price*amount.value
			}
		})

</script>
@endsection
