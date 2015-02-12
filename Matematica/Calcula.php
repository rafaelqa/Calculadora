<?php

namespace Matematica;

class Calcula
{
	
	private $numeros;
	private $quantidadeNum;
	private $posicao;
	private $operacao;	

	public function setNumeros($numeros){
		$this->numeros = $numeros;
	}

	public function setQuantNum($quantidadeNum){
		$this->quantidadeNum = $quantidadeNum;
	}

	public function setPosicao($posicao){
		$this->posicao = $posicao;
	}

	public function setOperacao($operacao){
		$this->operacao = $operacao;
	}
	
	/**
 	 * O método operacaoMatematica recebe os números da operação além da operaçaõ desejada e encaminha esses números para o método adequado.
	 * As operações aceitas são 'somar', 'subtrair', 'multiplicar' e 'dividir'.
 	 * @param array float $numeros	
 	 * @param int $quantidadeNum
	 * @param sting $operacao
	 * @return float
	 * @throw O erro ocorre quando o parâmetro $operacao não passa uma operação válida
	 */
	public function operacaoMatematica($numeros, $quantidadeNum, $operacao){
		$this->setNumeros($numeros);
		$this->setQuantNum($quantidadeNum);
		$this->setPosicao(1);
		$this->setOperacao($operacao);;
		switch ($this->operacao){
			case "somar":
				$resultado = $this->somar($this->numeros[($this->posicao - 1)], $this->numeros[$this->posicao]);
			break;
			case "subtrair":
				$resultado = $this->subtrair($this->numeros[($this->posicao - 1)], $this->numeros[$this->posicao]);
			break;
			case "multiplicar":
				$resultado = $this->multiplicar($this->numeros[($this->posicao - 1)], $this->numeros[$this->posicao]);
			break;
			case "dividir":
				$resultado = $this->dividir($this->numeros[($this->posicao - 1)], $this->numeros[$this->posicao]);
			break;
			default:
				throw new \Exception("Operação inválida!");
		}
		$this->setNumeros(NULL);
		$this->setQuantNum(NULL);
		$this->setPosicao(NULL);
		$this->setOperacao(NULL);
		return $resultado;
	}

	/**
 	 * O método somar realiza a operação matemática de adição entre os elementos.
 	 * @param float $num1	
 	 * @param float $num2
	 * @return float
	 */
	public function somar( $num1 , $num2 ){
		$resultado = ($num1 + $num2);
		$this->quantidadeNum--;
		if ($this->quantidadeNum == 0){
			return $resultado;
		} else{
			$this->posicao++;
			$resultado = $this->somar($resultado, $this->numeros[$this->posicao]);
			return $resultado;		
		}
	}

	/**
 	 * O método subtrair realiza a operação matemática de subtração entre os elementos.
 	 * @param float $num1	
 	 * @param float $num2
	 * @return float
	 */
	public function subtrair($num1 , $num2){
		$resultado = ($num1 - $num2);
		$this->quantidadeNum--;
		if ($this->quantidadeNum == 0){
			return $resultado;
		} else{
			$this->posicao++;
			$resultado = $this->subtrair($resultado, $this->numeros[$this->posicao]);
			return $resultado;		
		}	
	}

	/**
 	 * O método multiplicar realiza a operação matemática de multiplicação entre os elementos.
 	 * @param float $num1	
 	 * @param float $num2
	 * @return float
	 */
	public function multiplicar($num1 , $num2){
		$resultado = ($num1 * $num2);
		$this->quantidadeNum--;
		if ($this->quantidadeNum == 0){
			return $resultado;
		} else{
			$this->posicao++;
			$resultado = $this->multiplicar($resultado, $this->numeros[$this->posicao]);
			return $resultado;		
		}	
	}

	/**
 	 * O método dividir realiza a operação matemática de divisão entre os elementos.
 	 * @param float $num1	
 	 * @param float $num2
	 * @return float
	 * @throw O erro ocorre quando o parâmetro $num2 é passado como 0, devido a impossibilidade de divisão por 0.
	 */
	public function dividir($num1 , $num2){
		if($num2 == 0){
			throw new \Exception("Não dividiras por zero!");
		} else{
    			$resultado = ($num1 / $num2);
			$this->quantidadeNum--;
			if ($this->quantidadeNum == 0){
				return $resultado;
			} else{
				$this->posicao++;
				$resultado = $this->dividir($resultado, $this->numeros[$this->posicao]);
				return $resultado;		
			}	
		}
	}
}
