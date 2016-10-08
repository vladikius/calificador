<?PHP  if ( ! defined('BASEPATH'))  exit('No direct script access allowed');

include( "../customfunctions.php" );


class accesosControler extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('consultas');
    }

    //--------------------------------------------------------------
    // Area de Verifificación de usuarios
    //--------------------------------------------------------------
    public function login()
    {
		$usuario = getPostForm( "usuario" );
		$password = getPostForm( "password" );

		$pass = conviertePassword( $pass );  sin cifrar

		if( $row=$this->ado->obtDatos("posJurados", "DNI='$user' AND Clave='$pass'") ) {

			$array = array (
				'id'   => $row->id,
				'user' => $row->ape,
				'area' => $row->area,
				'tipo' => $row->tip,
			);

        	$this->session->set_userdata('logged_in', $array);
		}

		  redirect( base_url(""), 'refresh');
    }
}
