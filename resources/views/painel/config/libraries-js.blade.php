<script src="/assets/painel/css/stilize/stilize.min.js"></script>
<script src="/assets/painel/js/jlib/autoCompleteOff.js"></script>
<script src="/assets/painel/js/jlib/http.js"></script>
<script src="/assets/painel/js/jlib/jlib.js"></script>
<script src="/assets/painel/js/tinymce/tinymce.min.js"></script>
<script src="/assets/painel/js/simplemde/simplemde.min.js"></script>
<script src="/assets/painel/js/animacao.js"></script>
<script src="/assets/painel/js/blogando.js"></script>
<script src="/assets/painel/js/requisicao.js"></script>
@if ($blog->parametros->usarmarkdown)
    <script>
        new SimpleMDE({             
            autosave : {
                enabled: true,
                uniqueId : new Date().getTime()
            },
            element: document.querySelector("#conteudo"),
            spellChecker : false,
            status : false,
            insertTexts : {
                image : ["![](", ")"],
                link : ["[", "]()"],
            },
            tabSize : 4,
            toolbar : ["bold", "italic", "heading", "|", "quote", "unordered-list", "ordered-list", "|", "link", "image", "|", "guide"]
        });
    </script>  
@else
    <script>
        tinymce.init({
            selector: "#conteudo",
            height: 300,
            theme: "modern",
            menubar: true,
            language : "pt_BR",
            browser_spellcheck : true,
            plugins: [
                "advlist autolink autosave autoresize lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor textpattern colorpicker textpattern imagetools codesample"
            ],
            toolbar: "restoredraft | undo redo searchreplace | insert | fontselect fontsizeselect forecolor backcolor | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | emoticons link image media codesample removeformat print preview",
            fontsize_formats: "8px 10px 12px 14px 16px 18px 20px 22px 24px 36px 48px 72px"
        });    
    </script> 
@endif