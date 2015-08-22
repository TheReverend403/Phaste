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
	<ul class="list-inline">
		{% if paste.lang != 'auto' %}
			<li><span class="text-muted">Language: </span>{{ config.highlight_languages[paste.lang] }}</li>
		{% endif %}
		<li><span class="text-muted">Created: </span>{{ date('r', strtotime(paste.created_date)) }}</li>
		<li><span class="text-muted">Size: </span>{{ fmt_bytes(paste.size_bytes) }}</li>
	</ul>
</div>

<?php $content_split = explode("\n", $paste->content); ?>

<pre>
	<span class="line-number text-muted">
		{% for line in content_split %}
			<span id="L{{ loop.index }}" onClick="document.location.hash = this.id">
				<a class="unlink" href="#L{{ loop.index }}">{{ loop.index }}</a>
			</span>
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
	{% if paste.lang == 'auto' %}
		{# Autodetect using all available highlight languages #}
		{{ javascript_include('js/highlightfull.min.js') }}
	{% else %}
		{# If a specific language is chosen, only load that. #}
		{{ javascript_include('js/highlighttiny.min.js') }}
		{{ javascript_include('//cdnjs.cloudflare.com/ajax/libs/highlight.js/8.7/languages/' ~ paste.lang ~ '.min.js') }}
	{% endif %}
	<script>hljs.initHighlightingOnLoad();</script>
{% endif %}
{% endblock %}
