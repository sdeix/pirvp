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
@foreach ($styles as $style)
<div>

@foreach ($style as $style_i)
<p>ID стиля? - {{$style_i->id}}</p>
<p>Показывать изображения? - {{$style_i->img}}</p>
<p>invert - {{$style_i->invert}}</p>
<p>blur - {{$style_i->blur}}</p>
<p>contrast - {{$style_i->contrast}}</p>
<p>brightness - {{$style_i->brightness}}</p>
<p>grayscale - {{$style_i->grayscale}}</p>
<p>opacity - {{$style_i->opacity}}</p>
<p>saturate - {{$style_i->saturate}}</p>
<p>sepia - {{$style_i->sepia}}</p>
<p>font-size - {{$style_i->{"font-size"} }}</p>
<p>font-weight - {{$style_i->{"font-weight"} }}</p>
<a href="../select/{{Auth::user()->id}}/{{$style_i->id}}">Выбрать этот стиль</a>
@endforeach
</div>
<br><br><br>

@endforeach