function ChangeArticleStatus(url, id) {
    $.ajax({
        url: url + '/' + id,
        type: 'GET',
        dataType: 'html',
        success: function (code_html, statut) {
            $(code_html).replaceAll("#articles-table").hide().fadeIn("slow");
        },
        error: function () {
            bootbox.alert("Oups. There was a problem while changing article status.", function () {
            });
        }
    });
}

function DeleteArticle(url, id, token) {
    bootbox.confirm("Are you sure?", function (result) {
        if (result == true) {
            $.ajax({
                url: url,
                type: 'POST',
                data: {_token: token, id: id},
                dataType: 'html',
                success: function (code_html, statut) {
                    $(code_html).replaceAll("#articles-table").hide().fadeIn("slow");
                },
                error: function () {
                    bootbox.alert("Oups. There was a problem while deleting article.", function () {
                    });
                }
            });
        }
    });
}

function AddArticle(url) {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'html',
        success: function (code_html, statut) {
            $(code_html).replaceAll("#articles-table").hide().fadeIn("slow");
        },
        error: function () {
            bootbox.alert("Oups. There was a problem while creating a new article.", function () {
            });
        }
    });
}


function EditArticleHashtags(url, id, hashtags, token) {
    bootbox.dialog({
            onEscape: function () {
            },
            title: "Editing hashtags",
            message: '<div class="row">  ' +
            '<div class="col-md-12"> ' +
            '<form class="form-horizontal"> ' +
            '<div class="form-group"> ' +
            '<label class="col-md-4 control-label" for="title">Hashtags</label> ' +
            '<div class="col-md-4"> ' +
            '<input id="hashtags" name="hashtags" type="text" value="' + hashtags + '" class="form-control input-md"> ' +
            '</div> ' +
            '</div> ' +
            '</form> </div>  </div>',
            buttons: {
                success: {
                    label: "Save",
                    className: "btn-success",
                    callback: function () {
                        var hashtags = $('#hashtags').val();
                        $.ajax({
                            url: url,
                            type: 'POST',
                            data: {_token: token, id: id, hashtags: hashtags},
                            dataType: 'html',
                            success: function (code_html, statut) {
                                $(code_html).replaceAll("#articles-table").hide().fadeIn("slow");
                            },
                            error: function () {
                                bootbox.alert("Oups. There was a problem while editing article hashtags.", function () {
                                });
                            }
                        });
                    }
                },
                failure: {
                    label: "Cancel",
                    className: "btn-primary"
                }
            }
        }
    );
}

/*
 * Pictures ajax handlers
 */

var PicturesAdminCurrentOffset = 0;
var NumberOfPicturesAdmin = null;

function GetNumberOfPicturesAdmin(url) {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'json',
        success: function (result) {
            NumberOfPicturesAdmin = result['total'];
        },
        error: function () {
            bootbox.alert("Oups. There was a problem while getting pictures.", function () {
            });
        }
    });
}

function AddPicture(url) {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'html',
        success: function (code_html, statut) {
            $(code_html).replaceAll("#pictures-table").hide().fadeIn("slow");
            NumberOfPicturesAdmin += 1;
        },
        error: function () {
            bootbox.alert("Oups. There was a problem while creating a new picture.", function () {
            });
        }
    });
}

function ChangePictureStatus(url, id) {
    $.ajax({
        url: url + '/' + id + '/' + PicturesAdminCurrentOffset,
        type: 'GET',
        dataType: 'html',
        success: function (code_html, statut) {
            $(code_html).replaceAll("#pictures-table").hide().fadeIn("slow");
        },
        error: function () {
            bootbox.alert("Oups. There was a problem while changing picture status.", function () {
            });
        }
    });
}

function DeletePicture(url, id, token) {
    bootbox.confirm("Are you sure?", function (result) {
        if (result == true) {
            $.ajax({
                url: url,
                type: 'POST',
                data: {_token: token, id: id},
                dataType: 'html',
                success: function (code_html, statut) {
                    $(code_html).replaceAll("#pictures-table").hide().fadeIn("slow");
                    NumberOfPicturesAdmin -= 1;
                },
                error: function () {
                    bootbox.alert("Oups. There was a problem while deleting picture.", function () {
                    });
                }
            });
        }
    });
}

