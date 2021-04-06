<?php

class Xrange implements Iterator
{
	    protected $start;
	        protected $limit;
	        protected $step;
		    protected $current;

		    public function __construct($start, $limit, $step = 1)
			        {
					        $this->start = $start;
						        $this->limit = $limit;
						        $this->step  = $step;
							    }

		        public function rewind()
				    {
					            $this->current = $this->start;
						        }

		        public function next()
				    {
					            $this->current += $this->step;
						        }

		        public function current()
				    {
					            return $this->current;
						        }

		        public function key()
				    {
					            return $this->current;
						        }

		        public function valid()
				    {
					            return $this->current <= $this->limit;
						        }
}



foreach (new Xrange(0, 9) as $key => $val) {
	    echo $key, ' ', $val, "\n";
}
