<?php
	
	/**
	 * 代理模式
	 *
	 * 为其他对象提供一种代理以控制对这个对象的访问。
	 * 
	 */

	interface Image {
		public function display();
	}

    class RealImage implements Image {

        public $filename;

        public function __construct($filename)
        {
            $this->filename = $filename;
        }

    	public function display()
    	{
    		print_r($this->filename.' is Loading...'.PHP_EOL);
            print_r($this->filename.' display finished'.PHP_EOL);
    	}
    }

    class ProxyImage implements Image {

        public $filename;

        public $realImage = null;

        public function __construct($filename)
        {
            $this->filename = $filename;
        }

    	public function display()
    	{
    		if(null == $this->realImage) $realImage = new RealImage($this->filename);

            $realImage->display();             
    	}
    }

    $proxyImage = new ProxyImage('test_10mb.jpg');
    $proxyImage->display();

?>