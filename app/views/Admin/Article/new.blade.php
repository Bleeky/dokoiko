{{ HTML::style('assets/froala/css/froala_editor.min.css') }}
{{ HTML::style('assets/froala/css/froala_style.min.css') }}
{{ HTML::style('assets/froala/css/froala_content.min.css') }}

{{ HTML::style('http://fonts.googleapis.com/css?family=Lato|Josefin+Sans:100,400,100italic,300italic') }}

{{ HTML::script('assets/froala/js/froala_editor.min.js') }}
{{ HTML::script('assets/froala/js/plugins/tables.min.js') }}
{{ HTML::script('assets/froala/js/plugins/lists.min.js') }}
{{ HTML::script('assets/froala/js/plugins/colors.min.js') }}
{{ HTML::script('assets/froala/js/plugins/media_manager.min.js') }}
{{ HTML::script('assets/froala/js/plugins/font_family.min.js') }}
{{ HTML::script('assets/froala/js/plugins/font_size.min.js') }}
{{ HTML::script('assets/froala/js/plugins/block_styles.min.js') }}
{{ HTML::script('assets/froala/js/plugins/video.min.js') }}
{{ HTML::script('assets/froala/js/plugins/file_upload.min.js') }}
{{ HTML::script('assets/froala/js/plugins/char_counter.min.js') }}
{{ HTML::style('assets/froala/css/themes/gray.min.css') }}


<style type="text/css">
  .title {}
  .introduction {}
</style>


<div class="container selectable" style="margin-top: 30px; padding-bottom: 30px;">
  <section id="editor">
    <div id="edit">

        <p class="title" style="text-align: center;"><em><span style="font-family: 'Josefin Sans'; font-size: 60px;">Article Prototype</span></em></p>
        <p>{{ HTML::image('ressources/articles/holder.png', null, array('class'=>'fr-fin', "data-fr-image-preview"=>"false", "alt"=>"Image title", "width"=>"100%")) }}</p>
        <p class="introduction"><span style="font-family: 'Open Sans'; font-size: 14px;">This is a small article introduction. You should write your own here. Have fun !</span></p>

    </div>
  </section>
</div>

<script>
  $(function(){
    $('#edit').editable({
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
                          onEscape: function() {},
                            title: "Article editing",
                            message: 'Fonts size you should use :<br>' +
                                      '<b>For introduction</b> : 18px<br>' +
                                      '<b>For content</b> : 14px<br>' +
                                      '<b>For titles</b> : 28px with bold'
                          });
                      },
                      refresh: function () { }
                    }
            },
      inlineMode: false,
      toolbarFixed: false,
      autosave: false,
      plainPaste: true,
      theme: 'gray',
      saveURL: '{{ URL::action('AdminController@postUploadNewArticle') }}',
      saveParams: {id: {{ $article == null ? 0 : $article }} },
      saveRequestType: 'POST',
      imageDeleteURL: '{{ URL::action('AdminController@postDeleteArticleImage') }}',
      imageUploadURL: '{{ URL::action('AdminController@postUploadArticleImage') }}',
      fontList: ["Open Sans", "Josefin Sans", "Lato"],
      defaultBlockStyle: {
        'title': 'Title',
        'introduction': 'Introduction'
      }
    })
    .on('editable.saveError', function (e, editor, data) {
            bootbox.dialog({onEscape: function() {},title: 'Saving', message: 'Save Error.'});
        })
        .on('editable.afterSave', function (e, editor, data) {
            bootbox.dialog({onEscape: function() {},title: 'Saving', message: 'Save Successful !'});
        })
        .on('editable.imageError', function (e, editor, data) {
            bootbox.dialog({onEscape: function() {},title: 'Saving', message: 'Upload Error.'});
        })
        .on('editable.afterRemoveImage', function (e, editor, $img) {
          editor.options.imageDeleteParams = {src: $img.attr('src')};
          editor.deleteImage($img);
        });
  });
</script>