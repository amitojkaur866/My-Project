<div class="pageheader">
    <h2><i class="fa fa-home"></i>Dashboard</h2>
</div>
	
<div class="contentpanel">   
    
    <div class="row">
        <div class="col-sm-6 col-md-3">
        <a href="<?php echo $this->Url->build(array('controller' => 'users', 'action' => 'index')); ?>">
        
            <div class="panel panel-success panel-stat blue-madison">
                <div class="panel-heading">

                    <div class="stat">
                        <div class="row">
                            <div class="col-xs-4">
                                <img src="<?= $this->request->webroot; ?>images/is-user.png" alt="" />
                            </div>
                            <div class="col-xs-8">
                                <small class="stat-label">Total Users</small>
                                <h1><?php echo $userCount; ?></h1>
                            </div>
                        </div><!-- row -->

                        <div class="mb15"></div>

                    </div><!-- stat -->

                </div><!-- panel-heading -->
            </div><!-- panel -->
            </a>
        </div><!-- col-sm-6 -->

        <div class="col-sm-6 col-md-3">
        <a href="<?php echo $this->Url->build(array('controller' => 'courses', 'action' => 'index')); ?>">
            <div class="panel panel-danger panel-stat">
                <div class="panel-heading">

                    <div class="stat">
                        <div class="row">
                            <div class="col-xs-4">
                                <img src="<?= $this->request->webroot; ?>images/is-document.png" alt="" />
                            </div>
                            <div class="col-xs-8">
                                <small class="stat-label">Total Courses</small>
                                <h1><?php echo $courseCount; ?></h1>
                            </div>
                        </div><!-- row -->

                        <div class="mb15"></div>

                    </div><!-- stat -->

                </div><!-- panel-heading -->
            </div><!-- panel -->
        </a>
        </div><!-- col-sm-6 -->
</div>

