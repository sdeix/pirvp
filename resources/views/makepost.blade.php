<div style="display:flex; justify-content: space-evenly">
    @if(Auth::check() && Auth::user())
    {{ Auth::user()->login }}
    <a href="selectstyle/{{Auth::user()->id}}">Выбрать стили</a>
    @if(Auth::user()->role=='admin')
        <a href="makepost">Создать пост</a><br>
        <a href="makestyle">Создать стиль</a><br>
        <a href="users">Список пользователей</a><br>
    @endif
    <a href="logout">выйти({{Auth::user()->login}})</a>
    @else

    <a href="login">Авторизироваться</a>
    <a href="register">Зарегистрироваться</a>
@endif
<a href="/">главная страница</a>
    </div>
<div>
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" id="image">
        <input type="text" name="text" id="text">
        {{$message ?? ""}}
        <button type="submit">Создать пост</button>
    </form>
</div>