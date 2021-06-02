$(document).ready(function() {


    // Modale

    $(".open-modal").click(function(e){
        e.preventDefault();
        dataModal = $(this).attr("data-modal");
        $("#" + dataModal).css({"display":"block"});
    });

    $(".modal .close, .modal .overlay").click(function(){
        $(".modal").css({"display":"none"});
    });





    // Accordéon

    $('.accordion > div > h3').click(function(){
		$(this).next().slideToggle();
		$(this).parent().toggleClass('open');
    });





    // Lightbox image
    $('.open-lightbox').on('click', function(e) {
        e.preventDefault();
        var image = $(this).attr('href');
        $('html').addClass('no-scroll');
        $('body').append('<div class="lightbox-opened"><img src="' + image + '"></div>');
    });
      
    $('body').on('click', '.lightbox-opened', function() {
        $('html').removeClass('no-scroll');
        $('.lightbox-opened').remove();
    });






    // Tabs

    $('.tabs-nav a').click(function() {
        // Check for active
        $('.tabs-nav li').removeClass('active');
        $(this).parent().addClass('active');

        // Display active tab
        let currentTab = $(this).attr('href');
        $('.tabs-content div').hide();
        $(currentTab).show();

        return false;
    });






    // Menu fixe (sidemenu)

    const navigation = document.getElementById('sidemenu');

    if (navigation != null) {
        window.addEventListener('scroll', () => {

          if(window.scrollY > 20){
            navigation.classList.add('anim');
          } else {
            navigation.classList.remove('anim');
          }

        })
    }



    // Ancres

    function scrollNav() {
        $('#sidemenu a').click(function(){
            $(".active").removeClass("active");     
            $(this).addClass("active");
            
            $('html, body').stop().animate({
                scrollTop: $($(this).attr('href')).offset().top - 50
            }, 300);
            return false;
        });
    }
    scrollNav();




    // Ancre active au scroll
    
    $(function() {
        var anchorLink = $('#sidemenu a');
        $(window).scroll(function() {
            var windscroll = $(window).scrollTop();
            if (windscroll >= 1) {
                $("#joueurs .box").each(function(i) {
                    if (($(this).position().top - 70) <= windscroll) {
                        $(".active").removeClass("active");
                        anchorLink.eq(i).addClass('active');
                    }
                });
            } else {
                $(".active").removeClass("active");
            }
        }).scroll();
    });


   

  
});



