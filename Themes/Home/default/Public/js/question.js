/**
 * Created by Administrator on 2017/2/22.
 */
(function () {
    $('.wpb_wrapper h5.active').next('.accordion_content').css('display','block');
    $('.wpb_wrapper h5').click(function () {
        $(this).addClass('active').siblings('h5').removeClass('active');
        $(this).next('.accordion_content').show().siblings('.accordion_content').hide();
    });
    $('#myModal').on('shown.bs.modal', function () {
        $('#myInput').focus();
    });

})();
