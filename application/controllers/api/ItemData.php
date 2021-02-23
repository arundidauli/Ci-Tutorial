<?php
   
require APPPATH . 'libraries/REST_Controller.php';
     
class ItemData extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->database();
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
	public function getUsers_get($id = 0)
	{
        if(!empty($id)){
            $data = $this->db->get_where("items", ['id' => $id])->row_array();
        }else{
            $data = $this->db->get("items")->result();
        }
    
     if(!empty($data)){
        $data2['status'] = TRUE;
        $data2['message'] = "Data fetch successfuly";
        $data2['itemsList'] = $data;
        }else{
        $data2['status'] = False;
        $data2['message'] = "No Data Found";
      
        }
        
        $this->$data2->set_content_type('application/json');
        $this->$data2->set_output(json_encode(array('ShoppingCartHtml'=> $theHTMLResponse)));
        $this->response($data2, REST_Controller::HTTP_OK);
       
	}

    function newsData_get(){
        $id = $this->uri->segment(3);
        $this->load->model('News_model');

        // pass $id to model 
        $news = $this->News_model->get_by( $id );

        if( !empty( $news ) ) {
            $this->response(array(
                'message' => 'success', 
                'status' => 'true', 
                'data' => $news));
        } else {
            $this->response(array(
                'message' => 'unsuccess', 
                'status' => 'false'));
    }
}

    public function getdatabyId_post()
    {
       
      //  $id = $this->input->post('id');
        $id = "1";
        //echo $id;

        if(!empty($id)){
            $data = $this->db->get_where("items", ['id' => $id])->row_array();
        }else{
            $data = $this->db->get("items")->result();
        }
     
     if(!empty($data)){
            $data2['status'] = TRUE;
        $data2['message'] = "Data fetch successfuly";
        $data2['itemsList'] = $data;
        }else{
           $data2['status'] = False;
        $data2['message'] = "No Data Found";
      
        }
        

        $this->response($data2, REST_Controller::HTTP_OK);

         

    }
      
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function insertdata_post()
    {
        
        $input = $this->input->post('id');
        //echo $input;
        $this->db->insert('items',$input);
        $this->response(['Item created successfully.'], REST_Controller::HTTP_OK);    
  

    } 
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_put($id)
    {
        $input = $this->put();
        $this->db->update('items', $input, array('id'=>$id));
     
        $this->response(['Item updated successfully.'], REST_Controller::HTTP_OK);
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index_delete($id)
    {
        $this->db->delete('items', array('id'=>$id));
       
        $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
    }
    	
}