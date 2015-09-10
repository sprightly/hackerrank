<?php
/**
 * Solution for https://www.hackerrank.com/challenges/solve-me-second
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

	private $sanitized_info = array();

	function process( $info ) {
		$this->sanitize_input( $info );
		$this->calc_sum();
	}

	private function sanitize_input( $info ) {
		foreach( $info as $key => $piece ) {
			$sanitized_pieces = explode( ' ', $piece );
			foreach( $sanitized_pieces as $sanitized_piece ) {
				$this->sanitized_info[$key][] = $sanitized_piece;
			}
		}
	}

	private function calc_sum() {
		foreach ( $this->sanitized_info as $info ) {
			$sum = $info[0] +  $info[1];
			print $sum . "\n";
		}
	}

}


$perception = new Perception();
$logic = new Logic();
$logic->process( $perception->info );