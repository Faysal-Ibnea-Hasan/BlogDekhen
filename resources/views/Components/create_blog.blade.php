<!-- component -->
@extends('Layouts.master')
@section('content')
    <!-- The component code starts  -->
    <div class="">
        <div class="heading mx-auto text-center">
            <h1 class="mx-auto my-5  text-center sm:text-4xl text-3xl font-bold">Write your blog</h1>
        </div>
        <div class="form-portion bg-stone-100  mx-auto mb-10">
            <form action="{{ route('blog.store') }}" method="POST" class="p-5 mt-5">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <div class="md:p-5 p-1 sm:mt-1 mt-1">
                    <div class="md:mt-1 mt-2">
                        <label for="title"
                            class="relative text-sm block font-medium rounded-md border text-gray-700 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                            <input type="text" id="title" name="title"
                                class="w-[100%] px-4 py-2 mt-1 rounded-xl peer border-none bg-transparent placeholder-transparent focus:border-transparent focus:outline-none focus:ring-0"
                                placeholder="Title" />
                            <span
                                class="pointer-events-none absolute start-2.5 top-0 -translate-y-full bg-transparent p-0.5 text-xs text-gray-700 transition-all peer-placeholder-shown:top-1/2 peer-placeholder-shown:text-sm peer-focus:top-0 peer-focus:text-xs">
                                Title
                            </span>
                        </label>
                        @if ($errors->has('title'))
                            <p class="text-error">{{ $errors->first('title') }}</p>
                        @endif
                    </div>
                    <div class="flex justify-between mt-5">
                        <div class="w-9/12">
                            <select name="category_id" class="select select-bordered w-full max-w-xs">
                                <option disabled selected>Categories</option>
                                @foreach ($categories as $key => $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category_id'))
                                <p class="text-error">{{ $errors->first('category_id') }}</p>
                            @endif
                        </div>
                        <div class="w-9/12">
                            <select name="tag_id" class="select select-bordered w-full max-w-xs">
                                <option disabled selected>Tags</option>
                                @foreach ($tags as $key => $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('tag_id'))
                                <p class="text-error">{{ $errors->first('tag_id') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="mt-5">
                        @if ($errors->has('content'))
                            <p class="text-error">{{ $errors->first('content') }}</p>
                        @endif
                        <label for="content" class="block text-sm font-medium text-gray-700"> Content </label>
                        <textarea id="content" name="content" class="mt-2 w-full rounded-lg border-gray-200 align-top shadow-sm sm:text-sm" rows="20"
                            placeholder="Write your content here"></textarea>
                    </div>
                </div>
                <div class="mt-2 w-[100%] bg-transparent flex items-center">
                    <button type="submit"
                        class="px-4 py-2 mx-auto rounded-xl text-center text-xl bg-black text-white hover:text-black hover:bg-white hover:font-bold hover:shadow-xl">Create</button>
                </div>
            </form>
        </div>
    </div>
    <!-- The component code ends -->
@endsection
