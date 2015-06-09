<?php
require_once(dirname(__FILE__) . '/../../config.php');
$courseid = required_param ( 'id', PARAM_INT ); //brings the right course id

$items = $DB->get_records_sql ( "SELECT firstname, lastname, AVG(ag.grade) as average 
FROM mdl_lesson_grades as ag 
INNER JOIN mdl_lesson as a 
ON (a.id = ag.lessonid AND a.course = $courseid) 
INNER JOIN mdl_user as u ON (ag.userid = u.id) 
GROUP BY firstname, lastname 
ORDER BY average DESC" );

// new table that shows position and grades by student

$table = new html_table ();
$table->head = array (
		'Position',
		'Average',
		'Firstname',
		'Lastname' 
);

$position = 0;
foreach ( $items as $item ) {
	$position++;
	$firstname = $item->firstname;
	$lastname = $item->lastname;
	$average = $item->average;
	$table->data[] = array($position, $average, $firstname, $lastname);
}

echo html_writer::table($table);