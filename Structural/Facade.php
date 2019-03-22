<?php
	
	/**
	 * 外观模式
	 *
	 * 
	 * 定义一个同一的接口，系统更加容易使用
	 * 
	 */

	interface Shape {
		public function draw();
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

    class ShapeMaker {

    	public $circle;
    	public $rectangle;

    	public function __construct()
    	{
    		$this->circle    = new Circle();
    		$this->rectangle = new Rectangle();
    	}

    	public function drawCircle()
    	{
    		$this->circle->draw();
    	}

    	public function drawRectangle()
    	{
    		$this->rectangle->draw();
    	}    	
    }

    $shapeMaker = new ShapeMaker();
    $shapeMaker->drawCircle();
    $shapeMaker->drawRectangle();


?>