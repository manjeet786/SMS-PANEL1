


		
<?php
//get the text in textarea and shred it!
if(isset($_POST['textXML']))
	$a=preg_split("/[\,]/",$_POST['pastedXML']);
foreach($a as $arr)
{
	echo $arr."<br>";
}
	
	// echo $_POST['pastedXML'];

?>





<html>
 <body>	
   <form method='post' method='form.php'>
     <p>
        <textarea name="pastedXML" rows="10" cols="30">
	    
        </textarea>
     </p>			
      <p>
         <input type="submit" value="Convert to SQL" name="textXML" />
      </p>
   </form>
		
  </body>
</html>