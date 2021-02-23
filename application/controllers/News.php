<?php
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->helper('url_helper');
        }

        public function index(){
        $data['status'] = TRUE;
        $data['message'] = "Data fetch successfuly";
        $data['news'] = $this->news_model->get_news();
        //print_r($data);
        echo json_encode( $data );
      /*  $data['title'] = 'News archive';
        $this->load->view('templates/header', $data);
        $this->load->view('news/index', $data);
        $this->load->view('templates/footer');*/
}

public function getdata() { 

  header('Content-Type: application/json');

        $data['status'] = TRUE;
        $data['message'] = "Data fetch successfuly";
        $data['news'] = $this->news_model->get_news();

        echo json_encode($data);

} 

public function get_news_byid() { 
        if(isset($_POST['user_id']))
        {
       echo $user_id = $_POST['user_id'];
        header('Content-Type: application/json');

        $data['status'] = TRUE;
        $data['message'] = "Data fetch successfuly";
        $data['news'] = $this->news_model->get_news_by_id($user_id);
        
        echo json_encode($data);
        }
  

} 




}