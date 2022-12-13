<ul id="js-nav-menu" class="nav-menu">                   
	
	<li <?php if($p=="admin" or empty($p)){echo "class='active'";}?>>
		<a href="<?php echo baseurl("admin");?>" title="Dashboard" data-filter-tags="Dashboard">
			<i class="fal fa-tachometer-alt"></i>
			<span class="nav-link-text" data-i18n="nav.application_intel">Dashboard</span>
		</a>
	</li>
	<li <?php if($p=="angketperiode" || $p=="angketmaster" ){echo "class='active open'";}?>>
		<a href="#" title="Application Intel" data-filter-tags="application intel">
		<i class="fal fa-info-circle"></i>
		<span class="nav-link-text" data-i18n="nav.application_intel">Kelola Angket</span>
		</a>
		<ul>
			<li <?php if($p=="angketmaster"){echo "class='active'";}?>>
				<a href="<?php echo baseurl("angketmaster");?>" title="Dashboard" data-filter-tags="Dashboard"><span class="nav-link-text" data-i18n="nav.application_intel">Angket Master</span></a>
			</li>
			<li <?php if($p=="angketperiode"){echo "class='active'";}?>>
				<a href="<?php echo baseurl("angketperiode");?>" title="Dashboard" data-filter-tags="Dashboard"><span class="nav-link-text" data-i18n="nav.application_intel">Angket Periode</span></a>
			</li>					
		</ul>
	</li>

	<li>
		<a href="logout" title="Logout">
			<i class="fal fa-sign-out-alt"></i>
			<span class="nav-link-text">Logout</span>
		</a>
	</li>
</ul>