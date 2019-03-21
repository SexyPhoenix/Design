<?php
	
	/**
	 * 桥接模式
	 *
	 * 将抽象部分和实现部分分类，独立变化，方便扩展
	 *
	 * 
	 */
	
	//圆接口
	interface DrawAPI {
		public function drawCircle($redus, $x, $y);
	}

	//圆加红色
	class RedCircle implements DrawAPI {

		public function drawCircle($redus, $x, $y)
		{
			print_r('Drawing Red Circle, Redus:' .$redus.' X:'.$x.' Y:'.$y.PHP_EOL);
		}
	}

	//圆加绿色
	class GreenCircle implements DrawAPI {

		public function drawCircle($redus, $x, $y)
		{
			print_r('Drawing Green Circle, Redus:' .$redus.' X:'.$x.' Y:'.$y.PHP_EOL);
		}
	}

	//形状
	Abstract class Shape {

		public $drawAPI;

	    function __construct($drawAPI) {

			$this->drawAPI = $drawAPI;
		}

		Abstract function draw();
	}

	//圆
	class Circle extends Shape {

		public $x;
		public $y;
		public $redus;

		public function __construct($x, $y, $redus, $drawAPI)
		{
			$this->x     = $x;
			$this->y     = $y;
			$this->redus = $redus;
			parent::__construct($drawAPI); 
		}

		public function draw()
		{
			$this->drawAPI->drawCircle($this->redus, $this->x, $this->y);
		}
	}

	$redCircle   = new Circle(10,  12, 45, new RedCircle());
	$greenCircle = new Circle(15,  20, 90, new GreenCircle());

	$redCircle->draw();
	$greenCircle->draw();
?>