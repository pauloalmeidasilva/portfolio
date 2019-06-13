<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	if(!function_exists('set_msg')){
		function set_msg($msg=NULL){
			$ci =& get_instance();
			$ci->session->set_userdata('aviso', $msg);	
		}
	}

	if(!function_exists('get_msg')){
		function get_msg($destroy=True){
			$ci =& get_instance();
			$retorno = $ci->session->userdata('aviso');
			if ($destroy) $ci->session->unset_userdata('aviso');
			return $retorno;
		}
	}

	if(!function_exists('get_estado')){
		function get_estado(){
			return array (
				'AC' => 'Acre',
				'AL' => 'Alagoas',
				'AP' => 'Amapá',
				'AM' => 'Amazonas',
				'BA' => 'Bahia',
				'CE' => 'Ceará',
				'DF' => 'Distrito Federal',
				'ES' => 'Espirito Santo',
				'GO' => 'Goiás',
				'MA' => 'Maranhão',
				'MT' => 'Mato Grosso',
				'MS' => 'Mato Grosso do Sul',
				'MG' => 'Minas Gerais',
				'PA' => 'Pará',
				'PB' => 'Paraíba',
				'PR' => 'Paraná',
				'PE' => 'Pernambuco',
				'PI' => 'Piauí',
				'RR' => 'Roraima',
				'RO' => 'Rondônia',
				'RJ' => 'Rio de Janeiro',
				'RN' => 'Rio Grande do Norte',
				'RS' => 'Rio Grande do Sul',
				'SC' => 'Santa Catarina',
				'SP' => 'São Paulo',
				'SE' => 'Sergipe',
				'TO' => 'Tocantins'
			);
		}
	}

	if(!function_exists('get_sexo')){
		function get_sexo(){
			return array (
				'F' => 'Feminino',
				'M' => 'Masculino'
			);
		}
	}

	if(!function_exists('get_estado_civil')){
		function get_estado_civil(){
			return array (
				'1' => 'Casado',
				'2' => 'Divorciado',
				'3' => 'Separado',
				'4' => 'Solteiro',
				'5' => 'União Estável',
				'6' => 'Viuvo'
			);
		}
	}

	if(!function_exists('get_turno')){
		function get_turno(){
			return array (
				'1' => 'Matutino',
				'2' => 'Vespertino',
				'3' => 'Noturno',
				'4' => 'Integral',
			);
		}
	}

	if(!function_exists('get_escolaridade')){
		function get_escolaridade(){
			return array (
				'1' => 'Alfabetizado',
				'2' => 'Ensino Fundamental Incompleto',
				'3' => 'Ensino Fundamental Completo',
				'4' => 'Ensino Médio Incompleto',
				'5' => 'Ensino Médio Completo',
				'6' => 'Ensino Superior Incompleto',
				'7' => 'Ensino Superior Completo',
				'8' => 'Pós-Graduado',
				'9' => 'Mestrado',
				'10' => 'Doutorado',
				'11' => 'Pós-Doutorado',

			);
		}
	}
?>