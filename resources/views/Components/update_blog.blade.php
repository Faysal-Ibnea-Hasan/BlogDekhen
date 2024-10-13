<!-- component -->
@extends('Layouts.master')
@section('content')
    <!-- The component code starts  -->
    <div class="">
        <div class="heading mx-auto text-center">
            <h1 class="mx-auto my-5  text-center sm:text-4xl text-3xl font-bold">Update your blog</h1>
        </div>
        <div class="form-portion bg-stone-100  mx-auto mb-10">
            <form action="{{ route('blog.update') }}" method="POST" class="p-5 mt-5">
                @csrf
                @method('PUT')
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                <input type="hidden" name="id" value="{{ $post->id }}">
                <div class="md:p-5 p-1 sm:mt-1 mt-1">
                    <div class="md:mt-1 mt-2">
                        <label for="title"
                            class="relative text-sm block font-medium rounded-md border text-gray-700 shadow-sm focus-within:border-blue-600 focus-within:ring-1 focus-within:ring-blue-600">
                            <input type="text" id="title" name="title" value="{{ $post->title }}"
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
                                @foreach ($post->categories as $key => $category)
                                    @foreach ($categories as $key => $value)
                                        <option
                                            value="{{ $value->id }}"{{ $value->id == $category->id ? 'selected' : '' }}>
                                            {{ $value->name }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                            @if ($errors->has('category_id'))
                                <p class="text-error">{{ $errors->first('category_id') }}</p>
                            @endif
                        </div>
                        <div class="w-9/12">
                            <select name="tag_id" class="select select-bordered w-full max-w-xs">
                                <option disabled selected>Tags</option>
                                @foreach ($post->tags as $key => $tag)
                                    @foreach ($tags as $key => $value)
                                        <option value="{{ $value->id }}"{{ $value->id == $tag->id ? 'selected' : '' }}>
                                            {{ $value->name }}</option>
                                    @endforeach
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
                        <label for="editor" class="block text-sm font-medium text-gray-700"> Content </label>
                        <textarea id="editor" name="content" class="mt-2 w-full rounded-lg border-gray-200 align-top shadow-sm sm:text-sm"
                            rows="20" placeholder="Write your content here">{!! $post->content !!}</textarea>
                    </div>
                </div>
                <div class="mt-2 w-[100%] bg-transparent flex items-center">
                    <button type="submit"
                        class="px-4 py-2 mx-auto rounded-xl text-center text-xl bg-black text-white hover:text-black hover:bg-white hover:font-bold hover:shadow-xl">Update</button>
                </div>
            </form>
        </div>
    </div>
    <!-- The component code ends -->
@endsection
@section('scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>
<script>
 ClassicEditor.create(document.querySelector('#editor'))
 .catch(error => {
 console.error(error);
 });
</script>
@endsection
