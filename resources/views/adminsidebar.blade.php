<style>
    body {
        font-family: Arial, sans-serif;
    }

    .sidebar {
        margin-left: 50px;
        margin-right: 100px;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f4f4f4;
    }

    .sidebar-menu {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }

    .menu-item {
        font-size: 18px;
        color: #888;
        padding: 15px 0;
        width: 300px;
        display: flex;
        justify-content: flex-start;
        align-items: center;
        position: relative;
        cursor: pointer;
        border-bottom: 1px solid #ccc;
        transition: all 0.3s ease;
    }

    a {
        text-decoration: none;
        color: inherit; /* Використовуємо колір батьківського елемента */
        transition: color 0.3s ease;
        flex-grow: 1;
    }

    .menu-item:hover {
        color: #8b4513; /* Коричневий текст при наведенні */
        border-bottom-color: #8b4513; /* Коричнева лінія при наведенні */
    }

    .menu-item:hover a {
        color: #8b4513; /* Коричневий колір для посилань при наведенні */
    }

    .active {
        color: #8b4513; /* Коричневий текст для активного пункту */
        border-bottom-color: #8b4513; /* Коричнева лінія для активного пункту */
    }

    .active a {
        color: #8b4513; /* Коричневий колір для посилань активного пункту */
    }

    .arrow {
        font-size: 18px;
        color: #888; /* Сіра стрілка */
        transition: color 0.3s ease;
        position: absolute;
        right: 0; /* Вирівнювання стрілки по правому краю */
    }

    .menu-item:hover .arrow {
        color: #8b4513; /* Коричнева стрілка при наведенні */
    }
</style>


<div class="sidebar">
    <ul class="sidebar-menu">
        <li class="menu-item {{ request()->routeIs('adminpanel') ? 'active' : '' }}">
            <a href="{{ route('adminpanel') }}">Замовлення</a><span class="arrow">></span>
        </li>
        <li class="menu-item {{ request()->routeIs('adminpanel.adminorderhistory') ? 'active' : '' }}">
            <a href="{{ route('adminpanel.adminorderhistory') }}">Історія замовлень</a><span class="arrow">></span>
        </li>
        <li class="menu-item {{ request()->routeIs('adminpanel.adminbooks') ? 'active' : '' }}">
            <a href="{{ route('adminpanel.adminbooks') }}">Книги</a><span class="arrow">></span>
        </li>
        <li class="menu-item {{ request()->routeIs('adminpanel.adminaddbooks') ? 'active' : '' }}">
            <a href="{{ route('adminpanel.adminaddbooks') }}">Додати товар</a><span class="arrow">></span>
        </li>
        <li class="menu-item {{ request()->routeIs('adminpanel.adminmoderationbooks') ? 'active' : '' }}">
            <a href="{{ route('adminpanel.adminmoderationbooks') }}">Модерація книг</a><span class="arrow">></span>
        </li>
        <li class="menu-item">
            <a href="{{ route('index') }}">Вийти</a><span class="arrow">></span>
        </li>
    </ul>
</div>

<script>
    document.querySelectorAll('.menu-item').forEach(item => {
        item.addEventListener('click', function() {
            document.querySelectorAll('.menu-item').forEach(i => i.classList.remove('active'));
            this.classList.add('active');
        });
    });
</script>
