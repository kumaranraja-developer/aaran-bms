<div x-data="{ checkAll : false }"
     class="overflow-hidden w-full overflow-x-auto rounded-md border border-neutral-300 ">

    <table {{$attributes->merge(['class' => 'w-full text-left text-sm dark:bg-dark dark:text-dark-9 text-neutral-500 '])}}>

        <thead
            class="border-b dark:bg-dark-3 dark:text-dark-9 border-neutral-300  bg-neutral-200 dark:divide-dark-5 text-sm text-neutral-500  text-center">
        <tr>
            @if(isset($table_header))
                {{$table_header}}
            @endif
        </tr>
        </thead>

        <tbody class="divide-y dark:bg-dark-3 dark:text-dark-9 divide-neutral-300 dark:divide-dark-5 text-center">
        @if(isset($table_body))
            {{$table_body}}
        @endif
        </tbody>
    </table>
</div>
