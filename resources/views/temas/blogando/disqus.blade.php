<div class="bg-comentarios"><div class="bg-comentarios--disqus" id="disqus_thread"></div></div>
<script>
    var disqus_config = function () {
        this.page.url = document.querySelector("#url").value;
        this.page.identifier = document.querySelector("#post").value;
    };
    (function() {
        var d = document, s = d.createElement('script');
        s.src = `https://${document.querySelector("#disqus").value}.disqus.com/embed.js`;
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>