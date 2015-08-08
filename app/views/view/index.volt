{% extends "templates/main.volt" %}

{% block stylesheets %}
{% if paste.lang != 'none' %}
	{{ stylesheet_link('//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.7/styles/' ~ config.app.highlight_theme ~ '.min.css') }}
	{{ stylesheet_link('css/style.css') }}
{% endif %}
{% endblock %}

{% block content %}
<div class="page-header">
    <p>{{ url('v/') }}<span class="text-warning">{{ paste.id }}</span></p>
    {{ link_to('v/' ~ paste.id ~ '/raw', 'View Raw') }}
</div>

<pre><code>{{ paste.content|e }}</code></pre>
{% endblock %}

{% block js %}
{% if paste.private == 0 %}
	{% include "partials/piwik.volt" %}
{% endif %}
{% if paste.lang != 'none' %}
	{{ javascript_include('//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.7/highlight.min.js') }}
	<script>hljs.initHighlightingOnLoad();</script>
{% endif %}
{% endblock %}
