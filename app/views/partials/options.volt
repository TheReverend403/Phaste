<div class="well">
	<div class="form-group">
		<div class="checkbox">
			<label data-toggle="tooltip" data-placement="top" title="Disables analytics on this paste's page.">
				{{ check_field("private", 'class': "checkbox") }} Private
			</label>
		</div>
		<div class="row">
			<div class="col-md-2">
				<label for="lang">Syntax</label>
				{% for k,v in config.highlight_languages %}
					{% set langs[k] = v %}
				{% endfor %}
				{{ select_static("lang", langs, 'class': "form-control") }}
			</div>
		</div>
	</div>
</div>
