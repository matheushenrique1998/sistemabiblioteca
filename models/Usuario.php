 <?php
  class Usuario{
    protected $db;
    protected $table = "usuarios";

    public function __construct()
    {
        $this->db = DBConexao::getConexao();
    }
    /**   
     * buscar registro unico
     * @param int $id
     * @return usuario
      */

    public function buscar($id){
   /**
    * listar todos os registro da tabela usuário
    */

    }
    public function listar(){

    }
    /**   
     * caddastrar
     * @param array $dodas
     * @return bool
      */

    public function cadastrar($dados){
    

    }
   
/**   
     *editar usuário
     * @param int $id
     * @param array $dodas
     * @return bool
      */
    public function editar($id,$dados){

    }
    //excluir usuário
    public function excluir($id){
        
    }
  }