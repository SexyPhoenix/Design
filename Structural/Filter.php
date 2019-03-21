<?php
	
	/**
	 * 过滤器模式
	 *
	 * 
	 * 过滤一组对象
	 * 
	 */
	
	interface Criteria {

		public function meetCriteria($persons);
	}

	class Person {

		private $name;
		private $gender;
		private $maritalStatus;


		public function __construct($name, $gender, $maritalStatus)
		{
			$this->name          = $name;
			$this->gender        = $gender;
			$this->maritalStatus = $maritalStatus;
		}

		public function getName()
		{
			return $this->name;
		}

		public function getGender()
		{
			return $this->gender;
		}

		public function getMaritalStatus()
		{
			return $this->maritalStatus;
		}
	}

	//女性对象
	class CriteriaFemale implements Criteria {

		public function meetCriteria($persons)
		{
			$person_list = array();
			foreach ($persons as $person) {
				
				if('female' == $person->getGender()) $person_list[] = $person;
			}

			return $person_list;
		}
	}

	//男性对象
	class CriteriaMale implements Criteria {

		public function meetCriteria($persons)
		{
			$person_list = array();
			foreach ($persons as $person) {
				
				if('male' == $person->getGender()) $person_list[] = $person;
			}

			return $person_list;
		}
	}

	//单身对象
	class CriteriaSingle implements Criteria {

		public function meetCriteria($persons)
		{
			$person_list = array();
			foreach ($persons as $person) {
				
				if('single' == $person->getMaritalStatus()) $person_list[] = $person;
			}

			return $person_list;
		}
	}

	//组合对象
	class CriteriaAnd implements Criteria {

		public $criteria;
		public $otherCriteria;

		public function __construct($criteria, $otherCriteria)
		{
			$this->criteria      = $criteria;
			$this->otherCriteria = $otherCriteria;
		}

		public function meetCriteria($persons)
		{
			$criteria_list = $this->criteria->meetCriteria($persons);

			return $this->otherCriteria->meetCriteria($criteria_list);
		}
	}

	function printPerson($persons)
	{
		foreach ($persons as $person) {
			
			print_r('[ Name：'.$person->getName().' Gender： '.$person->getGender().' MaritalStatus： '.$person->getMaritalStatus() .' ]'.PHP_EOL);
		}
	}

	$person_list = array();

	$person_list[] = new Person('zhangsan', 'male', 'single');
	$person_list[] = new Person('lisi', 'male', 'married');
	$person_list[] = new Person('huamei', 'female', 'single');
	$person_list[] = new Person('luohua', 'female', 'single');
	$person_list[] = new Person('wanger', 'male', 'single');
	$person_list[] = new Person('mazi', 'male', 'married');
	$person_list[] = new Person('meihua', 'female', 'single');
	$person_list[] = new Person('biyiniao', 'female', 'married');
	$person_list[] = new Person('beizi', 'male', 'single');

	$male       = new CriteriaMale();
	$female     = new CriteriaFemale();
	$single     = new CriteriaSingle();
	$and        = new CriteriaAnd($male, $single);

	print_r('Male：'.PHP_EOL);
	printPerson($male->meetCriteria($person_list));
	print_r(PHP_EOL);

	print_r('Female：'.PHP_EOL);
	printPerson($female->meetCriteria($person_list));
	print_r(PHP_EOL);	

	print_r('Single'.PHP_EOL);
	printPerson($single->meetCriteria($person_list));
	print_r(PHP_EOL);

	print_r('And'.PHP_EOL);
	printPerson($and->meetCriteria($person_list));
	print_r(PHP_EOL);	
?>