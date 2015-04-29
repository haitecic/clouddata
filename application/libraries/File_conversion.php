<?php 
require_once('application/libraries/Smalot/PdfParser/Parser.php');
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class File_conversion{  //File_conversion
    
	private $filename;

    /*public function __construct($filePath) {
        $this->filename = $filePath;
    }*/
	
	public function __construct() {
	
    }
	
	public function set_filename($file_path)
	{
		$this->filename = $file_path;
	}

    private function read_doc() 
	{
        $fileHandle = fopen($this->filename, "r");
        $line = @fread($fileHandle, filesize($this->filename));   
        $lines = explode(chr(0x0D),$line);
        $outtext = "";
        foreach($lines as $thisline)
          {
            $pos = strpos($thisline, chr(0x00));
            if (($pos !== FALSE)||(strlen($thisline)==0))
              {
              } else {
                $outtext .= $thisline." ";
              }
          }
         $outtext = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/","",$outtext);
        return $outtext;
    }
	
	/**
	萃取docx檔中的純文字內容
	*/
    private function read_docx()
	{

        $striped_content = '';
        $content = '';

        $zip = zip_open($this->filename);

        if (!$zip || is_numeric($zip)) return false;

        while ($zip_entry = zip_read($zip)) {

            if (zip_entry_open($zip, $zip_entry) == FALSE) continue;

            if (zip_entry_name($zip_entry) != "word/document.xml") continue;

            $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

            zip_entry_close($zip_entry);
        }// end while

        zip_close($zip);

        $content = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $content);
        $content = str_replace('</w:r></w:p>', "\r\n", $content);
        $striped_content = strip_tags($content);

        return $striped_content;
    }

	/**
	萃取xlsx檔中的純文字內容
	*/
	
	function xlsx_to_text($input_file){
		$xml_filename = "xl/sharedStrings.xml"; //content file name
		$zip_handle = new ZipArchive;
		$output_text = "";
		if(true === $zip_handle->open($input_file)){
			if(($xml_index = $zip_handle->locateName($xml_filename)) !== false){
				$xml_datas = $zip_handle->getFromIndex($xml_index);
				$xml_handle = DOMDocument::loadXML($xml_datas, LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);
				$output_text = strip_tags($xml_handle->saveXML());
			}else{
				$output_text .="";
			}
			$zip_handle->close();
		}else{
		$output_text .="";
		}
		return $output_text;
	}

	/**
	萃取pptx檔中的純文字內容
	*/
	function pptx_to_text($input_file)
	{
		$zip_handle = new ZipArchive;
		$output_text = "";
		if(true === $zip_handle->open($input_file)){
			$slide_number = 1; //loop through slide files
			while(($xml_index = $zip_handle->locateName("ppt/slides/slide".$slide_number.".xml")) !== false){
				$xml_datas = $zip_handle->getFromIndex($xml_index);
				$xml_handle = DOMDocument::loadXML($xml_datas, LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);
				$output_text .= strip_tags($xml_handle->saveXML());
				$slide_number++;
			}
			if($slide_number == 1){
				$output_text .="";
			}
			$zip_handle->close();
		}else{
		$output_text .="";
		}
		return $output_text;
	}

	/**
	萃取ppt檔中的純文字內容
	*/
	function ppt_to_text($filename)
	{
		// This approach uses detection of the string "chr(0f).Hex_value.chr(0x00).chr(0x00).chr(0x00)" to find text strings, which are then terminated by another NUL chr(0x00). [1] Get text between delimiters [2] 
		$fileHandle = fopen($filename, "r");
		$line = @fread($fileHandle, filesize($filename));	
		$lines = explode(chr(0x0f),$line);
		$outtext = '';
		foreach($lines as $thisline) {
			if (strpos($thisline, chr(0x00).chr(0x00).chr(0x00)) == 1) {
				$text_line = substr($thisline, 4);
				$end_pos   = strpos($text_line, chr(0x00));
				$text_line = substr($text_line, 0, $end_pos);
				$text_line = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/","",$text_line);
				if (strlen($text_line) > 1) {
					$outtext.= substr($text_line, 0, $end_pos)."\n";
				}
			}
		}
		return $outtext;
	}
	/**
	萃取pdf檔中的純文字內容
	*/
	function pdf_to_text($filename)  
	{
		$parser = new \Smalot\PdfParser\Parser();
		$pdf = $parser->parseFile($filename);
		//Retrieve all pages from the pdf file.
		$pages  = $pdf->getPages();
 		//Loop over each page to extract text.
		$content = '';
		foreach ($pages as $page) 
		{
			$content .= $page->getText();
		}
		return $content;
	}
	/**
	萃取xls檔中的純文字內容
	*/
	function xls_to_text($filename)  
	{
    include 'Smalot/Classes/PHPExcel/IOFactory.php';
    $inputFileName = $filename;
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objReader->setLoadAllSheets();
    $objPHPExcel = $objReader->load($inputFileName);


       $SheetNames=$objPHPExcel->getSheetNames();
    $i=0;
    $j=0;
    $rowstring="";
    $arrayrow=array();
    foreach ($SheetNames as $k) {
                            $objWorksheet=$objPHPExcel->getSheetByName($k);

                             foreach ($objWorksheet->getRowIterator() as $row) {
		
                                      $cellIterator = $row->getCellIterator();
                                      $cellIterator->setIterateOnlyExistingCells(false); // This loops all cells,
                                                                                         // even if it is not set.
                                                                                         // By default, only cells
                                                                                         // that are set will be
                                                                                         // iterated.
                                                 foreach ($cellIterator as $cell) {
                                                          $rowstring=$rowstring . ";" .$cell->getValue();
                                                          $i=$i+1; 
                                                                                  }
                                      $arrayrow[$j]=$rowstring;

                                      $rowstring="";
                                      $i=0;
                                      $j=$j+1;
                                                                               }
                             $SheetData[$k]=implode(";", $arrayrow);
                             $j=0;  
							}
    $content=implode(";", $SheetData);
	return $content;
	}
    public function convertToText($new_file_dir, $file_completename) {
		
		/*判斷檔案是否存在*/
        if(isset($this->filename) && !file_exists($this->filename)) 
		{
            return "File Not exists";
        }

        $fileArray = pathinfo($this->filename);
        $file_ext  = $fileArray['extension'];
        if($file_ext == "docx" || $file_ext == "pptx" || $file_ext == "xls" || $file_ext == "xlsx")
        {
            /*if($file_ext == "doc") 
			{
                return $this->read_doc($this->filename);
            } 
			else if($file_ext == "docx") 
			{
                return $this->read_docx($this->filename);
            }
			else if($file_ext == "xls") 
			{
                return $this->xlsx_to_text($this->filename);
            }
			else if($file_ext == "xlsx") 
			{
                return $this->xlsx_to_text($this->filename);
            } 
			else if($file_ext == "ppt") 
			{
                return $this->ppt_to_text($this->filename);
            }
			else if($file_ext == "pptx") 
			{
                return $this->pptx_to_text($this->filename);
            }
			else if($file_ext == "pdf")
			{
				return $this->pdf_to_text($this->filename);
			}*/
			switch($file_ext)
			{
				case "docx":
					return $this->read_docx($this->filename);
					break;
				case "pptx":
					return $this->pptx_to_text($this->filename);
					break;
				case "pdf":
					return $this->pdf_to_text($this->filename);
					break;
				case "xlsx":
					return $this->xls_to_text($this->filename);
					break;
				case "xls":
					return $this->xls_to_text($this->filename);
					break;					
			}
			/*
			if($file_ext == "docx") 
			{
                return $this->read_docx($this->filename);
            }
			else if($file_ext == "pptx") 
			{
                return $this->pptx_to_text($this->filename);
            }
			else if($file_ext == "pdf")
			{
				return $this->pdf_to_text($this->filename);
			}*/
        }
		/*else 
		{
            return "Invalid File Type";
        }*/
    }
}
?>