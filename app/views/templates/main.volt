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
        <nav class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    {{ link_to(conf.app.host, conf.app.name, 'class': "navbar-brand", false) }}
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right">
                        <li>{{ link_to('https://gitlab.notoriousdev.com/foxdev/Paste/', 'Source Code', false) }}</li>
                    </ul>
                </div>
            </div>
        </nav>
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
