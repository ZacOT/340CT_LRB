@include('header')

<title>Order History @yield('title')</title>

<body>
    <h1 style="text-align:center;">Order History</h1>

    <!--table-layout: fixed; width: 75%;-->
        <table style="width: 90%; border: 1px solid; margin-left: auto; margin-right: auto;">
            <tr style="outline: thin solid">
                <th style="text-align: left; background-color: coral; width: 5%;">Order ID</th>
                <th style="text-align: left; background-color: coral; width: 15%;">Name</th>
                <th style="text-align: left; background-color: coral; width: 25%;">Item</th>
                <th style="text-align: left; background-color: coral; width: 10%;">Quantity</th>
                <th style="text-align: left; background-color: coral; width: 10%;">Subtotal</th>
                <th style="text-align: left; background-color: coral; width: 10%;">Status</th>
                <th style="text-align: left; background-color: coral; width: 5%;">View</th>
            </tr>
            @foreach ($orders as $order)
            @php
                $curorderid = $order->order_id;
            @endphp
            <tr>
            </tr>
            <tr style="outline: thin solid">
                <td>{{ $order->order_id }}</td>
                <td>{{ $order->name }}</td>
                <td>
                    @foreach ($orderitems->where('order_id', $curorderid) as $orderitem)
                        @foreach ($books->where('ISBN_13', $orderitem->ISBN_13) as $book)
                            {{ $book->book_title }}</br>
                        @endforeach
                    @endforeach
                </td>
                <td>
                    @foreach ($orderitems->where('order_id', $curorderid) as $orderitem)
                            {{ $orderitem->orderitem_quantity }}</br>
                    @endforeach
                </td>
                <td>{{ $order->subtotal}} </td>

                <td>
                    <?php
                        if ($order->status == 0){
                            echo "<p style='color:red;'>Incomplete</p>";
                        } 
                        else if ($order->status == 1){
                            echo "<p style='color:green;'>Completed</p>";
                        }
                        else{
                            echo "ERROR";
                        }
                    ?>
                </td>
                <td>
                <form action="{{ route('viewOrder') }}" method="post">
                    @csrf
                    <input type="hidden" id="orderid" name="orderid" value="{{ $order->order_id }}">
                    <button type="submit" class='button' name="View">View</button>
                </form>
                </td>

            </tr>
            @endforeach
         </table>
    
</body>
@include('footer')