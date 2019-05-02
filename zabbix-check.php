<?PHP
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);

require('wp-load.php');
require('wp-admin/includes/update.php');
print "Currently: ".$wp_version;

$updates = get_core_updates();
if ( !isset($updates[0]->response) || 'latest' == $updates[0]->response ) {
echo ', no update needed';
} else {
echo ', update needed';
}
?>