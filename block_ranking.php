
<?php

class block_ranking extends block_base {
 public function init() {
        $this->title = get_string('ranking', 'block_ranking');
    }
    // The PHP tag and the curly bracket for the class definition 
    // will only be closed after there is another function added in the next section.
    
 public function get_content() {
 	global $CFG, $USER, $OUTPUT, $COURSE;
 	
    	if ($this->content !== null) {
    		return $this->content;
    	}
    	
    	$this->content->text = '';
    	
    	
    	$this->content->text .= html_writer::link(new moodle_url('../local/geoo/index.php', array('id'=>$COURSE->id, 'ranking'=>'1')), "Tareas");
    	$this->content->text .= html_writer::empty_tag('br');
    	$this->content->text .= html_writer::link(new moodle_url('../local/geoo/index.php', array('id'=>$COURSE->id, 'ranking'=>'2')), "Notas");
    	$this->content->text .= html_writer::empty_tag('br');
    	$this->content->text .= html_writer::link(new moodle_url('../local/geoo/index.php', array('id'=>$COURSE->id, 'ranking'=>'3')), "Actividades");
    	//$lookquiz = new moodle_url('../local/geoo/index.php', array('action'=>'quiz', 'cmid'=>$course->id));
    	//$lookresource = new moodle_url('../local/geoo/index.php', array('action'=>'resource', 'cmid'=>$course->id));
    	$this->content->text .= html_writer::empty_tag('br');
    	
    	
    	$this->content->footer = "";
    	
    	return $this->content;
    }
    
    public function instance_allow_multiple() {
    	return true;
    }
    
    function has_config() {return true;}
    

    
    }   // Here's the closing bracket for the class definition
    
  
    
 
 