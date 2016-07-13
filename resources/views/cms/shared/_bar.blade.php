@if (Auth::check())
	<header id="cms-bar">
		<nav>
			<div class="ui menu inverted">
				<a class="header item" href="/cms">CMS</a>
				<div class="ui dropdown item {{ AppHelper::isActiveParent('cms/content') }}">
					<a href="/cms/content">Content</a>
					<i class="dropdown icon"></i>
					<div class="menu">
						<a class="item {{ AppHelper::isActive('cms/content') }}" href="/cms/content"><i class="list icon"></i> All Content</a>
						<a class="item {{ AppHelper::isActive('cms/content/create/article') }}" href="/cms/content/create/article"><i class="add icon"></i> Add Article</a>
						<a class="item {{ AppHelper::isActive('cms/content/create/page') }}" href="/cms/content/create/page"><i class="add icon"></i> Add Page</a>
						<a class="item {{ AppHelper::isActive('cms/content/create/series') }}" href="/cms/content/create/series"><i class="add icon"></i> Add Series</a>
						<a class="item {{ AppHelper::isActive('cms/content/create/chapter') }}" href="/cms/content/create/chapter"><i class="add icon"></i> Add Chapter</a>
					</div>
				</div>
				<div class="ui dropdown item {{ AppHelper::isActiveParent('cms/comments') }}">
					<a href="/cms/comments">Comments</a>
				</div>
				<div class="ui dropdown item {{ AppHelper::isActiveParent('cms/categories') }}">
					<a href="/cms/categories">Categories</a>
					<i class="dropdown icon"></i>
					<div class="menu">
						<a class="item {{ AppHelper::isActive('cms/categories') }}" href="/cms/categories"><i class="list icon"></i> All Categories</a>
						<a class="item {{ AppHelper::isActive('cms/categories/create') }}" href="/cms/categories/create"><i class="add icon"></i> Add Categories</a>
					</div>
				</div>
				<div class="ui dropdown item {{ AppHelper::isActiveParent('cms/menus') }}">
					<a href="/cms/menus">Menus</a>
					<i class="dropdown icon"></i>
					<div class="menu">
						<a class="item {{ AppHelper::isActive('cms/menus') }}" href="/cms/menus"><i class="list icon"></i> All Menus</a>
						<a class="item {{ AppHelper::isActive('cms/menus/create') }}" href="/cms/menus/create"><i class="add icon"></i> Add Menu</a>
					</div>
				</div>
				<div class="ui dropdown item {{ AppHelper::isActiveParent('cms/files') }}">
					<a href="/cms/files">Files</a>
					<i class="dropdown icon"></i>
					<div class="menu">
						<a class="item {{ AppHelper::isActive('cms/files') }}" href="/cms/files"><i class="list icon"></i> All files</a>
						<a class="item {{ AppHelper::isActive('cms/files/create') }}" href="/cms/files/create"><i class="add icon"></i> Add files</a>
					</div>
				</div>
				<div class="ui dropdown item {{ AppHelper::isActiveParent('cms/users') }}">
					<a href="/cms/users">Users</a>
					<i class="dropdown icon"></i>
					<div class="menu">
						<a class="item {{ AppHelper::isActive('cms/users') }}" href="/cms/users"><i class="list icon"></i> All users</a>
						<a class="item {{ AppHelper::isActive('cms/users/create') }}" href="/cms/users/create"><i class="add icon"></i> Add User</a>
					</div>
				</div>
				<div class="right menu">
					@if (AppHelper::isCms())
						<a class="item" href="/"><i class="world icon"></i> View Site</a>
					@else
						@if (isset($content))
							<a class="item" href="/content{{ $content->id }}/edit"><i class="pencil icon"></i> Edit this content</a>
						@endif
						<a class="item" href="/cms"><i class="browser icon"></i> View CMS</a>
					@endif
					<div class="ui dropdown item {{ AppHelper::isActiveParent('cms/users/'.Auth::user()->id) }} right">
						@if (Auth::check())
							<i class="user icon"></i>
							<a href="/cms/users/{{ Auth::user()->id }}/edit">{{Auth::user()->first_name}} {{Auth::user()->last_name}}</a>
							<div class="menu">
							  <a class="item {{ AppHelper::isActive('cms/users/'.Auth::user()->id.'/edit') }}" href="/cms/users/{{ Auth::user()->id }}/edit"><i class="settings icon"></i> User profile</a>
							  <a class="item" href="/cms/logout"><i class="sign out icon"></i> Logout</a>
							</div>
						@else

						@endif
					</div>
				</div>
			</div>
		</nav>
	</header>
@endif
