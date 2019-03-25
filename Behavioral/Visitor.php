<?php
	
	/**
	 * 访问者模式
	 *
	 * 数据结构和数据分离
	 * 
	 */

    //定义元素
    abstract class User {

        abstract public function accept($visitor);
    }

    class VipUser extends User {

        public function accept($visitor)
        {
            $visitor->visitVip($this);
        }
    }

    class NormalUser extends User {

        public function accept($visitor)
        {
            $visitor->visitNormal($this);
        }
    }

    //定义访问者
    abstract class UserVisitor {

        abstract public function visitVip($user);
        abstract public function visitNormal($user);
    }

    //访问者实现
    class PointActVisitor extends UserVisitor {

        public function visitVip($user) 
        {

            print_r('vip user +10 point'.PHP_EOL);
        }

        public function visitNormal($user)
        {
            print_r('normal user +5 point'.PHP_EOL);
        }
    }

    class Users {

        public $user = array();

        public function add($user) {

            $this->user[] = $user;
        }

        public function handleVisitor($visitorUser)
        {

            foreach ($this->user as $user) {
                $user->accept($visitorUser);
            }
        }
    }

    $users = new Users();

    $users->add(new VipUser());
    $users->add(new VipUser());
    $users->add(new NormalUser());

    $users->handleVisitor(new PointActVisitor());

?>