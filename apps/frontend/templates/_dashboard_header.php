<nav class="navbar dashboard navbar-inverse navbar-static-top" role="navigation">
	<a class="navbar-brand" href="#">Guró</a>
	<ul class="nav navbar-nav">
		<li <?php if ($current_section == 'dashboard') echo 'class="active"'?>>
			<a href="<?php echo url_for("@dashboard") ?>">Examinations</a>
		</li>
		<li <?php if ($current_section == 'student') echo 'class="active"'?>>
      <a href="#">Students</a>
    </li>
    <li id="reports">
			<a href="#">Reports</a>
				<ul class="nav nav-pill nav-stacked sub-menu">
					<li>
						<a href="<?php echo url_for('tempReports/examResults') ?>">Exams</a>
					</li>
					<li><a href="<?php echo url_for('tempReports/students') ?>">Student Records</a>
					</li>
				</ul>
		</li>
	</ul>

	<ul class="nav navbar-nav pull-right">
		<li>
			<a href="<?php echo url_for("@dashboard") ?>">Log Out</a>
		</li>
	</ul>
</nav>