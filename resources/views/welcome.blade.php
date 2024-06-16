<div>
@if(Auth::check())
    <p>Привет, {{ Auth::user()->login }}</p>
@else
    <p>Пожалуйста, войдите</p>
@endif
</div>