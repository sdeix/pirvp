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
<h1>Добавить стиль</h1>
@foreach ($users as $user)
<div>

Логин <a href="user/{{$user->id}}">{{$user->login}}</a><br>
Роль {{$user->role}} <br>
Стили<br>
@foreach ($userstyle as $style)
@if ($style->user_id==$user->id)
<div>{{$style->style_id}} <a href="../deletestyle/{{$user->id}}/{{$style->style_id}}">удалить стиль</a></div>
@endif
@endforeach
<form action="../addstyle" method="post" >
@csrf
<select name="style_id" id="">
@foreach ($styles as $style)
<option value="{{$style->id}}">{{$style->id}}</option>
@endforeach
<input type="text" hidden name="user_id" value="{{$user->id}}">
<button type="submit">Добавить стиль</button>
</select>

</form>

</div>
@endforeach



</div>