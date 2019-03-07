<?php
$this->assign('title', 'Add Course');
echo $this->Html->css('bootstrap-datetimepicker.min');
?>
<div class="pageheader">
    <h2>
        <i class="fa fa-book"></i> Course 
    </h2>
</div>
<div class='panel-body'><?php 
echo $this->Flash->render();
?></div>
<div class="contentpanel">
    <!-- content goes here... -->
    <div class="panel panel-default">

        <div class="panel-heading">
            <div class="panel-btns">
                <!-- a href="" class="panel-close">&times;</a -->
                <a href="" class="minimize">&minus;</a>
            </div>
            <h4 class="panel-title">Add Course</h4>
        </div>
        <?php echo $this->Form->create('Course', array('class' => 'form-horizontal form-bordered', 'novalidate', 'id'=>'addCourse' ,  'enctype'=>'multipart/form-data')); ?>

        <div class="panel-body panel-body-nopadding">
            <div class="form-group">
                <label class="col-sm-3 control-label">Course Name<span class="asterisk">*</span></label>
                <div class="col-sm-6">
                    <?= $this->Form->control('name', array('placeholder' => 'Course Name', 'label' => false, 'class' => 'form-control')); ?>
                </div>
            </div>
             <div class="form-group">
                <label class="col-sm-3 control-label">Course Date<span class="asterisk">*</span></label>
                <div class="col-sm-3">
                    <?= $this->Form->control('date', array('placeholder' => 'Select date', 'label' => false, 'class' => 'form-control date-picker', 'id'=>'datepicker')); ?>                    
                </div>
            </div>
            <div class="form-group">

                <label class="col-sm-3 control-label">Description<span class="asterisk">*</span></label>
                <div class="col-sm-9">
                    <?= $this->Form->textarea('description', array('placeholder' => 'Enter description here...', 'label' => false, 'class' => 'form-control', 'rows' => '6', 'cols' => '30')); ?> 

                </div>
            </div>
            
        </div><!-- panel-body -->
        <div class="panel-footer">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-3">
                    <?= $this->Form->button('Add', array('class'=>'btn btn-primary', 'id'=>'addPageBtn', 'data-loading-text'=>"Please Wait...")); ?>
                    &nbsp;
                    <?php echo $this->Html->link('Cancel', array('action'=>'index'), array('class'=>'btn btn-default')); ?>
                   
                </div>
            </div>
        </div><!-- panel-footer -->
        <?php echo $this->Form->end(); ?>
    </div>
</div><!-- contentpanel -->
<?php
echo $this->Html->script(array('bootstrap-datetimepicker.min', 'course'), array('block' => 'scriptBottom', 'inline' => false));
?>
