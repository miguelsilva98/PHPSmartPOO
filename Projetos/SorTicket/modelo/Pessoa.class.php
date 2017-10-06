&lt;?php
class Pessoa{ 
private $idPessoa;
private $nome;
private $email;
private $senha;
private $foto;
function __construct($idPessoa,$nome,$email,$senha,$foto){
$this->idPessoa = idPessoa;
$this->nome = nome;
$this->email = email;
$this->senha = senha;
$this->foto = foto;
} <p> function getIdPessoa() {
         return $this->idPessoa;
    } <p> function getNome() {
         return $this->nome;
    } <p> function getEmail() {
         return $this->email;
    } <p> function getSenha() {
         return $this->senha;
    } <p> function getFoto() {
         return $this->foto;
    }
}