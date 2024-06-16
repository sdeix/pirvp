<div>
    <form action="" method="post">
        @csrf
        <input type="text" name="login" id="login">
        <input type="password" name="password" id="password">
        <button type="submit" name="submit">Войти</button>
        {{$message ?? ""}}
    </form>
</div>