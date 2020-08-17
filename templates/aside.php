			<aside class="navbar col-1 col-md-4 col-lg-3 m-0 p-0 theme-darkblue" >
					
				<button class="aside-toggle-button order-2 p-0 m-0 d-md-none" id="aside-togglr-button" target="aside-nav-wrapper">
					<img src="../img/close-menu.png" alt="">
				</button>

				<div class="no-collapsed d-md-inherit d-flex flex-col w-90" id="aside-nav-wrapper">
					<div id="aside-user-info" class=" d-flex flex-col m-3 p-2 text-center">
						<span>username</span>
						<span>role</span>
					</div> <!-- #aside-user-info -->
					<nav class="nav fs-18">
						<ul class="d-flex flex-col" id="aside_nav">
							<li class="nav-item"><a href="<?php echo set_url('pages/admin.php'); ?>" class="nav-link active">Dashbord</a>
							</li>
							<li class="nav-item" id="addmission-li"><a href="<?php echo set_url('pages/admissions-all.php?admission-search=all'); ?>" class="nav-link">Admissions</a>
								<button class="toggle-button" target="admission-nav">
									<img src="../img/close-menu.png" width="20px" alt="">
								</button>

								<nav class="nav sub-nav no-collapsed theme-darkblue" id="admission-nav">
									<ul class="d-flex flex-col">
										<li class="nav-item">
											<a href="<?php echo set_url('pages/admissions-all.php?admission-search=all') ?>" class="nav-link" parent-li="addmission-li">All Admissions</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo set_url('pages/admissions-all.php?admission-search=unread') ?>" class="nav-link" parent-li="addmission-li">Unread Admissions</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo set_url('pages/admissions-all.php?admission-search=read') ?>"  class="nav-link" parent-li="addmission-li">Read Admissions</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo set_url('pages/admissions-all.php?admission-search=accepted') ?>"  class="nav-link" parent-li="addmission-li">Accepted Admissions</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo set_url('pages/admissions-all.php?admission-search=rejected') ?>"  class="nav-link" parent-li="addmission-li">Rejected Admissions</a>
										</li>
										<li class="nav-item">
											<a href="<?php echo set_url('pages/admissions-all.php?admission-search=deleted') ?>"  class="nav-link" parent-li="addmission-li">Deleted Admissions</a>
										</li>
									</ul>
								</nav>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">Attendance</a>
								<button class="toggle-button" target="attendance-nav">
									<img src="../img/close-menu.png" width="20px" alt="">
								</button>

								<nav class="nav sub-nav no-collapsed" id="attendance-nav">
									<ul class="d-flex flex-col">
										<li class="nav-item"><a href="#" class="nav-link">Students Attendance</a></li>
										<li class="nav-item"><a href="#" class="nav-link">Teachers Attendance</a></li>
									</ul>
								</nav>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">Students</a>
								<button class="toggle-button" target="student-nav">
									<img src="../img/close-menu.png" width="20px" alt="">
								</button>

								<nav class="nav sub-nav no-collapsed" id="student-nav">
									<ul class="d-flex flex-col">
										<li class="nav-item"><a href="#" class="nav-link">Students Attendance</a></li>
										<li class="nav-item"><a href="#" class="nav-link">Students Timetables</a></li>
										<li class="nav-item"><a href="#" class="nav-link">Students list</a></li>
										<li class="nav-item"><a href="#" class="nav-link">Students Complaints</a></li>
									</ul>
								</nav>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">Teachers</a>
								<button class="toggle-button" target="teacher-nav">
									<img src="../img/close-menu.png" width="20px" alt="">
								</button>

								<nav class="nav sub-nav no-collapsed" id="teacher-nav">
									<ul class="d-flex flex-col">
										<li class="nav-item"><a href="#" class="nav-link">Teachers Attendance</a></li>
										<li class="nav-item"><a href="#" class="nav-link">Teachers Timetables</a></li>
										<li class="nav-item"><a href="#" class="nav-link">Teachers list</a></li>
										<li class="nav-item"><a href="#" class="nav-link">Teachers Complaints</a></li>
									</ul>
								</nav>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">Class Rooms</a>
								<button class="toggle-button" target="classroom-nav">
									<img src="../img/close-menu.png" width="20px" alt="">
								</button>

								<nav class="nav sub-nav no-collapsed" id="classroom-nav">
									<ul class="d-flex flex-col">
										<li class="nav-item"><a href="#" class="nav-link">Class Attendance</a></li>
										<li class="nav-item"><a href="#" class="nav-link">Class Timetables</a></li>
										<li class="nav-item"><a href="#" class="nav-link">Class list</a></li>
										<li class="nav-item"><a href="#" class="nav-link">Class Complaints</a></li>
									</ul>
								</nav>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">Subjects</a>
								<button class="toggle-button" target="subject-nav">
									<img src="../img/close-menu.png" width="20px" alt="">
								</button>

								<nav class="nav sub-nav no-collapsed" id="subject-nav">
									<ul class="d-flex flex-col">
										<li class="nav-item"><a href="#" class="nav-link">Subjects list</a></li>
										<li class="nav-item"><a href="#" class="nav-link">Subjects Complaints</a></li>
									</ul>
								</nav>
							</li>
							<li id="interview-li" class="nav-item"><a href="#" class="nav-link">Interview Pannels</a>
								<button class="toggle-button" target="interview-nav">
									<img src="<?php echo set_url('img/close-menu.png') ?>" width="20px">
								</button>
								<div id="interview-nav" class="no-collapsed nav sub-nav">
									<ul class="d-flex flex-col">
										<li class="nav-item"><a href="" class="nav-link"  parent-li="interview-li">All pannels</a></li>
										<li class="nav-item"><a href="<?php echo set_url('pages/interview-pannel-create.php') ?>" class="nav-link" parent-li="interview-li">Add new Pannel</a></li>
										<li class="nav-item"><a href="" class="nav-link"  parent-li="interview-li">Update pannels</a></li>
										<li class="nav-item"><a href="" class="nav-link"  parent-li="interview-li">Delete pannels</a></li>
									</ul>
									
								</div>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">User Roles</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">Parents</a>
							</li>
							<li class="nav-item">
								<a href="#" class="nav-link">Administrative Staff</a>
							</li>
						</ul>
					</nav>
				</div>
			</aside>