$(document).ready(function(){
    $('.tab-content:not(:first)').hide();
    $('.tabs li a').click(function(){
        $('.tabs li a').removeClass('active');
        $(this).addClass('active');
        $('.tab-content').hide();
        
        var activeTab = $(this).attr('href');
        //activeTab = #news// activeTab =#random
        $(activeTab).fadeIn();
        return false;
    });
    $('body').on('click', '.btn-toggle', function (e) {
        $(this).parent().toggleClass('open');
    });
    $('.overlapblackbg').click(function () {
      $('.mini-cart.open').removeClass('open');
    });
})