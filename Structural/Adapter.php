<?php
	
	/**
	 * 适配器模式
	 *
	 * 任何两个没有关联的类一起工作 
	 * 
	 */
	
	interface MediaPlayer {
		public function play($playerType, $filename);
	}

	interface AdvancedMediaPlayer {

		public function playVlc($filename);
		public function playMp4($filename);
	}

	//VLC播放器
	class VlcPlayer implements AdvancedMediaPlayer {

		public function playVlc($filename)
		{
			print_r($filename.' is play'.PHP_EOL);
		}

		public function playMp4($filename)
		{
			
		}
	}

	//MP4播放器
	class Mp4Player implements AdvancedMediaPlayer {

		public function playVlc($filename)
		{
			
		}

		public function playMp4($filename)
		{

			print_r($filename.' is play'.PHP_EOL);
		}
	}

	//适配器
    class MediaAdapter implements MediaPlayer {

    	public function getPlayer($playerType)
    	{
    		switch ($playerType) {
    			case 'vlc':
    				return new VlcPlayer();
    				break;
    			case 'mp4':
    				return new Mp4Player();
    				break;    				
    		}

    	}

    	public function play($playerType, $filename)
    	{

    		$MediaPlayer = $this->getPlayer($playerType);
    		switch ($playerType) {
    			case 'vlc':
    				return $MediaPlayer->playVlc($filename);
    				break;
    			case 'mp4':
    				return $MediaPlayer->playMp4($filename);
    				break; 

    		}
    	}

    }

	class AudioPlayer implements MediaPlayer {

		public function play($playerType, $filename)
		{
			if('vlc' == $playerType ||  'mp4' == $playerType) {

				$MediaAdapter = new MediaAdapter();
				return $MediaAdapter->play($playerType, $filename);
			}

			print_r('mp3 is play'.PHP_EOL);
		}
	}

	$AudioPlayer = new AudioPlayer();
	$AudioPlayer->play("mp3", "mp3 file");
	$AudioPlayer->play("vlc", "vlc file");
	$AudioPlayer->play("mp4", "mp4 file");


?>