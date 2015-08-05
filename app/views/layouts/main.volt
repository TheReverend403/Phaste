<nav class="navbar navbar-default navbar-inverse navbar-static-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ conf.app.host }}">{{ conf.app.name }}</a>
        </div>
    </div>
</nav>

<div class="container">
    {{ content() }}
</div>
