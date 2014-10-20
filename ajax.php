<?php

class Ajax {
    static $rootfolder;
    static $rooturl;

    private function getback($curimg,$offset){
        $files = glob($this->backpicsfolder()."/"."*.*");
        if(!count($files))
            return 'NO FILES!!!';
        foreach ($files as $key => $file)
            $files[$key] = basename($file);
        $key = array_search(basename($curimg), $files);
        if($key !== False)
            switch($offset){
            case 'prev':
                $key = $key - 1;
                break;
            case 'next':
                $key = $key + 1;
                break;
            case 'all':
                return implode($files, " ");
            }
        if($key < 0 or $key >= count($files))
            $key = 0;
        return dirname(self::$rooturl)."/images/back/".basename($files[$key]);
    }
    
	public function action_getback(){
        $imgsrc = $this->getback($_REQUEST['curimg'],$_REQUEST['offset']);
        include self::$rootfolder.'/subviews/ajax.php' ;
	}

	public function action_index(){
		$this->view->subview = 'kitchen';
	}
	
    public function backpicsfolder(){
        return dirname(self::$rootfolder)."/images/back";
    }
        
    function handleaction($action){
      echo $this->{'action_'.$action}();
    }
}

Ajax::$rootfolder = dirname(__FILE__);
Ajax::$rooturl = dirname($_SERVER['PHP_SELF']);
$Ajax = new Ajax();
$Ajax->handleaction($_REQUEST['action']);
?>