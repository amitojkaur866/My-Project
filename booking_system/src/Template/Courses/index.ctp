<?php
use Cake\Utility\Security;
use Cake\Core\Configure;
?>
<div class="pageheader">
    <h2>
        <i class="fa fa-book"></i> Course List
    </h2>
    <div class="breadcrumb-wrapper">
        <ol class="breadcrumb">
            <li><?php echo $this->Html->link('Add New Course', array('controller' => 'Courses', 'action' => 'add'), array('class' => 'btn btn-primary btn-s')); ?></li>
        </ol>
    </div>
</div>
<div class='panel-body'><?= $this->Flash->render() ?></div>
<div class="contentpanel">
    
    <!-- content goes here... -->
    <div class="table-responsive">
        <table class="table" id="tableUsers">
            <thead>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php          
                $Serial = 1;
                $Listing = "";
                if (!empty($courses)) {
                    foreach ($courses as $course) { 
                        $Listing .= '<tr class="gradeU">';
                        $Listing .= '<td>' . $Serial++ . '</td>';
                        $Listing .= '<td > ' . $course->name . '</td>';
                        $Listing .= '<td > ' . date_format($course->date, "d-M-Y H:i A") . '</td>';
                        $Listing .= '<td > ' . $course->description . '</td>';
                        $Listing .= '<td > ' . $this->Html->link('<i class="glyphicon glyphicon-remove"></i>', array('action' => 'delete', $course->id), array('escape' => false)). '</td>';
                        $Listing .= '</tr>';
                    }
                } else {
                    $Listing = "<tr><td></td><td>No Record to List</td><td></td><td></td><td></td></tr>";
                }
                echo $Listing;
                ?> 
            </tbody>
        </table>
    </div><!-- table-responsive -->
</div>
<?php
echo $this->Html->script(array('bootstrap-datetimepicker.min', 'course'), array('block' => 'scriptBottom', 'inline' => false));
$this->Html->scriptStart(['block' => true]);
    echo "var bu_table = $('#tableUsers').dataTable({
        sPaginationType: 'full_numbers',
        aoColumnDefs: [
            {bSortable: false, aTargets: [3,-1]},
            {type: 'title-string', targets: 2 }
        ]
    });";
    echo "$(document).on('click','.statusToggle', function(){        
    	var e = $(this);
    	bootbox.confirm('Are you sure you want to change the status of Business Unit?', function(result) {
            if (result) {
                        id=e.attr('data-id');
                        status=e.attr('data-status');
				
            	jQuery.ajax({
                    url: '" . $this->Url->build(["action" => "toggle_status"]) . "',
                    data: {
                        id: e.attr('data-id'),
                        status: e.attr('data-status')
                    },
                    headers : {
                        'X-CSRF-Token': '".$this->request->param('_csrfToken')."'
                    },
                    type: 'post',
                    dataType: 'json',
                    beforeSend: function() {
                    	e.html('<img src=\'" . $this->request->webroot . "images/loaders/loader4.gif\'>'); 
                    },
                    complete: function() {

                    },
                    success: function(json) {
                        if (json.response.status == 'error') {
                            bootbox.dialog({
                                closeButton: true,
                                message: json.response.message,
                                title: 'Alert',
                                buttons: {
                                    main: {
                                        label: 'Ok',
                                        className: 'btn-danger',
                                        callback: function() {

                                        }
                                    }
                                }
                            });
                        } else if (json.response.status == 'success') {
                        	if(json.response.bu_status == '1'){
                        		e.html('<img data-toggle=\'tooltip\' src=\'" . $this->request->webroot . "images/status_green.png\' alt=\'active\' title=\'Active , click here to deactivate\'>').attr('title', 'Active');
								e.attr('data-status',json.response.bu_status);  
                        	}
                        	else{
                        		e.html('<img data-toggle=\'tooltip\' src=\'" . $this->request->webroot . "images/status_red.png\' alt=\'inactive\' title=\'Inactive , click here to activate\'>').attr('title', 'Inactive');;
					   e.attr('data-status',json.response.bu_status); 
                        	}
                                
                                //update datatable
                                
                                var link_html = e.parent('td').html();
                                e.closest('tr').addClass('changeStatusRow');
                                bu_table.fnUpdate( link_html, $('.changeStatusRow')[0], 2 );
                                $('#tableUsers tbody tr').removeClass('changeStatusRow');
                                
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {

                    }
                });
            }
    	});
    });";   
$this->Html->scriptEnd();
?>
