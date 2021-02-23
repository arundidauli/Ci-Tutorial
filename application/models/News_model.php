<?php
class News_model extends CI_Model {

public function __construct(){
$this->load->database();
}


public function get_news($slug = FALSE){
if ($slug === FALSE)
{
$query = $this->db->get('news');
return $query->result_array();
}

$query = $this->db->get_where('news', array('slug' => $slug));
return $query->row_array();



}



public function get_news_by_id($user_id){

$this->db->where('id',$user_id);
$query = $this->db->get('news');

return $query->row();
}


// $id variable is optional here
function get_by( $id = '' ) {

    if ( $id == '' ) {
        $news = $this->db->get( 'news' );
    }
    else {
        $news = $this->db->get_where( 'news', array( 'id' => $id ) );
    }

    // return data to controller
    return $news->result();

}




}
?>