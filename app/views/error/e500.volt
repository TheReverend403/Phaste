{% extends "templates/main.volt" %}

{% block content %}
<div class="text-center">
	<div class="page-header">
		<h1>Internal Server Error</h1>
		<h3>Oops, we messed up. Here's a cat picture for you while we fix it.</h3>
	</div>
	{{ image('//thecatapi.com/api/images/get?format=src&results_per_page=1&size=med&type=jpg') }}
</div>
{% endblock %}
