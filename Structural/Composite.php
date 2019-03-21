<?php
	
	/**
	 * 组合模式
	 *
	 * 
	 * 树状显示
	 * 
	 */
	
	class Employee {

		public $name;
		public $duty;
		public $salary;
		public $employees = array();

		public function __construct($name, $duty, $salary)
		{
			$this->name    = $name;
			$this->duty    = $duty;
			$this->salary  = $salary;
		}

		//增加对象
		public function add($employee)
		{
			$this->employees[] = $employee;
		} 

		public function getEmployees()
		{
			return $this->employees;
		}

		public function __toString(){

			return "Employee: [ Name： " . $this->name . ", Duty： ".$this->duty.', Salary：'. $this->salary . ' ]'.PHP_EOL;
		}
	}

	$CEO             = new Employee("John","CEO", 30000);
	$headSales       = new Employee("Robert","Head Sales", 20000);
	$headMarketing   = new Employee("Michel","Head Marketing", 20000);
	$clerk1          = new Employee("Laura","Marketing", 10000);
	$clerk2          = new Employee("Bob","Marketing", 10000);
	$salesExecutive1 = new Employee("Richard","Sales", 10000);
	$salesExecutive2 = new Employee("Rob","Sales", 10000);

	$CEO->add($headSales);
	$CEO->add($headMarketing);
	$headSales->add($salesExecutive1);
	$headSales->add($salesExecutive2);
	$headMarketing->add($clerk1);
	$headMarketing->add($clerk2);

	print_r($CEO.PHP_EOL);
	foreach ($CEO->getEmployees() as $employee) {
		
		print_r($employee.PHP_EOL);
		foreach ($employee->getEmployees() as $emp) {
			
			print_r($emp.PHP_EOL);
		}
	}
?>