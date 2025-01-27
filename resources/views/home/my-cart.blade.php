@extends('welcome')
@section('content')

<section class='mt-4'>
	<div class='mt-6 w-full flex gap-2 items-center justify-center flex-wrap'>
		@foreach ($carts as $index => $cart)
			@foreach ($cart->items as $item)
				<div class='animate shadow-sm  flex flex-row gap-4 p-4 bg-white'>
					<img width='150' class=' object-cover rounded' src="{{ $item->product->getFirstMediaUrl('product_images')}}">
					<div >
						<h2 class='text-gray-600 text-2xl'>{{ $item->product->name  }}</h2>
						<div class='flex flex-col gap-2'>
							<div class='flex flex-col'>
								<form action='{{ route('cart.store') }}' method="POST">
									@csrf
									<div>
									<input id='amount' class='shadow-sm border-gray-200 rounded' type="number" name="amount" value='{{ $cart->amount }}'  class='w-fit'>
									</div>
									<input id='_total' type="hidden" name="total_price" value="{{ $cart->price }}">
									<input id='_amount' type="hidden" name="amount" value="1">
									<div class='flex flex-row gap-2'>
										<form action='{{ route('checkouts.store') }}' method="POST">
											@csrf
											<input type="hidden" name="cart_id" value='{{ $cart->id }}'>
											<input type="hidden" name="user_id" value='{{ auth()->id() }}'>
											<button 
												type='submit'
												class='bg-green-800 text-md text-white rounded shadow-md px-4 py-1 mt-2'>
												 Checkout
											</button>
										</form>
										<form action='{{ route('cart.destroy', $cart ) }}' method='POST'>
											@csrf
											@method('DELETE')
											<button
												class='bg-red-800 text-md text-white rounded shadow-md px-4 py-1 mt-2'>
												<i class="fas fa-trash"></i>
											</button>
										</form>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>


			@endforeach
		@endforeach

	</div>
</section>
{{-- <script type="text/javascript">
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

</script> --}}
@endsection
