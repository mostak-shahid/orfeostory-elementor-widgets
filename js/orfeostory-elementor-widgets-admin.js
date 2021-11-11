jQuery(document).ready(function($) {
    $(window).load(function(){
      $('.mos-oew-wrapper .tab-con').hide();
      $('.mos-oew-wrapper .tab-con.active').show();
    });

    $('.mos-oew-wrapper .tab-nav > a').click(function(event) {
      event.preventDefault();
      var id = $(this).data('id');

      set_mos_oew_cookie('mos_oew_active_tab',id,1);
      $('#mos-oew-'+id).addClass('active').show();
      $('#mos-oew-'+id).siblings('div').removeClass('active').hide();

      $(this).closest('.tab-nav').addClass('active');
      $(this).closest('.tab-nav').siblings().removeClass('active');
    });
});
