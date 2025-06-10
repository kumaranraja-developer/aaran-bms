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
