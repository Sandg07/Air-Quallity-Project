$(function () {
    $("#datetimepicker")
        .datetimepicker({
            format: "d/M/Y",
        })
        .on("changeDate", function (e, date) {
            console.log(e);
        });
});