function NextSetOfPicturesAdmin(url) {
    if ((PicturesAdminCurrentOffset + 20) < NumberOfPicturesAdmin) {
        PicturesAdminCurrentOffset += 20;
        $.ajax({
            url: url + '/' + PicturesAdminCurrentOffset,
            type: 'GET',
            dataType: 'html',
            success: function (code_html, statut) {
                $(code_html).replaceAll("#pictures-table").hide().fadeIn("slow");
            },
            error: function () {
                bootbox.alert("Oups. There was a problem while getting images.", function () {
                });
            }
        });
    }
}

function PreviousSetOfPicturesAdmin(url) {
    if ((PicturesAdminCurrentOffset) > 0) {
        PicturesAdminCurrentOffset -= 20;
        $.ajax({
            url: url + '/' + PicturesAdminCurrentOffset,
            type: 'GET',
            dataType: 'html',
            success: function (code_html, statut) {
                $(code_html).replaceAll("#pictures-table").hide().fadeIn("slow");
            },
            error: function () {
                bootbox.alert("Oups. There was a problem while getting images.", function () {
                });
            }
        });
    }
}

/*
 * Video ajax handlers
 */

function AddVideo(url) {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'html',
        success: function (code_html, statut) {
            $(code_html).replaceAll("#videos-table").hide().fadeIn("slow");
        },
        error: function () {
            bootbox.alert("Oups. There was a problem while creating a new video.", function () {
            });
        }
    });
}

function DeleteVideo(url, id, token) {
    bootbox.confirm("Are you sure?", function (result) {
        if (result == true) {
            $.ajax({
                url: url,
                type: 'POST',
                data: {_token: token, id: id},
                dataType: 'html',
                success: function (code_html, statut) {
                    $(code_html).replaceAll("#videos-table").hide().fadeIn("slow");
                },
                error: function () {
                    bootbox.alert("Oups. There was a problem while deleting video.", function () {
                    });
                }
            });
        }
    });
}

function ChangeVideoStatus(url, id) {
    $.ajax({
        url: url + '/' + id,
        type: 'GET',
        dataType: 'html',
        success: function (code_html, statut) {
            $(code_html).replaceAll("#videos-table").hide().fadeIn("slow");
        },
        error: function () {
            bootbox.alert("Oups. There was a problem while changing video status.", function () {
            });
        }
    });
}

function EditVideo(url, id, title, youtubeid, token) {
    bootbox.dialog({
            onEscape: function () {
            },
            title: "Editing a video",
            message: '<div class="row">  ' +
            '<div class="col-md-12"> ' +
            '<form class="form-horizontal"> ' +
            '<div class="form-group"> ' +
            '<label class="col-md-4 control-label" for="title">Title</label> ' +
            '<div class="col-md-4"> ' +
            '<input id="title" name="title" type="text" value="' + title + '" class="form-control input-md"> ' +
            '</div> ' +
            '</div> ' +
            '<div class="form-group"> ' +
            '<label class="col-md-4 control-label" for="awesomeness">Youtube Adress</label> ' +
            '<div class="col-md-4"> ' +
            '<input id="youtubeid" name="youtubeid" type="text" value="' + youtubeid + '" class="form-control input-md"> ' +
            '</div> ' +
            '</div> </div>' +
            '</form> </div>  </div>',
            buttons: {
                success: {
                    label: "Save",
                    className: "btn-success",
                    callback: function () {
                        var title = $('#title').val();
                        var youtubeid = $('#youtubeid').val();
                        $.ajax({
                            url: url,
                            type: 'POST',
                            data: {_token: token, id: id, title: title, youtubeid: youtubeid},
                            dataType: 'html',
                            success: function (code_html, statut) {
                                $(code_html).replaceAll("#videos-table").hide().fadeIn("slow");
                            },
                            error: function () {
                                bootbox.alert("Oups. There was a problem while editing video.", function () {
                                });
                            }
                        });
                    }
                },
                failure: {
                    label: "Cancel",
                    className: "btn-primary"
                }
            }
        }
    );
}

/*
 * User ajax handlers
 */

function AddUser(url) {
    $.ajax({
        url: url,
        type: 'GET',
        dataType: 'html',
        success: function (code_html, statut) {
            $(code_html).replaceAll("#users-table").hide().fadeIn("slow");
        },
        error: function () {
            bootbox.alert("Oups. There was a problem while creating a new user.", function () {
            });
        }
    });
}

function DeleteUser(url, id, token) {
    bootbox.confirm("Are you sure?", function (result) {
        if (result == true) {
            $.ajax({
                url: url,
                type: 'POST',
                data: {_token: token, id: id},
                dataType: 'html',
                success: function (code_html, statut) {
                    $(code_html).replaceAll("#users-table").hide().fadeIn("slow");
                },
                error: function () {
                    bootbox.alert("Oups. There was a problem while deleting user.", function () {
                    });
                }
            });
        }
    });
}


