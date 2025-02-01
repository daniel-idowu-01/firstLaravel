<x-app-layout>
    <main class="flex flex-col gap-5">
        {{-- middle threads --}}
        <section class="mx-auto w-1/2 p-5 rounded-xl hover:bg-gray-50 hover:border hover:cursor-pointer mt-10 transition-all">
            <article class="flex justify-between items-center mb-3">
                <div class="flex items-center gap-2">
                    <img class="w-8 h-8 object-cover rounded-[100%]" src="https://media.gettyimages.com/id/1692571345/photo/madrid-spain-jude-bellingham-of-real-madrid-celebrates-after-scoring-their-sides-first-goal.jpg?s=612x612&w=gi&k=20&c=FvzTaxKFZLTOtuMAPvs709OmQsMSZYD1E9qIovYRYCk=" alt="">
                    <p>Idowu Daniel</p>
                    <p class="opacity-50 text-xs"><span>o</span> 3 mins ago</p>
                </div>
    
                <p class="text-xs font-bold">-AI/ML</p>
            </article>
    
            <article>
                <p class="mb-1 text-justify">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum
                </p>
                <div class="rounded-xl bg-black bg-blend-color-burn">
                    <img 
                        class="w-full h-[30rem] rounded-xl object-contain cursor-pointer transition-transform" 
                        src="https://media.gettyimages.com/id/1692571345/photo/madrid-spain-jude-bellingham-of-real-madrid-celebrates-after-scoring-their-sides-first-goal.jpg?s=612x612&w=gi&k=20&c=FvzTaxKFZLTOtuMAPvs709OmQsMSZYD1E9qIovYRYCk=" 
                        alt=""
                        onclick="openFullscreen(this)"
                    >
                </div>
            </article>
        </section>

        <hr class="w-1/2 mx-auto bg-black bg-opacity-5 h-0.5" />
    </main>
    
    {{-- create a thread route --}}
    <a href="/create-thread" class="fixed bottom-5 right-5 bg-black text-white p-3 rounded-[100%] hover:bg-opacity-80">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
        </svg>
    </a>

    <!-- Fullscreen Container -->
    <div 
        id="fullscreenContainer" 
        class="hidden fixed inset-0 bg-black bg-opacity-80 mx-auto z-50"
    >
        <!-- Close Button -->
        <button 
            class="absolute top-4 right-4 text-white text-3xl font-bold"
            onclick="closeFullscreen()"
        >
            ×
        </button>
        
        <!-- Fullscreen Image -->
        <img 
            id="fullscreenImage" 
            src="" 
            alt="Fullscreen Image" 
            class="w-full h-full rounded-xl mx-auto object-contain"
        >
    </div>

    <script>
        // Open fullscreen view
        function openFullscreen(img) {
            const container = document.getElementById('fullscreenContainer');
            const fullscreenImage = document.getElementById('fullscreenImage');
            
            // Set the image source to the clicked thumbnail's source
            fullscreenImage.src = img.src;
            
            // Show the fullscreen container
            container.classList.remove('hidden');
        }

        // Close fullscreen view
        function closeFullscreen() {
            const container = document.getElementById('fullscreenContainer');
            
            // Hide the fullscreen container
            container.classList.add('hidden');
        }
    </script>
</x-app-layout>
