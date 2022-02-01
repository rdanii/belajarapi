<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Activity_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function counter_activity($method){
        $belajarapi = $this->load->database('belajarapi', TRUE);
        $tanggal = date("Y-m-d");
        $belajarapi->query("INSERT INTO service_usage (tanggal, method) VALUES ('" . $tanggal  . "', '" . $method . "') ON DUPLICATE KEY UPDATE counter = counter + 1");
        $belajarapi->close();
    }

    function insert_activity($title = '', $data = '') {
        $arrdata = array(
            'userid' => isset($_SESSION['user']) ? trim($_SESSION['user']) : '',
            'agent' => (isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : ''),
            'ipaddr' => $this->libs->get_client_ip(),
            'title' => $title,
            'data' => $data
        );
        $belajarapi = $this->load->database('belajarapi', TRUE);
        $userid = isset($_SESSION['user']) ? trim($_SESSION['user']) : '';
        $agent = (isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '');
        $ipaddr = $this->libs->get_client_ip();
        $query_string = "INSERT IGNORE INTO service_activity(userid,agent,ipaddr,title,data) VALUES(" . $belajarapi->escape($userid) . "," . $belajarapi->escape($agent) . "," . $belajarapi->escape($ipaddr) . "," . $belajarapi->escape($title) . "," . $belajarapi->escape($data) . ");";
        $belajarapi->query($query_string);
        $belajarapi->close();
    }

    function insert_activity_error($title = '', $data = '') {
        $arrdata = array(
            'userid' => 'system',
            'agent' => (isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : ''),
            'ipaddr' => $this->libs->get_client_ip(),
            'title' => $title,
            'data' => $data
        );
        $belajarapi = $this->load->database('belajarapi', TRUE);
        $userid = isset($_SESSION['user']) ? trim($_SESSION['user']) : '';
        $agent = (isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '');
        $ipaddr = $this->libs->get_client_ip();
        $query_string = "INSERT IGNORE INTO service_activity_error(userid,agent,ipaddr,title,data) VALUES(" . $belajarapi->escape($userid) . "," . $belajarapi->escape($agent) . "," . $belajarapi->escape($ipaddr) . "," . $belajarapi->escape($title) . "," . $belajarapi->escape($data) . ");";
        $belajarapi->query($query_string);
        $belajarapi->close();
    }

    function insert_activity_libs_kredit($title=NULL, $request=NULL, $response=NULL){
        $belajarapi = $this->load->database('belajarapi',TRUE);

        $arrdata = array(
            'userid' => isset($_SESSION['user']) ? trim($_SESSION['user']) : '',
            'agent' => (isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : ''),
            'ipaddr' => $this->libs->get_client_ip(),
            'title' => $title.' LbsKredit REQUEST',
            'data' => $request
        );
        $userid = isset($_SESSION['user']) ? trim($_SESSION['user']) : '';
        $agent = (isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '');
        $ipaddr = $this->libs->get_client_ip();
        $title2 = $title.' LbsKredit REQUEST';
        $data = $request;
        $query_string = "INSERT IGNORE INTO service_activity(userid,agent,ipaddr,title,data) VALUES(" . $belajarapi->escape($userid) . "," . $belajarapi->escape($agent) . "," . $belajarapi->escape($ipaddr) . "," . $belajarapi->escape($title2) . "," . $belajarapi->escape($data) . ");";
        $belajarapi->query($query_string);

        $arrdata = array(
            'userid' => isset($_SESSION['user']) ? trim($_SESSION['user']) : '',
            'agent' => (isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : ''),
            'ipaddr' => $this->libs->get_client_ip(),
            'title' => $title.' LbsKredit RESPONSE',
            'data' => $response
        );
        $userid = isset($_SESSION['user']) ? trim($_SESSION['user']) : '';
        $agent = (isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '');
        $ipaddr = $this->libs->get_client_ip();
        $title2 = $title.' LbsKredit RESPONSE';
        $data = $response;
        $query_string = "INSERT IGNORE INTO service_activity(userid,agent,ipaddr,title,data) VALUES(" . $belajarapi->escape($userid) . "," . $belajarapi->escape($agent) . "," . $belajarapi->escape($ipaddr) . "," . $belajarapi->escape($title2) . "," . $belajarapi->escape($data) . ");";
        $belajarapi->query($query_string);

        $belajarapi->close();
    }
}