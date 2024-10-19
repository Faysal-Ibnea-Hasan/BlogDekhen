@extends('Layouts.master')
@section('content')
    <div class="bg-white">
        <div class="flex flex-row m-2 gap-x-8 justify-center">
            <label class="basis-1/4 input input-bordered flex items-center gap-2">
                <input type="text" data-url="{{ route('blog') }}" id="search" name="search" class="grow"
                    placeholder="Search anything" />
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor"
                    class="search h-4 w-4 opacity-70">
                    <path fill-rule="evenodd"
                        d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                        clip-rule="evenodd" />
                </svg>
            </label>
            <select id="category" class="select select-bordered w-full max-w-xs">
                <option disabled selected>Sort By Category</option>
                @foreach ($categories as $key => $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <select id="tag" class="select select-bordered w-full max-w-xs">
                <option disabled selected>Sort By Tag</option>
                @foreach ($tags as $key => $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mx-auto max-w-7xl">
            <div id="results"
                class="m-10 mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @include('Partials.posts')
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script src="{{ asset('js/blog/custom.js') }}"></script>
    <script src="{{ asset('js/blog/infiniteScroll.js') }}"></script>
@endsection
