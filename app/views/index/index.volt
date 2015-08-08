{% extends "templates/main.volt" %}

{% block content %}
<div class="page-header">
    <h3>New Paste</h3>
</div>

{{ flash.output() }}

{{ form(url('new'), "method": "post") }}
	<div class="checkbox">
		<label data-toggle="tooltip" data-placement="top" title="Disables analytics on this paste's page.">{{ check_field("private", 'class': "checkbox") }} Private</label>
	</div>
    <div class="form-group">
        {{ text_area("content", 'rows': 20, 'class': "form-control", 'autofocus': true) }}
    </div>
    <div class="form-group">
        {{ submit_button("Submit", 'class': "btn btn-success") }}
    </div>
{{ endform() }}
{% endblock %}

{% block js %}
{% include "partials/piwik.volt" %}
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
{% endblock %}
