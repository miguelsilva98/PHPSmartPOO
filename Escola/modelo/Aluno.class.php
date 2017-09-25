&lt;?php
class Aluno{ 
private $idAluno;
private $idade;
private $sexo;
function __construct($idAluno,$idade,$sexo){
$this->idAluno = idAluno;
$this->idade = idade;
$this->sexo = sexo;
} <p> function getIdAluno() {
         return $this->idAluno;
    } <p> function getIdade() {
         return $this->idade;
    } <p> function getSexo() {
         return $this->sexo;
    }
}