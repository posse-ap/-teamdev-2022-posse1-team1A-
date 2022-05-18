/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/modal.js ***!
  \*******************************/
$(function () {
  //モーダルウィンドウを出現させるクリックイベント
  $(".modal-open").click(function () {
    // 押された場所のidを取得
    var pushedId = $(this).attr('id').split(" ")[0];
    $(".modal-inner").hide();
    $("#" + pushedId + "-modal").show(); //キーボード操作などにより、オーバーレイが多重起動するのを防止する

    $(this).blur(); //ボタンからフォーカスを外す

    if ($("#modal-overlay")[0]) return false; //新しくモーダルウィンドウを起動しない (防止策1)
    //オーバーレイを出現させる

    $("body").append('<div id="modal-overlay"></div>');
    $("#modal-overlay").fadeIn("slow"); //コンテンツをセンタリングする

    centeringModalSyncer(); //コンテンツをフェードインする

    $("#modal-content").fadeIn("slow"); //[#modal-overlay]、または[#modal-close]をクリックしたら…

    $("#modal-overlay,#modal-close").unbind().click(function () {
      //[#modal-content]と[#modal-overlay]をフェードアウトした後に…
      $("#modal-content,#modal-overlay").fadeOut("slow", function () {
        //[#modal-overlay]を削除する
        $('#modal-overlay').remove();
      });
    });
  }); //リサイズされたら、センタリングをする関数[centeringModalSyncer()]を実行する

  $(window).resize(centeringModalSyncer); //センタリングを実行する関数

  function centeringModalSyncer() {
    //画面(ウィンドウ)の幅、高さを取得
    var w = $(window).width();
    var h = $(window).height(); // コンテンツ(#modal-content)の幅、高さを取得
    // jQueryのバージョンによっては、引数[{margin:true}]を指定した時、不具合を起こします。

    var cw = $("#modal-content").outerWidth();
    var ch = $("#modal-content").outerHeight(); //センタリングを実行する

    $("#modal-content").css({
      "left": (w - cw) / 2 + "px",
      "top": (h - ch) / 2 + "px"
    });
  }
});
/******/ })()
;