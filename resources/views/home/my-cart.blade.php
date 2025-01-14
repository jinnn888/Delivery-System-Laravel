@extends('welcome')
@section('content')

<section class='mt-4'>
	<div class='mt-6 w-full flex items-center justify-center flex-wrap'>
		@foreach ($carts as $cart)
		{{-- Item --}}
		<div class='animate shadow-sm  flex flex-row gap-4 p-4'>
			{{-- Product Image --}}
			<img width='150' class=' object-cover rounded' src="{{ $cart->product->getFirstMediaUrl('product_images')}}">
			{{-- Product Description --}}
			<div class='flex flex-col items-center justify-between'>
				<div>
					<h2 class='text-gray-600 font-semibold text-2xl'>{{ $cart->product->name  }}</h2>
					<span class='text-gray-500 text-sm block mt-4'>Description: </span>
					<br>
				</div>
				{{-- <p>{{ Str::limit($product->description, 40) }}</p> --}}
				<div class='flex flex-col gap-2'>
					<span class='text-green-700 font-bold text-2xl'>₱{{ $cart->total_price }}</span>
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
							<p>Total: <span id='total' class='text-green-700 font-semibold'>₱{{ $cart->product->price }}</span></p>
							<input id='_total' type="hidden" name="total_price" value="{{ $cart->product->price }}">
							<input id='_total' type="hidden" name="product_id" value="{{ $cart->product->id }}">
							<input id='_amount' type="hidden" name="amount" value="1">
							<button 
								type='submit'
								class='bg-green-800 text-md text-white rounded shadow-md px-4 py-1 mt-2'>
								<i class="fas fa-shopping-cart"></i>
								 Checkout
							</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		@endforeach

	</div>
</section>
<script type="text/javascript">
	const plus = document.querySelector('.plus-amount');
	const minus = document.querySelector('.minus-amount');
	const amount = document.querySelector('#amount')
	const total = document.querySelector('#total')
	const _total = document.querySelector('#_total')
	const _amount = document.querySelector('#_amount')
	const price = parseInt('{{ $cart->product->price }}')
	const maxAmount = parseInt('{{ $cart->product->stock }}')
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
