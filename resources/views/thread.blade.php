
    <x-app-layout>
        <main class="flex flex-col">
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

                {{-- edit & delete --}}
                <div class="flex items-center justify-end gap-4 mt-2">
                    <a href="/edit-thread/{{$thread->id}}" class="underline">Edit</a>
                    <form action="/delete-thread/{{$thread->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type='submit' class="underline">Delete</button>
                    </form>
                    <a href="/" class="underline">Back</a>
                </div>

                <hr class=" my-2 mx-auto bg-black bg-opacity-5 h-0.5" />

                {{-- comments --}}
                <div>
                    <p class="opacity-40">comments</p>
                    @if($comments->isNotEmpty()) 
                        @foreach($comments as $comment)
                            @if(is_null($comment->parent_id))
                                <div class="p-3">
                                    <div class="flex gap-3 items-center">
                                        <img src="{{ $comment->user->profile_photo_path ?? 'https://img.freepik.com/vecteurs-premium/icones-utilisateur-comprend-icones-utilisateur-symboles-icones-personnes-elements-conception-graphique-qualite-superieure_981536-526.jpg' }}"
                                            class="object-cover w-10 h-10 rounded-full border-2 border-emerald-400">
                                        <h3 class="font-bold">{{ $comment->user->name }}</h3>
                                    </div>
                                    <p class="text-gray-600 mt-2">{{ $comment->content }}</p>
                                    
                                    <button onclick="showReplyForm('{{ $comment->id }}')" class="text-blue-500">Reply</button>
                                    
                                    <!-- Reply Form (Hidden by default) -->
                                    <form id="replyForm{{ $comment->id }}" 
                                        action="/thread/{{ $thread->id }}/comment" 
                                        method="POST" 
                                        class="hidden ml-8 mt-4">
                                        @csrf
                                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                                        <textarea name="content" 
                                                class="w-full bg-gray-100 rounded border p-2"
                                                placeholder="Write your reply..."></textarea>
                                        <button type="submit" class="mt-2 px-4 py-1 bg-blue-500 text-white rounded">
                                            Submit Reply
                                        </button>
                                    </form>
                                    
                                    <!-- Nested Replies -->
                                    @if($comment->replies->count() > 0)
                                        <div class="ml-8 mt-4">
                                            @foreach($comment->replies as $reply)
                                                <div class="p-3 border-l-2">
                                                    <div class="flex gap-3 items-center">
                                                        <img src="{{ $reply->user->profile_photo_path ?? 'https://img.freepik.com/vecteurs-premium/icones-utilisateur-comprend-icones-utilisateur-symboles-icones-personnes-elements-conception-graphique-qualite-superieure_981536-526.jpg' }}"
                                                            class="object-cover w-8 h-8 rounded-full border-2">
                                                        <h3 class="font-bold">{{ $reply->user->name }}</h3>
                                                    </div>
                                                    <p class="text-gray-600 mt-2">{{ $reply->content }}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endif
                        @endforeach
                    @else
                        <p class="text-gray-600">No comments yet.</p>
                    @endif

                    {{-- add comment box --}}
                    <form action="/thread/{{ $thread->id }}/comment" method="POST" class="bg-white rounded-lg border p-2 mx-auto mt-20">
                        @csrf 
                        <div class="px-3 mb-2 mt-2">
                            <textarea name="content" placeholder="comment" class="w-full bg-gray-100 rounded border border-gray-400 leading-normal resize-none h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"></textarea>
                        </div>
                        <div class="flex justify-end px-4">
                            <input type="submit" class="px-2.5 py-1.5 rounded-md text-white text-sm bg-blue-600" value="Comment">
                        </div>
                    </form>
                </div>
            </section>
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

            // show reply form
            function showReplyForm(commentId) {
                const form = document.getElementById('replyForm' + commentId);
                form.classList.toggle('hidden');
            }
        </script>
    </x-app-layout>