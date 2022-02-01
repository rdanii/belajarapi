<?php

use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Service extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('activity_model');
    }

    public function index_post()
    {
        ini_set('max_execution_time', 300);
        $datapost = json_decode($this->post('request'));
        if (isset($datapost->requestMethod)) {
            $_SESSION['user'] = (isset($datapost->user) ? $this->security->xss_clean(trim($datapost->user)) : (isset($datapost->requestUser) ? $this->security->xss_clean(trim($datapost->requestUser)) : ''));
            $refno = (isset($datapost->refno) ? $this->security->xss_clean(trim($datapost->refno)) : '');

            $this->activity_model->counter_activity($this->security->xss_clean(trim($datapost->requestMethod)));
            $this->activity_model->insert_activity($this->security->xss_clean(trim($datapost->requestMethod)) . ' ' . $refno . ' REQUEST ', $this->security->xss_clean(trim($this->post('request'))));
            switch (trim($datapost->requestMethod)) {

                case 'login':
                    $this->load->helper('user_helper');
                    $this->response(login($this->post('request')));
                    break;
                case 'register':
                    $this->load->helper('user_helper');
                    $this->response(register($this->post('request')));
                    break;
                case 'getAllUser':
                    $this->load->helper('user_helper');
                    $this->response(getAllUser($this->post('request')));
                    break;
                case 'getBarang':
                    $this->load->helper('user_helper');
                    $this->response(getBarang($this->post('request')));
                    break;
                case 'getBerita':
                    $this->load->helper('user_helper');
                    $this->response(getBerita($this->post('request')));
                    break;
                case 'getKategori':
                    $this->load->helper('user_helper');
                    $this->response(getKategori($this->post('request')));
                    break;
                case 'getMerk':
                    $this->load->helper('user_helper');
                    $this->response(getMerk($this->post('request')));
                    break;
                case 'getStok':
                    $this->load->helper('user_helper');
                    $this->response(getStok($this->post('request')));
                    break;
                case 'getUser':
                    $this->load->helper('user_helper');
                    $this->response(getUser($this->post('request')));
                    break;
                case 'postUser':
                    $this->load->helper('user_helper');
                    $this->response(postUser($this->post('request')));
                    break;
                case 'addBerita':
                    $this->load->helper('user_helper');
                    $this->response(addBerita($this->post('request')));
                    break;
                case 'addTabelBerita':
                    $this->load->helper('user_helper');
                    $this->response(addTabelBerita($this->post('request')));
                    break;
                case 'addBarang':
                    $this->load->helper('user_helper');
                    $this->response(addBarang($this->post('request')));
                    break;
                case 'addKategori':
                    $this->load->helper('user_helper');
                    $this->response(addKategori($this->post('request')));
                    break;
                case 'addMerk':
                    $this->load->helper('user_helper');
                    $this->response(addMerk($this->post('request')));
                    break;
                case 'addStok':
                    $this->load->helper('user_helper');
                    $this->response(addStok($this->post('request')));
                    break;
                case 'updateBerita':
                    $this->load->helper('user_helper');
                    $this->response(updateBerita($this->post('request')));
                    break;
                case 'deleteBerita':
                    $this->load->helper('user_helper');
                    $this->response(deleteBerita($this->post('request')));
                    break;
                default:
                    $this->response((object) array('responseCode' => '08', 'responseDesc' => 'Unknown Request Method[' . $datapost->requestMethod . ']', 'responseData' => array()), 404);
            }

            unset($_SESSION['user']);
        } else {
            $this->activity_model->insert_activity_error('CRASH REPORT', json_encode($this->post()));
            $this->response((object) array('responseCode' => '08', 'responseDesc' => 'Unknown Request Method or Not Isset', 'responseData' => array()), 404);
        }
    }
}
