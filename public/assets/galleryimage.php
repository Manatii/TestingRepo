<?php
	 try{
					$dsn = "mysql:dbname=kasiclassifieds";
					$username = "root";
					$password = "";
					$conn = new PDO( $dsn, $username, $password );
				} 
				catch ( PDOException $e ){ 
					echo "Connection failed: " . $e-> getMessage();
				}
				
				$adId= $_GET["adid"];		
				
								  $imageName = "";
								 
								
		      $path = "../images/item/tp";
		      $thumb_height = 460;
			$thumb_width = 816;	
			    
								      
				$query = "Select name1  from  images where adid = '$adId'";
				$rows = $conn->query($query);
	           foreach( $rows as $row2)
				{   
					$imageName =  $row2['name1'];
					$mainImage = imagecreatefromjpeg($path."/".$imageName );
					$mainWidth = imagesx( $mainImage );
					$mainHeight = imagesy( $mainImage );
					$thumbWidth = intval( $mainWidth /10 );
					$thumbHeight = intval( $mainHeight /10 );
					$myThumbnail = imagecreatetruecolor( $thumb_width , $thumb_height );
					imagecopyresampled( $myThumbnail, $mainImage, 0, 0, 0, 0, $thumb_width,
					$thumb_width, $mainWidth, $mainHeight );
					header( "Content-type: image/jpeg" );
					imagejpeg( $myThumbnail );
					imagedestroy( $myThumbnail );
					imagedestroy( $mainImage );

								   
		        }
								
									

// $thumb_height = 85;
// $thumb_width = 115;		



						  
									  


							  



?>