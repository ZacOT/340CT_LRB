<!DOCTYPE html>
<html>
<head>
	<title>Shopping Cart UI</title>
    <link rel="stylesheet" href="<?php echo asset('css/cart.css')?>" type="text/css"> 
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,900" rel="stylesheet">
</head>

<body>
   <div class='CartContainer'>
   	   <div class='Header'>
   	   	<h3 class='Heading'>Order Page</h3>
		<a href="/cart">Back To Cart</a>
   	   </div>


		@php $grandTotal = 0; @endphp
		@php $subTotal = 0; @endphp
		@php $totalQuantity = 0; @endphp
		@php $shippingFee = 0; @endphp

		@foreach($carts as $cart)

			@php 
				$curisbn = $cart->ISBN_13; 
				$curqty = $cart->book_quantity;
			@endphp

			@foreach($books->where('ISBN_13', $curisbn) as $book)

				@if($username = Auth::user()->username)
					<div class='Cart-Items'>
						<div class='image-box'>
								<img src="images/{{ $book->book_cover_img }}" height='175' width='125'/>
						</div>
						<div class='about'>
								<h1 class='title'>{{ $book->book_title }}</h1>
								<h3 class='subtitle'>{{ $book->book_description }}</h3>
								<br><br><br><br><br>
								<h3 class='subtitle'>Unit Price: {{ $book->retail_price }} $</h3>
						</div>
						<div class='counter'>
								<div class='count'>{{ $curqty }}</div>
						</div>
						<div class='prices'>
							@php $bookTotal = $curqty * $book->retail_price; @endphp
								<div class='amount'>@php echo "$bookTotal"; @endphp $</div>
								<br/><br/><br/><br/><br/>
						</div>
					</div>

					@php $subTotal += $bookTotal; @endphp
					@php $totalQuantity += $cart->book_quantity; @endphp
				@endif

			@endforeach
			@endforeach

			@php $shippingFee += 3 + (($totalQuantity - 1) * 1); @endphp
			@php $grandTotal = $subTotal + $shippingFee; @endphp
    
	<hr>
	<br><br>
		<center>
			<h1 class='title'>Shipping Details</h1>
			<?php
			if(Auth::user()){
                    $address = Auth::user()->address;
					echo"
					<textarea id='address' rows='5' cols='40'>$address</textarea>
					";
			}
			?>
		</center>

	<div class='checkout'>
	<div class='total'>
	<div>
		<div class='Subtotal'>Sub-Total</div>
		</div>
	<div class='total-amount'>@php echo "$subTotal"; @endphp $</div>
	</div>

	<div class='total'>
	<div class='Subtotal'>Shipping Fee</div>
	<div class='total-amount'>@php echo "$shippingFee"; @endphp $</div>
	</div>

	<br>
	<div class='items'>@php echo "$totalQuantity"; @endphp items</div>
	<br>

	<div class='total'>
	<div class='Subtotal'>Grand Total</div>
	<div class='total-amount'>@php echo "$grandTotal"; @endphp $</div>
	</div>

	<div><form action="{{ route('createOrder') }}" method="post">
		@csrf
		<input type="hidden" id="username" name="username" value="{{ $username }}">
		<input type="hidden" id="name" name="name" value="{{ Auth::user()->name; }}">
		<input type="hidden" id="grandtotal" name="grandtotal" value="{{ $grandTotal }}">
		<input type="hidden" id="address" name="address" value="{{ $address }}">
		<div><button type="submit" class='button'>Confirm Order</button></div>
	</form></div>
	
	</div>
</body>
</html> 