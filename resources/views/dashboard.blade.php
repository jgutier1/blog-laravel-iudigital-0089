<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <!--slider home logged -->
                    <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>

                    <article x-data="slider"
                        class="relative w-full flex flex-shrink-0 overflow-hidden shadow-2xl mb-6">
                        <div
                            class="rounded-full bg-gray-600 text-white absolute top-5 right-5 text-sm px-2 text-center z-10">
                            <span x-text="currentIndex"></span>/
                            <span x-text="images.length"></span>
                        </div>

                        <template x-for="(image, index) in images">
                            <figure class="h-96" x-show="currentIndex == index + 1"
                                x-transition:enter="transition transform duration-300"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                x-transition:leave="transition transform duration-300"
                                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                                <img :src="image" alt="Image"
                                    class="absolute inset-0 z-10 h-full w-full object-cover opacity-70" />
                                <figcaption
                                    class="absolute inset-x-0 bottom-1 z-20 w-96 mx-auto p-4 font-light text-sm text-center tracking-widest leading-snug bg-gray-300 bg-opacity-25">
                                    Las mejores reseñas de peliculas!
                                </figcaption>
                            </figure>
                        </template>

                        <button @click="back()"
                            class="absolute left-14 top-1/2 -translate-y-1/2 w-11 h-11 flex justify-center items-center rounded-full shadow-md z-10 bg-gray-100 hover:bg-gray-200">
                            <svg class=" w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:-translate-x-0.5"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M15 19l-7-7 7-7">
                                </path>
                            </svg>
                        </button>

                        <button @click="next()"
                            class="absolute right-14 top-1/2 translate-y-1/2 w-11 h-11 flex justify-center items-center rounded-full shadow-md z-10 bg-gray-100 hover:bg-gray-200">
                            <svg class=" w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:translate-x-0.5"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5"
                                    d="M9 5l7 7-7 7"></path>
                            </svg>
                        </button>
                    </article>

                    <script>
                        document.addEventListener('alpine:init', () => {
                            Alpine.data('slider', () => ({
                                currentIndex: 1,
                                images: [
                                    'http://127.0.0.1:8000/images/png/carrousel1.jpg',
                                    'http://127.0.0.1:8000/images/png/carrousel12.jpg',
                                    'http://127.0.0.1:8000/images/png/carrousel13.jpg'
                                ],
                                back() {
                                    if (this.currentIndex > 1) {
                                        this.currentIndex = this.currentIndex - 1;
                                    }
                                },
                                next() {
                                    if (this.currentIndex < this.images.length) {
                                        this.currentIndex = this.currentIndex + 1;
                                    } else if (this.currentIndex <= this.images.length) {
                                        this.currentIndex = this.images.length - this.currentIndex + 1
                                    }
                                },
                            }))
                        })
                    </script>

                    <!--content-->
                    <p style="block mt-6">Tenemos reseñas de todas las categorias, incluso antes de su salida!</p>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
