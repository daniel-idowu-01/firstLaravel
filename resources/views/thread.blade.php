
    <x-app-layout>
        <main class="flex flex-col gap-5">
            <span class="mb-10"></span>
            <section  class="mx-auto w-1/2 p-5 rounded-xl">
                <article class="flex justify-between items-center mb-3">
                    <div class="flex items-center gap-2">
                        <img class="w-5 h-5 object-cover rounded-[100%]" 
                            src="{{ $thread->user->profile_photo_path ?? 'https://img.freepik.com/vecteurs-premium/icones-utilisateur-comprend-icones-utilisateur-symboles-icones-personnes-elements-conception-graphique-qualite-superieure_981536-526.jpg' }}" alt="">
                        <p>{{$thread->user->name}}</p>
                        <p class="opacity-50 text-xs"><span>o</span> {{$thread->created_at->diffForHumans()}}</p>
                    </div>
        
                    <p class="text-xs font-bold">-{{$thread->category->name}}</p>
                </article>
        
                <section>
                    <h2 class="text-xl font-bold mb-2 uppercase">{{$thread->title}}</h2>
                    <p class="mb-1 text-justify">
                        {{$thread->body}}
                    </p>
                </section>
                <div class="rounded-xl bg-black bg-blend-color-burn">
                    @if($thread->image)
                        <img 
                            class="w-full h-[30rem] rounded-xl object-contain cursor-pointer transition-transform" 
                            src="{{ asset('storage/' . $thread->image) }}"
                            alt="Thread Image"
                            onerror="this.onerror=null; this.src='/images/placeholder.png'; console.log('Image failed to load:', this.src);"
                            onclick="openFullscreen(this)"
                        >
                    @endif
                </div>
                <div class="flex items-center justify-end gap-4 mt-2">
                    <a href="/edit-thread/{{$thread->id}}" class="underline">Edit</a>
                    <form action="/delete-thread/{{$thread->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type='submit' class="underline">Delete</button>
                    </form>
                    <a href="/" class="underline">Back</a>
                </div>
            </section>

            <hr class="w-1/2 mx-auto bg-black bg-opacity-5 h-0.5" />
        </main>


        {{-- Fullscreen Container --}}
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