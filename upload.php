<?php
/*
 * upload.php
 */
include('includes/header.php'); 
?>
<h2>Single File</h2></header>
      <main>
<?php
if(isset($_FILES['file'])) {
  $file  = $_FILES['file'];
  //print_r($file);
  //file properties
  $file_name = $file['name'];
  $file_temp= $file['tmp_name']; 
  $file_size= $file['size']; 
  $file_error= $file['error']; 
  //file ext
  $file_ext = explode('.', $file_name);
  $file_ext = strtolower(end($file_ext));
  $allowed = array('txt','jpg','png');
  if(in_array($file_ext,$allowed)){
    if($file_error === 0){
          	
      if($file_size<=2097152){
	$file_name_new = uniqid('',true). '.' . $file_ext;
	$file_destination = 'uploads/' . $file_name_new;
	if(move_uploaded_file($file_temp,$file_destination)){
	  echo  '<a href="/' . $file_destination . '"> Your file</a>';	
	  
	}
      }
    }

  }
 /* print_r($file_name);
  echo'<br>';
  print_r($file_ext);
  echo'<br>';
  print_r($file_name_new);
  echo'<br>';
  print_r($file_destination);
*/
}
?>
      </main>
<footer></footer>
  </body>
</html>

