/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/account.js ***!
  \*********************************/
$("#accountFormEdit").on("click", function (e) {
  e.preventDefault();
  $(".notShown").toggleClass("invisible visible");
  $(".toHide").toggleClass("notThereAnymore");
});
$("#deleteBtn").on("click", function (e) {
  if (confirm("Are you sure that you want to delete your Account?")) {
    $("#userId").attr({
      value: 1
    });
  } else {
    e.preventDefault();
  }
});
/******/ })()
;