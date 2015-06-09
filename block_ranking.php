
<?php

class block_ranking extends block_base {
 public function init() {
        $this->title = get_string('ranking', 'block_ranking');
    }
    // The PHP tag and the curly bracket for the class definition 
    // will only be closed after there is another function added in the next section.
    
 public function get_content() {
 	global $COURSE;
 	
    	if ($this->content !== null) {
    		return $this->content;
    	}
    
    	

    	    	
    	$this->content         =  new stdClass;
    	$this->content->text   = '<a href="/proyectoa/moodle/blocks/ranking/notas.php?id='.$COURSE->id.'">Notas</a> <br>
    			 				  <a href="/proyectoa/moodle/blocks/ranking/rankingpruebas.php?id='.$COURSE->id.'">Pruebas</a> <br> 
    			                  <a href="/proyectoa/moodle/blocks/ranking/rankingtareas.php?id='.$COURSE->id.'">Tareas</a> <br>
    							  <a href="/proyectoa/moodle/blocks/ranking/rankingactividades.php?id='.$COURSE->id.'">Actividades</a>' ;
    	$this->content->footer = ' ';
    
    	return $this->content;
    }
    
    public function instance_allow_multiple() {
    	return true;
    }
    
    

  
    
    function has_config() {return true;}
    

    
    }   // Here's the closing bracket for the class definition
    
   
  
    
 
 