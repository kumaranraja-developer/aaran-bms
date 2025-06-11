@props([
    'icon',
    'title',
    'description',
    'bg' => 'bg-stone-100',
    'btn' => 'text-orange-400',
    'btn_text' => 'TRY NOW',
    'btn_bg'=>"bg-green-600"
])

<div class="bg-white dark:bg-dark-4  border rounded-lg border-neutral-300 hover:-translate-y-1.5 transform duration-500 h-full p-2 max-w-md w-full mx-auto">
    <a  href="{{route('bill-books')}}" role="button"
         class="{{$bg}} rounded-xs border dark:bg-dark-5 dark:text-dark-9 border-neutral-200 p-4 h-full flex flex-col justify-between">
        <div>
            <img src="{{ asset($icon) }}" alt="" class="w-24 h-24 object-contain" />
        </div>
        <div class="flex flex-col py-2 flex-grow">
            <div class="text-xl font-semibold dark:text-dark-9">{{ $title }}</div>
            <div class="my-3 text-neutral-500 flex-grow dark:text-dark-8">{{ $description }}</div>
            <button class="text-md px-3 w-max text-white py-2  cursor-pointer {{$btn}} {{$btn_bg}} my-4 mt-auto text-start">{{$btn_text}}</button>
        </div>
    </a>
</div>
