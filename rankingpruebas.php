<?php
require_once(dirname(__FILE__) . '/../../config.php');
$courseid = required_param ( 'id', PARAM_INT ); //brings the right course id

$items = $DB->get_records_sql ( "SELECT firstname, lastname, AVG(qg.grade) as average 
FROM mdl_quiz_grades as qg 
INNER JOIN mdl_quiz as q 
ON (q.id = qg.quiz) 
INNER JOIN mdl_user as u 
ON (qg.userid = u.id) 
WHERE q.course = $courseid
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