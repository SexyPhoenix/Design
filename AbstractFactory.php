<?php
	
	/**
	 * 抽象工厂模式  使用同一个工厂等级结构负责不同产品等级结构产品对象的创建
	 *
	 * 优点： 保证使用同一个产品族中的对象。
	 *
	 * 缺点： 扩展太麻烦， 具体实现类以及工厂子类
	 * 
	 */

	interface Shape {

		function draw();
	};
	
	interface Color {

		function fill();
	}

	abstract class AbstractFactory {

		abstract function getShape($shape);
		abstract function getColor($color);
	}

	class Circle implements Shape {

		public function draw()
		{

			echo 'this is circle';
		}
	}

	class Rectangle implements Shape {

		public function draw()
		{

			echo 'this is rectangle';
		}
	}

	class Red implements Color {

		public function fill()
		{

			echo 'this is red';
		}
	}

	class Green implements Color {

		public function fill() 
		{
			echo 'this is green';
		}
	}

	class ShapeFactory extends AbstractFactory {

		public function getShape($shape) {

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

		public function getColor($color) {

			return null;
		}
	}

	class ColorFactory extends AbstractFactory {

		public function getShape($shape) {

			return null;
		}

		public function getColor($color) {

			switch ($color) {
				case 'red':
					
					return new Red();
					break;
				case 'green':

					return new Green();
					break;
				default:
					break;
			}			
		}
	}

	class FactoryProducer {

		public function getFactory($factory) 
		{

			switch ($factory) {
				case 'shape':
	
					return new ShapeFactory();
					break;
				case 'color':

					return new ColorFactory();
					break;
				default:
					break;
			}			
		}
	}

	//实例化一个工厂生产者
	$factory = new FactoryProducer();

	//形状工厂
	$shapeFactory = $factory->getFactory('shape');
	$shape        = $shapeFactory->getShape('circle');

	print_r($shape->draw());

	//颜色工厂
	$colorFactory = $factory->getFactory('color');
	$color        = $colorFactory->getColor('red');

	print_r($color->fill());
?>