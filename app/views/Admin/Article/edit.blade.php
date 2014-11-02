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

<div class="container" style="margin-top: 30px; padding-bottom: 30px;">
  <section id="editor">
      <div id="edit">
      	{{ $article->content }}
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
      "undo", "redo", "html", "save", "sep"],
      inlineMode: false,
      toolbarFixed: false,
      autosave: false,
      plainPaste: true,
      theme: 'gray',
      saveURL: '{{ URL::action('AdminController@postUploadOldArticle') }}',
      saveParams: {id: {{ $article->id }} },
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
        bootbox.dialog({title: 'Saving', message: 'Save Error.'});
    })
    .on('editable.afterSave', function (e, editor, data) {
        bootbox.dialog({title: 'Saving', message: 'Save Successful !'});
    })
    .on('editable.imageError', function (e, editor, data) {
        bootbox.dialog({title: 'Saving', message: 'Upload Error.'});
    })
    $('#edit').on('editable.afterRemoveImage', function (e, editor, $img) {
      editor.options.imageDeleteParams = {src: $img.attr('src')};
      editor.deleteImage($img);
    });
  });
</script>