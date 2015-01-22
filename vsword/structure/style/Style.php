<?php
/**
*  Class Style
*
*  @version 1.0.0
*  @author v.raskin
*/
abstract class Style {

	protected static $num = 0;
	
	protected $sid;
	
	public function getStyleId() {
		if(is_null($this->sid)) {
			$this->sid = 'ia'.( ++ self::$num  );
		}
		return $this->sid; 
	}
	
	public function getName() {
		return get_class($this).' '.$this->getStyleId();
	}

	abstract public function getStyle();
} 