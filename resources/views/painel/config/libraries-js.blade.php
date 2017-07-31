<script src="/assets/painel/css/stilize/stilize.min.js"></script>
<script src="/assets/painel/js/jlib/autocomplete.js"></script>
<script src="/assets/painel/js/jlib/jlib.js"></script>
<script src="/assets/painel/js/tinymce/tinymce.min.js"></script>
<script src="/assets/painel/js/simplemde/simplemde.min.js"></script>
<script src="/assets/painel/js/animacao.js"></script>
<script src="/assets/painel/js/blogando.js"></script>
<script src="/assets/painel/js/requisicao.js"></script>
@if ($blog->parametros->usarmarkdown)
    <script>
        var simplemde = new SimpleMDE({ 
            element: document.querySelector("#conteudo"),
            spellChecker : false,
            toolbar: ["bold", "italic", "heading", "|", "quote", "unordered-list", "ordered-list", "|", "link", "image", "|", "guide"]
        });
    </script>  
@else
    <script>
        tinymce.init({
            selector: "#conteudo",
            height: 300,
            theme: "modern",
            menubar: false,
            language : "pt_BR",
            browser_spellcheck : true,
            plugins: [
                "advlist autolink autosave autoresize lists link image charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars code fullscreen",
                "insertdatetime media nonbreaking save table contextmenu directionality",
                "emoticons template paste textcolor textpattern colorpicker textpattern imagetools codesample"
            ],
            toolbar: "restoredraft undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image codesample"
        });    
    </script> 
@endif