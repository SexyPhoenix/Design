<?php
	
	/**
	 * 建造者模式
	 *
	 * 将一个复杂的构建与其表象分类，同样的构建过程可以创建不同的表示
	 * 优点： 建造者独立，可以扩展。  
	 * 
	 */
	
	//一个食物条目接口
	interface Item {

		public function name();
		public function packing();
		public function price();
	}

	//食物包装接口
	interface Packing {

		public function pack();
	}

	//纸盒
	class Wrapper implements Packing {

		 public function pack() 
		 {
		 	return 'Wrapper';
		 }
	}

	//瓶装
	class Bottle implements Packing {

		public function pack() 
		{
			return 'Bottle';
		}
	}

	//抽象汉堡
	Abstract class Burger implements Item {

		public function packing()
		{
			return new Wrapper();
		}

		Abstract public function price();
	}

	//抽象冷饮
	Abstract class ColdDrink implements Item {

		public function packing()
		{
			return new Bottle();
		}

		Abstract public function price();
	}

	//素食汉堡
	class VegBurger extends Burger {

		public function name() {

			return 'Veg';
		}

		public function price() {

			return '8';
		}
	}

	//鸡肉汉堡
	class ChickenBurger extends Burger {

		public function name() {

			return 'Chicken';
		}

		public function price() {

			return '10';
		}
	}

	//可口可乐
	class Coke extends ColdDrink {

		public function name() {

			return 'Coke';
		}

		public function price() {

			return '5';
		}
	}

	//百事
	class Pepsi extends ColdDrink {

		public function name() {

			return 'Pepsi';
		}

		public function price() {

			return '5';
		}
	}

	//食物组合
	class Meal {

		public $item = array();

		public function addItem($item)
		{
			$this->item[] = $item;
		}

		public function showItems()
		{
			foreach ($this->item as $item) 
			{
				print('Item: ' .$item->name().PHP_EOL);
				print('Packing: ' .$item->packing()->pack().PHP_EOL);
				print('Price: ' .$item->price().PHP_EOL);
			}
		}

		public function getCost() 
		{

			$cost = 0;
			foreach ($this->item as $item) {
				$cost += $item->price();
			}

			return $cost;
		}
	}

	//创建食物组合对象
	class MealBuilder {

		public function prepareVegMeal()
		{
			$meal = new Meal();
			$meal->addItem(new VegBurger());
			$meal->addItem(new Coke());

			return $meal;
		}

		public function prepareNonVegMeal()
		{
			$meal = new Meal();
			$meal->addItem(new ChickenBurger());
			$meal->addItem(new Pepsi());

			return $meal;
		}		
	}

	$mealBuilder = new MealBuilder();

	print('Veg Meal'.PHP_EOL);
	$vegMeal = $mealBuilder->prepareVegMeal();
	$vegMeal->showItems();
	print('Total Cost: '. $vegMeal->getCost().PHP_EOL);

	print('NonVeg Meal'.PHP_EOL);
	$nonVegMeal = $mealBuilder->prepareNonVegMeal();
	$nonVegMeal->showItems();
	print('Total Cost: '. $nonVegMeal->getCost().PHP_EOL);


?>