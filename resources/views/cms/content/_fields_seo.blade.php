<div class="ui grid">

	<div class="eleven wide column">

		<div class="ui segments">

			<div class="ui accordion padded segment">

				<div class="title">
					<h3 class="ui centered header">
						<i class="sitemap icon"></i>
						SEO
					</h3>
				</div>

				<div class="content">
					<div class="field">
						<label for="seo_title">Title</label>
						<input type="text" name="seo_title" value="{{ old('seo_title', @$content->seo_title) }}" data-count="72">
					</div>

					<div class="field">
						<label for="seo_description">Description</label>
						<textarea name="seo_description" rows="2" data-count="156">{{ old('seo_description', @$content->seo_description) }}</textarea>
					</div>

					<div class="inline field">
						<div class="ui toggle checkbox">
							<input name="seo_index" type="checkbox" value="1" tabindex="0" class="hidden" {{ old('seo_index', @$content->seo_index) == '1' ? 'checked' : '' }}>
							<label>Indexed by search enginges</label>
						</div>
					</div>

					<div class="seo-preview ui segment">
						<div class="ui top right attached label">SEO Preview</div>
						<p class="seo-title">{{ old('seo_title', @$content->seo_title) }}</p>
						<p class="seo-description">{{ old('seo_description', @$content->seo_description) }}</p>
					</div>

				</div>

			</div>

		</div>

	</div>

</div>
