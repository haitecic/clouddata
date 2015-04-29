<html>
<head>
<meta charset='utf-8'>
</head>
<?php
//連結到本機端資料庫project_resource
$database_host="localhost";
$username="root";
$password="1q2w3e4r";
$database_name="project_resource";
$db_connect=mysql_connect($database_host, $username, $password);
$db_select=mysql_select_db($database_name);
mysql_query("SET NAMES utf8");//與資料庫傳遞時中文編碼確認

//判斷檔案是否已經被轉檔
$results=mysql_query("select id, instance_file_name, convert_to_pdf, project_id from project_attachment");
$num=mysql_num_rows($results);
$ready_to_convert=array();
for($i=0; $i<$num; $i++)
   {
   if(!mysql_result($results, $i, 'convert_to_pdf'))
     {
	 $attachment_id=mysql_result($results, $i, 'id');
	 $filename=mysql_result($results, $i, 'instance_file_name');
	 $project_id=mysql_result($results, $i, 'project_id');
	 $filename_array=explode('.', $filename);
	 $filename=$filename_array[0];
	 $type=$filename_array[1];
	 $ready_data=array("attachment_id"=>$attachment_id, "filename"=>$filename, "type"=>$type, "dir_name"=>$project_id);
	 array_push($ready_to_convert, $ready_data);
	 }
   }

  //若都轉檔完成則跳出 
  if(count($ready_to_convert)==0)
  {
  exit();
  }

//轉檔
$attachment_path=$_SERVER['DOCUMENT_ROOT'] . "/project_management/application/assets/project_attachment/";
for($j=0; $j<count($ready_to_convert); $j++)
    {
	$old_file_name = $attachment_path . $ready_to_convert[$j]['dir_name'] . '/' . $ready_to_convert[$j]['filename'] . '.' .$ready_to_convert[$j]['type'];

	//計入資料庫，表示已經被轉檔
    $query="update project_attachment set convert_to_pdf='" . $ready_to_convert[$j]['filename'] . ".pdf' where id='" . $ready_to_convert[$j]['attachment_id'] . "'";
    mysql_query($query);

	//建立對應的儲存轉檔資料夾 
	$dir_path=$attachment_path . $ready_to_convert[$j]['dir_name'] ."_convert";
	$dir=array_filter(glob($dir_path, GLOB_MARK), 'isdir');
	if(count($dir)==0)
		{
		mkdir($dir_path,0777);
		}
		
    //轉pdf(非pdf)
	if($ready_to_convert[$j]['type']!='pdf')
		{
		$pdf_file_name = $dir_path . '/' . $ready_to_convert[$j]['filename'] . '.pdf';
		$unoconv_command = "sudo unoconv -f pdf -o $pdf_file_name $old_file_name";
		exec($unoconv_command);	
		}

	//轉圖
	$var_return='0';//當pdf每一張都轉成png時，var_return會回傳'1'
	for($x=0; $var_return==0; $x++)
		{
		$photo_file_name = $dir_path . '/' . $ready_to_convert[$j]['filename'] . '_' .$x . '.png';
		if($ready_to_convert[$j]['type']!='pdf')
			{
			$imagemagick_command = "sudo convert $pdf_file_name" . "[" . $x . "] -colorspace RGB -geometry 2000 $photo_file_name";
			}
		else{
			$imagemagick_command = "sudo convert $old_file_name" . "[" . $x . "] -colorspace RGB -geometry 2000 $photo_file_name";
			}
		exec($imagemagick_command, $output, $var_return);
		if($var_return!=0) break;
		//轉圖資訊紀錄於資料庫
		$photofilename = $ready_to_convert[$j]['filename'] . '_' .$x . '.png';
		$query="insert into project_attachment_pdf_to_image (project_id, project_attachment_id, file_name) 
		        value ('{$ready_to_convert[$j]['dir_name']}', '{$ready_to_convert[$j]['attachment_id']}', '{$photofilename}')";
		mysql_query($query);
		}

	
	//轉文字
	$text_file_name = $dir_path . '/' . $ready_to_convert[$j]['filename'] . '.txt';
		if($ready_to_convert[$j]['type']!='pdf')
			{
			$text_command = "sudo pdftotext $pdf_file_name $text_file_name";
			}
		else{
			$text_command = "sudo pdftotext $old_file_name $text_file_name";
			}
	exec($text_command);
	
	//存入資料庫
	$text=file_get_contents($text_file_name);
	$text = preg_replace('/\s+/', '', $text);
	$query="update project_attachment set file_content='" . $text . "' where id='" . $ready_to_convert[$j]['attachment_id'] . "'";
	mysql_query($query);
	
	}
echo 'successful';
//判斷是否該路徑為資料夾
function isdir($path_dir_string)
                {
				$end_string=substr($path_dir_string, -1);
			    if($end_string=="/")
				  {
				  return true;
				  }
				return false;
				}
?>
</html>