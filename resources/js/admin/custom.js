$(function () {
    // Show Loader on Breadcrumb Links
    $("ol.breadcrumb")
        .find("a")
        .each(function () {
            if ($(this).attr("href") != "" && $(this).attr("href") != "#") {
                $(this).addClass("showLoaderOnClick");
            }
        });

    // Show Loader on Click on link with class showLoaderOnClick
    $("body").on("click", ".showLoaderOnClick", function () {
        showLoader();
    });
    // Show Loader on Submit of Form with class showLoadingOnSubmit
    $(".showLoadingOnSubmit").on("submit", function () {
        showLoader();
    });

    // Add Default Select 2
    if ($(".select2").length > 0) {
        $(".select2").select2({
            theme: "bootstrap4",
        });
    }

    // Confirm On click of Delete Link
    $(".deleteForm").on("submit", function () {
        var status = confirm("Are you sure you want to delete the record ?");
        if (status) {
            showLoader();
        }
        return status;
    });
});

function showLoader() {
    if ($("#pageLoader").length < 1) {
        $("body").append('<div id="pageLoader"></div>');
    }
    $("#pageLoader").show(0);
}

function hideLoader() {
    $("#pageLoader").hide(0);
}
