
<?php
require_once($CFG->libdir.'/gradelib.php');
require_once($CFG->dirroot.'/user/renderer.php');
require_once($CFG->dirroot.'/grade/lib.php');
require_once($CFG->dirroot.'/grade/report/grader/lib.php');

class block_ranking extends block_base {
 public function init() {
        $this->title = get_string('ranking', 'block_ranking');
    }
    // The PHP tag and the curly bracket for the class definition 
    // will only be closed after there is another function added in the next section.
    
    public function get_content() {
    	if ($this->content !== null) {
    		return $this->content;
    	}
    
    	
    	//$grades= grade_regrade_final_grade('2');
    	//var_dump($grades);
    	    	
    	$this->content         =  new stdClass;
    	$this->content->text   = 'djhfivhih!';
    	$this->content->footer = 'Footer here...';
    
    	return $this->content;
    }
    
    public function instance_allow_multiple() {
    	return true;
    }

    function has_config() {return true;}
    }   // Here's the closing bracket for the class definition
    
   
  
    
 
 