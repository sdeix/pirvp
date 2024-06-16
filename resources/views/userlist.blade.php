<div style="display:flex; justify-content: space-evenly">
    @if(Auth::check() && Auth::user())
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
@foreach ($users as $user)
<div>

Логин <a href="user/{{$user->id}}">{{$user->login}}</a>
Роль {{$user->role}} 

@foreach ($userstyle as $style)
@if ($style->user_id==$user->id)
<div>{{$style->style_id}}</div>
@endif
@endforeach
<br><br><br>
</div>
@endforeach



</div>