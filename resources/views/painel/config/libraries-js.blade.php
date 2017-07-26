<script src="/assets/painel/css/stilize/stilize.min.js"></script>
<script src="/assets/painel/js/jlib/autocomplete.js"></script>
<script src="/assets/painel/js/jlib/jlib.js"></script>
<script src="/assets/painel/js/tinymce/tinymce.min.js"></script>
<script src="/assets/painel/js/simplemde/simplemde.min.js"></script>
<script src="/assets/painel/js/animacao.js"></script>
<script src="/assets/painel/js/blogando.js"></script>
<script src="/assets/painel/js/requisicao.js"></script>
 <script>
    tinymce.init({
        selector: "#conteudo",
        height: 300,
        theme: "modern",
        menubar: false,
        plugins: [
            "advlist autolink lists link image charmap print preview hr anchor pagebreak",
            "searchreplace wordcount visualblocks visualchars code fullscreen",
            "insertdatetime media nonbreaking save table contextmenu directionality",
            "emoticons template paste textcolor colorpicker textpattern imagetools codesample"
        ],
        toolbar: "undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image codesample preview"
    });    
</script> 
 {{--  <script>
    var simplemde = new SimpleMDE({ 
        element: document.querySelector("#conteudo")
    });
</script>   --}}