<div class="page-header">
    <h3>New Paste</h3>
</div>
{{ flashSession.output() }}
{{ form("new", "method": "post") }}

<div class="form-group">
    {{ text_area("content", 'rows': 20, 'class': "form-control") }}
</div>
<div class="form-group">
    {{ submit_button("Submit", 'class': "btn btn-success") }}
</div>
{{ endform() }}
{% if conf.piwik.host != "" %}
<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u="//{{ conf.piwik.host }}/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', {{ conf.piwik.siteid }}]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();
</script>
<noscript><p><img src="//anal.notoriousdev.com/piwik.php?idsite=6" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->
{% endif %}
