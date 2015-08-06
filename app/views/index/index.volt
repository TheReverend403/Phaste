{% extends "templates/main.volt" %}

{% block content %}
<div class="page-header">
    <h3>New Paste</h3>
</div>

{{ flashSession.output() }}

{{ form("new", "method": "post") }}
    <div class="form-group">
        {{ text_area("content", 'rows': 20, 'class': "form-control") }}
    </div>
    <div class="form-group">
        {{ submit_button("Submit", 'class': "btn btn-success") }}
    </div>
{{ endform() }}
{% endblock %}

{% block js %}
{% include "partials/piwik.volt" %}
{% endblock %}