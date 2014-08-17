<nav class="navbar dashboard navbar-inverse navbar-static-top" role="navigation">
	<a class="navbar-brand" href="#">Guró</a>
	<ul class="nav navbar-nav">
		<li <?php if ($current_section == 'dashboard') echo 'class="active"'?>>
			<a href="<?php echo url_for("@dashboard") ?>">Examinations</a>
		</li>
		<li <?php if ($current_section == 'student') echo 'class="active"'?>>
      <a href="#">Students</a>
    </li>
    <li <?php if ($current_section == 'reports') echo 'class="active"'?>>
			<a href="<?php echo url_for("reports/index") ?>">Reports</a>
		</li>
	</ul>
	<ul class="nav navbar-nav pull-right">
		<li>
			<a href="<?php echo url_for("@dashboard") ?>">Log Out</a>
		</li>
	</ul>
</nav>