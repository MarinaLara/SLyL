<?php
	/**
	 * 
	 */
	class Trimestres 
	{
		

		public function get_trimestre($mes)
		{
			$trimestre = 1;
			switch ($mes) {
				case '01':
					$trimestre = 1;
					break;
				case '02':
					$trimestre = 1;
					break;
				case '03':
					$trimestre = 1;
					break;
				case '04':
					$trimestre = 2;
					break;
				case '05':
					$trimestre = 2;
					break;
				case '06':
					$trimestre = 2;
					break;
				case '07':
					$trimestre = 3;
					break;
				case '08':
					$trimestre = 3;
					break;
				case '09':
					$trimestre = 3;
					break;
				case '10':
					$trimestre = 4;
					break;
				case '11':
					$trimestre = 4;
					break;
				case '12':
					$trimestre = 4;
					break;

				default:
					# code...
					break;
			}
			return $trimestre;
		}
	}

?>