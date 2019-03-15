<div class="logopanel">
    <h1>Booking System for tutoring</h1>
</div><!-- logopanel -->

<div class="leftpanelinner">

    <!-- This is only visible to small devices -->
    <div class="visible-xs hidden-sm hidden-md hidden-lg">   
        <div class="media userlogged">
            <img alt="profile" src="/images/loggeduser.png" class="media-object">
        </div>

        <h5 class="sidebartitle actitle">Account</h5>
        <ul class="nav nav-pills nav-stacked nav-bracket mb30">
            <li><a href="<?php echo $this->Url->build(array('controller' => 'users', 'action' => 'logout')); ?>"><i class="fa fa-sign-out"></i> <span>Sign Out</span></a></li>
        </ul>
    </div>

    <ul class="nav nav-pills nav-stacked nav-bracket">

        <li <?php echo ($this->request->action == 'dashboard') ? 'class=active' : ''; ?>>
            <a href="<?php echo $this->Url->build(array('controller' => 'users', 'action' => 'dashboard')); ?>"><i class="fa fa-home"></i> <span>Dashboard</span></a>
        </li>
        
        <li <?php echo ($this->request->params['controller'] == 'Users' && $this->request->action == 'index') || ($this->request->params['controller'] == 'Users' && $this->request->action == 'add') || ($this->request->params['controller'] == 'UsersCourses' && $this->request->action == 'index') ? 'class=active' : ''; ?>>
            <a href="<?php echo $this->Url->build(array('controller' => 'users', 'action' => 'index')); ?>"><i class="fa fa-users"></i> <span>Manage Users</span></a>
        </li>
            <li <?php echo ($this->request->params['controller'] == 'Courses' && $this->request->action == 'index') || ($this->request->params['controller'] == 'Courses' && $this->request->action == 'add') ? 'class=active' : ''; ?>>
                <a href="<?php echo $this->Url->build(array('controller' => 'courses', 'action' => 'index')); ?>"><i class="fa fa-book"></i> <span>Manage Courses</span></a>
            </li>
            
    </ul>
</div>

<script>
	$(document).ajaxError(function( course, request, settings ) {
		bootbox.dialog({
					closeButton: true,
					message: request.responseText,
					title: "Alert",
					buttons: {
						main: {
							label: "Ok",
							className: "btn-danger",
							callback: function () {
								location.reload();
							}
						}
					}
				});
	});
</script>
