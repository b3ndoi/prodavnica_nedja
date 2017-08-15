<?php

class Paginate{

	public $current_page;
	public $itams_per_page;
	public $itams_total_count;

	public function __construct($page = 1, $itams_per_page = 4, $itams_total_count = 0){

		$this->current_page = (int)$page;
		$this->itams_per_page = (int)$itams_per_page;
		$this->itams_total_count = (int)$itams_total_count;

	}

	public function next(){

		return $this->current_page + 1;

	}

	public function previous(){

		return $this->current_page - 1;

	}

	public function page_total(){

		return ceil($this->itams_total_count/$this->itams_per_page);

	}

	public function has_previous(){

		return $this->previous() >= 1 ? true : false;

	}

	public function has_next(){

		return $this->next() <= $this->page_total() ? true : false;

	}

	public function offset(){

		return ($this->current_page - 1) * $this->itams_per_page;

	}

}