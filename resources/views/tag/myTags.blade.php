@extends('Layouts.master')
@section('content')
    @include('Components.alert')
    @foreach ($tags as $key => $tag)
        <div class="overflow-x-auto">
            <table class="table">
                <!-- head -->
                <thead>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- row 1 -->
                    <tr>
                        <th>{{ $key + 1 }}</th>
                        <td><div class="badge badge-ghost badge-lg">{{ $tag->name }}</div></td>
                        @if ($tag->status == \App\Enum\PostStatus::Active)
                            <td>
                                <button><a data-url="{{ route('tag.status.change') }}" data-status="{{ 0 }}"
                                        data-id="{{ $tag->id }}"
                                        class="status badge badge-success badge-lg">Active</a></button>
                            </td>
                        @elseif ($tag->status == \App\Enum\PostStatus::InActive)
                            <td>
                                <button><a data-url="{{ route('tag.status.change') }}" data-status="{{ 1 }}"
                                        data-id="{{ $tag->id }}"
                                        class="status badge badge-error badge-lg">In-active</a></button>
                            </td>
                        @endif
                        <td class="px-4 py-4 text-sm whitespace-nowrap">
                            <div class="flex items-center gap-x-6">
                                <a data-url="{{ route('tag.delete') }}" data-id="{{ $tag->id }}"
                                    class="delete text-gray-300 transition-colors duration-200 dark:hover:text-red-500 dark:text-gray-500 hover:text-red-500 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                    </svg>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    @endforeach
@endsection
@section('scripts')
    <script>
        $(function() {
            $(".status").on('click', function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).data('url'),
                    type: 'POST',
                    data: {
                        id: $(this).data('id'),
                        status: $(this).data('status'),
                        _token: '{{ csrf_token() }}', // Don't forget the CSRF token
                    },
                    success: function(response) {
                        if (response.status == true) {
                            location.reload();
                        }
                    },
                });
            });
            $(".delete").on('click', function(e) {
                e.preventDefault();
                // Get the ID of the item to delete
                var itemId = $(this).data('id');
                if (confirm('Are you sure you want to delete this item?')) {
                    $.ajax({
                        url: $(this).data('url'),
                        type: 'DELETE',
                        data: {
                            id: itemId,
                            _token: '{{ csrf_token() }}', // Don't forget the CSRF token
                        },
                        success: function(response) {
                            if (response.status == true) {
                                $("#success-alert").removeClass('hidden');
                                $("#svg").after('<span>' + response.message + '</span>');

                                setTimeout(() => {
                                    $("#success-alert").removeClass('animate-slideIn')
                                        .addClass('animate-fadeOut');
                                }, 1500);
                            }
                            setTimeout(() => {
                                location.reload();
                            }, 2000);

                        },
                    });
                }
            });
        });
    </script>
@endsection
