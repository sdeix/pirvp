

<a href="/"></a>
<div >
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
    </div>



    
@foreach ($posts as $post)
<div style="{{$style ?? ''}}; border:1px solid black; margin:10px; padding: 10px; max-width:1000px">

<img style="max-width: 1000px;" src="images/{{$post->img}}" alt="">
{{$post->text}}
</div>


@endforeach

</div>