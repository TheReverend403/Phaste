{% extends "templates/main.volt" %}

{% block content %}
<div class="text-center">
	<div class="page-header">
		<h1>Page not found!</h1>
		<h2>Have a picture of a cat instead.</h2>
	</div>
	{{ image('//thecatapi.com/api/images/get?format=src&results_per_page=1&size=med&type=jpg') }}
</div>
{% endblock %}
