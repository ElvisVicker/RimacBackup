<h2>Order #{{ $buyer[0]->id }}</h2>
<div class="col-sm-12 col-xl-12">
    <div class="bg-secondary rounded h-100 p-4">
        <h6 class="mb-4">Your Order</h6>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Order ID</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Car Name</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $buyer[0]->id }}</td>
                    <td>{{ $buyer[0]->first_name }}</td>
                    <td>{{ $buyer[0]->car_name }}</td>
                    <td>{{ $buyer[0]->price }} USD</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<br>
<div>Thank you, Have a good day</div>
