{% if config.piwik.host != "" %}
<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//{{ config.piwik.host }}/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', {{ config.piwik.siteid }}]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//{{ config.piwik.host }}/piwik.php?idsite={{ config.piwik.siteid }}" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->
{% endif %}
