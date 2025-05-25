{@ define('DISABLE_XE_BTN_STYLES', true); }
<!--link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous"-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

<load target="bootstrap.min.css" />
<load target="default.layout.css" />
@if ($layout_info->WEB_FONT == 'YES')
	<load target="default.layout.webfont.css" />
@endif
<load target="default.layout.js" type="body" />
<div class="container">
	<header class="p-3 mb-3 border-bottom">
		<div class="container">
			<div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
				<a href="{{geturl('')}}" class="d-flex align-items-center mb-2 mb-lg-0 link-body-emphasis text-decoration-none">
					@if (!Context::getSiteTitle() && !$layout_info->LOGO_IMG && !$layout_info->LOGO_TEXT)
						<img class="me-2" src="siteTitle.png" alt="Rhymix">
					@endif
					@if (Context::getSiteTitle() && !$layout_info->LOGO_IMG && !$layout_info->LOGO_TEXT)
						{{Context::getSiteTitle()}}
					@endif
					@if ($layout_info->LOGO_IMG)
						<img src="{{$layout_info->LOGO_IMG}}" alt="{{$layout_info->LOGO_TEXT}}">
					@endif
					@if (!$layout_info->LOGO_IMG && $layout_info->LOGO_TEXT)
						{{$layout_info->LOGO_TEXT}}
					@endif
				</a>
				<ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
					@foreach ($GNB->list as $key1 => $val1)
						<li>
							<a @class(['nav-link px-2', 'link-secondary' => $val1['selected'], 'link-body-emphasis' => !$val1['selected']])
							   class="{$val1['class']}"|cond="!empty($val1['class'])"
							   target="_blank"|cond="$val1['open_window']=='Y'"
							   href="{{$val1['href']}}">{$val1['link']}</a>
						</li>
					@endforeach
				</ul>

				<form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search"
					  action="{{getUrl()}}" method="get" no-error-return-url="true">
					<input type="hidden" name="mid" value="{{$mid}}" />
					<input type="hidden" name="act" value="IS" />
					<input type="search" class="form-control" aria-label="Search"
						   name="is_keyword" value="{{$is_keyword}}" required
						   placeholder="{{$lang->cmd_search}}" title="{{$lang->cmd_search}}">
				</form>

				<img widget="login_info" skin="bs5_base" />
			</div>
		</div>
	</header>

	<header class="p-3 mb-3 border-bottom">
		<!-- GNB -->
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<div class="container-fluid">
				<a class="navbar-brand" href="{{geturl('')}}">
					@if (!Context::getSiteTitle() && !$layout_info->LOGO_IMG && !$layout_info->LOGO_TEXT)
						<img src="siteTitle.png" alt="Rhymix">
					@endif
					@if (Context::getSiteTitle() && !$layout_info->LOGO_IMG && !$layout_info->LOGO_TEXT)
						{{Context::getSiteTitle()}}
					@endif
					@if ($layout_info->LOGO_IMG)
						<img src="{{$layout_info->LOGO_IMG}}" alt="{{$layout_info->LOGO_TEXT}}">
					@endif
					@if (!$layout_info->LOGO_IMG && $layout_info->LOGO_TEXT)
						{{$layout_info->LOGO_TEXT}}
					@endif
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						@foreach ($GNB->list as $key1 => $val1)
							@if ($val1['list'])
								<li class="nav-item dropdown">
									{{-- TODO aria-current="page" --}}
									<a @class(['nav-link dropdown-toggle', 'active' => $val1['selected']])
									   class="{$val1['class']}"|cond="!empty($val1['class'])"
									   target="_blank"|cond="$val1['open_window']=='Y'"
									   id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"
									   href="{{$val1['href']}}">{$val1['link']}</a>
									<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
										@foreach ($val1['list'] as $key2 => $val2)
											<li>
												<a href="{{$val2['href']}}"
												   @class(['dropdown-item', 'active' => $val2['selected']])
												   class="{$val2['class']}"|cond="!empty($val2['class'])"
												   target="_blank"|cond="$val2['open_window']=='Y'">
													{$val2['link']}
												</a>
											</li>
										@endforeach
									</ul>
								</li>
							@else
								<li class="nav-item">
									{{-- TODO aria-current="page" --}}
									<a @class(['nav-link', 'active' => $val1['selected']])
									   class="{$val1['class']}"|cond="!empty($val1['class'])"
									   target="_blank"|cond="$val1['open_window']=='Y'"
									   href="{{$val1['href']}}">{$val1['link']}</a>
								</li>
							@endif
						@endforeach
					</ul>
					<!-- SEARCH -->
					<form class="d-flex" action="{{getUrl()}}" method="get" no-error-return-url="true">
						<input type="hidden" name="mid" value="{{$mid}}" />
						<input type="hidden" name="act" value="IS" />
						<input class="form-control me-2" type="search" aria-label="Search"
							   name="is_keyword" value="{{$is_keyword}}" required
							   placeholder="{{$lang->cmd_search}}" title="{{$lang->cmd_search}}">
						<button class="btn btn-outline-success" type="submit">{{$lang->cmd_search}}</button>
					</form>
					<!-- /SEARCH -->
				</div>
			</div>
		</nav>
		<!-- /GNB -->
	</header>
	<!-- VISUAL | DEFAULT -->
	@if (!$layout_info->VISUAL_IMAGE_1 && !$layout_info->VISUAL_IMAGE_2 && !$layout_info->VISUAL_IMAGE_3 && $layout_info->VISUAL_USE=='YES')
		<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
			</div>
			<div class="carousel-inner">
				@if ($layout_info->LAYOUT_TYPE=='MAIN_PAGE')
					<a class="carousel-item active"
					   href="{{geturl('','module','admin','act','dispAdminConfigGeneral')}}">
						<img src="visual.main.1.jpg" class="d-block w-100" alt="...">
						<div class="carousel-caption d-none d-md-block">
							<p>Click, to change<br> the site title.</p>
						</div>
					</a>
				@endif
				@if ($layout_info->LAYOUT_TYPE=='MAIN_PAGE')
					<a class="carousel-item"
					   href="{{geturl('','module','admin','act','dispMenuAdminSiteMap')}}">
						<img src="visual.main.2.jpg" class="d-block w-100" alt="...">
						<div class="carousel-caption d-none d-md-block">
							<p>Click, to change<br> the site navigation.</p>
						</div>
					</a>
				@endif
				@if ($layout_info->LAYOUT_TYPE=='MAIN_PAGE')
					<a class="carousel-item"
					   href="{{geturl('','module','admin','act','dispLayoutAdminInstanceList','layout','default')}}">
						<img src="visual.main.3.jpg" class="d-block w-100" alt="...">
						<div class="carousel-caption d-none d-md-block">
							<p>Click, to change<br> the site visual image.</p>
						</div>
					</a>
				@endif
				@if ($layout_info->LAYOUT_TYPE=='SUB_PAGE')
					<a class="carousel-item"
					   href="{{geturl('','module','admin','act','dispLayoutAdminInstanceList','layout','default')}}">
						<img src="visual.sub.jpg" class="d-block w-100" alt="...">
						<div class="carousel-caption d-none d-md-block">
							<p>Click, to change the site visual image.</p>
						</div>
					</a>
				@endif
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
	@endif
	<!-- VISUAL | USER DEFINE -->
	@if (($layout_info->VISUAL_IMAGE_1 || $layout_info->VISUAL_IMAGE_2 || $layout_info->VISUAL_IMAGE_3) && $layout_info->VISUAL_USE=='YES')
		<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
			</div>
			<div class="carousel-inner">
				@if ($layout_info->VISUAL_IMAGE_1)
					<a class="carousel-item active"
					   href="{{$layout_info->VISUAL_LINK_1}}">
						<img src="{{$layout_info->VISUAL_IMAGE_1}}" class="d-block w-100" alt="...">
						<div class="carousel-caption d-none d-md-block">
							<p>{{$layout_info->VISUAL_TEXT_1}}</p>
						</div>
					</a>
				@endif
				@if ($layout_info->VISUAL_IMAGE_2)
					<a class="carousel-item"
					   href="{{$layout_info->VISUAL_LINK_2}}">
						<img src="{{$layout_info->VISUAL_IMAGE_2}}" class="d-block w-100" alt="...">
						<div class="carousel-caption d-none d-md-block">
							<p>{{$layout_info->VISUAL_TEXT_2}}</p>
						</div>
					</a>
				@endif
				@if ($layout_info->VISUAL_IMAGE_3)
					<a class="carousel-item"
					   href="{{$layout_info->VISUAL_LINK_3}}">
						<img src="{{$layout_info->VISUAL_IMAGE_3}}" class="d-block w-100" alt="...">
						<div class="carousel-caption d-none d-md-block">
							<p>{{$layout_info->VISUAL_TEXT_3}}</p>
						</div>
					</a>
				@endif
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
	@endif
	<!-- /VISUAL -->
	<div @class([
		"body main" => $layout_info->LAYOUT_TYPE=='MAIN_PAGE',
		"body sub" => $layout_info->LAYOUT_TYPE=='SUB_PAGE'
	])>
		<!-- LNB -->
		@if ($layout_info->LAYOUT_TYPE == 'SUB_PAGE')
			<nav class="lnb">
				@if ($val1['selected'])
					@foreach ($GNB->list as $key1 => $val1)
						<h1>
							<a href="{{$val1['href']}}" class="{$val1['class']}"|cond="!empty($val1['class'])" target="_blank"|cond="$val1['open_window']=='Y'">{{$val1['link']}}</a>
						</h1>
					@endforeach
				@endif
				@if ($val1['selected'] && $val1['list'])
					@foreach ($GNB->list as $key1 =>$val1)
						<ul>
							@foreach ($val1['list'] as $key2 => $val2)
								<li @class(['active' => $val2['selected']])>
									<a href="{{$val2['href']}}" class="{$val2['class']}"|cond="!empty($val2['class'])" target="_blank"|cond="$val2['open_window']=='Y'">{{$val2['link']}}</a>
									@if ($val2['list'])
										<ul>
											@foreach ($val2['list'] as $key3 =>$val3)
												<li @class(['active' => $val3['selected']])>
													<a href="{{$val3['href']}}" class="{$val3['class']}"|cond="!empty($val3['class'])" target="_blank"|cond="$val3['open_window']=='Y'">{{$val3['link']}}</a>
												</li>
											@endforeach
										</ul>
									@endif
								</li>
							@endforeach
						</ul>
					@endforeach
				@endif
			</nav>
		@endif
		<!-- /LNB -->
		<!-- CONTENT -->
		<div class="content" id="content">
			{{$content|noescape}}
		</div>
		<!-- /CONTENT -->
	</div>
	<footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top"> <div class="col-md-4 d-flex align-items-center">
			@if (!$layout_info->FOOTER)
				<p>Powered by <a href="https://rhymix.org">Rhymix</a></p>
			@endif
			@if ($layout_info->FOOTER)
				<p>{{$layout_info->FOOTER}}</p>
		@endif
	</footer>
</div>
