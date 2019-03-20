<?php
	
	/**
	 * 单例模式
	 *
	 * 注意点：
	 *   1、只有一个实例
	 *   2、必须自己实例化(构造函数私有)
	 *   3、对外对象提供这一实例
	 * 
	 * 优点： 全局只有一个实例。
	 *
	 * 
	 * 
	 */

	class Single {

		private static $instance;

		private function __construct() {}

		public static function getInstance(){

			if(null == self::$instance) {

				self::$instance = new Single();
			}

			return self::$instance;
		}
	}

	print_r(Single::getInstance());
?>