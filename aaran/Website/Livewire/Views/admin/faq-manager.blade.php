
    {{-- The Master doesn't talk, he acts. --}}
    <div class="p-4 space-y-4">
        <form wire:submit.prevent="saveFaq" class="space-y-2">
            <input wire:model="question" type="text" class="w-full border p-2 mt-18 rounded" placeholder="Enter question">
            <textarea wire:model="answer" rows="3" class="w-full border p-2 rounded" placeholder="Enter answer (optional)"></textarea>
            <button class="bg-blue-600 text-white px-4 py-2 rounded">Save FAQ</button>
        </form>

        <hr>

        <h3 class="text-lg font-semibold">All FAQs</h3>
        @foreach($faqs as $faq)
            <div class="border p-3 rounded shadow-sm">
                <div class="font-semibold">{{ $faq->question }}</div>
                <div class="text-sm text-gray-600">{{ $faq->answer ?? 'No answer yet' }}</div>
                <div class="mt-2 space-x-2">
                    <button wire:click="editFaq({{ $faq->id }})" class="text-blue-600">Edit</button>
                    <button wire:click="deleteFaq({{ $faq->id }})" class="text-red-600">Delete</button>
                </div>
            </div>
        @endforeach
    </div>


