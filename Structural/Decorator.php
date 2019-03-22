<?php
	
	/**
	 * 装饰器模式
	 *
	 * 
	 * 添加新的功能
	 * 
	 */
	
	interface Shape {

		public function draw();
	}
    
    //抽象接口
	abstract class ShapeDecorator implements Shape {

		public $decorator;

		public function __construct($shape)
		{
			$this->decorator = $shape;
		}

		public function draw()
		{
			$this->decorator->draw();
		}
	}

	class Circle implements Shape {

		public function draw() 
		{
			print_r('draw circle'.PHP_EOL);
		}
	}

	class Rectangle implements Shape {

		public function draw()
		{
			print_r('draw rectangle'.PHP_EOL);
		}
	}

    //实例化抽象类
    class RedShapeDecorator extends ShapeDecorator {

    	public function draw()
    	{
    		$this->decorator->draw();

    		print_r('draw redshapedecorator'.PHP_EOL);
    	}
    }

    $Circle     = new Circle();
    $Rectangle  = new Rectangle();

    $redCircle  = new RedShapeDecorator(new Circle());
    $redCircle->draw();

    $rectangleCircle  = new RedShapeDecorator(new Rectangle());
    $rectangleCircle->draw();


?>