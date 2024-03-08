@props(['stars','class'=> ''])

<div class="d-flex small text-warning mb-2 {{$class}}">
    @for ($i = 0; $i < $stars; $i++)
        <div class="bi-star-fill"></div>
    @endfor
</div>
