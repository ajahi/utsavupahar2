<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Document</title>
    <style>
        .styled-table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }

        .styled-table thead tr {
            background-color: #009879;
            color: #ffffff;
            text-align: left;
        }

        .styled-table th,
        .styled-table td {
            padding: 12px 15px;
        }

        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }

        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }
    </style>
</head>

<body>
    <table class="styled-table">
        <thead>
            <tr>
                <th>Order Code</th>
                <th>Date</th>
                <th>Payment Method</th>
                <th>Delivery Status</th>
                <th>Amount</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)

            <tr>
                <td>
                    <a href="{{route('order.show',$order->id)}}">
                        {{ $order->order_number }}
                    </a>
                </td>

                <td>{{ $order->created_at }}</td>
                <td>{{ $order->payment_method }}</td>
                <td class="order-{{ $order->status }}">
                    <span>{{ $order->status }}</span>
                </td>
                <td>RS{{ number_format($order->total_amount, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>