<?php
echo"hola mundo <br>";

require_once(dirname(__FILE__) . '/../../config.php');

$items = $DB->get_records_sql('SELECT firstname, lastname, grade
FROM mdl_lesson_grades INNER JOIN
(mdl_grade_items JOIN mdl_course JOIN mdl_user)
ON (mdl_lesson_grades.userid = mdl_user.id)
GROUP BY firstname, lastname
ORDER BY grade');


//var_dump($items);

foreach ($items as $item)

	// echo $item->firstname ;
	//  echo $item->lastname;
	echo $item->grade;
