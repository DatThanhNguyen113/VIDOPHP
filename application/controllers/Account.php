<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Account extends CI_Controller
{
    public function index()
    {
        $this->load->view('account/index');
    }

    public function sign_in()
    {
        header('Content-type: application/json');
        try {
            $jsonValue = $this->input->post();
            $this->load->model('Account_model');
            $this->db->reconnect();
            $user = $this->Account_model->signIn($jsonValue['user_name'], md5($jsonValue['pass_word']));
            if (empty($user) || empty($user[0]['role_id'])) {
                $response = ['message' => 'Đăng nhập thất bại', 'status' => -1];
                echo json_encode($response);
            } else {
                if ((int)$user[0]['ID'] > 0) {
                    $newdata = array(
                        'username' => $user[0]['user_name'],
                        'id' => $user[0]['id'],
                        'email' => $user[0]['email']
                    );
                    $this->session->set_userdata($newdata);
                }
                if ((int)$user[0]['role_id'] == 1) {

                    $url = base_url() . 'index.php/admin/product_list';
                    $response = ['message' => $url, 'status' => 1];
                    echo json_encode($response);
                } else {
                    $url = base_url() . 'index.php/home/index';
                    $response = ['message' => $url, 'status' => 1];
                    echo json_encode($response);
                }
            }
        } catch (Exception $e) {
            $response = ['message' => 'Đăng nhập thất bại', 'status' => -1];
            // redirect(base_url() . 'account/index/sign_in');
            echo json_encode($response);
        }
    }

    public function socialSignIn()
    {
        header('Content-type: application/json');
        try {
            $jsonValue = $this->input->post();
            $this->load->model('Account_model');
            $this->db->reconnect();
            $user = $this->Account_model->socialSignIn($jsonValue['user_name'], 'SOCIAL-NETWORK', $jsonValue['social_id']);
            if (empty($user) || empty($user[0]['role_id'])) {
                $response = ['message' => 'Đăng nhập thất bại', 'status' => -1];
                echo json_encode($response);
            } else {
                if ((int)$user[0]['ID'] > 0) {
                    $newdata = array(
                        'username' => $user[0]['user_name'],
                        'id' => $user[0]['id'],
                        'email' => $user[0]['email']
                    );

                    $this->session->set_userdata($newdata);
                }
                $url = base_url() . 'index.php/home/index';
                $response = ['message' => $url, 'status' => 1];
                echo json_encode($response);
            }
        } catch (Exception $e) {
            $response = ['message' => 'Đăng nhập thất bại', 'status' => -1];
            // redirect(base_url() . 'account/index/sign_in');
            echo json_encode($response);
        }
    }

    public function sign_up()
    {
        header('Content-type: application/json');
        $jsonValue = $this->input->post();
        $this->load->model('Account_model');
        $data = $this->Account_model->signUp($jsonValue['user_name'], md5($jsonValue['pass_word']), $jsonValue['email'], $jsonValue['address'], $jsonValue['roleid']);
        $response = ['message' => $data[0]['Result'], 'status' => $data[0]['ID']];
        echo json_encode($response);
    }

    public function resetPassword()
    {
        header('Content-type: application/json');
        try{
          
            $jsonValue = $this->input->post();
            if (isset($_SESSION['otp'])){
                $token =  $_SESSION['otp'];
                if (strcmp($token, $jsonValue['token']) == 0) {
                    $this->load->model('Account_model');
                    $data = $this->Account_model->resetPassword($this->session->userdata('id'), md5($jsonValue['pass_word']));
                    $response = ['message' => $data[0]['Result'], 'status' => $data[0]['ID']];
                    echo json_encode($response);
                }
                else{
                    $response = ['message' =>'Mã Otp không chính xác', 'status' => '1'];
                    echo json_encode($response);
                }
                unset($_SESSION['otp']);
            }
        }
        catch (Exception $e) {
			$response = ['message' => $e->getMessage(), 'status' => -1];
			echo json_encode($response);
		}
    }

    public function storeOtpSession()
    {
        header('Content-type: application/json');
        $jsonValue = $this->input->post();
        $_SESSION['otp'] = $jsonValue['code'];
    }

}
