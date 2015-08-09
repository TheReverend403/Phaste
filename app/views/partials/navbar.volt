<nav class="navbar navbar-default navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            {{ link_to(url(), config.app.name, 'class': "navbar-brand", false) }}
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcollapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navcollapse">
            <ul class="nav navbar-nav navbar-right">
                <li>{{ link_to('https://gitlab.notoriousdev.com/foxdev/Paste/', 'Source Code', 'target': "_blank", false) }}</li>
            </ul>
        </div>
    </div>
</nav>
