<div class="page-header">
    <h1>New Paste</h1>
</div>
{{ flashSession.output() }}
{{ form("new", "method": "post") }}

<div class="form-group">
    {{ text_area("content", 'rows': 20, 'class': "form-control") }}
    <hr>
    <div class="row">
        <div class="col-sm-2">
            {{ submit_button("Submit", 'class': "btn btn-success") }}
        </div>
    </div>
</div>
{{ endform() }}
