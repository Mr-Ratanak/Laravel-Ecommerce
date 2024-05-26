<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice #{{$order->id}}</title>
</head>
<style>
    html,
    body {
        margin: 10px;
        padding: 10px;
        font-family: sans-serif;
    }
    h1,h2,h3,h4,h5,h6,p,span,label {
        font-family: sans-serif;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 0px !important;
    }
    table thead th {
        height: 28px;
        text-align: left;
        font-size: 16px;
        font-family: sans-serif;
    }
    table, th, td {
        border: 1px solid #ddd;
        padding: 8px;
        font-size: 14px;
    }

    .heading {
        font-size: 24px;
        margin-top: 12px;
        margin-bottom: 12px;
        font-family: sans-serif;
    }
    .small-heading {
        font-size: 18px;
        font-family: sans-serif;
    }
    .total-heading {
        font-size: 18px;
        font-weight: 700;
        font-family: sans-serif;
    }
    .order-details tbody tr td:nth-child(1) {
        width: 20%;
    }
    .order-details tbody tr td:nth-child(3) {
        width: 20%;
    }

    .text-start {
        text-align: left;
    }
    .text-end {
        text-align: right;
    }
    .text-center {
        text-align: center;
    }
    .company-data span {
        margin-bottom: 4px;
        display: inline-block;
        font-family: sans-serif;
        font-size: 14px;
        font-weight: 400;
    }
    .no-border {
        border: 1px solid #fff !important;
    }
    .bg-blue {
        background-color: #414ab1;
        color: #fff;
    }
</style>
<body>
    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">{{$appSetting->website_name ?? 'KH- SALE'}}</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data">
                    <span>Invoice Id: #{{$order->id}}</span> <br>
                    <span>Date: {{date('d/m/Y h:i-a')}}</span> <br>
                    <span>Zip code : {{$order->pincode}}</span> <br>
                    <span>Address: {{$order->address}}</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Order Details</th>
                <th width="50%" colspan="2">User Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Order Id:</td>
                <td>{{$order->id}}</td>

                <td>Full Name:</td>
                <td>{{$order->fullname}}</td>
            </tr>
            <tr>
                <td>Tracking Id/No.:</td>
                <td>{{$order->tracking_no}}</td>

                <td>Email Id:</td>
                <td>{{$order->email}}</td>
            </tr>
            <tr>
                <td>Ordered Date:</td>
                <td>{{$order->created_at->format('Y-m-d h:i:A')}}</td>

                <td>Phone:</td>
                <td>{{$order->phone}}</td>
            </tr>
            <tr>
                <td>Payment Mode:</td>
                <td>{{$order->payment_mode}}</td>

                <td>Address:</td>
                <td>{{$order->address}}</td>
            </tr>
            <tr>
                <td>Order Status:</td>
                <td>{{$order->status_message}}</td>

                <td>Pin code:</td>
                <td>{{$order->pincode}}</td>
            </tr>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <th class="no-border text-start heading" colspan="5">
                    Order Items
                </th>
            </tr>
            <tr class="bg-blue">
                <th>ID</th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php
                $totalAmount = 0;
            @endphp
           @foreach ($order->orderItem as $item)
            <tr>
                <td width="10%">{{$item->product->id}}</td>
                <td>
                    {{$item->product->name}}
                </td>
                <td width="10%">${{$item->price}}</td>
                <td width="10%">{{$item->quantity}}</td>
                <td width="15%" class="fw-bold">${{number_format($item->price * $item->quantity,2)}}</td>
                @php
                    $totalAmount += $item->price * $item->quantity;
                @endphp
            </tr>
           @endforeach

            <tr>
                <td colspan="4" class="total-heading">Total Amount - <small>Inc. all vat/tax</small> :</td>
                <td colspan="1" class="total-heading">${{number_format($totalAmount,2)}}</td>
            </tr>
        </tbody>
    </table>

    <br>
    <p class="text-center align-items-center">
        Thank your for shopping with KH SALE <span style="color: #414ab1;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
            <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
          </svg></span>
    </p>
</body>
</html>
