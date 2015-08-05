<nav class="navbar navbar-default navbar-inverse navbar-static-top" role="navigation">
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
    {{ content() }}
</div>
