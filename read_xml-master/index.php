<?php
include 'XmlParser.php';
$fileXml     ='bkav.xml';
$fileContent = trim(file_get_contents($fileXml));
$oXmlParser = new xmlParser();
$ssString   = $fileContent;
$asArray    = $oXmlParser->xml2array($ssString);
$result = $oXmlParser->recursiveFind($asArray, "INV:SELLERAPPRECORDID");
print_r($result);
?>