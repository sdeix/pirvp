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
    <form action="" method="post" >
        @csrf
        <input type="checkbox" checked="checked" name="img">
        <label for="img">Показывать изображения?</label>
        <br>
        <input type="number" value="0" name="invert" id="" min="0" max="100">
        <label for="invert">invert</label>
        <br>
        <input type="number" value="0" name="blur" id="" min="0" max="100">
        <label for="invert">blur</label>
        <br>
        <input type="number" value="100" name="contrast" id="" min="0" max="100">
        <label for="invert">contrast</label>
        <br>
        <input type="number" value="100" name="brightness" id="" min="0" max="100">
        <label for="invert">brightness</label>
        <br>
        <input type="number" value="0" name="grayscale" id="" min="0" max="100">
        <label for="invert">grayscale</label>
        <br>
        <input type="number" value="100" name="opacity" id="" min="0" max="100">
        <label for="invert">opacity</label>
        <br>
        <input type="number" value="100" name="saturate" id="" min="0" max="100">
        <label for="invert">saturate</label>
        <br>
        <input type="number" value="0" name="sepia" id="" min="0" max="100">
        <label for="invert">sepia</label>
        <br>
        <input type="number" value="16" name="{font-size}" id="" min="1" max="100">
        <label for="invert">font-size</label>
        <br>
        <input type="number" value="100" name="{font-weight}" id="" min="100" max="2000">
        <label for="invert">font-weight</label>
        <br>
        <button type="submit">Создать стиль</button><br>
        {{$message ?? ""}}
    </form>
</div>