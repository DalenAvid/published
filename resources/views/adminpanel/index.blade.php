<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Адмін Панель</title>
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

        .summary {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .summary div {
            padding: 3rem;
            background: #fff;
            border-radius: 2px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 30%;
            text-align: center;
            background-color: #F6EEE8;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            font-size: 15px;
            color: #333;
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

        .shipped {
            background-color: #c8e6c9;
            /* Зелене тло для відправлених */
        }

        .rejected {
            background-color: #ffcdd2;
            /* Червоне тло для відхилених */
        }

        .action-select {
            width: 100%;
            padding: 5px;
            margin-top: 5px;
        }
    </style>
</head>

<body>
    <div class="admin-panel">
        <aside>
            <h2>Admin</h2>
            @include('adminsidebar')  <!-- Подключаем боковое меню -->

        </aside>

        <main class="content">
            <h1>Список замовлень</h1>

            <div class="summary">
                <div>Всього замовлень: {{ $totalOrders }}</div>
                <div>Замовлень не відправлено/не відхилено: {{ $pendingOrders }}</div>
                <div>Відправлені замовлення: {{ $shippedOrders }}</div>
            </div>

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
                        <th>Дія</th> <!-- Новий стовпець -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr class="order-row" data-order-id="{{ $order->id }}">
                            <td>{{ $order->id }}</td>
                            <td>{{ optional($order->user)->name ?? 'Користувач не вказаний' }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ optional($order->book)->title ?? 'Книга ' }}</td>
                            <td>{{ $order->quantity  ?? rand(1, 3) }}</td>
                            <td>{{ $order->total_price ?? rand(100, 450) }} грн</td>
                            <td>{{ $order->created_at->format('d.m.Y H:i') }}</td>
                            <td>
                                <select class="action-select" onchange="handleOrderAction(this)">
                                    <option value="">Вибрати</option>
                                    <option value="ship">Відправити</option>
                                    <option value="reject">Відхилити</option>
                                </select>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </main>
    </div>

    <script>
        function handleOrderAction(select) {
            const row = select.closest('tr');
            const action = select.value;

            if (action === 'ship') {
                row.classList.add('shipped');
            } else if (action === 'reject') {
                row.classList.add('rejected');
            }
            select.value = ''; // Скидаємо вибір
        }
    </script>
</body>

</html>