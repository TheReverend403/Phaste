{% extends "templates/main.volt" %}

{% block content %}

{{ flash.output() }}

{{ form(url('new'), "method": "post") }}
    <div class="form-group">
        {{ submit_button("Submit", 'class': "btn btn-success") }}
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#options" aria-expanded="false" aria-controls="options-collapse">
          Options
        </button>
    </div>
    <div class="collapse" id="options">
		{% include "partials/options.volt" %}
    </div>
    <div class="form-group">
        {{ text_area("content", 'rows': 30, 'class': "form-control", 'placeholder': "Enter paste content...", 'autofocus': true) }}
    </div>
{{ endform() }}
{% endblock %}

{% block js %}
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
{% include "partials/piwik.volt" %}
{% endblock %}
