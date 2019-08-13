<?php

	class Core{

		public function start($urlGet){

			if (isset($urlGet['metodo'])) {
				$acao = $urlGet['metodo'];			}
		}else{
			$acao = 'index';
		}

		if (isset($urlGet['pagina'])) {
			$Controller = ucfirst($urlGet['pagina'].['Controller']);
		}else{
			$Controller = 'HomeController';
		}

		
	}