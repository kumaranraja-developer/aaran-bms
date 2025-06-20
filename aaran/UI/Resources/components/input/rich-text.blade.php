 @props([
'height'=>'h-64',
'width'=>'w-full',
'placeholder'=>null,
'name' => 'x'
])

<div wire:ignore.self class="rounded-md shadow-sm " x-data="{
        value: @entangle($attributes->wire('model')),
        isFocused() { return document.activeElement !== this.$refs.trix },
        setValue() { this.$refs.trix.editor.loadHTML(this.value) }
    }" x-init="setValue(); $watch('value', () => isFocused() && setValue())" x-on:trix-change="value = $event.target.value" {{ $attributes->whereDoesntStartWith('wire:model') }}>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
    <style>
        [data-trix-button-group="file-tools"] {
            display: none !important;
        }

    </style>
    <input id="{{$name}}" class="hidden">
    <trix-editor x-ref="trix" input="{{$name}}" placeholder="{{$placeholder}}" class="overflow-y-auto text-ellipsis form-textarea block text text-xs
                    rounded-lg appearance-none border-2 {{$height}} {{$width}}
                    border-none py-2 px-3 bg-white text-zinc-700 dark:bg-dark dark:text-dark-9
                    placeholder-gray-400 text-base focus:outline-none
                    focus:ring-1 focus:ring-blue-500 focus:border-transparent transition duration-150 ease-in-out"></trix-editor>
</div>


