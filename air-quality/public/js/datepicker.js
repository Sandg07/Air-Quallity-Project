/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!************************************!*\
  !*** ./resources/js/datepicker.js ***!
  \************************************/
$(function () {
  $("#datetimepicker").datetimepicker({
    format: "d/M/Y"
  }).on("changeDate", function (e, date) {
    console.log(e);
  });
});
/******/ })()
;