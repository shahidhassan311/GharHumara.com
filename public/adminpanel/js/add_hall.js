$(function () {
    $("#single_portion").hide();
    $("#single").click(function () {
        $('#single_portion').show();
    });
    $("#multiple").click(function () {
        alert("single");
    });
})