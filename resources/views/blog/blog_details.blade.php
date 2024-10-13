@extends('Layouts.master')
@section('content')
<section class="py-10 bg-white sm:py-16 lg:py-24">
    <div class="max-w-6xl px-4 mx-auto sm:px-6 lg:px-8">
        <h2 class="text-3xl font-bold leading-tight text-black sm:text-4xl lg:text-5xl">{{$blog->title}}</h2>

        <div class="flow-root mt-12 sm:mt-16">
            <div class="divide-y divide-gray--200 -my-9">
                <div class="py-9">
                    {{-- <p class="text-xl font-semibold text-black">What payment method do you support?</p> --}}
                    <p class="mt-3 text-base text-gray-600">{!! $blog->content !!}</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
