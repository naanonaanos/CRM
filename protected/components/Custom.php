<?php
date_default_timezone_set('Asia/Jakarta');
class Custom extends CApplicationComponent
{
	private $_model;
	private $yearNow;
	private $monthNow;
	
	function getBrowser()
	{
		$browser = '';
		if(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), strtolower("MSIE")))
			$browser = 'Internet Explorer';
		elseif(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), strtolower("Presto")))
			$browser = 'Opera';
		elseif(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), strtolower("CHROME")))
			$browser = 'Chrome';
		elseif(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), strtolower("Safari")))
			$browser = 'Safari';
		elseif(strpos(strtolower($_SERVER['HTTP_USER_AGENT']), strtolower("FIREFOX")))
			$browser = 'Mozilla Firefox';
		else
			$browser = 'Other';
			
		return $browser;
	}
	
	public function setDir($string)
	{
		$array = explode('/', $string);
		$dirBase = '';
		
		if(!is_dir($dirBase))
		{
			for($i=0; $i<count($array); $i++)
			{
				$dirBase .= $array[$i].'/';
				
				if(!is_dir($dirBase))
					mkdir($dirBase, 0777);
			}
			$dir = $dirBase;
		}
		return $dir;
	}
	
	public function createZipFile($sourceFolder, $fileZip, $isDownload = false)
	{
		$scan = scandir($sourceFolder);
		$arrayFile = array();
		
		for($i=2; $i<count($scan); $i++)
		{
			$arrayFile[] = $scan[$i];
		}
		
		$zip = new ZipArchive;
		
		if ($zip->open($fileZip, ZipArchive::CREATE)!==TRUE) 
			exit("cannot open <$archive_file_name>\n");
			
    	foreach($arrayFile as $file)
		{
			$zip->addFile($sourceFolder.$file, $file);			
		}
		$zip->close();
		
		if($isDownload)
			$this->downloadFile($fileZip, $sourceFolder);
	}
	
	public function uploadImage($uploadPath, $uploadedImage, $newFilename, $resize = true)
	{
		$arrFormat = explode('/', $uploadedImage->getType());
		if($arrFormat[0] == 'image')
			$fileFormat = $arrFormat[1];
		
		if($uploadPath)
			$uploadedImage->saveAs(dirname(Yii::app()->basePath).'/'.$uploadPath.$newFilename.'.'.$fileFormat);
		
		if($resize == true)
			$this->resizeImage($uploadPath.$newFilename.'.'.$fileFormat);
		
		return $uploadPath.$newFilename.'.'.$fileFormat;
	}
	
	public function setUploadDir($string)
	{
		$this->yearNow = date('Y', strtotime('now'));
		$this->monthNow = date('m', strtotime('now'));
		
		$array = explode('/', $string);
		$dirBase = '../scrip_apps/public/upload/'.$this->yearNow.'/'.$this->monthNow;
		
		$dir = $dirBase.'/'.$string;
		if(!is_dir($dir))
		{
			for($i=0; $i<count($array); $i++)
			{
				if(!is_dir('../scrip_apps/public/upload/'.$this->yearNow))
					mkdir('../scrip_apps/public/upload/'.$this->yearNow, 0777);
				if(!is_dir('../scrip_apps/public/upload/'.$this->yearNow.'/'.$this->monthNow))
					mkdir('../scrip_apps/public/upload/'.$this->yearNow.'/'.$this->monthNow, 0777);
					
				$dirBase .= '/'.$array[$i];
				
				if(!is_dir($dirBase))
					mkdir($dirBase, 0777);
			}
			 
			unset($dir);
			$dir = $dirBase;
		}
		$uploadedDir = $dir.'/';
		return $uploadedDir;
	}
	
	public function resizeImage($filename, $w = 400, $h = 400, $rename = '')
	{
		$img = Yii::app()->image->load($filename);
		$img->resize($w, $h);
		$img->save();
		
		if($rename)
			rename($filename, $rename);
			
		unset($img);
		return true;
	}
	
	public function downloadFile($fileName, $source)
	{
		header("Content-type: application/zip");
		header("Content-Disposition: attachment; filename = $fileName");
		header("Pragma: no-cache");
		header("Expires: 0");
		readfile("$fileName");
		
		unlink($fileName);
		$this->deleteFileFolder($source);
		exit;
	}
	
	public function deleteFileFolder($source)
	{
		$scan = scandir($source);
		if($scan > 1)
		{
			for($i=2; $i<count($scan); $i++)
			{
				$filename = $scan[$i];
				unlink($source.$filename);
			}
		}
	}
		
	public function setIdRandomString($model, $column, $string = '', $length, $type)
	{	
		if($type == "Number")
			$characters = '0123456789';
		if($type == "Letter")
			$characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		if($type == "String")
			$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			
    	$customstring = '';
    	for ($i=0; $i<$length; $i++) 
		{
        	$customstring .= $characters[rand(0, strlen($characters) - 1)];
    	}
		
		$random = $string.$customstring;
		$this->_model = $model::model()->findByAttributes(array($column=>$random));
		if($this->_model)
			return $this->setIdRandomString($model, $column, $string, $length);
		else
			return $random;
	}
       
	public function setCounterNumber($model, $column, $name)
	{
		$counterNumber = '';
		$getcounter = Counter::model()->findByAttributes(array('name'=>$name));
		if($getcounter)
		{
			$date = date('Y-m-d H:i:s');
			$year = date('Y', strtotime($date));
			$month = date('m', strtotime($date));
			$cntr = "";
			if(strlen($getcounter->counter) == 1)
				$cntr = '0000'.$getcounter->counter;
			if(strlen($getcounter->counter) == 2)
				$cntr = '000'.$getcounter->counter;
			if(strlen($getcounter->counter) == 3)
				$cntr = '00'.$getcounter->counter;
			if(strlen($getcounter->counter) == 4)
				$cntr = '0'.$getcounter->counter;
			if(strlen($getcounter->counter) >= 5)
				$cntr = $getcounter->counter;
				
			$counterNumber = $name.$year.$month.$cntr;
			$update_counter = Counter::model()->findByPk($getcounter->counter_id);
			if($update_counter)
			{
				$update_counter->counter += 1;
				$update_counter->save();
			}
		}
		
		$check = $model::model()->findByAttributes(array($column=>$counterNumber));
		if($check)
			return $this->setCounterNumber($model, $column, $name);
		else
			return $counterNumber;
	}

	public function getNumber($model, $column, $name)
	{
		$counterNumber = '';
		$getcounter = Counter::model()->findByAttributes(array('name'=>$name));
		if($getcounter)
		{
			$date = date('Y-m-d H:i:s');
			$year = date('Y', strtotime($date));
			$array_bln = array("01"=>"I","02"=>"II","03"=>"III","04"=>"IV","05"=>"V","06"=>"VI","07"=>"VII","08"=>"VIII","09"=>"IX","10"=>"X","11"=>"XI","12"=>"XII");
			// echo var_dump($array_bln);exit;
			$month = $array_bln[date('m')];
		 	$cntr = "";
			if(strlen($getcounter->counter) == 1)
				$cntr = '0000'.$getcounter->counter;
			if(strlen($getcounter->counter) == 2)
				$cntr = '000'.$getcounter->counter;
			if(strlen($getcounter->counter) == 3)
				$cntr = '00'.$getcounter->counter;
			if(strlen($getcounter->counter) == 4)
				$cntr = '0'.$getcounter->counter;
			if(strlen($getcounter->counter) >= 5)
				$cntr = $getcounter->counter;
				
			$counterNumber = $cntr.'/'.$name.'/'.$month.'/'.$year;
		}
		
		$check = $model::model()->findByAttributes(array($column=>$counterNumber));
		if($check)
			return $this->getNumber($model, $column, $name);
		else
			return $counterNumber;
	}

	public function getWaybillBooking($courier_id, $is_standard)
	{
		$waybillNumber = '';
		$checkWaybill = WaybillBooking::model()->findByAttributes(array(
			'courier_id'=>$courier_id,
			'is_standard'=>$is_standard,
			'active'=>0
		));
		if($checkWaybill)
		{
			$waybillNumber = $checkWaybill->waybill_number;
			$update_waybill = WaybillBooking::model()->findByPk($checkWaybill->waybill_booking_id);
			if($update_waybill)
			{
				$update_waybill->active = 1;
				$update_waybill->save();
			}
			
			$check = OrderHeader::model()->findByAttributes(array($awb_number=>$waybillNumber));
			if($check)
				return $this->getWaybillBooking($courier_id, $is_standard);
			else
				return $waybillNumber;
		}
		else
			return "";
	}
	
	public function createLogFile($filename, $content)
	{
		if(!is_file($filename))
			$this->createBlankFile($filename);
		
		$read = file_get_contents($filename);
		$read .= $content;
			
		file_put_contents($filename, $read);
	}
	
	public function createBlankFile($filename)
	{
		if(!is_file($filename))
		{
			$file = fopen($filename, 'w');
			fclose($file);
		}
	}

	public function modelValidate($model)
	{
		$messages = "";
		$error = "";
		$model->validate();
		if(count($model->getErrors()) > 0)
		{
			foreach($model->getErrors() as $err)
			{
				for($x=0; $x<=count($err)-1; $x++)
				{
					$error .= $err[$x];
				}
			}
			$messages .= $error;
		}
		else
			$messages .= 'FAILED';
		
		return $messages;
	}
}			