<div>
    <form action="" method="post">
        @csrf
        <input type="login" name="login" id="login">
        <input type="password" name="password" id="password">
        <button type="submit" name="submit">Зарегистрироваться</button>
        {{$message ?? ""}}
    </form>
</div>