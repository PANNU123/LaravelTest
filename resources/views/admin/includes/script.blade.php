

<script src="{{asset('backend')}}/assets/libs/jquery/jquery.min.js"></script>
<script src="{{asset('backend/assets/libs/select2/js/select2.min.js')}}"></script>

<script src="{{asset('backend')}}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('backend')}}/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="{{asset('backend')}}/assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{asset('backend')}}/assets/libs/node-waves/waves.min.js"></script>
<script src="{{asset('backend')}}/assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{asset('backend')}}/assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{asset('backend')}}/assets/js/app.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="{{asset('backend')}}/assets/js/admin/extra.js"></script>
<script>
    (function($)
    {
        "use strict";
        $(document).ready(function() {
            $('.Description').summernote({
                placeholder: 'Write here..',
                height: 200,
                styleTags: [
                    'p',
                    { title: 'Blockquote', tag: 'blockquote', className: 'blockquote', value: 'blockquote' },
                    'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
                ],
                prettifyHtml: true,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline', 'add-text-tags', 'highlight', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'videoAttributes']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                imageAttributes: {
                    icon: '<i class="note-icon-pencil"/>',
                    figureClass: 'figureClass',
                    figcaptionClass: 'captionClass',
                    captionText: 'Caption Goes Here.',
                    manageAspectRatio: true // true = Lock the Image Width/Height, Default to true
                },
                lang: 'en-US',
                popover: {
                    image: [
                        ['imagesize', ['imageSize100', 'imageSize50', 'imageSize25']],
                        ['float', ['floatLeft', 'floatRight', 'floatNone']],
                        ['remove', ['removeMedia']],
                        ['custom', ['imageAttributes']],
                    ],
                },
                callbacks: {
                    onImageUpload: function(image) {
                        let editor;
                        editor = $(this);
                        uploadImageContent(image[0], editor);
                    },
                    onMediaDelete: function(target)
                    {
                        deleteImage(target[0].src);
                    }
                },
            });

        });
    })(jQuery)
</script>
@stack('post_scripts')

