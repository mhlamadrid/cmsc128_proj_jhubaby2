<div role="tabpanel" class="tab-pane" id="tab_adviser">
	<div class="panel panel-default" style="margin-top:10px">
		<div class="panel-body">    
		<!--Adviser tab HERE-->	
			
			Adviser
			<?= form_open('student_control/studentShowNotifs');
				$attr = array(
						'value'         => 'Notifications',
						'class' 	 	=> "btn btn-primary"
					);
				echo form_submit($attr);
				echo form_close();
			?>
			
			<div class="panel-body">

				<?php if(isset($result)) { ?>
                   <table class="table table-condensed text-center">
                      <?php $row_count = count($result['msgs']);
                            if($row_count != 0) {
                              foreach ($result['msgs'] as $row) {
                                echo "<tr>";
                                echo "<td>" . $row->notif_body . "</td>";
                                echo form_open('student_control/approveRequest');
                                echo form_hidden('msg_id', $row->notif_id);
                                echo "<td><button type='submit' id='approve' onClick='approved()'>Approve Request</button></td>";
                                echo form_close();

                                echo form_open('student_control/rejectRequest');
                                echo form_hidden('msg_id', $row->notif_id);
                                echo "<td><button type='submit' id='reject' onClick='rejected()'>Reject Request</button></td>";
                                echo "</tr>";
                                echo form_close();
                              }
                            }
                            else {
                                echo "<tr>";
                                  echo "<td colspan=\"4\">No Notifications.</td>";
                                echo "</tr>";
                            }
                      ?>
                    </table>
                <?php } ?>
			</div>
			
		<!--Adviser tab HERE-->			
		</div>
	</div>
</div>