<?php
require_once(dirname(__FILE__) . '/../../config.php');
$courseid = required_param ( 'id', PARAM_INT ); //brings the right course id


$items = $DB->get_records_sql ("SELECT firstname, lastname, COUNT(lsl.objectid) as suma
FROM mdl_logstore_standard_log as lsl
INNER JOIN
mdl_user as u ON (lsl.userid = u.id)
INNER JOIN
(mdl_modules as m  JOIN mdl_course_modules as cm JOIN mdl_resource as r) 
ON (cm.module = m.id AND r.course = cm.course AND r.id=lsl.objectid)

WHERE lsl.action='viewed' AND lsl.courseid= $courseid AND lsl.objecttable='resource'
GROUP BY firstname, lastname
ORDER BY suma DESC");

foreach( $items as $item )


$foros = $DB->get_records_sql ("SELECT firstname, lastname, COUNT(fd.id) as sumaforos
		FROM mdl_forum_discussions as fd
		INNER JOIN
		mdl_user as u ON (fd.userid = u.id and fd.course = $courseid)
		GROUP BY firstname, lastname
		ORDER BY sumaforos  DESC");




		
// new table that shows position and grades by student

$table = new html_table ();
$table->head = array (
		'suma',
		'Firstname',
		'Lastname'
);


foreach ( $items as $item ) {
 	$firstname = $item->firstname;
	$lastname = $item->lastname;
	$suma= $item->suma;
	$table->data[] = array($suma, $firstname, $lastname);
}

echo html_writer::table($table);

