<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .sidebar {
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            background-color: #fff;
            padding-top: 20px;
            margin-left: 2rem;
            right: 100px;
        }

        .profile-section {
            text-align: left;
            margin-bottom: 20px;
            width: 100%;
            padding: 20px 0;
            background-color: #fff;
        }

        .profile-picture img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            object-fit: cover;
        }

        .profile-section h2 {
            font-size: 18px;
            margin: 0;
            color: #555;
        }

        .sidebar-menu {
            list-style-type: none;
            padding: 0;
            margin: 0;
            width: 100%;
            text-align: left;
        }

        .menu-item {
            font-size: 18px;
            color: #888;
            padding: 15px 0;
            width: 300px;
            display: flex;
            justify-content: flex-start;
            align-items: left;
            position: relative;
            cursor: pointer;
            border-bottom: 1px solid #ccc;
            transition: all 0.3s ease;
            margin: 0 auto;
        }

        .menu-item a {
            text-decoration: none;
            color: inherit;
            transition: color 0.3s ease;
            flex-grow: 1;
        }

        /* Стиль для активного пункту меню */
        .menu-item.active, .menu-item.active a {
            color: #8b4513;
            border-bottom-color: #8b4513;
        }

        .arrow {
            font-size: 18px;
            color: #888;
            position: absolute;
            right: 0;
        }

        .menu-item.active .arrow {
            color: #8b4513;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="profile-section">
            <div class="profile-picture">
                <img id="profileImage" src="https://cdn-icons-png.flaticon.com/512/4792/4792929.png" alt="Profile Picture">
            </div>
            <h2>{{ Auth::user()->name }}</h2>
        </div>

        <ul class="sidebar-menu">
            <li class="menu-item {{ Request::routeIs('index') ? 'active' : '' }}">
                <a href="{{ route('index') }}">Домівка</a><span class="arrow">></span>
            </li>
            <li class="menu-item {{ Request::routeIs('library') ? 'active' : '' }}">
                <a href="{{ route('library') }}">Бібліотека</a><span class="arrow">></span>
            </li>
            <li class="menu-item {{ Request::routeIs('user.books.index') ? 'active' : '' }}">
                <a href="{{ route('user.books.index') }}">Ваші книги</a><span class="arrow">></span>
            </li>
            <li class="menu-item {{ Request::routeIs('book.upload') ? 'active' : '' }}">
                <a href="{{ route('book.upload') }}">Завантажити книгу</a><span class="arrow">></span>
            </li>
            <li class="menu-item {{ Request::routeIs('saved.index') ? 'active' : '' }}">
                <a href="{{ route('saved.index') }}">Збережене</a><span class="arrow">></span>
            </li>
            <li class="menu-item {{ Request::routeIs('profile.show') ? 'active' : '' }}">
                <a href="{{ route('profile.show') }}">Профіль</a><span class="arrow">></span>
            </li>
        </ul>

        <a href="{{ route('adminpanel') }}">adm</a>
    </div>
</body>
</html>