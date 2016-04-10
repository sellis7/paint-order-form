<?php
#script sellisMod02
#created feb.09.2014
#created by s l ellis
$page_title = "Pete's Paint - only the best!";
include'includes/phpheader.html';

function makeMenu($widths, $heights){ //FUNCTION FOR WALLS DROP MENU
    echo'<select name="walls">';
    $index=0;
    for ($index=0, $x=1; $index<count($widths); $index++, $x++){
        echo '<option value="'.$index.'">'.
             "wall $x: width $widths[$index] x height $heights[$index]".
             '</option>';//NEEDS RETURNED
    }
    echo'</select>';
    if($widths[0] != ''){ // PROVIDE SUMMARY BTN WHEN ARRAYS ARE AVAILABLE
        echo '<p><input type="submit" name="summary" value="Summarize Details"/></p>';
    }
} //END MAKEMENU FUNC
//CALC CLIENT SUMMARY INFO WITH SUBMITTED WALL DIMENSIONS
function calcWalls($widths, $heights){ 
    $rates = array('PROFESSIONAL'=>17.50,'REGULAR'=>12.50);
    $types = array('FLAT'=>24.00,'SATIN'=>31.50,'GLOSS'=>27.75);

    DEFINE('COVERAGE',310);
    DEFINE('TIME',8);

    $index=0;
    $totalTime=0;
    $totalGal = 0;
    echo "<div id='summary'>";
    echo "<table><tr>
            <th>&nbsp;</th>
            <th>Wall Width</th>
            <th>Wall Height</th>
            <th>Total Area</th>
            <th>Paint/Gal</th>
            <th>Labor Hours</th>
            </tr>"; //BEGIN TABLE 1
    for ($index=0, $x=1; $index<count($widths); $index++, $x++){ 
        $area = $widths[$index]*$heights[$index];
        $gallons = $area/COVERAGE;
        $totalGal+=$gallons;
        $labor = $gallons*TIME;
        $totalTime+=$labor;
        $totalArea+=$area;
        echo "<tr>
            <td>Wall $x</td>
            <td>$widths[$index]</td>
            <td>$heights[$index]</td>
            <td>$area</td>
            <td>".number_format($gallons,2)."</td>
            <td>".number_format($labor,2)."</td></tr>";
        } //END OF 1ST TABLE LOOP
    $roundTime = ceil(number_format($totalTime,2));
    $roundGal = ceil(number_format($totalGal,2));
    echo "<tr><td>TOTALS</td>
        <td></td><td></td>
        <td>$totalArea</td>
        <td>$roundGal</td>
        <td>$roundTime</td>
        </tr></table>"; //END OF TABLE 1
    echo "<table><tr>
        <th>Job Type</th>
        <th>Paint Type</th>
        <th>Labor Cost</th>
        <th>Paint Cost</th>
        <th>TOTAL COST</th></tr>";
    foreach ($rates as $qual=>$rate){
        $lcost = $roundTime*$rate;
        foreach ($types as $paint=>$val){
            $costPaint = $val*$roundGal;
            $finalCost = $lcost + $costPaint;
            echo "<tr><td>$qual</td>
                <td>$paint</td>
                <td>".number_format($lcost,2)."</td>
                <td>".number_format($costPaint,2)."</td>
                <td>".number_format($finalCost,2)."</td>
                </tr>";
        } //CLOSE SECOND FOREACH
     } //CLOSE FIRST FOREACH
     echo "</table></div>"; //END SUMMARY DIV & TABLE 2
     //RETURN ALL NEEDED CALCULATIONS FOR ORDERSUM.PHP
     return $jobTotals = array($roundGal, $roundTime, $totalArea);  
} //END OF CALCWALLS FUNC

function showSummary(){
    require'orderForm.php'; // PROVIDE SECONDARY FORM FIELDS TO ORDER  
}

$widths = array(); //INITIALIZE EMPTY ARRAYS
$heights = array();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $widths = explode(",", $_POST['userWidths']);
    $heights = explode(",", $_POST['userHeights']);
    if ($widths[0]== "" && $heights[0]== ""){
        unset($widths[0]);
        unset($heights[0]);
        $widths = array_values($widths);
        $heights = array_values($heights);
    }
    // Minimal form validation:
    if (is_numeric($_POST['width'])&& is_numeric($_POST['height'])){ 
        $w = $_POST['width'];
        $h = $_POST['height'];
        array_push($widths, $w);
        array_push($heights, $h);       
    }     
}//END SERVER REQUEST METHOD!
?>
<div id="detailsForm"> <!-- establish wall details for summary -->
    <form action="" method="post">
        <div id="dimensions">
        <h3>Wall Measurements</h3>
            <p>width (in feet): <input type="text" name="width"/>
            &nbsp;height (in feet): <input type="text" name="height" />
            <span>&nbsp;<input type="submit" name="submit" value="Add Wall Dimensions"/>
            </span></p>
            <p>Submitted wall dimensions: <?php makeMenu($widths, $heights);?></p>
        </div>
<?php 
    $single_ww = implode(',', $widths); //WIDTH STRING TO PASS AND HIDE
    echo '<input type="hidden" name="userWidths" value="' . htmlspecialchars($single_ww) . '">';
    $single_wh = implode(',', $heights); //HEIGHT STRING TO PASS AND HIDE
    echo '<input type="hidden" name="userHeights" value="' . htmlspecialchars($single_wh) . '">';
    if(isset($_POST['summary'])){ //PROVIDE ALL CALCULATIONS
            $jobTotals = calcWalls($widths, $heights);
            } 
?>
    </form> <!-- end of details form w php action on this page -->
</div>    <!-- end of detailsForm div -->
<div id='summaryForm'>  <!-- place last part of order form -->
    <form action='ordersum.php' method='post'>
<?php  //ACTIVATE SHOWSUMMARY FUNCTION FOR LAST FORM
    if(isset($_POST['summary'])){ //PROVIDE THE ORDER DETAILS PAGE
                echo "<input type='hidden' value=".$jobTotals[0]." name='tlGals' />
                    <input type='hidden' value=".$jobTotals[1]." name='tlTime' />
                    <input type='hidden' value=".$jobTotals[2]." name='tlArea' />
                    <input type='hidden' name='userWidths' value=". htmlspecialchars($single_ww) .">
                    <input type='hidden' name='userHeights' value=". htmlspecialchars($single_wh) .">"
                    .showSummary();
                }
  ?>
    </form></div>
 <?php
    echo '</div>'; //END CONTENT DIV STARTED IN HEADER.HTML 
    include'includes/phpfooter.html';
    ?>