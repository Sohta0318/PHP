$(function(){
//上部にナビゲーション
  function FixedAnime(){
    var headerH =$('.korona').outerHeight(true);
    var scroll =$(window).scrollTop();
    if(scroll >= headerH){
      $('#head').addClass('fixed');
    }else {
      $('#head').removeClass('fixed');
    };
  };


  $(window).scroll(function(){
  FixedAnime();
  });

  $(window).on('load', function () {
	FixedAnime();
  });

//モーダルウィンドウ
  $(function () {
    $('.nav-r').click(function () {
      $('.g-nav-c').css('display','block');
      $('.g-nav, .g-nav-c').css('display','block');
      $('.g-nav').addClass('g-nav-b');
    });
    $('.g-nav-c').click(function () {
      $('.g-nav, .g-nav-c').css('display','none');
    });
  });

  //スクロール
    $('.sc ,.topjump a[href^="#"]').click(function(){
      var adjust = 0;// 移動先を0px調整する。0を30にすると30px下にずらすことができる。
      var speed = 400;// スクロールの速度（ミリ秒）
      var href= $(this).attr("href");// アンカーの値取得 リンク先（href）を取得して、hrefという変数に代入
      var target = $(href == "#" || href == "" ? 'html' : href);// 移動先を取得 リンク先(href）のidがある要素を探して、targetに代入
      var position = target.offset().top + adjust;// 移動先を調整 idの要素の位置をoffset()で取得して、positionに代入
      $('body,html').animate({scrollTop:position}, speed, 'swing'); // スムーススクロール linear（等速） or swing（変速）
      return false;
    });

    function FixedAnime2(){
      var scroll =$(window).scrollTop();
      if(scroll >= 600){
        $('.topjump').removeClass('DownMove');
        $('.topjump').addClass('fadeUp');
      }else {
        if($('.topjump').hasClass('fadeUp')){
           $('.topjump').removeClass('fadeUp');
           $('.topjump').addClass('DownMove');
         }
      };
    };

    $(window).scroll(function(){
    FixedAnime2();
    });

    $(window).on('load', function () {
    FixedAnime2();
    });






});
