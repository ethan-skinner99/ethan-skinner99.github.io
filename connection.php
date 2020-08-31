

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$sports_arr = array();
$sports_arr[] = "Basketball";
$sports_arr[] = "Baseball";
$sports_arr[] = "Football";

$position = array();
$position['Basketball'][] = "Power Forward";
$position['Basketball'][] = "Small Forward";
$position['Basketball'][] = "Center";
$position['Soccer'][] = "Center Forward";
$position['Soccer'][] = "Right Wing";
$position['Soccer'][] = "Left Wing";
$position['Football'][] = "Halfback";
$position['Football'][] = "Fullback";
$position['Football'][] = "Wide Reciever";
$position['Football'][] = "Tight End";
$position['Football'][] = "Center";

echo '<pre>';
print_r($position);
echo '</pre>';

?>


<div class="home">
    <select id="s1">
        <?php foreach($sports_arr as $sa) { ?>
        <option value="<?php echo $sa; ?>"><?php echo $sa; ?></option>
        <?php } ?>
    </select>
    <select id="s2">
    </select>
</div>

<script type="text/javascript">
var s1= document.getElementById("s1");
var s2 = document.getElementById("s2");
onchange(); //Change options after page load
s1.onchange = onchange; // change options when s1 is changed

function onchange() {
    <?php foreach ($sports_arr as $sa) {?>
        if (s1.value == '<?php echo $sa; ?>') {
            option_html = "";
            <?php if (isset($position[$sa])) { ?> // Make sure position is exist
                <?php foreach ($position[$sa] as $value) { ?>
                    option_html += "<option><?php echo $value; ?></option>";
                <?php } ?>
            <?php } ?>
            s2.innerHTML = option_html;
        }
    <?php } ?>
}
</script>

<label for="number">Number Selection</label>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
//connection to db
$dbhost = "localhost:3306"; /*most of the time it's localhost*/
$username = "root";
$password = "Hos3nuw3";
$dbname = "rocket_numbers";
$connection = mysqli_connect($dbhost, $username, $password,$dbname); //It connects
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    exit();
}
        
$result = mysqli_query($connection, "SELECT * FROM rocket");
mysqli_close($connection);
?>


<select name="number">

<?php
while ($row = mysqli_fetch_array($result)) {
    
    echo "<option value='" . $row['rocket_number'] . "'>" . $row['rocket_number'] . "</option>";
}
?>
</select>  

