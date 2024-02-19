<!-- Fill Dropdown Using Ajax -->

<?php
require '../include/connect.php';
if(isset($_POST['state_id'])){
    $state_id=$_POST['state_id'];
    $fetch_city="SELECT * FROM city WHERE state_id='$state_id' ORDER BY city_name";
    $fetch_city_run=mysqli_query($connection,$fetch_city);
    
}
?>
 <select name="city" id="">
    <option value="" selected disabled>Select City</option>
    <?php
    while($r=mysqli_fetch_array($fetch_city_run)){
        echo"<option value='$r[0]'>$r[2]</option>";
    }
    // foreach($ear as $e){
    //     echo"<option>$e</option>";
    // }
    ?>
</select>  