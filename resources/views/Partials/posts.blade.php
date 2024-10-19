@foreach ($posts as $key => $post)
    <a href="{{ route('blog.details', $post->id) }}">
        <article class="h-full overflow-hidden rounded-lg shadow transition hover:shadow-lg">
            <img alt=""
                src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?ixlib=rb-1.2.1&ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2070&q=80"
                class="h-56 w-full object-cover" />
            <div class="bg-white p-4 sm:p-6">
                <div class="flex items-center gap-x-4 text-xs">
                    <time datetime="2020-03-16"
                        class="text-gray-500">{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</time>
                    @foreach ($post->categories as $key => $category)
                        <div
                            class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">
                            {{ $category->name }}</div>
                    @endforeach
                </div>
                <div>
                    <h3 class="mt-0.5 text-lg text-gray-900">
                        {{ \Illuminate\Support\Str::limit($post->title, 40) }}</h3>
                </div>
                <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-500">
                    {!! \Illuminate\Support\Str::limit($post->content, 100) !!}
                </p>
                <div class="text-sm leading-6">
                    <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-300">
                        {{ $post->users->name }} | Author
                    </p>
                </div>
                <div class="text-sm leading-6">
                    @foreach ($post->tags as $key => $tag)
                    <p class="mt-2 line-clamp-3 text-sm/relaxed text-gray-300">
                        Tags: {{ $tag->name }}
                    </p>
                    @endforeach
                </div>
            </div>
        </article>
    </a>
@endforeach

