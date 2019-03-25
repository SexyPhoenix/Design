<?php
	
	/**
	 * 观察者模式
	 *
	 * 一对多， 一个对象的变化通知所有的观察者
	 * 
	 */

    interface Observer {

        public function update();
    }

    abstract class EventGenerator {

        public $observer = array();

        public function attach($observer)
        {

            $this->observer[] = $observer;
        }

        public function notify()
        {
            foreach ($this->observer as $observer) {
                
                $observer->update();
            }
        }
    }

    class BinaryObserver implements Observer {

        public function update()
        {
            print_r('Binary String...'.PHP_EOL);
        }
    }

    class OctalObserver implements Observer {

        public function update()
        {
            print_r('Octal String...'.PHP_EOL);
        }
    }

    class HexaObserver implements Observer {

        public function update()
        {
            print_r('Hexa String...'.PHP_EOL);
        }
    }

    class Event extends EventGenerator {

        public function trigger()
        {
            $this->notify();
        }
    }

    $event = new Event();

    $event->attach(new BinaryObserver());
    $event->attach(new OctalObserver());
    $event->attach(new HexaObserver());

    $event->trigger();
?>