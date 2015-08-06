<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" type="image/ico" href="/img/favicon.ico"/>
        {{ stylesheet_link('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css') }}
        {{ stylesheet_link('//maxcdn.bootstrapcdn.com/bootswatch/3.3.5/yeti/bootstrap.min.css') }}
        {% block stylesheets %}
        {% endblock %}
        {{ stylesheet_link('css/style.css') }}
        {{ get_title() }}
    </head>
    <body>
        {% include "partials/navbar.volt" %}
        <div class="container">
            {% block content %}
            {% endblock %}
        </div>
        {{ javascript_include('//code.jquery.com/jquery-1.11.3.min.js') }}
        {{ javascript_include('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js') }}
        {% block js %}
        {% endblock %}
    </body>
</html>
