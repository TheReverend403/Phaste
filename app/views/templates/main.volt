<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="The simplest, most beautiful privacy respecting pastebin-like site.">
        <meta name="keywords" content="phaste,paste,pastebin,foxdev,opensource,open-source,open,source,php,phalcon,mysql,bootstrap">
        <link rel="shortcut icon" type="image/ico" href="{{ static_url('img/favicon.ico') }}"/>
        {{ stylesheet_link('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css') }}

        {% if config.app.site_theme != 'default' %}
            {{ stylesheet_link('//maxcdn.bootstrapcdn.com/bootswatch/3.3.5/' ~ config.app.site_theme ~ '/bootstrap.min.css') }}
        {% endif %}
        {{ stylesheet_link('css/style.css') }}

        {% block stylesheets %}
        {% endblock %}
        {{ get_title() }}
    </head>
    <body>
        {% include "partials/navbar.volt" %}
        <div class="container">
            {% block content %}
            {% endblock %}
        </div>

        {% if config.app.github_ribbon %}
            {% include "partials/github_ribbon.volt" %}
        {% endif %}

        {{ javascript_include('//code.jquery.com/jquery-1.11.3.min.js') }}
        {{ javascript_include('//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js') }}
        {% block js %}
        {% endblock %}
    </body>
</html>
