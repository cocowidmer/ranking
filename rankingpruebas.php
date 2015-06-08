<?php
echo"hola mundo <br>";

require_once(dirname(__FILE__) . '/../../config.php');

$items = $DB->get_records_sql('SELECT firstname, lastname, grade
FROM mdl_quiz_grades INNER JOIN
(mdl_grade_items JOIN mdl_course JOIN mdl_user)
ON (mdl_quiz_grades.userid = mdl_user.id)
GROUP BY firstname, lastname
ORDER BY grade ');

//var_dump($items);

foreach ($items as $item) 
	
  // echo $item->firstname ;
  //  echo $item->lastname;
    echo $item->grade;

if $item->grade = null {
	echo "no hay notas todavía";
}
