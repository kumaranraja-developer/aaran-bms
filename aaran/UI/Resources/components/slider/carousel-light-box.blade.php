@props(['images' => []])

<style>
    .carousel::-webkit-scrollbar {
        display: none;
    }
</style>

<div x-data="carouselWithLightbox()" @keydown.window.escape="closeLightbox" class="relative w-full overflow-hidden">

    <!-- Carousel Wrapper -->
    <div class="relative group"> <!-- Added group class here -->
        <!-- Carousel Track -->
        <div class="flex overflow-x-auto scroll-smooth carousel snap-x snap-mandatory gap-4 px-20 pb-6">
            <template x-for="(image, index) in images" :key="index">
                <div class="flex-shrink-0 snap-start w-full sm:w-1/2 md:w-1/3 lg:w-1/5">
                    <div
                        class="h-48 bg-white border border-neutral-200 rounded-lg shadow-sm transition-transform transform
                        hover:-translate-y-1 hover:shadow-md overflow-hidden cursor-pointer"
                        @click="openLightbox(image, index)"
                    >
                        <img
                            :src="image"
                            alt="Gallery image"
                            class="w-full h-full object-cover"
                        >
                    </div>
                </div>
            </template>
        </div>

        <!-- Navigation Buttons -->
        <button
            @click="scroll('left')"
            class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/10 group-hover:bg-black/80 cursor-pointer text-white p-2
            rounded-full z-10 transition duration-300"
        >
            &#10094;
        </button>
        <button
            @click="scroll('right')"
            class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/10 group-hover:bg-black/80 cursor-pointer text-white p-2
            rounded-full z-10 transition duration-300"
        >
            &#10095;
        </button>
    </div>


    <!-- Pagination Bullets -->
    <div class="flex justify-center space-x-2 mt-4">
        <template x-for="(image, index) in images" :key="index">
            <button
                class="w-3 h-3 rounded-full"
                :class="currentIndex === index ? 'bg-gray-800' : 'bg-gray-400'"
                @click="scrollToIndex(index)"
            ></button>
        </template>
    </div>

    <!-- Lightbox -->
    <div
        x-show="lightboxOpen"
        x-transition.opacity.duration.300ms
        class="fixed inset-0 bg-black/80 flex items-center justify-center z-50"
        style="display: none;"
        @click.self="closeLightbox"
    >
        <img
            :src="currentImage"
            class="max-w-full max-h-full rounded shadow-lg transition-all transform scale-100 duration-1000 ease-in-out"
            x-transition:enter="transition ease-in-out duration-1000"
            x-transition:enter-start="opacity-0 scale-105"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in-out duration-1000"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-105"
        />


    </div>
</div>

<script>
    function carouselWithLightbox() {
        return {
            images: @json(collect($images)->map(fn($row) => \Illuminate\Support\Facades\Storage::url('images/' . $row['image']))),
            lightboxOpen: false,
            currentImage: '',
            currentIndex: 0,
            openLightbox(src, index) {
                this.currentImage = src;
                this.currentIndex = index;
                this.lightboxOpen = true;
            },
            closeLightbox() {
                this.lightboxOpen = false;
                this.currentImage = '';
            },
            scroll(direction) {
                const container = document.querySelector('.carousel');
                const scrollAmount = container.offsetWidth / 2;
                container.scrollBy({
                    left: direction === 'left' ? -scrollAmount : scrollAmount,
                    behavior: 'smooth',
                });
            },
            scrollToIndex(index) {
                const container = document.querySelector('.carousel');
                const card = container.children[index];
                container.scrollTo({
                    left: card.offsetLeft - 20,
                    behavior: 'smooth',
                });
                this.currentIndex = index;
            }
        }
    }
</script>
