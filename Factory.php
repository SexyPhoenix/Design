<?php
	
	/**
	 * 工厂模式
	 *
	 * 优点： 1、不用关心具体的实例化过程 2、扩展性比较好，只要扩展一个工厂类就好。
	 *
	 * 缺点： 需要增加一个具体类和对象实例化工厂，违反了开闭原则
	 * 
	 */

	interface Shape {
		function draw();
	};
	
	class Circle implements Shape {

		public function draw()
		{

			echo 'this is circle';
		}
	}

	class Rectangle implements Shape {

		public function draw ()
		{

			echo 'this is rectangle';
		}
	}


	class ShapeFactory {

		function getShape($shape)
		{
			switch ($shape) {
				case 'circle':
					
					return new Circle();
					break;
				case 'rectangle':

					return new Rectangle();
					break;
				default:
					break;
			}
		}
	}

	$factory = new ShapeFactory();

	$circle = $factory->getShape('circle');

	print_r($circle->draw());

	$rectangle = $factory->getShape('rectangle');

	print_r($rectangle->draw());

?>