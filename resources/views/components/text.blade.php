@props(['text'])

<span {{ $attributes->merge(['class' => '']) }} aria-label="{{ $text }}">
    @foreach (mb_str_split($text) as $index => $char)
        <span class="char-{{ $index }}" aria-hidden="true">{{ $char === ' ' ? "\u{00A0}" : $char }}</span>
    @endforeach
</span>
