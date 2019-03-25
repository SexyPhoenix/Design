<?php
	
	/**
	 * 命令模式
	 *
	 * 数据驱动。请求封装成对象，用不同的请求对客户进行参数化
	 * 
	 */

    interface Order {

        public function execute();
    }

    //请求类
    class Stock {

        private $name     = 'ABC';
        private $quantity = 10;

        public function buy()
        {
            print_r('Stock [ Name :' . $this->name . ' Quantity：'. $this->quantity . ' ] bought'. PHP_EOL);
        }

        public function sell()
        {
            print_r('Stock [ Name :' . $this->name . ' Quantity：'. $this->quantity . ' ] sold'. PHP_EOL);
        }
    }

    //预定
    class BuyStock implements Order {

        public $stock;

        public function __construct($stock)
        {
            $this->stock = $stock;
        }

        public function execute()
        {
            $this->stock->buy();
        }
    }

    //下单
    class SellStock implements Order {

        public $stock;

        public function __construct($stock)
        {
            $this->stock = $stock;
        }

        public function execute()
        {
            $this->stock->sell();
        }
    }

    //命令调用类
    class Broker {

        public $arrayStock = array();

        public function takeOrder($order)
        {
            $this->arrayStock[] = $order;
        }

        public function placeOrders()
        {

            foreach ($this->arrayStock as $stock) {
                
                $stock->execute();
            }

            $this->arrayStock = array();

        }
    }

    $stock      = new Stock();

    $buyStock   = new BuyStock($stock);
    $sellStock  = new SellStock($stock);

    $broker = new Broker();
    $broker->takeOrder($buyStock);
    $broker->takeOrder($sellStock);

    $broker->placeOrders();


?>