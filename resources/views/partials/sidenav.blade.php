<aside class="absolute left-0 top-0 h-screen w-64 bg-[#1e1e1e] border-r border-gray-800 transform transition-transform duration-300 ease-in-out z-10 pt-16 md:pt-20 -translate-x-full md:translate-x-0" id="sidebar">
    <button id="sidebarToggle" class="absolute -right-10 top-4 bg-yellow-400 text-black p-2 rounded-r-lg md:hidden">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
</svg>
    </button>
    
    <div class="h-full flex flex-col justify-between p-4">
       
        <div>
            <h2 class="text-xl font-bold mb-4 text-white pb-2 border-b border-gray-700">Categories</h2>
            
            <div class="space-y-2 overflow-y-auto max-h-[calc(100vh-220px)] pr-1 scrollbar-thin scrollbar-thumb-gray-700 scrollbar-track-gray-900">
                @if($categories->count())
                    @foreach($categories as $category)
                        <a href="{{ route('categories.show', ['id' => $category->id]) }}"
                           class="block bg-[#161616] px-4 py-3 rounded-lg hover:bg-yellow-400 hover:text-black transition font-medium text-gray-200 hover:font-semibold">
                            {{ $category->name }}
                        </a>
                    @endforeach
                @else
                    <p class="text-sm text-gray-400 p-3">No categories yet.</p>
                @endif
            </div>
        </div>
        
        <!-- Add Category CTA -->
        <div class="sticky bottom-4 w-full mt-4">
            <a href=""
                class="flex items-center justify-center gap-2 w-full bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-3 px-4 rounded-lg transition shadow-lg hover:shadow-xl">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                </svg>
                <span>Add Category</span>
            </a>
        </div>
    </div>
</aside>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const sidebarToggle = document.getElementById('sidebarToggle');
        
   
        sidebarToggle.addEventListener('click', function() {
            sidebar.classList.toggle('-translate-x-full');
        });
   
        document.addEventListener('click', function(event) {
            const isClickInside = sidebar.contains(event.target) || sidebarToggle.contains(event.target);
            
            if (!isClickInside && window.innerWidth < 768) {
                sidebar.classList.add('-translate-x-full');
            }
        });
        
    
        window.addEventListener('resize', function() {
            if (window.innerWidth >= 768) {
                sidebar.classList.remove('-translate-x-full');
            }
        });
    });
</script>