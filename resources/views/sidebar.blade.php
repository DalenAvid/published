<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
    }

    .sidebar {
        margin-left:-62px;
        width: 250px;
        color: white;
        height: 100vh;
        position: fixed;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .sidebar h2 {
        margin-top: 10px;
        text-align: center;
    }

    .sidebar ul {
        list-style-type: none;
        padding: 0;
        width: 100%;
        padding-left: 140px;
    }

    .sidebar ul li {
        width: 100%;
        border-bottom: 1px solid black;
        position: relative;
    }

    .sidebar ul li a {
        display: block;
        padding: 15px 0px;
        color: black;
        text-decoration: none;
        width: 100%;
    }

    .sidebar ul li a:hover {
        color: brown;
    }

    .sidebar ul li::before {
        content: '>';
        position: absolute;
        right: 3px;
        top: 15px;
        color: black;
    }

    .content {
        margin-left: 250px;
        padding: 20px;
        flex-grow: 1;
    }
</style>
<div class="sidebar">
    <div class="profile-section">
        <div class="profile-picture">
            <img style="width: 100px; height: 100px; margin-right: -50px;"  id="profileImage" src="https://cdn-icons-png.flaticon.com/512/4792/4792929.png">
            <h2>{{ Auth::user()->name }}</h2>
        </div>

    </div>
    <h2>Меню</h2>
    <ul>
        <li><a href="{{ route('index') }}">Домівка</a></li>
        <li><a href="{{ route('library') }}">Бібліотека</a></li>
        <li><a href="{{ route('user.books.index') }}">Ваші книги</a></li>
        {{-- <li><a href="#services">Ваші книги</a></li> --}}
        <li><a href="{{ route('book.upload') }}">Завантажити книгу</a></li>
        <li><a href="{{ route('saved.index') }}">Збережене</a></li>
        <li><a href="{{ route('profile.show') }}">Профіль</a></li>
    </ul>
    <a href="{{ route('adminpanel') }}">adm</a>
</div>

