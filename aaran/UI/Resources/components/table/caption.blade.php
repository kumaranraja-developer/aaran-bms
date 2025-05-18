@props([
    'caption'
])
<div class="flex items-center gap-x-3 dark:bg-dark dark:text-dark-9">
    <h2 class="text-lg font-medium dark:text-dark-9 text-gray-800 ">{{$caption}}</h2>
    <span class="px-3 py-1 text-xs text-blue-600 bg-blue-100 rounded-full ">{{$slot}}<span>&nbsp;Records</span></span>
</div>
