@extends('Layouts.master')
@section('content')
    <div class="bg-white">
        <div class="flex flex-row m-2">
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
        </div>
        <div class="mx-auto max-w-7xl">
            <div id="results"
                class="mx-auto grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
                @include('Partials.posts')
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(function() {
            $("#search").on("keyup", function() {
                var keywords = $(this).val();
                console.log("Searching for: " + keywords);

                if (keywords.trim() !== "") {
                    $.ajax({
                        url: $(this).data("url"),
                        type: "GET",
                        dataType: "JSON",
                        data: {
                            search: keywords,
                        },
                        success: function(response) {
                            // Insert the returned HTML into the results div
                            $("#results").html(response.html);
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX Error:", status, error);
                        }
                    });
                } else {
                    $("#results").empty(); // Clear results if the search is empty
                }
            });
        });
    </script>
@endsection
