@props([
    'hover' => 'hover:bg-yellow-50 dark:hover:bg-dark-4'
])

<tr {{$attributes->merge(['class' => $hover])}}>
    {{$slot}}
</tr>
