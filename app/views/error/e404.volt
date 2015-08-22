{% extends "templates/main.volt" %}

{% block content %}
	<div class="text-center">
		<div class="page-header">
			<h1>Page not found!</h1>
			<h3>We couldn't find what you were looking for, so here's a cat picture.</h3>
		</div>
		{{ image('//thecatapi.com/api/images/get?format=src&results_per_page=1&size=med&type=jpg') }}
	</div>
{% endblock %}
