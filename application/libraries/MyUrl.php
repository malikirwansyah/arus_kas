<?php 
class MyUrl {

        protected $CI;
		
        // We'll use a constructor, as you can't directly call a function
        // from a property definition.
        public function __construct()
        {
                // Assign the CodeIgniter super-object
                $this->CI =& get_instance();
				define("MYASSETS", $this->CI->config->base_url('assets/'));
        }

}
?>