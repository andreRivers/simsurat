<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permohonan_Models extends CI_Model
{
	private $db2;

 public function __construct()
 {
  parent::__construct();
         $this->db2 = $this->load->database('db_atk', TRUE);
 }
	

 public function get_db2()
 {
  return $this->db2->get('sementara');
 }

}
