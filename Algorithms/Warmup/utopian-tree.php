<?php
/**
 * Solution for https://www.hackerrank.com/challenges/utopian-tree
 */

class Perception {

	private $number_of_lines = 1;
	private $info_stream = null;
	public $info = array();

	function __construct() {
		$this->info_stream = fopen("php://stdin", "r");
		$this->detect_number_of_lines();
		$this->get_info();
	}

	private function detect_number_of_lines() {
		$this->number_of_lines = (int) fgets( $this->info_stream );
	}

	private function get_info() {
		for ( $i = 1; $i <= $this->number_of_lines; $i++ ) {
			$this->info[] = fgets( $this->info_stream );
		}
	}

}

class Logic {

	function process( $info ) {
		$this->find_tree_height( $info );
	}

	private function find_tree_height( $info ) {
		foreach ( $info as $cycles_num ) {
			$tree_height = 1;
			for( $cycle = 1; $cycle <= $cycles_num; $cycle++ ) {
				if ( 0 == $cycle % 2 ) {
					$tree_height ++;
				} else {
					$tree_height = $tree_height * 2;
				}
			}
			print $tree_height . "\n";
		}
	}

}


$perception = new Perception();
$logic = new Logic();
$logic->process( $perception->info );