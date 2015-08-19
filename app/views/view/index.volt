{% extends "templates/main.volt" %}

{% block stylesheets %}
{% if paste.lang != 'none' %}
	{{ stylesheet_link('//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.7/styles/' ~ config.app.highlight_theme ~ '.min.css') }}
{% endif %}
{{ stylesheet_link('css/style.css') }}
{% endblock %}

{% block content %}
<div class="page-header">
	<p>{{ link_to('v/' ~ paste.id ~ '/raw', 'View Raw') }}</p>
	{% if paste.lang != 'auto' %}
		<p>Language: {{ config.highlight_languages[paste.lang] }}</p>
	{% endif %}
	<p>Created: {{ date('r', strtotime(paste.created_date)) }}</p>
</div>

{% if paste.lang != 'auto' and paste.lang != 'none' %}
	<pre><code class="{{ paste.lang }}">{{ paste.content|e }}</code></pre>
{% else %}
	<pre><code>{{ paste.content|e }}</code></pre>
{% endif %}
{% endblock %}

{% block js %}
{% if paste.private == 0 %}
	{% include "partials/piwik.volt" %}
{% endif %}
{% if paste.lang != 'none' %}
	{{ javascript_include('//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.7/highlight.min.js') }}
	<script>hljs.initHighlightingOnLoad();</script>
{% endif %}
{{ javascript_include('js/linenumbers.js') }}
{% endblock %}
