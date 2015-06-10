<?php
require_once (dirname ( __FILE__ ) . '/../../config.php');

$courseid = required_param ( 'id', PARAM_INT ); //brings the right course id

$items = $DB->get_records_sql ( "SELECT firstname, lastname, AVG(ag.grade) as average
FROM mdl_assign_grades as ag INNER JOIN
mdl_assign as a ON (a.id = ag.assignment)
INNER JOIN mdl_user as u ON (ag.userid = u.id)
WHERE a.course = $courseid
GROUP BY firstname, lastname
ORDER BY average  DESC" );

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

//jugar con las notas 
/*$array = array(1, 2, 3, 4);
foreach ($array as &$valor) {
    $valor = $valor * 2;
}
// $array ahora es array(2, 4, 6, 8)
unset($valor); // rompe la referencia con el último elemento */


/*if (!$grade) { //if there are no grades
 echo "no hay notas todavía"; */




/*$admins = get_admins();
if (array_key_exists($USER->id, $admins)) {
	echo "WIIIIIIIIIII";
} else {
	echo "NOOOOOOOO";
}*/