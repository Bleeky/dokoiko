var isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ? true : false;

/* Global handlers */

$(document).ready(function () {
    if (!isMobile) {
        $('.social-tooltip').tooltipster({
            animation: 'fade',
            arrow: 1,
            timer: 5000,
            offsetY: 10,
            delay: 500,
            speed: 200,
            theme: 'tooltipster-shadow'
        });
    }
});

function MenuScrolling() {
    if (isMobile == false && $(window).width() > 768) {
        if ($(this).scrollTop() > $('.logo-container').height()) {
            $("#menu-fixed").css("visibility", "visible");
            $("#menu").css("visibility", "hidden");
        }
        else {
            $("#menu").css("visibility", "visible");
            $("#menu-fixed").css("visibility", "hidden");
        }
    }
    else {
        $("#menu").css("visibility", "visible");
        $("#menu-fixed").css("visibility", "hidden");
    }
}

$(window).scroll(MenuScrolling);
$(window).resize(MenuScrolling);

function ClickHandler() {
    $('.btn-toggle-menu').click(function () {
        $('#menu').toggle();
    });
}

function MobileNavigation() {
    if ($(window).width() <= 768) {
        $('#menu').css('display', 'none');
        $('.toggle-bar').css('display', 'block');
    }
    else {
        $('#menu').show();
        $('.toggle-bar').css('display', 'none');
    }
}

$(window).resize(MobileNavigation);
$(document).ready(MobileNavigation);

$(window).resize(ClickHandler);
$(document).ready(ClickHandler);


/* Articles handlers and requests */

function HandleArticleHover() {
    if (!isMobile) {
        $(".dokobox").on({
            mouseenter: function () {
                $(this).find('.btn-article-reader').addClass('hovered');
                $(this).find('.dokobox-img').addClass('hovered');
            },
            mouseleave: function () {
                $(this).find('.btn-article-reader').removeClass('hovered');
                $(this).find('.dokobox-img').removeClass('hovered');
            }
        })
    }
}
$(document).ready(HandleArticleHover);

var ArticlesCurrentOffset = 0;
var NumberOfArticles = null;

function LoadMoreArticles(urlArticles) {
    ArticlesCurrentOffset = ArticlesCurrentOffset + 4;
    if (ArticlesCurrentOffset + 4 >= NumberOfArticles) {
        $("#more-articles").fadeOut("slow");
    }
    $.ajax({
        url: urlArticles + '/' + ArticlesCurrentOffset,
        type: 'GET',
        dataType: 'html',
        success: function (code_html, statut) {
            $(code_html).appendTo("#articles").hide().fadeIn("slow");
            HandleArticleHover();
        },
        error: function () {
            bootbox.alert("Oups. There was a problem while loading more articles.", function () {
            });
        }
    })
}

function GetNumberOfArticles(url) {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (result) {
            NumberOfArticles = result['total'];
            if (ArticlesCurrentOffset + 4 >= NumberOfArticles)
                $("#more-articles").fadeOut();
        },
        error: function () {
            bootbox.alert("Oups. There was a problem while getting articles.", function () {
            });
        }
    })
}

/* Pictures hanlders and requests */

$(document).on("click", "#btn-article-reader", function () {
    $('#btn-picture-comments').hide();
    $('.disqus').fadeIn('slow');
});

function HandlePictureHover() {
    if (!isMobile) {
        $('.grid-picture').each(function () {
            $(this).on("mouseenter", function () {
                $(this).find('img').toggleClass('imagehovered');
            });
            $(this).on("mouseleave", function () {
                $(this).find('img').toggleClass('imagehovered');
            })
        })
    }
}

$(document).ready(HandlePictureHover);

var PicturesCurrentOffset = 0;
var NumberOfPictures = null;
var MostRecentPictureID = null;
var OldestPictureID = null;

function GetNumberOfPictures(url) {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (result) {
            NumberOfPictures = result['total'];
            MostRecentPictureID = result['recent-picture-id'];
            OldestPictureID = result['old-picture-id'];
        },
        error: function () {
            bootbox.alert("Oups. There was a problem while getting images.", function () {
            });
        }
    })
}
function RequestRefresh(id, url) {
    $.ajax({
        url: url + '/' + id,
        type: 'GET',
        dataType: 'html',
        success: function (code_html, statut) {
            $(code_html).replaceAll("#latest-daily").hide().fadeIn("slow");
            $("html, body").animate({scrollTop: $('.separator').offset().top}, 700);
        }
    });
}

function NextPicture(id, url) {
    if (id != OldestPictureID && OldestPictureID != null) {
        $.ajax({
            url: url + '/' + id,
            type: 'GET',
            dataType: 'html',
            success: function (code_html, statut) {
                $(code_html).replaceAll("#latest-daily").hide().fadeIn("slow");
            },
            error: function () {
                bootbox.alert("Oups. There was a problem while getting the image.", function () {
                });
            }
        });
    }
    else
        $('#latest-daily').hide().fadeIn("slow");
}

function PreviousPicture(id, url) {
    if (id != MostRecentPictureID && MostRecentPictureID != null) {
        $.ajax({
            url: url + '/' + id,
            type: 'GET',
            dataType: 'html',
            success: function (code_html, statut) {
                $(code_html).replaceAll("#latest-daily").hide().fadeIn("slow");
            },
            error: function () {
                bootbox.alert("Oups. There was a problem while getting the image.", function () {
                });
            }
        });
    }
    else
        $('#latest-daily').hide().fadeIn("slow");
}

function NextSetOfPictures(url) {
    if ((PicturesCurrentOffset + 8) < NumberOfPictures) {
        PicturesCurrentOffset += 8;
        $.ajax({
            url: url + '/' + PicturesCurrentOffset,
            type: 'GET',
            dataType: 'html',
            success: function (code_html, statut) {
                $(code_html).replaceAll("#set-of-pictures").hide().fadeIn("slow");
                HandlePictureHover();
            },
            error: function () {
                bootbox.alert("Oups. There was a problem while getting images.", function () {
                });
            }
        });
    }
    else
        $('#set-of-pictures').hide().fadeIn("slow");
}

function PreviousSetOfPictures(url) {
    if (PicturesCurrentOffset > 0) {
        PicturesCurrentOffset -= 8;
        $.ajax({
            url: url + '/' + PicturesCurrentOffset,
            type: 'GET',
            dataType: 'html',
            success: function (code_html, statut) {
                $(code_html).replaceAll("#set-of-pictures").hide().fadeIn("slow");
                HandlePictureHover();
            },
            error: function () {
                bootbox.alert("Oups. There was a problem while getting images.", function () {
                });
            }
        });
    }
    else
        $('#set-of-pictures').hide().fadeIn("slow");
}