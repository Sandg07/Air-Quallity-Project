let date;
$(".date")
    .datepicker({
        format: "dd/mm/yyyy ",
    })
    .on("changeDate", function (e) {
        date = e.format();
        console.log(date);
    });
$("#submitBtn").on("click", function (e) {
    e.preventDefault();
    let _token = $('meta[name="csrf-token"]').attr("content");

    $.ajax({
        url: "/forecast",
        type: "POST",
        data: {
            date: date,
            _token: _token,
        },
        success: function (response) {},
    });
    console.log(date);
});
