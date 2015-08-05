<div class="page-header">
    <p>{{ conf.app.host }}/v/<span class="text-danger">{{ paste.slug }}</span></p>
    {{ link_to('v/' ~ paste.slug ~ '/raw', 'View Raw') }}
</div>

<pre><code>{{ paste.content|e }}</code></pre>
