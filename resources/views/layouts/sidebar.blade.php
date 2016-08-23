<div id="sidebar" class="sidebar-fixed">
	<div id="sidebar-content">
		<!--=== Navigation ===-->
		<ul id="nav">
			<li class="current">
				<a href="index.html">
					<i class="icon-dashboard"></i>
					Dashboard
				</a>
			</li>
			<li>
				<a href="javascript:void(0);">
					<i class="icon-desktop"></i>
					Units
				</a>
				<ul class="sub-menu">
					<li>
						<a href="{{ route('unit.create') }}">
						<i class="icon-angle-right"></i>
							Create new Unit
						</a>
					</li>
					<li>
						<a href="{{ route('unit.index') }}">
						<i class="icon-angle-right"></i>
							View All units
						</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
	<div id="divider" class="resizeable"></div>
</div>