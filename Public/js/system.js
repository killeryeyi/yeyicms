$(document).ready(function () {
   /* $(".userinfo").click(function () {
        $(this).toggleClass('active');
        $(".userinfodrop").toggle();
    })*/

   /* $(".vernav2 li a").click(function () {
        $(".vernav2 li ul").slideUp(300);
        $(this).next().next("ul").slideToggle(300);

    })*/

   /* $(".checkall").click(function () {
        $(".check input").prop("checked",this.checked);
    })*/

    /*$(".togglemenu").click(function () {
        $(".vernav2").toggleClass("menucoll2");
        $(this).toggleClass('togglemenu_collapsed');
    })*/
    $(".quexiao").click(function () {
        $(".tabtext").val("");
        $("#form").submit();
    })
})
$('.checkall').click(function(){
    $(".check input").prop("checked",this.checked);
});