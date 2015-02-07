$('#author-about-btn').click(function() {
    $('#author-about-btn').hide();
    $('#author-name').hide();
    $('#author-about').fadeIn('slow');
});

var open = false;
$('#cn-button').click(function() {
    if (!e) var e = window.event;
    e.stopPropagation();
    if(!open){
        openNav();
    }
    else{
        closeNav();
    }
});
function openNav(){
    open = true;
    $('#cn-button').html("-");
    $('#cn-overlay').addClass('on-overlay');
    $('#cn-wrapper').addClass('opened-nav');
}
function closeNav(){
    open = false;
    $('#cn-button').html("+");
    $('#cn-overlay').removeClass('on-overlay');
    $('#cn-wrapper').removeClass('opened-nav');
}
document.addEventListener('click', closeNav);