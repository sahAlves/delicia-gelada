<?php
/* Classe para integração de contato com o Banco de Dados
 * Autor: Sabrina Souza Alves da Silva
 * Data de Criação: 09/12/2019
 * Modificações:
    Data:
    Alterações realizadas:
    Nome do desenvolvedor:
 *

*/
class UsuarioDAO{
    
    private $conexaoMysql;
    private $conexao;
    
    public function __construct(){
        
        require_once('conexaoMysql.php');
        require_once('model/usuarioClass.php');
        
        //Instancia da classe de conexao com o Banco de Dados
        $this->conexaoMysql = new ConexaoMysql();
        
        //Abre a conexao com o BD e guarda no atributo conexao
        $this->conexao = $this->conexaoMysql->conectDatabase();
        
        
    }
    
    
    
    
    //Seleciona todos os contatos
    public function selectAllUsuario(){
        
        $sql = "select * from tblusuarios";

        $select = $this->conexao->query($sql);

        $cont = 0;
        while($rs = $select->fetch(PDO::FETCH_ASSOC)){

            //Instancia da classe Contato, criando uma coleção de objetos
            $listUsuario[] = new Usuario();
            $listUsuario[$cont]->setId($rs['id_usuario']);
            $listUsuario[$cont]->setNome($rs['nome']);
            $listUsuario[$cont]->setNomeUsuario($rs['nome_usuario']);
            $listUsuario[$cont]->setSenha($rs['senha']);
            $listUsuario[$cont]->setStatus($rs['status']);

            $cont++;

        }

        if(isset($listUsuario))
            return $listUsuario;
        else
            return false;        

    }
    
    // Função que verifica se os dados enviados no login correspondem a algum registro no banco.
    public function login($nomeUsuario, $senhaUsuario)
    {
        
        // selecionando um registro no banco cujas informações correspondam as passadas por parâmetro
        $sql = "SELECT * FROM tblusuarios INNER JOIN tblniveis
                ON nivel = id_niveis 
                WHERE nome_usuario = '".$nomeUsuario."' AND senha = '".$senhaUsuario."'
                AND tblusuarios.status = 1 AND admconteudo = 1";
        
        $statement = $this->conexao->query($sql);
        
        // Retornando o nome do usuário.
        if($rsUsuario = $statement->fetch(PDO::FETCH_ASSOC))
        {
            return $rsUsuario['nome'];   
        }
        else {
            return false;
        }

    }
    
    
}

?>