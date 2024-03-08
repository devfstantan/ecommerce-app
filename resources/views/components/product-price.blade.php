@props(['value', 'currency' => 'MAD'])

@php
   $formatted = Illuminate\Support\Number::currency($value, $currency,'fr');
@endphp

<span>{{$formatted}}</span>
