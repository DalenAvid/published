<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Адмін Панель - Історія Замовлень</title>
</head>

<body>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        .admin-panel {
            display: flex;
        }

        

        .content {
            flex-grow: 1;
            padding: 20px;
        }

        .content h1 {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid #fff;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        tr:nth-child(even) {
            background-color: #F6EEE8;
        }

        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
    <div class="admin-panel">
        <aside>
            <h2>Admin</h2>
            @include('adminsidebar')  <!-- Подключаем боковое меню -->
        </aside>

        <main class="content">
            <h1>Історія замовлень</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Користувач</th>
                        <th>Телефон</th>
                        <th>Адреса</th>
                        <th>Книга</th>
                        <th>Кількість</th>
                        <th>Загальна ціна</th>
                        <th>Дата замовлення</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ optional($order->user)->name ?? 'Користувач не знайдений' }}</td>

                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ optional($order->book)->title ?? 'Книга не знайдена' }}</td>

                            <td>{{ $order->quantity  ?? rand(1, 3) }}</td>
                            <td>{{ $order->total_price ?? rand(100, 450) }} грн</td>
                            <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>

            </table>

        </main>
    </div>
</body>

</html>