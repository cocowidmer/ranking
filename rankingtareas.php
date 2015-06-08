<?php
require_once (dirname ( __FILE__ ) . '/../../config.php');
$courseid = required_param ( 'id', PARAM_INT );

/*
 * $items = $DB->get_records_sql("SELECT firstname, lastname, ag.grade FROM mdl_assign_grades as ag INNER JOIN mdl_assign as a ON (a.id = ag.assignment AND a.course = $courseid) INNER JOIN mdl_user as u ON (ag.userid = u.id) GROUP BY firstname, lastname ORDER BY grade");
 */
// /NO BORRAR POR SI ACASOOOOOO

$items = $DB->get_records_sql ( "SELECT firstname, lastname, ag.grade
FROM mdl_assign_grades as ag INNER JOIN
mdl_assign as a ON (a.id = ag.assignment AND a.course = $courseid)
INNER JOIN mdl_user as u ON (ag.userid = u.id)
GROUP BY firstname, lastname
ORDER BY `ag`.`grade`  DESC" );

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
}

echo html_writer::table($table);

//jugar con las notas 
/*$array = array(1, 2, 3, 4);
foreach ($array as &$valor) {
    $valor = $valor * 2;
}
// $array ahora es array(2, 4, 6, 8)
unset($valor); // rompe la referencia con el último elemento */

