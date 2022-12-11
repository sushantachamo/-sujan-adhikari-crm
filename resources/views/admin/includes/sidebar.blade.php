<style>
	aside a {color:white;}
	aside p {color:white;}
	nav.nav-deep-dark .nav-item>a.nav-link {
    color: white;
}
nav.nav-deep-dark.nav-deep-hover>ul>li.nav-item:hover {
    /* background-color: #1fcb64; */
    background-color: #006AA8;
}
nav.nav-deep-dark.nav-deep-hover>ul>li.nav-item.active {
    /* background-color: #1fcb64; */
    background-color: #006AA8;
}


#aside-main .nav-link{
	border:1px solid white;
	/* border:1px solid #1fcb64; */
	font-weight: 800;
}
/* .bg-gradient-custom{background-color:#1fcb64} */
.bg-gradient-custom{background-image:linear-gradient(to right top, #007dc6, #007dc6, #007dc6, #007dc6, #007dc6);
}
.inner-icon{padding-left:20px;}
</style>
<!-- 

	SIDEBAR 

		Example gradients:
			.aside-primary
			.bg-gradient-default
			.bg-gradient-purple
			etc

			* Footer should also match
-->
<aside id="aside-main" class="aside-start bg-gradient-custom border text-dark aside-hide-xs d-flex flex-column h-auto">


	<!-- 
		LOGO 
		visibility : desktop only
	-->
	<div class="d-none d-sm-block">
		<div class="clearfix d-flex justify-content-between">

			<!-- Logo : height: 60px max -->
			<a class="w-100 align-self-center navbar-brand p-3" href="{{ route('admin.dashboard') }}">
				<!-- <img src="assets/images/logo/logo_light.svg" width="110" height="60" alt="..."> -->
				<span>{{ config('app.name')}} </span>
			</a>

		</div>
	</div>
	<!-- /LOGO -->


	<div class="aside-wrapper scrollable-vertical scrollable-styled-light align-self-baseline h-100 w-100">

		<!--

			All parent open navs are closed on click!
			To ignore this feature, add .js-ignore to .nav-deep

			Links height (paddings):
				.nav-deep-xs
				.nav-deep-sm
				.nav-deep-md  	(default, ununsed class)

			.nav-deep-hover 	hover background slightly different
			.nav-deep-bordered	bordered links


			++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
			IMPORTANT NOTE:
				Curently using ajax navigation!
				remove . class to have regular links!
			++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
		-->
		<nav class="nav-deep nav-deep-dark nav-deep-hover pb-5">
			<ul class="nav flex-column">

				<li class="nav-item {{ Request::is('admin/dashboard') ? 'active' : '' }}">
					<a class="nav-link" href="{{ route('admin.dashboard') }}">
						<i class="fi fi-menu-dots"></i>
						<b>Dashboard</b>
					</a>
				</li>
				@canany(['show-application', 'create-application'])
				<li class="nav-item {{ Request::is('admin/application') || Request::is('admin/application/*') ? 'active' : '' }}">
					<a class="nav-link" href="#">
						<span class="group-icon float-end">
							<i class="fi fi-arrow-end-slim"></i>
							<i class="fi fi-arrow-down-slim"></i>
						</span>
						<i class="fi fi-users"></i>
						आवेदनहरु
					</a>

					<ul class="nav flex-column">
						@can('create-application')
						<li class="nav-item ">
							<a class="nav-link {{ Request::is('admin/application/create') ? 'active' : '' }}" href="{{ route('admin.application.create')}}">
								नयाँ आवेदन 
							</a>
						</li>
						@endcan
						@can('show-application')
						<li class="nav-item">
							<a class="nav-link {{ Request::is('admin/application') ? 'active' : '' }}" href="{{ route('admin.application.index',['filter_status'=>'all']) }}">
								आवेदनहरु
							</a>
						</li>
						@endcan
					</ul>
				</li>
				@endcanany
				@canany(['show-credit analysis', 'create-credit analysis'])
				<li class="nav-item {{ Request::is('admin/credit_analysis') || Request::is('admin/credit_analysis/*') ? 'active' : '' }}">
					<a class="nav-link" href="#">
						<span class="group-icon float-end">
							<i class="fi fi-arrow-end-slim"></i>
							<i class="fi fi-arrow-down-slim"></i>
						</span>
						<i class="fi fi-layers"></i>
						ऋण अनुसन्धान फाराम
					</a>

					<ul class="nav flex-column">
						@can('create-credit analysis')
						<li class="nav-item ">
							<a class="nav-link {{ Request::is('admin/credit_analysis/create') ? 'active' : '' }}" href="{{ route('admin.credit_analysis.create')}}">
								नयाँ ऋण अनुसन्धान फाराम
							</a>
						</li>
						@endcan
						@can('show-credit analysis')
						<li class="nav-item">
							<a class="nav-link {{ Request::is('admin/credit_analysis') ? 'active' : '' }}" href="{{ route('admin.credit_analysis.index',['filter_status'=>'all']) }}">
								ऋण अनुसन्धान नतिजाहरु
							</a>
						</li>
						@endcan
					</ul>
				</li>
				@endcanany
				@canany(['show-taketa patras', 'create-taketa patras'])
				<li class="nav-item {{ Request::is('admin/taketa_patras') || Request::is('admin/taketa_patras/*') ? 'active' : '' }}">
					<a class="nav-link" href="#">
						<span class="group-icon float-end">
							<i class="fi fi-arrow-end-slim"></i>
							<i class="fi fi-arrow-down-slim"></i>
						</span>
						<i class="fi fi-layers"></i>
						ताकेता पत्रहरु
					</a>

					<ul class="nav flex-column">
						@can('create-taketa patras')
						<li class="nav-item ">
							<a class="nav-link {{ Request::is('admin/taketa_patras/create') ? 'active' : '' }}" href="{{ route('admin.taketa_patras.create')}}">
								नयाँ ताकेता पत्र 
							</a>
						</li>
						@endcan
						@can('show-taketa patras')
						<li class="nav-item">
							<a class="nav-link {{ Request::is('admin/taketa_patras') ? 'active' : '' }}" href="{{ route('admin.taketa_patras.index',['filter_status'=>'all']) }}">
								ताकेता पत्रहरु
							</a>
						</li>
						@endcan
					</ul>
				</li>
				@endcanany
				@canany(['show-credit renew', 'create-credit renew'])
				<li class="nav-item {{ Request::is('admin/credit_renew') || Request::is('admin/credit_renew/*') ? 'active' : '' }}">
					<a class="nav-link" href="#">
						<span class="group-icon float-end">
							<i class="fi fi-arrow-end-slim"></i>
							<i class="fi fi-arrow-down-slim"></i>
						</span>
						<i class="fi fi-layers"></i>
						ऋण नविकरण फाराम
					</a>

					<ul class="nav flex-column">
						@can('create-credit renew')
						<li class="nav-item ">
							<a class="nav-link {{ Request::is('admin/credit_renew/create') ? 'active' : '' }}" href="{{ route('admin.credit_renew.create')}}">
								ऋण नविकरण फाराम
							</a>
						</li>
						@endcan
						@can('show-credit renew')
						<li class="nav-item">
							<a class="nav-link {{ Request::is('admin/credit_renew') ? 'active' : '' }}" href="{{ route('admin.credit_renew.index',['filter_status'=>'all']) }}">
								नविकरण गरिएका ऋणहरु
							</a>
						</li>
						@endcan
					</ul>
				</li>
				@endcanany
				@canany(['show-mortgage appraisal', 'create-mortgage appraisal'])
				<li class="nav-item {{ Request::is('admin/mortgage_appraisal') || Request::is('admin/mortgage_appraisal/*') ? 'active' : '' }}">
					<a class="nav-link" href="#">
						<span class="group-icon float-end">
							<i class="fi fi-arrow-end-slim"></i>
							<i class="fi fi-arrow-down-slim"></i>
						</span>
						<i class="fi fi-layers"></i>
						धितो मूल्याङ्कन
					</a>

					<ul class="nav flex-column">
						@can('create-mortgage appraisal')
						<li class="nav-item ">
							<a class="nav-link {{ Request::is('admin/mortgage_appraisal/create') ? 'active' : '' }}" href="{{ route('admin.mortgage_appraisal.create')}}">
								धितो मूल्याङ्कन
							</a>
						</li>
						@endcan
						@can('show-mortgage appraisal')
						<li class="nav-item">
							<a class="nav-link {{ Request::is('admin/mortgage_appraisal') ? 'active' : '' }}" href="{{ route('admin.mortgage_appraisal.index',['filter_status'=>'all']) }}">
								धितो मूल्याङ्कनहरु
							</a>
						</li>
						@endcan
					</ul>
				</li>
				@endcanany
				@can('show-darta chalani')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.darta_chalani.index')}}">
                            <i class="nav-icon fi fi-round-list"><!-- main icon --></i>
                            दर्ता चलानी किताब
                        </a>
                    </li>
                @endcan
				<li class="nav-item  {{ Request::is('admin/crm') || Request::is('admin/crm/*') ? 'active' : '' }}">
					<a class="nav-link" href="#">
						<span class="group-icon float-end">
							<i class="fi fi-arrow-end-slim"></i>
							<i class="fi fi-arrow-down-slim"></i>
						</span>
						<i class="fi fi-users"></i>
						CRM
					</a>

					<ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link {{ Request::is('admin/application') ? 'active' : '' }}" href="{{ route('admin.crm.index') }}">
								Dashboard
							</a>
						</li>
						<li class="nav-item ">
							<a class="nav-link {{ Request::is('admin/application') ? 'active' : '' }}" href="{{ route('admin.lead.index') }}">
								Lead
							</a>
						</li>
						<li class="nav-item ">
							<a class="nav-link {{ Request::is('admin/application') ? 'active' : '' }}" href="{{ route('admin.task-activity.index') }}">
								Task
							</a>
						</li>
						<li class="nav-item ">
							<a class="nav-link {{ Request::is('admin/application') ? 'active' : '' }}" href="{{ route('admin.crm.report-generate') }}">
								Report Generate
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">
						<i class="nav-icon fi fi-round-list"><!-- main icon --></i>
						Payroll System
					</a>
				</li>

				
				<li class="nav-item {{ Request::is('admin/blacklist') || Request::is('admin/advance_report') ? 'active' : '' }}">
					<a class="nav-link" href="#">
						<span class="group-icon float-end">
							<i class="fi fi-arrow-end-slim"></i>
							<i class="fi fi-arrow-down-slim"></i>
						</span>
						<i class="fi fi-layers"></i>
						अन्य
					</a>

					<ul class="nav flex-column">
						@can('show-blacklist')
						<li class="nav-item">
							<a class="nav-link" href="{{ route('admin.blacklist.index')}}">
								<i class="fi fi-round-info-full inner-icon"></i>
								कालोसुचि खोजि
							</a>
						</li>
						@endcan
						@can('generate-report')
						<li class="nav-item">
							<a class="nav-link" href="{{ route('admin.report.advance_report')}}">
								<i class="fi fi-round-info-full inner-icon"></i>
								कोपोमिस रिपोर्ट
							</a>
						</li>
						@endcan
						<li class="nav-item">
							<a class="nav-link" href="https://akashdigital.com.np/wp-content/uploads/2022/05/loan-policy.pdf" target="_blank">
								<i class="fi fi-folder-full inner-icon"></i>
								ऋणी नितिको नमुना
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">
								<i class="fi fi-envelope inner-icon"></i>
								ऋणीलाई एस एम एस
							</a>
						</li>
					</ul>
				</li>
				@canany(['show-offices', 'show-users', 'show-role', 'show-slider', 'show-templates', 'update-site configuration', 'show-backups'])
				<li class="nav-item {{ Request::is('admin/sliders') ||Request::is('admin/sliders/*') || Request::is('admin/backup')|| Request::is('admin/site_config') || Request::is('admin/site_config/*') || Request::is('admin/templates') || Request::is('admin/templates/*') || Request::is('admin/office') || Request::is('admin/office/*') || Request::is('admin/users') || Request::is('admin/users/*') || Request::is('admin/roles') || Request::is('admin/roles/*') ? 'active' : '' }}">
					<a class="nav-link" href="#">
						<span class="group-icon float-end">
							<i class="fi fi-arrow-end-slim"></i>
							<i class="fi fi-arrow-down-slim"></i>
						</span>
						<i class="fi fi-layers"></i>
						Admin
					</a>

					<ul class="nav flex-column">
						@can('show-offices')
						<li class="nav-item {{ Request::is('admin/office') ? 'active' : '' }}">
							<a class="nav-link" href="{{ route('admin.office.index')}}">
								<i class="fi fi-home inner-icon"></i>
								Offices
							</a>
						</li>
						@endcan
						@canany(['show-users', 'show-role'])
						<li class="nav-item {{ Request::is('admin/users') || Request::is('admin/users/*') || Request::is('admin/roles') || Request::is('admin/roles/*')  ? 'active' : '' }}">
							<a class="nav-link" href="#">
								<span class="group-icon float-end">
									<i class="fi fi-arrow-end-slim"></i>
									<i class="fi fi-arrow-down-slim"></i>
								</span>
								<i class="nav-icon fi fi-user-plus inner-icon"><!-- main icon --></i>
								User Management
							</a>

							<ul class="nav flex-column">
								@can('show-users')
								<li class="nav-item">
									<a class="nav-link" href="{{ route('admin.users.index')}}">
										Users
									</a>
								</li>
								@endcan
								@can('show-role')
								<li class="nav-item">
									<a class="nav-link" href="{{ route('admin.roles.index')}}">
										Roles
									</a>
								</li>
								@endcan
							</ul>
						</li>
						@endcanany
						@can('show-slider')
						<li class="nav-item {{ Request::is('admin/sliders') ? 'active' : '' }}">
							<a class="nav-link" href="{{ route('admin.sliders.index')}}">
								<i class="fi fi-round-info-full inner-icon"></i>
								Sliders
							</a>
						</li>
						@endcan
						@can('show-templates')
						<li class="nav-item {{ Request::is('admin/templates') || Request::is('admin/templates/*')  ? 'active' : '' }}">
							<a class="nav-link" href="{{ route('admin.templates.index')}}">
								<i class="fi fi-database inner-icon"></i>
								Templates
							</a>
						</li>
						@endcan
						@can('update-site configuration')
						<li class="nav-item {{ Request::is('admin/site_config') || Request::is('admin/site_config/*') || Request::is('admin/design_config/edit') ? 'active' : '' }}">
							<a class="nav-link" href="#">
								<span class="group-icon float-end">
									<i class="fi fi-arrow-end-slim"></i>
									<i class="fi fi-arrow-down-slim"></i>
								</span>
								<i class="nav-icon fi fi-round-list inner-icon"><!-- main icon --></i>
								Site Configuration
							</a>

							<ul class="nav flex-column">
								<li class="nav-item">
									<a class="nav-link" href="{{ route('admin.site_config.edit')}}">
										General Setting
									</a>
								</li>
							</ul>
						</li>
						@endcan
						@can('show-backups')
						<li class="nav-item {{ Request::is('admin/backup') ? 'active' : '' }}">
							<a class="nav-link" href="{{ route('admin.backups.index')}}">
								<i class="fi fi-database inner-icon"></i>
								Backup
							</a>
						</li>
						@endcan
					</ul>
				</li>
				@endcanany
				<li>
					<center>
					<hr style="border-color:white; margin:0.5rem;">
					<strong><u>Sales and Support</u></strong>
					
					<p><a href="https://akashdigital.com.np/" target="_blank">Aakash Digital</a> <br> 9866067777, 9815103000</p>

					<strong><u>Technical Support</u></strong>
					
					<p><a href="https://akashdigital.com.np/" target="_blank">Aakash Digital</a> <br> 9827157000</p>
					
					<strong><u>Developed By</u></strong>
					<p><a href="https://vtechnepal.com/" target="_blank">Virtual Technology Pvt.Ltd</a></p>

					<strong><u>Useful Link</u></strong>
					<p><a href="https://preeti.arthasarokar.com/" target="_blank">Unicode Translator</a></p>
					<p><a href="https://nepalbank.com.np/calculator" target="_blank">EMI Calculator</a></p>
				</center>
				</li>
			</ul>
		</nav>

	</div>
</aside>
<!-- /SIDEBAR -->