function EditUser(url, id, privileges, username, token) {
    var message = '<div class="row">' +
        '<div class="col-md-12">' +
        '<form class="form-horizontal">' +
        '<div class="form-group">' +
        '<label class="col-md-4 control-label" for="awesomeness">Privileges</label>' +
        '<div class="col-md-4"> <div class="radio"><label for="awesomeness-0">' +
        '<input type="radio" name="awesomeness" id="awesomeness-0" value="super"';
    if (privileges == 'super')
        message += 'checked="checked">Super</label>';
    else
        message += '>Super</label>';
    message += '</div><div class="radio"> <label for="awesomeness-1">' +
    '<input type="radio" name="awesomeness" id="awesomeness-1" value="normal"';
    if (privileges == 'normal')
        message += 'checked="checked">Normal</label>';
    else
        message += '>Normal</label>';
    message += '</div></div></div>';
    message += '<div class="form-group">' +
    '<label class="col-md-4 control-label" for="awesomeness">Username</label>' +
    '<div class="col-md-4">' +
    '<input id="username" name="username" type="text" value="' + username + '" class="form-control input-md">' +
    '</div></div>' +
    '<div class="form-group">' +
    '<label class="col-md-4 control-label" for="awesomeness">Password</label>' +
    '<div class="col-md-4">' +
    '<input id="password" name="password" type="password" class="form-control input-md">' +
    '</div></div>';
    message += '</form></div></div>';
    bootbox.dialog({
            onEscape: function () {
            },
            title: "Editing a user",
            message: message,
            buttons: {
                success: {
                    label: "Save",
                    className: "btn-success",
                    callback: function () {
                        var privileges = $("input[name='awesomeness']:checked").val()
                        var username = $("#username").val()
                        var password = $("#password").val()
                        $.ajax({
                            url: url,
                            type: 'POST',
                            data: {_token: token, id: id, privileges: privileges, username: username, password: password },
                            dataType: 'html',
                            success: function (code_html, statut) {
                                $(code_html).replaceAll("#users-table").hide().fadeIn("slow");
                            },
                            error: function () {
                                bootbox.alert("Oups. There was a problem while editing user.", function () {
                                });
                            }
                        });
                    }
                },
                failure: {
                    label: "Cancel",
                    className: "btn-primary"
                }
            }
        }
    );

}

/*
* Places ajax handlers
*/

function searchPlace(url, token) {
    var place = $("#place").val();
    $.ajax({
        url: 'https://maps.googleapis.com/maps/api/geocode/json?address=' + place + '&sensor=false&key=AIzaSyBkS3YFMV1Cm4GhavW_0UxM38t2BZkUwf8',
        type: 'GET',
        dataType: 'json',
        success: function (json, statut) {
            if (json.status == "ZERO_RESULTS")
                bootbox.alert("Oups. We found no places corresponding to that address.", function () {
                });
            else {
                $.ajax({
                    url: url,
                    type: 'POST',
                    dataType: 'html',
                    data: {_token: token, json: json.results[0]},
                    success: function (code_html, statut) {
                        $(code_html).replaceAll("#searched-table").hide().fadeIn("slow");
                    },
                    error: function () {
                        bootbox.alert("Oups. There was a problem while displaying the places.", function () {
                        });
                    }
                });
            }
        },
        error: function () {
            bootbox.alert("Oups. There was a problem while requesting GoogleMap API.", function () {
            });
        }
    });
}

function addPlace(url, json_data, token) {
    $.ajax({
        url: url,
        type: 'POST',
        dataType: 'html',
        data: {_token: token, json: json_data},
        success: function (code_html, statut) {
            $(code_html).replaceAll("#places-table").hide().fadeIn("slow");
        },
        error: function () {
            bootbox.alert("Oups. There was a problem while adding a new place.", function () {
            });
        }
    });
}

function deletePlace(url, id, token) {
    bootbox.confirm("Are you sure?", function (result) {
        if (result == true) {
            $.ajax({
                url: url,
                type: 'POST',
                data: {_token: token, id: id},
                dataType: 'html',
                success: function (code_html, statut) {
                    $(code_html).replaceAll("#places-table").hide().fadeIn("slow");
                },
                error: function () {
                    bootbox.alert("Oups. There was a problem while deleting place.", function () {
                    });
                }
            });
        }
    });
}