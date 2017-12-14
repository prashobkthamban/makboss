<div class="navbar-default sidebar" role="navigation">
	<div class="sidebar-nav navbar-collapse">
		<ul class="nav" id="side-menu">
			<li>
				<a href="{{ Request::root()}}/"><i class="fa fa-home fa-fw"></i> Home</a>
			</li>
			<li>
				<a href="{{ Request::root()}}/users"><i class="fa fa-user fa-fw"></i> Users</a>
			</li>
			<li>
				<a href="{{ Request::root()}}/customers"><i class="fa fa-users fa-fw"></i> Customers</a>
			</li>
			<li>
				<a href="#"><i class="fa fa-briefcase fa-fw"></i> Schedule<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="{{ Request::root()}}/create_schedule">Create Schedule</a>
					</li>
					<li>
						<a href="{{ Request::root()}}/view_schedule">View Schedule</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="{{ Request::root()}}/instant_sale"><i class="fa fa-shopping-cart fa-fw"></i>Instant Sale</a>
			</li>
			<li>
				<a href="{{ Request::root()}}/target"><i class="fa fa-star    fa-fw"></i> Target</a>
			</li>
			<li>
				<a href="{{ Request::root()}}/expense"><i class="fa fa-money    fa-fw"></i> Expense</a>
			</li>
			<li>
				<a href="#"><i class="fa fa-book fa-fw"></i> Reports<span class="fa arrow"></span></a>
				<ul class="nav nav-second-level">
					<li>
						<a href="{{ Request::root()}}/visit_report">Visit Report</a>
					</li>
					<li>
						<a href="{{ Request::root()}}/target_report">Target Report</a>
					</li>
					<li>
						<a href="{{ Request::root()}}/expense_report">Expense Report</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="{{ Request::root()}}/track_location"><i class="fa fa-map-marker fa-fw"></i> Track Location</a>
			</li>
			<li>
				<a href="{{ Request::root()}}/chat"><i class="fa fa-comments fa-fw"></i> chat</a>
			</li>
		</ul>
	</div>
</div>