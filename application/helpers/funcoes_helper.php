<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');

	if(!function_exists('get_ensino')){
		function get_ensino(){
			return array (
				'1' => 'Ensino Infantil',
				'2' => 'Ensino Fundamental 1',
				'3' => 'Ensino Fundamental 2',
				'4' => 'Ensino Médio',
				'5' => 'Ensino Técnico',
				'6' => 'Ensino Superior', // A função get_nivel() está atrelada ao ensino superior, caso mude a numeração do indice mudar também a logica no javascript formacao.js
			);
		}
	}

	if(!function_exists('get_nivel')){
		function get_nivel(){
			return array (
				'1' => 'Bacharelado',
				'2' => 'Licenciatura',
				'3' => 'Tecnologia',
				'4' => 'Pós-Graduado',
				'5' => 'Mestrado',
				'6' => 'Doutorado',
			);
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
?>