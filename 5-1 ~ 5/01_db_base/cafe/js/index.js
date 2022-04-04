
    var navPos = jQuery( '#header_fixed' ).offset().top;
    var navHeight = jQuery( '#header_fixed' ).outerHeight();
    jQuery( window ).on( 'scroll', function() {
        if ( jQuery( this ).scrollTop() > navPos ) {
            jQuery( '#header_fixed' ).addClass( 'fixed' );
        } else {
            jQuery( 'body' ).css( 'padding-top', 0 );
            jQuery( '#header_fixed' ).removeClass( 'fixed' );
        }
    });

    var btn = document.getElementById('modal-open');
    var modal = document.getElementById('modal');
    const body = document.querySelector('.modal-body');
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            $(body).fadeIn()
            $(modal).fadeIn();
    });

    modal.addEventListener('click', function() {
        $(body).fadeOut()
            $(modal).fadeOut();
      });

    
  

    $('a[href*="#"]').click(function () {
        var elmHash = $(this).attr('href'); //ページ内リンクのHTMLタグhrefから、リンクされているエリアidの値を取得
        var pos = $(elmHash).offset().top;//idの上部の距離を取得
        $('body,html').animate({scrollTop: pos}, 500); //取得した位置にスクロール。500の数値が大きくなるほどゆっくりスクロール
        return false; 
    });
  
