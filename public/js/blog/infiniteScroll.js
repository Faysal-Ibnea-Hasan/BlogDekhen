$(function () {
    let page = 1;

    $(window).scroll(function () {
        if (
            $(window).scrollTop() + $(window).height() >=
            $(document).height()
        ) {
            page++;
            loadMoreData(page);
        }
    });
    function loadMoreData(page) {
        loading = true;
        $.ajax({
            url: '?page=' + page,
            type: "GET",
            dataType: "json",
            success: function (response) {
                $("#results").append(response.html); // Append new posts
                loading = false;
            },
            error: function (xhr) {
                console.error(xhr);
                loading = false;
            },
        });
    }
});


