
<?php


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
    
    	

    	    	
    	$this->content         =  new stdClass;
    	$this->content->text   = '<a href="/proyectoa/moodle/blocks/ranking/rankingnotas.php">Notas</a>';
    	$this->content->footer = 'Footer here...';
    
    	return $this->content;
    }
    
    public function instance_allow_multiple() {
    	return true;
    }

    function has_config() {return true;}
    }   // Here's the closing bracket for the class definition
    
   
  
    
 
 