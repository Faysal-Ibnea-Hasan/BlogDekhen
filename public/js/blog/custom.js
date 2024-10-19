$(function () {
    $("#search").on("keyup", function () {
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
                success: function (response) {
                    // Insert the returned HTML into the results div
                    $("#results").html(response.html);
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", status, error);
                },
            });
        } else {
            $("#results").empty(); // Clear results if the search is empty
        }
    });
    $("#category").on("change", function () {
        var category = $(this).val();
        console.log(category);
        $.ajax({
            url: $("#search").data("url"),
            type: "GET",
            data: {
                category: category,
            },
            success: function (response) {
                // Insert the returned HTML into the results div
                $("#results").html(response.html);
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", status, error);
            },
        });
    });
    $("#tag").on("change", function () {
        var tag = $(this).val();
        console.log(tag);
        $.ajax({
            url: $("#search").data("url"),
            type: "GET",
            data: {
                tag: tag,
            },
            success: function (response) {
                // Insert the returned HTML into the results div
                $("#results").html(response.html);
            },
            error: function (xhr, status, error) {
                console.error("AJAX Error:", status, error);
            },
        });
    });
});
