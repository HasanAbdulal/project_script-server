<?php 
/*
    ./core/functions.php
*/
namespace Core\Functions;

/**
 * Formatage d'une date avec format francophone par défaut
 *
 * @param string $date
 * @param string $format
 * @return string
 */
function formater_date(string $date, string $format = DATE_FORMAT) :string {
    $date = new \DateTime($date);
    return $date->format($format);
}

/**
 * RETURN A TRUNCATE STRING TO $length CHARACTERS
 *
 * @param string $string
 * @param [type] $length
 * @return string
 */
function truncate(string $string, int $length = TRUNCATE_LENGTH) :string {
    if (strlen($string) > $length):
        $string = substr($string, 0, strpos($string, ' ', $length)) . ' ...';
    endif;
    return $string;
}

/**
 * Return A SLUGIFIED STRING
 *
 * @param string $string
 * @return string
 */
function slugify(string $string) :string {
    return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $string), '-'));
}

/**
 * UPLOAD UN FILE    
 *
 * @param string $name
 * @param string $destination
 * @param integer $limit
 * @param array $authoriz
 * @return boolean
 */
function uploadFile(string $name, string $destination, int $limit = 2500000, $authoriz = array('jpeg', 'png', 'jpg', 'pdf')) :bool {
$file           = $_FILES[$name];
$fileName       = $file['name'];
$fileTmpName    = $file['template_name'];
$fileSize       = $file['size'];
$fileType       = $file['type'];
$fileError      = $file['error'];
$fExtension     = explode('.', $fileName);
$fileActualExt = strtolower(end($fExtension));
$permit = $authoriz;

    if(in_array($fileActualExt, $permit)) {
        if($fileError === 0) {
            if($fileSize < $limit) {
                $fNewName       = $fExtension[0] . "." . $fileActualExt;
                $fDestination   = $destination . $fNewName;
                move_uploaded_file($fileTmpName, $fDestination);
                return true;
            }
            else{
                echo "Votre image est supérieur au limite.";
                return false;
            }
        }
            else{
                echo "Une erreur se produit lors de l'upload.";
                return false;
            }
        }
    else{ 
        echo "Vous ne pouvez pas uploader une image de ce type.";
        return false;
    }
}