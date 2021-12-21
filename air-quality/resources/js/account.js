//Hiding the edit form

$("#accountFormEdit").on("click", function (e) {
    e.preventDefault();
    $(".notShown").toggleClass("invisible visible");
    $(".toHide").toggleClass("notThereAnymore");
});

//Asking confirmation before deleting user
$("#deleteBtn").on("click", function (e) {
    if (confirm("Are you sure that you want to delete your Account?")) {
        $("#userId").attr({
            value: 1,
        });
    } else {
        e.preventDefault();
    }
});
