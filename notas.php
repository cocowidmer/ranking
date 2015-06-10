<?php
require_once(dirname(__FILE__) . '/../../config.php');
$courseid = required_param ( 'id', PARAM_INT ); //brings the right course id
global $COURSE, $USER;



$context = get_context_instance(CONTEXT_COURSE,"$courseid");
$esProfesor = false;
if ($roles = get_user_roles($context, $USER->id)) {
	foreach ($roles as $role) {
		if($role->shortname == 'editingteacher'){
			$esProfesor = true;

		}
	}
}






if($esProfesor){
      $items = $DB->get_records_sql ("SELECT
			firstname, lastname, finalgrade
			FROM
			mdl_grade_grades as gg INNER JOIN
			(mdl_grade_items as gi JOIN mdl_course as c JOIN mdl_user as u)
			ON (gg.itemid = gi.id AND gi.courseid= $courseid AND gg.userid = u.id)
			GROUP BY firstname, lastname
			ORDER BY finalgrade DESC");
	
	
	// new table that shows position and grades by student
	
	$table = new html_table ();
	$table->head = array (
		'Position',
		'Average of Course',
		'Firstname',
		'Lastname'
	);
	
	$position = 0;
	foreach ( $items as $item ) {
	$position++;
	$firstname = $item->firstname;
	$lastname = $item->lastname;
	$finalgrade = $item->finalgrade;
	$table->data[] = array($position, $finalgrade, $firstname, $lastname);
	}
	
	echo html_writer::table($table);
	
	
}

