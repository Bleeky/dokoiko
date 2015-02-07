@extends('Layouts.default')
@section('content')

    {!! HTML::style('css/edition_dependencies.css') !!}

    {!! HTML::script('js/edition_dependencies.min.js') !!}

    <div class="container">
        <section id="editor">
            <div id="article-editor">
                {!! $article->content !!}
            </div>
        </section>
    </div>

    <script>
        $(function () {
            var csrfToken = '{!! csrf_token() !!}';
            $('#article-editor').editable({
                buttons: ["bold", "italic", "underline", "strikeThrough", "sep", "fontFamily", "fontSize", "insertHorizontalRule", "table", "sep",
                    "color", "formatBlock", "blockStyle", "align", "sep",
                    "insertOrderedList", "insertUnorderedList", "outdent", "indent", "sep",
                    "selectAll", "createLink", "insertImage", "insertVideo", "sep",
                    "undo", "redo", "html", "save", "sep", "help"],
                customButtons: {
                    help: {
                        title: 'help',
                        icon: {
                            type: 'font',
                            value: 'fa fa-question'
                        },
                        callback: function () {
                            bootbox.dialog({
                                onEscape: function () {
                                },
                                title: "Article editing",
                                message: 'Fonts size you should use :<br>' +
                                '<b>For content</b> : 16px<br>' +
                                '<b>For titles</b> : 28px with bold' +
                                '<br><br><b>Article formating :</b><br>' +
                                '<b>Click on the Magic wand</b> and then select the title you ' +
                                'want, and the description you want.'
                            });
                        },
                        refresh: function () {
                        }
                    }
                },
                inlineMode: false,
                imageDeleteConfirmation: false,
                toolbarFixed: false,
                autosave: false,
                plainPaste: true,
                theme: 'dark',
                saveURL: '{!! URL::action('ArticleAdminController@postSaveArticle') !!}',
                saveParams: {id: '{!! $article->id !!}', _token: csrfToken},
                saveRequestType: 'POST',
                imageUploadParams: {_token: csrfToken},
                imageUploadURL: '{!! URL::action('ArticleAdminController@postUploadArticleImage') !!}',
                imageDeleteURL: '{!! URL::action('ArticleAdminController@postDeleteArticleImage') !!}',
                fontList: ["Open Sans"],
                defaultBlockStyle: {
                    'title': 'Title',
                    'introduction': 'Introduction'
                }
            })
                    .on('editable.saveError', function (e, editor, data) {
                        bootbox.dialog({
                            onEscape: function () {
                            }, title: 'Saving', message: 'Save Error.'
                        });
                    })
                    .on('editable.afterSave', function (e, editor, data) {
                        bootbox.dialog({
                            onEscape: function () {
                            }, title: 'Saving', message: 'Save Successful !'
                        });
                    })
                    .on('editable.imageError', function (e, editor, data) {
                        bootbox.dialog({
                            onEscape: function () {
                            }, title: 'Saving', message: 'Upload Error.'
                        });
                    })
            $('#article-editor').on('editable.afterRemoveImage', function (e, editor, $img) {
                editor.options.imageDeleteParams = {src: $img.attr('src'), _token: csrfToken};
                editor.deleteImage($img);
            });
        });
    </script>

@stop