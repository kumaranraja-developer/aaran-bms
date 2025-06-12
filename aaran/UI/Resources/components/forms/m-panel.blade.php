@props([
    'margin' => ''
])
<div class="w-full border-t-[2px] border-t-blue-500 rounded-md shadow-lg  {{$margin}}">

    <x-Ui::alerts.notification />
    <div {{$attributes->merge(['class' => 'sm:p-5 p-2 bg-white rounded-md space-y-4 border-x border-b border-gray-200 min-h-screen dark:bg-dark dark:text-dark-9'])}} >
        {{$slot}}
    </div>
</div>
