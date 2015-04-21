<div role="tabpanel" class="tab-pane" id="tab_sample">
	<div class="panel panel-default" style="margin-top:10px">
		<div class="panel-heading">
			Sample Student(2012-12345)
		</div>
		<div class="panel-body">  
			Student information here...

			<?= form_open('adviser_control/adviserShowNotifs');
				$attr =  array(
						'value' => 'Show Notifications',
						'class' => "btn btn-primary"
					);

				echo form_submit($attr);
				echo form_close();
			?>

			<?php if(isset($search_results)) { ?>
                   <table class="table table-condensed text-center">
                      <?php $row_count = count($search_results['msgs']);
                            if($row_count != 0) {
                              foreach ($search_results['msgs'] as $row) {
                                echo "<tr>";
                                echo "<td>" . $row->notif_body . "</td>";
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
	</div>
</div>
