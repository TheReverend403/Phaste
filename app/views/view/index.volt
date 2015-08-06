{% extends "templates/main.volt" %}

{% block stylesheets %}
{{ stylesheet_link('//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.7/styles/github.min.css') }}
{% endblock %}

{% block content %}
<div class="page-header">
    <p>{{ conf.app.host }}/v/<span class="text-danger">{{ paste.slug }}</span></p>
    {{ link_to('v/' ~ paste.slug ~ '/raw', 'View Raw') }}
</div>

<pre><code>{{ paste.content|e }}</code></pre>
{% endblock %}

{% block js%}
{{ javascript_include('js/highlight.pack.js') }}
<script>hljs.initHighlightingOnLoad();</script>
{% endblock %}
