@props([
    'id'=>null,
    'disableDelete' => false
])
<td class=" print:hidden ">
    <div class="flex justify-center items-center px-2 gap-3 self-center" onclick="event.stopPropagation()">
        <x-Ui::newtemplate.edit-delete-icon-button :type="'Edit'" wire:click="edit({{$id}})"/>

        @if(!$disableDelete)
            <x-Ui::newtemplate.edit-delete-icon-button :type="'Delete'" wire:click="confirmDelete({{$id}})"/>
        @endif

    </div>
</td>
