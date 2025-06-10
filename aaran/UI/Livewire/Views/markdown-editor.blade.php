<!-- resources/views/components/markdown.blade.php -->
@php
    $editorId = 'markdown-editor-' . Str::random(8);
@endphp

<div
    x-data="{ tab: 'write' }"
    class="markdown-editor bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden"
    wire:ignore
>
    <!-- resources/views/components/markdown-toolbar.blade.php -->
    <div class="flex items-center px-4 py-2 bg-gray-50 border-b border-gray-200">
        <!-- Heading Dropdown -->
        <div x-data="{ open: false }" class="relative inline-block text-left mr-2">
            <div>
                <button
                    @click="open = !open"
                    type="button"
                    class="inline-flex justify-center w-full rounded-md border border-gray-300 shadow-sm px-3 py-1 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                >
                    Headings
                    <x-Ui::icons.icon icon="chevron" class="-ml-0.5 mr-2 h-4 w-4"/>
                </button>
            </div>

            <div
                x-show="open"
                @click.away="open = false"
                class="origin-top-left absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 z-10"
            >
                <div class="py-1">
                    <button
                        @click="$wire.insertMarkdown('# '); open = false"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left"
                    >
                        Heading 1 (#)
                    </button>
                    <button
                        @click="$wire.insertMarkdown('## '); open = false"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left"
                    >
                        Heading 2 (##)
                    </button>
                    <button
                        @click="$wire.insertMarkdown('### '); open = false"
                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left"
                    >
                        Heading 3 (###)
                    </button>
                </div>
            </div>
        </div>

        <!-- Formatting Buttons -->
        <button
            @click="$wire.insertMarkdown('**bold text**')"
            title="Bold"
            class="p-1 rounded hover:bg-gray-200 mr-1"
        >
            <span class="font-bold">B</span>
        </button>

        <button
            @click="$wire.insertMarkdown('*italic text*')"
            title="Italic"
            class="p-1 rounded hover:bg-gray-200 mr-1"
        >
            <span class="italic">I</span>
        </button>

        <button
            @click="$wire.insertMarkdown('[link text](url)')"
            title="Link"
            class="p-1 rounded hover:bg-gray-200 mr-1"
        >
            <x-Ui::icons.icon icon="plus" class="-ml-0.5 mr-2 h-4 w-4"/>
        </button>

        <button
            @click="$wire.insertMarkdown('![alt text](image-url)')"
            title="Image"
            class="p-1 rounded hover:bg-gray-200 mr-2"
        >
            <x-Ui::icons.icon icon="plus" class="-ml-0.5 mr-2 h-4 w-4"/>
        </button>

        <!-- List Buttons -->
        <button
            @click="$wire.insertMarkdown('- List item')"
            title="Unordered List"
            class="p-1 rounded hover:bg-gray-200 mr-1"
        >
            <x-Ui::icons.icon icon="plus" class="-ml-0.5 mr-2 h-4 w-4"/>

        </button>

        <button
            @click="$wire.insertMarkdown('1. List item')"
            title="Ordered List"
            class="p-1 rounded hover:bg-gray-200 mr-2"
        >
            <x-Ui::icons.icon icon="plus" class="-ml-0.5 mr-2 h-4 w-4"/>
        </button>

        <!-- Code Block -->
        <button
            @click="$wire.insertMarkdown('```\ncode block\n```')"
            title="Code Block"
            class="p-1 rounded hover:bg-gray-200 mr-1"
        >
            <x-Ui::icons.icon icon="plus" class="-ml-0.5 mr-2 h-4 w-4"/>
        </button>

        <!-- Blockquote -->
        <button
            @click="$wire.insertMarkdown('> Blockquote')"
            title="Blockquote"
            class="p-1 rounded hover:bg-gray-200"
        >
            <x-Ui::icons.icon icon="plus" class="-ml-0.5 mr-2 h-4 w-4"/>
        </button>
    </div>


    <!-- Content Area -->
    <div class="border-t border-gray-200">
        <!-- Tabs -->
        <div class="flex border-b border-gray-200">
            <button
                @click="tab = 'write'"
                :class="{ 'bg-gray-100 text-gray-900': tab === 'write' }"
                class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none"
            >
                Write
            </button>
            <button
                @click="tab = 'preview'"
                :class="{ 'bg-gray-100 text-gray-900': tab === 'preview' }"
                class="px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-700 focus:outline-none"
            >
                Preview
            </button>
        </div>

        <!-- Editor/Preview -->
        <div class="p-4">
            <div x-show="tab === 'write'">
                <textarea
                    x-ref="editor"
                    wire:model.lazy="content"
                    class="w-full h-64 p-2 border border-gray-300 rounded-md focus:ring-indigo-500 focus:border-indigo-500"
                    placeholder="Write your markdown here..."
                ></textarea>
            </div>

            <div x-show="tab === 'preview'" class="prose max-w-none">
                @markdown($content)
            </div>
        </div>
    </div>

    <!-- File Upload Section -->
    <div class="border-t border-gray-200 p-4 bg-gray-50">
        <div x-data="{ isUploading: false }" class="space-y-2">
            <input
                type="file"
                wire:model="uploads"
                multiple
                class="hidden"
                id="{{ $editorId }}-upload"
                @change="isUploading = true; $wire.uploadFiles()"
            >

            <label
                for="{{ $editorId }}-upload"
                class="inline-flex items-center px-3 py-2 border border-gray-300 shadow-sm text-sm leading-4 font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 cursor-pointer"
            >
                <x-Ui::icons.icon icon="pencil" class="-ml-0.5 mr-2 h-4 w-4" />
                Upload Images
            </label>

            <div x-show="isUploading" x-transition class="pt-2">
                <div class="flex items-center space-x-2">
                    <div class="w-full bg-gray-200 rounded-full h-2.5">
                        <div
                            class="bg-indigo-600 h-2.5 rounded-full"
                            :style="'width: ' + $wire.uploadProgress + '%'"
                        ></div>
                    </div>
                    <span x-text="$wire.uploadProgress.toFixed(0) + '%'"></span>
                </div>
                <p x-show="$wire.uploadError" class="mt-1 text-sm text-red-600">
                    <span x-text="$wire.uploadError"></span>
                </p>
            </div>
        </div>
    </div>
</div>

@push('custom-script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Livewire.on('markdown-focus', () => {
                const editor = document.querySelector('[x-ref="editor"]');
                if (editor) {
                    editor.focus();
                }
            });
        });
    </script>
    <script>
        // In your markdown-editor.js
        document.querySelectorAll('.markdown-editor textarea').forEach(el => {
            el.addEventListener('keydown', function(e) {
                // Tab key support
                if (e.key === 'Tab') {
                    e.preventDefault();
                    const start = this.selectionStart;
                    const end = this.selectionEnd;
                    this.value = this.value.substring(0, start) + '\t' + this.value.substring(end);
                    this.selectionStart = this.selectionEnd = start + 1;
                }

                // Bold with Ctrl+B
                if (e.ctrlKey && e.key === 'b') {
                    e.preventDefault();
                    const start = this.selectionStart;
                    const end = this.selectionEnd;
                    const selectedText = this.value.substring(start, end);
                    this.value = this.value.substring(0, start) + '**' + selectedText + '**' + this.value.substring(end);
                    this.selectionStart = start + 2;
                    this.selectionEnd = end + 2;
                }
            });
        });

    </script>

@endpush
