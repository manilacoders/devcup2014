<nav class="navbar dashboard navbar-inverse navbar-static-top" role="navigation">
	<a class="navbar-brand" href="#">Guró</a>
	<ul class="nav navbar-nav">
		<li <?php if ($current_section == 'dashboard') echo 'class="active"'?>>
			<a href="<?php echo url_for("@dashboard") ?>">Examinations</a>
		</li>
		<li <?php if ($current_section == 'student') echo 'class="active"'?>>
      <a href="<?php echo url_for("students/index") ?>">Students</a>
    </li>
    <li>
			<a href="<?php echo url_for("tempReports/index") ?>">Reports</a>
		</li>
	</ul>
	<ul class="nav navbar-nav pull-right">
		<li>
			<a href="<?php echo url_for("@logout") ?>">Log Out</a>
		</li>
	</ul>
</nav>