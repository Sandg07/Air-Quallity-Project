/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/datepicker.js ***!
  \************************************/
var date;
$(".date").datepicker({
  format: "dd/mm/yyyy "
}).on("changeDate", function (e) {
  date = e.format();
  console.log(date);
});
$("#submitBtn").on("click", function (e) {
  e.preventDefault();

  var _token = $('meta[name="csrf-token"]').attr("content");

  $.ajax({
    url: "/forecast",
    type: "POST",
    data: {
      date: date,
      _token: _token
    },
    success: function success(response) {}
  });
  console.log(date);
});
/******/ })()
;