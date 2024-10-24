<style>
    body {
        font-family: Arial, sans-serif;
    }

    .sidebar {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f4f4f4;
        /* Фон для прикладу */
    }

    .sidebar-menu {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .menu-item {
        font-size: 18px;
        color: #888;
        /* Сірий текст */
        padding: 15px 0;
        width: 300px;
        /* Довжина лінії */
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
        cursor: pointer;
        border-bottom: 1px solid #ccc;
        /* Нижня лінія */
        transition: all 0.3s ease;
    }

    a {
        text-decoration: none;

        color: #888;
        /* Сірий колір для посилань */
        transition: color 0.3s ease;
    }

    .menu-item:hover {
        color: #8b4513;
        /* Коричневий текст при наведенні */
        border-bottom-color: #8b4513;
        /* Коричнева лінія при наведенні */
    }

    .menu-item:hover a {
        color: #8b4513;
        /* Коричневий колір для посилань при наведенні */
    }

    .arrow {
        font-size: 18px;
        color: #888;
        /* Сіра стрілка */
        transition: color 0.3s ease;
    }

    .menu-item:hover .arrow {
        color: #8b4513;
        /* Коричнева стрілка при наведенні */
    }
</style>

<div class="sidebar">

    <ul class="sidebar-menu">
        <li class="menu-item"><a href="{{ route('adminpanel') }}">Замовлення <span class="arrow">></span></a></li>
        <li class="menu-item"><a href="{{ route('adminpanel.adminorderhistory') }}">Історія замовлень <span
                    class="arrow">></span></a></li>
        <li class="menu-item"><a href="{{ route('adminpanel.adminbooks') }}">Книги <span class="arrow">></span></a></li>
        <li class="menu-item"><a href="{{ route('adminpanel.adminaddbooks') }}">Додати товар <span
                    class="arrow">></span></a></li>
        <li class="menu-item"><a href="{{ route('adminpanel.adminmoderationbooks') }}">Модерація книг <span
                    class="arrow">></span></a></li>
    </ul>
</div>