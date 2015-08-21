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

<?php
	$content_split = explode("\n", $paste->content);
?>

<pre>
	<span class="line-number">
		{% for line in content_split %}
			<span id="L{{ loop.index }}" onClick="document.location.hash = this.id">{{ loop.index }}</span>
		{% endfor %}
	</span>

	{% if paste.lang != 'auto' and paste.lang != 'none' %}
		<code class="{{ paste.lang }}">{{ paste.content|e }}</code>
	{% else %}
		<code>{{ paste.content|e }}</code>
	{% endif %}
	<span class="cl"></span>
</pre>
{% endblock %}

{% block js %}

{% if paste.private == 0 %}
	{% include "partials/piwik.volt" %}
{% endif %}
{% if paste.lang != 'none' %}
	{{ javascript_include('//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.7/highlight.min.js') }}
	{# Load extra languages if one is used. #}
	{% if paste.lang != 'auto' %}
		{{ javascript_include('//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.7/languages/' ~ paste.lang ~ '.min.js') }}
	{% endif %}
	<script>hljs.initHighlightingOnLoad();</script>
{% endif %}
{% endblock %}
