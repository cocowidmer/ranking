<?php
require_once(dirname(__FILE__) . '/../../config.php');
$courseid = required_param ( 'id', PARAM_INT ); //brings the right course id

$items = $DB->get_records_sql ( "SELECT firstname, lastname, ag.grade 
FROM mdl_lesson_grades as ag 
INNER JOIN mdl_lesson as a 
ON (a.id = ag.lessonid AND a.course = $courseid) 
INNER JOIN mdl_user as u ON (ag.userid = u.id) 
GROUP BY firstname, lastname 
ORDER BY `ag`.`grade`  DESC" );


/*if (!$grade) { //if there are no grades
echo "no hay notas todavía"; */


// new table that shows position and grades by student
$table = new html_table ();
$table->head = array (
		'posicion',
		'firstname',
		'lastname',
		'grade'
);

$position = 0;
foreach ( $items as $item ) {
	$position++;
	$firstname = $item->firstname;
	$lastname = $item->lastname;
	$grade = $item->grade;
	$size = count ( $lastname );
	$table->data[] = array($position, $firstname, $lastname, $grade);

	if (!$grade) { //if there are no grades
		echo "no hay notas todavía";}
}

echo html_writer::table($table);