# Zip code Distance PHP API 

Enter two Zip Codes and get the distance between them in meter. 

## Example
Calculate the distance between 'Bellevue, Washington' (98004) and 'Los Angeles, Kalifornien' (90001).

````PHP
require_once('ZipDistance.php');

$Distance = new ZipDistance(YOUR_API_KEY_HERE);
$dist = $Distance->getDistance(98004, 90001);
