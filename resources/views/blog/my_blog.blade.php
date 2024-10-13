@extends('Layouts.master')
@section('content')
    <section class="container px-4 mt-10 mx-auto">
        @include('Components.alert')
        <div class="flex justify-between items-center gap-x-3">
            <h2
                class="px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                My Blogs</h2>
            <div class="relative inline-block text-left">
                <!-- Dropdown Button -->
                <button id="dropdownButton"
                    class="inline-flex justify-center px-6 py-2 font-medium tracking-wide text-white capitalize transition-colors duration-300 transform bg-blue-600 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300 focus:ring-opacity-80">
                    Create
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4 4a.75.75 0 01-1.06 0l-4-4a.75.75 0 01.02-1.06z"
                            clip-rule="evenodd" />
                    </svg>
                </button>

                <!-- Dropdown Menu -->
                <div id="dropdownMenu"
                    class="absolute right-0 z-10 hidden w-48 mt-2 origin-top-right bg-white divide-y divide-gray-100 rounded-md shadow-lg">
                    <div class="py-1">
                        <a href="{{ route('blog.create') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Create Blog</a>
                        <a onclick="my_modal_5_category.showModal()" href="#"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Create
                            Category</a>
                        <a onclick="my_modal_5_tag.showModal()" href="#"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Create Tag</a>
                    </div>
                </div>
                @include('Modal.create_category')
                @include('Modal.create_tag')
            </div>
        </div>
        <div class="flex flex-col mt-6">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th scope="col"
                                    class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    SN
                                    </th>
                                    <th scope="col"
                                        class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        <div class="flex items-center gap-x-3">
                                            <span>Title</span>
                                        </div>
                                    </th>

                                    <th scope="col"
                                        class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        <button class="flex items-center gap-x-2">
                                            <span>Status</span>

                                            <svg class="h-3" viewBox="0 0 10 11" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M2.13347 0.0999756H2.98516L5.01902 4.79058H3.86226L3.45549 3.79907H1.63772L1.24366 4.79058H0.0996094L2.13347 0.0999756ZM2.54025 1.46012L1.96822 2.92196H3.11227L2.54025 1.46012Z"
                                                    fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                                <path
                                                    d="M0.722656 9.60832L3.09974 6.78633H0.811638V5.87109H4.35819V6.78633L2.01925 9.60832H4.43446V10.5617H0.722656V9.60832Z"
                                                    fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                                <path
                                                    d="M8.45558 7.25664V7.40664H8.60558H9.66065C9.72481 7.40664 9.74667 7.42274 9.75141 7.42691C9.75148 7.42808 9.75146 7.42993 9.75116 7.43262C9.75001 7.44265 9.74458 7.46304 9.72525 7.49314C9.72522 7.4932 9.72518 7.49326 9.72514 7.49332L7.86959 10.3529L7.86924 10.3534C7.83227 10.4109 7.79863 10.418 7.78568 10.418C7.77272 10.418 7.73908 10.4109 7.70211 10.3534L7.70177 10.3529L5.84621 7.49332C5.84617 7.49325 5.84612 7.49318 5.84608 7.49311C5.82677 7.46302 5.82135 7.44264 5.8202 7.43262C5.81989 7.42993 5.81987 7.42808 5.81994 7.42691C5.82469 7.42274 5.84655 7.40664 5.91071 7.40664H6.96578H7.11578V7.25664V0.633865C7.11578 0.42434 7.29014 0.249976 7.49967 0.249976H8.07169C8.28121 0.249976 8.45558 0.42434 8.45558 0.633865V7.25664Z"
                                                    fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                            </svg>
                                        </button>
                                    </th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        <button class="flex items-center gap-x-2">
                                            <span>Content</span>

                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" class="w-4 h-4">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z" />
                                            </svg>
                                        </button>
                                    </th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Categories</th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Tags</th>

                                    <th scope="col"
                                        class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                        Edit
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                @foreach ($myBlog as $key => $item)
                                    <tr>
                                        <td class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                            {{$key+1}}
                                        </td>
                                        <td class="px-4 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                            <div class="inline-flex items-center gap-x-3">
                                                <div class="flex items-center gap-x-2">
                                                    <div>
                                                        <h2 class="font-medium text-gray-800 dark:text-white ">
                                                            {{ \Illuminate\Support\Str::limit($item->title, 25) }}</h2>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-12 py-4 text-sm font-medium text-gray-700 whitespace-nowrap">
                                            @if ($item->status == \App\Enum\PostStatus::Active)
                                                <a data-url="{{ route('blog.status.change') }}"
                                                    data-status="{{ 0 }}" data-id="{{ $item->id }}"
                                                    class="status inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                                    <span class="h-1.5 w-1.5 rounded-full bg-emerald-500"></span>
                                                    <h2 class="text-sm font-normal text-emerald-500">Active</h2>
                                                </a>
                                            @endif
                                            @if ($item->status == \App\Enum\PostStatus::InActive)
                                                <a data-url="{{ route('blog.status.change') }}"
                                                    data-status="{{ 1 }}" data-id="{{ $item->id }}"
                                                    class="status inline-flex items-center px-3 py-1 rounded-full gap-x-2 bg-emerald-100/60 dark:bg-gray-800">
                                                    <span class="h-1.5 w-1.5 rounded-full bg-red-500"></span>
                                                    <h2 class="text-sm font-normal text-red-500">Inctive</h2>
                                                </a>
                                            @endif

                                        </td>
                                        <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-300 whitespace-nowrap">
                                            {{ \Illuminate\Support\Str::limit($item->content, 45) }}</td>

                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <div class="flex items-center gap-x-2">
                                                @foreach ($item->categories as $key => $category)
                                                    <p
                                                        class="px-3 py-1 text-xs text-indigo-500 rounded-full dark:bg-gray-800 bg-indigo-100/60">
                                                        {{ $category->name }}
                                                    </p>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <div class="flex items-center gap-x-2">
                                                @foreach ($item->tags as $key => $tag)
                                                    <p
                                                        class="px-3 py-1 text-xs text-indigo-500 rounded-full dark:bg-gray-800 bg-indigo-100/60">

                                                        {{ $tag->name }}
                                                    </p>
                                                @endforeach
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                                            <div class="flex items-center gap-x-6">
                                                <a data-url="{{ route('blog.delete', $item->id) }}"
                                                    data-id="{{ $item->id }}"
                                                    class="delete text-gray-500 transition-colors duration-200 dark:hover:text-red-500 dark:text-gray-300 hover:text-red-500 focus:outline-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                    </svg>
                                                </a>

                                                <a href="{{ route('blog.edit', $item->id) }}"
                                                    class="text-gray-500 transition-colors duration-200 dark:hover:text-yellow-500 dark:text-gray-300 hover:text-yellow-500 focus:outline-none">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-5 h-5">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pagination Controls -->
        <div class="flex items-center justify-between mt-6">
            @if ($myBlog->previousCursor())
                <a href="{{ $myBlog->previousPageUrl() }}"
                    class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                    </svg>
                    <span>Previous</span>
                </a>
            @endif
            @if ($myBlog->nextCursor())
                <a href="{{ $myBlog->nextPageUrl() }}"
                    class="flex items-center px-5 py-2 text-sm text-gray-700 capitalize transition-colors duration-200 bg-white border rounded-md gap-x-2 hover:bg-gray-100 dark:bg-gray-900 dark:text-gray-200 dark:border-gray-700 dark:hover:bg-gray-800">
                    <span>Next</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-5 h-5 rtl:-scale-x-100">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                    </svg>
                </a>
            @endif
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        $(function() {
            $(".delete").on('click', function(e) {
                e.preventDefault();
                // Get the ID of the item to delete
                var itemId = $(this).data('id');
                //console.log(itemId)
                if (confirm('Are you sure you want to delete this item?')) {
                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        data: {
                            id: itemId,
                            _token: '{{ csrf_token() }}', // Don't forget the CSRF token
                        },
                        success: function(response) {
                            console.log(response);
                            if (response.status == true) {
                                alert(response.message);
                                // Optionally remove the deleted item from the DOM
                                location.reload();
                            }
                        },
                    });
                }
            });
            $(".status").on('click', function(e) {
                e.preventDefault();
                //var status = $(this).data('status');
                // var id = $(this).data('id');
                // console.log(id);
                $.ajax({
                    url: $(this).data('url'),
                    type: 'POST',
                    data: {
                        id: $(this).data('id'),
                        status: $(this).data('status'),
                        _token: '{{ csrf_token() }}', // Don't forget the CSRF token
                    },
                    success: function(response) {
                        location.reload();
                    },
                });
            });
        });
        $("#tag").on('click', function(e) {
            e.preventDefault();
            var name = $('#name').val();
            var user_id = $('#user_id').val();
            //console.log(name);
            $.ajax({
                url: "{{ route('tag.create') }}",
                type: 'POST',
                data: {
                    user_id: user_id,
                    name: name,
                    _token: '{{ csrf_token() }}', // Don't forget the CSRF token
                },
                error: function(xhr) {
                    // Clear any previous errors
                    $(".error").remove();
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON
                            .errors; // Laravel returns validation errors under 'errors'
                        // Loop through the errors and display them under the corresponding input
                        if (errors.name) {
                            $('#name').after('<p class="error text-red-500 text-xs mt-1">' + errors
                                .name[0] + '</p>');
                        }
                    }
                },
                success: function(response) {
                    if (response.status == true) {
                        $("#success-alert").removeClass('hidden');
                        $("#svg").after('<span>' + response.message + '</span>');
                    }
                    setTimeout(() => {
                        $("#success-alert").removeClass('animate-slideIn').addClass(
                            'animate-fadeOut');
                    }, 2000);
                },
            });

        });
        $("#category").on('click', function(e) {
            e.preventDefault();
            var name = $('#name').val();
            var user_id = $('#user_id').val();
            //console.log(name);
            $.ajax({
                url: "{{ route('category.create') }}",
                type: 'POST',
                data: {
                    user_id: user_id,
                    name: name,
                    _token: '{{ csrf_token() }}', // Don't forget the CSRF token
                },
                error: function(xhr) {
                    // Clear any previous errors
                    $(".error").remove();
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON
                            .errors; // Laravel returns validation errors under 'errors'
                        // Loop through the errors and display them under the corresponding input
                        if (errors.name) {
                            $('#name').after('<p class="error text-red-500 text-xs mt-1">' + errors
                                .name[0] + '</p>');
                        }
                    }
                },
                success: function(response) {
                    if (response.status == true) {
                        $("#success-alert").removeClass('hidden');
                        $("#svg").after('<span>' + response.message + '</span>');
                    }
                    setTimeout(() => {
                        $("#success-alert").removeClass('animate-slideIn').addClass(
                            'animate-fadeOut');
                    }, 2000);
                },
            });

        });

        // Dropdown toggle logic
        const dropdownButton = document.getElementById('dropdownButton');
        const dropdownMenu = document.getElementById('dropdownMenu');

        dropdownButton.addEventListener('click', function() {
            dropdownMenu.classList.toggle('hidden');
        });

        // Close dropdown if clicking outside
        window.addEventListener('click', function(e) {
            if (!dropdownButton.contains(e.target)) {
                dropdownMenu.classList.add('hidden');
            }
        });
    </script>
@endsection
