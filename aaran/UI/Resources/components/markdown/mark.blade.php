@props([
    'name' => 'markdown-editor', // Name for the textarea (if used in a form)
    'value' => '', // Initial content for the editor
    'placeholder' => 'Type / for commands...', // Placeholder text
    'preview' => true, // Whether to show the preview tab
    'uploadUrl' => null, // URL for file uploads (optional, e.g., '/upload-image')
])

{{-- The main container for the markdown editor component.
     x-data initializes the Alpine.js component scope.
     x-init calls the init() method once Alpine.js has initialized this component.
     x-on:click.outside hides slash commands if the user clicks anywhere outside this editor component.
     $attributes->merge combines any additional attributes passed to the component from its parent. --}}
<div x-data="markdownEditor(@js($value), @js($preview), @js($uploadUrl))"
     x-init="init()"
     class="relative border border-gray-300 rounded-md shadow-sm w-full mx-auto my-4 text-black max-w-3xl bg-white"
     x-on:click.outside="showSlashCommands = false"
    {{ $attributes->merge(['id' => $name . '-wrapper']) }}>

    {{-- Toolbar Section: Contains buttons for formatting and mode switching --}}
    <div class="flex items-center px-3 py-2 border-b border-gray-300 bg-gray-50 rounded-t-md">
        <div class="flex space-x-1">
            {{-- Bold Button --}}
            <button type="button"
                    @click="insertText('**', '**', 'bold text')"
                    class="p-1 rounded hover:bg-gray-200 transition duration-150 ease-in-out"
                    title="Bold">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h-2.5a3.5 3.5 0 00-3.5 3.5v.5a3.5 3.5 0 003.5 3.5H14c2.761 0 5-2.239 5-5s-2.239-5-5-5z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 3h-2.5a3.5 3.5 0 00-3.5 3.5v.5a3.5 3.5 0 003.5 3.5H14c2.761 0 5-2.239 5-5s-2.239-5-5-5z"></path>
                </svg>
            </button>
            {{-- Italic Button --}}
            <button type="button"
                    @click="insertText('*', '*', 'italic text')"
                    class="p-1 rounded hover:bg-gray-200 transition duration-150 ease-in-out"
                    title="Italic">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 5h4M10 19h4M13 5l-4 14m4-14l-4 14"></path>
                </svg>
            </button>
            {{-- Link Button --}}
            <button type="button"
                    @click="insertText('[', '](https://example.com)', 'link text')"
                    class="p-1 rounded hover:bg-gray-200 transition duration-150 ease-in-out"
                    title="Insert Link">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.107-1.107"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.172 13.828a4 4 0 005.656 0l4-4a4 4 0 10-5.656-5.656l-1.107 1.107"></path>
                </svg>
            </button>
            {{-- Code Button --}}
            <button type="button"
                    @click="insertText('```\n', '\n```', 'your code here')"
                    class="p-1 rounded hover:bg-gray-200 transition duration-150 ease-in-out"
                    title="Insert Code Block">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 20l-4-4 4-4"></path>
                </svg>
            </button>
        </div>

        {{-- Mode Switcher (Write/Preview) --}}
        @if($preview)
            <div class="ml-auto flex border border-gray-300 rounded-md overflow-hidden">
                <button type="button"
                        @click="mode = 'write'"
                        :class="{'bg-blue-500 text-white shadow': mode === 'write', 'bg-gray-100 text-gray-700 hover:bg-gray-200': mode !== 'write'}"
                        class="px-4 py-2 text-sm font-medium transition duration-150 ease-in-out focus:outline-none">
                    Write
                </button>
                <button type="button"
                        @click="mode = 'preview'"
                        :class="{'bg-blue-500 text-white shadow': mode === 'preview', 'bg-gray-100 text-gray-700 hover:bg-gray-200': mode !== 'preview'}"
                        class="px-4 py-2 text-sm font-medium transition duration-150 ease-in-out focus:outline-none border-l border-gray-300">
                    Preview
                </button>
            </div>
        @endif
    </div>

    {{-- Editor Area --}}
    <div class="relative">
        {{-- Slash Commands Dropdown --}}
        <div x-show="showSlashCommands && filteredCommands.length > 0"
             x-transition:enter="transition ease-out duration-100"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-75"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="absolute z-20 w-56 mt-1 ml-2 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none max-h-60 overflow-y-auto"
             tabindex="-1">
            <div class="py-1" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                <template x-for="(command, index) in filteredCommands" :key="index">
                    <button type="button"
                            @click="selectCommand(command)"
                            :class="{'bg-blue-100': command === activeCommand}"
                            class="block w-full px-4 py-2 text-left text-sm text-gray-700 hover:bg-blue-50 transition duration-150 ease-in-out"
                            x-text="command.label"
                            role="menuitem">
                    </button>
                </template>
            </div>
        </div>

        {{-- Textarea for writing Markdown --}}
        <textarea x-ref="editor"
                  x-model="content"
                  :name="$name" {{-- Binds the name prop to the textarea's name attribute --}}
                  :placeholder="placeholder"
{{--                  x-show="mode === 'write'"--}}
                  class="w-full px-4 py-3 min-h-[300px] text-gray-800 border-0 focus:ring-0 focus:outline-none resize-y font-mono text-sm bg-white"
                  @input="handleInput"
                  @keydown.tab.prevent="insertTab"
                  @keydown.escape="showSlashCommands = false" {{-- Hide commands on Escape --}}
                  @keydown.arrow-up.prevent="navigateCommands('up')"
                  @keydown.arrow-down.prevent="navigateCommands('down')"
                  @keydown.enter.prevent="showSlashCommands ? selectCommand(activeCommand) : null" {{-- Select on Enter --}}
        ></textarea>
    </div>

    {{-- Preview Area --}}
    {{-- 'markdown-body' class is crucial here for github-markdown-css to apply.
         'prose' is intentionally removed to avoid conflicts if you use @tailwindcss/typography. --}}
    <div x-show="mode === 'preview' && preview"
         class="p-4 bg-gray-50 rounded-b-md overflow-auto min-h-[300px] markdown-body"
         x-html="previewContent"></div>

    {{-- File Upload Section (Optional) --}}
    @if($uploadUrl)
        <div class="px-3 py-2 border-t border-gray-300 bg-gray-50 rounded-b-md flex items-center">
            <input type="file" @change="uploadFile" class="hidden" x-ref="fileInput">
            <button type="button"
                    @click="$refs.fileInput.click()"
                    class="text-sm text-gray-600 hover:text-blue-700 font-medium transition duration-150 ease-in-out flex items-center space-x-2">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13l-3 3m0 0l-3-3m3 3V4m0 16a2 2 0 100-4 2 2 0 000 4z"></path>
                </svg>
                <span>Attach files or drag & drop here</span>
            </button>
            <span x-show="uploading" class="ml-3 text-sm text-blue-500">Uploading...</span>
        </div>
    @endif
</div>

{{-- Alpine.js Data Definition. Pushed to 'scripts' stack to ensure it loads after Alpine itself. --}}
@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('markdownEditor', (initialContent, hasPreview, uploadUrl) => ({
                content: initialContent,
                previewContent: '',
                mode: 'write', // Default to 'write' mode so the editor is visible on load
                showSlashCommands: false,
                commands: [
                    { label: 'Heading 1', pattern: '# ', type: 'heading' },
                    { label: 'Heading 2', pattern: '## ', type: 'heading' },
                    { label: 'Heading 3', pattern: '### ', type: 'heading' },
                    { label: 'Bold', pattern: '**', placeholder: 'bold text', type: 'wrap' },
                    { label: 'Italic', pattern: '*', placeholder: 'italic text', type: 'wrap' },
                    { label: 'Link', pattern: '[', after: '](url)', placeholder: 'link text', type: 'link' },
                    { label: 'Image', pattern: '![', after: '](url)', placeholder: 'alt text', type: 'image' },
                    { label: 'Code Block', pattern: '```\n', after: '\n```', placeholder: 'your code here', type: 'block' },
                    { label: 'Inline Code', pattern: '`', after: '`', placeholder: 'code', type: 'wrap' },
                    { label: 'Unordered List', pattern: '- ', type: 'block' },
                    { label: 'Ordered List', pattern: '1. ', type: 'block' },
                    { label: 'Blockquote', pattern: '> ', type: 'block' },
                    { label: 'Table', pattern: '| Header 1 | Header 2 |\n|---|---|\n| Cell 1 | Cell 2 |', type: 'block' },
                ],
                filteredCommands: [],
                activeCommand: null, // Tracks the currently highlighted command
                uploading: false,

                init() {
                    this.content = initialContent;
                    this.updatePreview();
                    this.mode = 'write'; // Ensure editor is visible on initial load

                    this.$nextTick(() => {
                        // Attempt to focus the editor if it exists
                        if (this.$refs.editor) {
                            this.$refs.editor.focus();
                        }
                    });
                },

                handleInput(event) {
                    this.updatePreview(); // Update preview on every input
                    this.handleSlashCommands(event); // Check for slash commands
                },

                handleSlashCommands(event) {
                    const textarea = event.target;
                    const cursorPosition = textarea.selectionStart;
                    const textBeforeCursor = textarea.value.substring(0, cursorPosition);
                    const lastSlashIndex = textBeforeCursor.lastIndexOf('/');

                    // If a slash is found and it's at the end of the input (or followed by a potential command)
                    if (lastSlashIndex !== -1 && (cursorPosition - lastSlashIndex === 1 || textBeforeCursor.substring(lastSlashIndex + 1).match(/^[a-zA-Z0-9\s]*$/))) {
                        const commandSearch = textBeforeCursor.substring(lastSlashIndex + 1).toLowerCase();
                        this.filteredCommands = this.commands.filter(command =>
                            command.label.toLowerCase().includes(commandSearch)
                        );
                        this.showSlashCommands = this.filteredCommands.length > 0;
                        if (this.showSlashCommands) {
                            this.activeCommand = this.filteredCommands[0]; // Highlight first command
                        } else {
                            this.activeCommand = null;
                        }
                    } else {
                        this.showSlashCommands = false;
                        this.filteredCommands = [];
                        this.activeCommand = null;
                    }
                },

                navigateCommands(direction) {
                    if (!this.showSlashCommands || this.filteredCommands.length === 0) return;

                    const currentIndex = this.filteredCommands.indexOf(this.activeCommand);
                    let newIndex = currentIndex;

                    if (direction === 'up') {
                        newIndex = currentIndex > 0 ? currentIndex - 1 : this.filteredCommands.length - 1;
                    } else if (direction === 'down') {
                        newIndex = currentIndex < this.filteredCommands.length - 1 ? currentIndex + 1 : 0;
                    }
                    this.activeCommand = this.filteredCommands[newIndex];

                    // Scroll the active command into view
                    this.$nextTick(() => {
                        const activeElement = this.$el.querySelector('.bg-blue-100'); // Assuming this class is applied
                        if (activeElement) {
                            activeElement.scrollIntoView({ block: 'nearest' });
                        }
                    });
                },

                selectCommand(command) {
                    if (!command) return; // Ensure a command is selected
                    this.insertCommand(command);
                    this.showSlashCommands = false;
                },

                // New method to handle tab indentation
                insertTab(event) {
                    const textarea = this.$refs.editor;
                    const start = textarea.selectionStart;
                    const end = textarea.selectionEnd;

                    // Insert two spaces (or a tab character '\t')
                    this.content = this.content.substring(0, start) + "  " + this.content.substring(end);

                    // Move cursor after the inserted spaces
                    this.$nextTick(() => {
                        textarea.selectionStart = textarea.selectionEnd = start + 2;
                        textarea.focus();
                    });
                },

                // This function uses marked.js for better Markdown to HTML conversion.
                // Make sure marked.js is loaded in your main layout file!
                updatePreview() {
                    if (!hasPreview) return;
                    try {
                        if (typeof marked !== 'undefined') {
                            // Using marked.js for robust Markdown parsing
                            this.previewContent = marked.parse(this.content);
                        } else {
                            // Fallback to basic regex if marked.js is not loaded
                            console.warn('marked.js not found. Falling back to basic regex markdown parsing.');
                            this.previewContent = this.content
                                .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>')
                                .replace(/\*(.*?)\*/g, '<em>$1</em>')
                                .replace(/`(.*?)`/g, '<code>$1</code>')
                                .replace(/^# (.*$)/gm, '<h1>$1</h1>')
                                .replace(/^## (.*$)/gm, '<h2>$1</h2>')
                                .replace(/^### (.*$)/gm, '<h3>$1</h3>')
                                .replace(/^- (.*$)/gm, '<li>$1</li>')
                                .replace(/^> (.*$)/gm, '<blockquote>$1</blockquote>')
                                .replace(/\[(.*?)\]\((.*?)\)/g, '<a href="$2">$1</a>');
                            // Add more regex replacements for other markdown elements as needed
                        }
                    } catch (e) {
                        console.error("Error parsing markdown:", e);
                        this.previewContent = `<p style="color: red;">Error rendering markdown: ${e.message}</p>`;
                    }
                },

                // Helper to insert text at the cursor position, supporting selection and placeholders
                insertText(before, after = '', placeholder = '') {
                    const textarea = this.$refs.editor;
                    const startPos = textarea.selectionStart;
                    const endPos = textarea.selectionEnd;
                    const selectedText = this.content.substring(startPos, endPos);

                    let newContent;
                    let newCursorPos;

                    if (selectedText.length > 0) {
                        newContent = this.content.substring(0, startPos) + before + selectedText + after + this.content.substring(endPos);
                        newCursorPos = startPos + before.length + selectedText.length + after.length;
                    } else if (placeholder.length > 0) {
                        newContent = this.content.substring(0, startPos) + before + placeholder + after + this.content.substring(endPos);
                        newCursorPos = startPos + before.length; // Place cursor at start of placeholder
                    } else {
                        newContent = this.content.substring(0, startPos) + before + after + this.content.substring(endPos);
                        newCursorPos = startPos + before.length;
                    }

                    this.content = newContent;

                    // Ensure cursor position is updated after content renders
                    this.$nextTick(() => {
                        if (placeholder.length > 0 && selectedText.length === 0) {
                            textarea.selectionStart = newCursorPos;
                            textarea.selectionEnd = newCursorPos + placeholder.length;
                        } else {
                            textarea.selectionStart = newCursorPos;
                            textarea.selectionEnd = newCursorPos;
                        }
                        textarea.focus();
                    });
                },

                // Inserts a markdown command after clearing the slash input
                insertCommand(command) {
                    const textarea = this.$refs.editor;
                    const cursorPosition = textarea.selectionStart;
                    const textBeforeCursor = this.content.substring(0, cursorPosition);
                    const lastSlashIndex = textBeforeCursor.lastIndexOf('/');

                    // If a slash was used to trigger the command, remove it and the partial command text
                    if (lastSlashIndex !== -1) {
                        this.content = textBeforeCursor.substring(0, lastSlashIndex) + this.content.substring(cursorPosition);
                        // Adjust cursor position back to where the slash was
                        this.$nextTick(() => {
                            textarea.selectionStart = lastSlashIndex;
                            textarea.selectionEnd = lastSlashIndex;
                            // Then insert the full command pattern
                            this.insertText(command.pattern, command.after || '', command.placeholder || '');
                            this.showSlashCommands = false;
                        });
                    } else {
                        // If command was triggered by a button or other means, just insert
                        this.insertText(command.pattern, command.after || '', command.placeholder || '');
                        this.showSlashCommands = false;
                    }
                    this.activeCommand = null;
                },

                // Handles file uploads via fetch API
                uploadFile(event) {
                    if (!uploadUrl) {
                        console.warn('Upload URL not provided.');
                        return;
                    }

                    const file = event.target.files[0];
                    if (!file) return;

                    this.uploading = true; // Show uploading indicator

                    const formData = new FormData();
                    formData.append('file', file); // 'file' should match your backend's expected input name

                    fetch(uploadUrl, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            // IMPORTANT: Include CSRF token for Laravel backend
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                            // Do NOT set 'Content-Type': 'multipart/form-data' explicitly; fetch does this automatically
                        }
                    })
                        .then(response => {
                            this.uploading = false; // Hide uploading indicator
                            if (!response.ok) {
                                throw new Error(`HTTP error! status: ${response.status}`);
                            }
                            return response.json();
                        })
                        .then(data => {
                            if (data.url) {
                                // Insert image Markdown after successful upload
                                this.insertText(`![${file.name}](${data.url})`, '', '');
                            } else {
                                console.error('File upload failed: No URL returned from server.', data);
                                // Implement a user-friendly message for upload failure
                            }
                        })
                        .catch(error => {
                            this.uploading = false; // Hide uploading indicator
                            console.error('Error uploading file:', error);
                            // Implement a user-friendly error message
                        });
                }
            }));
        });
    </script>
@endpush
