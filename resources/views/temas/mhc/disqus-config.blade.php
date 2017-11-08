<script>
    var disqus_config = function () {
        this.page.url = "{{ $blog->url . "/" . $post->slug }}";
        this.page.identifier = "{{ $post->slug }}";
    };
    (function() {
        var d = document, s = d.createElement('script');
        s.src = "https://blog-matheus.disqus.com/embed.js";
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>