<?php
$user = 'root';
$pass = '';
$db = 'miniblog';
$host = 'localhost';
if(!$dbconnect = mysqli_connect('localhost', 'root', '')) {
 echo "Connection failed to the host 'localhost'.";
 exit;
} // if
if (!mysqli_select_db($dbconnect,'tes_db')) {
 echo "Cannot connect to database 'test'";
 exit;
} // if
# code...
$table_id="user";
$query = "SELECT * FROM posting";
$dbresult = mysqli_query($dbconnect,$query);
if(!$dbresult){
 die("Couldn't Execute Query
".mysqli_error($dbconnect));
 }
// create a new XML document
$doc = new DomDocument('1.0');
// create root node
$root = $doc->createElement('users');
$root = $doc->appendChild($root);
// process one row at a time
while($row = mysqli_fetch_assoc($dbresult)) {
 // add node for each row
 $occ = $doc->createElement($table_id);
 $occ = $root->appendChild($occ);
 // add a child node for each field
 foreach ($row as $fieldname => $fieldvalue) {
 $child = $doc->createElement($fieldname);
 $child = $occ->appendChild($child);
 $value = $doc->createTextNode($fieldvalue);
 $value = $child->appendChild($value);
 } // foreach
} // while
// get completed xml document
$xml_string = $doc->saveXML();
$myFile = "rss.xml";
$fh = fopen($myFile, 'w') or die("can't open file");
fwrite($fh, $xml_string);
// header("location: rss.xml");
$doc = new DOMDocument();
$doc->load( 'rss.xml' );
$users = $doc->getElementsByTagName( "user" );
foreach( $users as $user )
{

$juduls = $user->getElementsByTagName( "judul" );
$judul = $juduls->item(0)->nodeValue;

echo "$id_book - $ISBN - $judul\n";
}
?>
?>
