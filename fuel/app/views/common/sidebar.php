<div class="sidebar sidebar-dark sidebar-fixed border-end" id="sidebar">
	<div class="sidebar-header border-bottom">
		<div class="sidebar-brand">
			<svg class="sidebar-brand-full" width="88" height="32" alt="CoreUI Logo">
				<use xlink:href="assets/brand/coreui.svg#full"></use>
			</svg>
			<svg class="sidebar-brand-narrow" width="32" height="32" alt="CoreUI Logo">
				<use xlink:href="assets/brand/coreui.svg#signet"></use>
			</svg>
		</div>
		<button class="btn-close d-lg-none" type="button" data-coreui-dismiss="offcanvas" data-coreui-theme="dark"
				aria-label="Close"
				onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()"></button>
	</div>
	<ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
		<li class="nav-item">
			<a class="nav-link" href="<?php echo Uri::create('/') ?>">
				<svg class="nav-icon">
					<use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
				</svg>
				Dashboard
			</a>
		</li>
		<li class="nav-title">Customer</li>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo Uri::create('/customer/list') ?>">
				<svg class="nav-icon">
					<use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-drop"></use>
				</svg>
				List
			</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" href="<?php echo Uri::create('/customer/create') ?>">
				<svg class="nav-icon">
					<use xlink:href="/assets/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
				</svg>
				Create</a>
		</li>
	</ul>
	<div class="sidebar-footer border-top d-none d-md-flex">
		<button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
	</div>
</div>