<?php
#script sellisMod02
#created feb.09.2014
#created by s l ellis
$page_title = "Pete's Paint - Purchase Summary";
include'includes/phpheader2.html';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $rates = array('PROFESSIONAL'=>17.50,'REGULAR'=>12.50);
    $types = array('FLAT'=>24.00,'SATIN'=>31.50,'GLOSS'=>27.75);
    
    foreach ($rates as $qual=>$rate){
        if($_POST['labor'] == $qual){
            $hourly = $rate;
        }
            }
        $lcost = $roundTime*$rate;
        foreach ($types as $paint=>$val){
            if($_POST['types'] == $paint){
                $expense = $val;
            }
        }
      $tlExpense = ($expense * $_REQUEST['tlGals'])
              + ($hourly * $_REQUEST['tlTime']);
    
    echo "<p>Thank you for your order, ".$_POST['fname'].' '.$_POST['lname']."</p>
            <p>We have your e-mail on file as: ".$_POST['email']."</p>
            <p>Your selections: <br>".$_REQUEST['labor']." paint work at $".number_format($hourly,2)." per hour.
                <br>".$_REQUEST['types']." finish paint at $".number_format($expense,2)." a gallon.
                <br>Color choice: ".$_REQUEST['colors']."</p>
                <p>Work Order Completion Details:<br>
                Total Area (sq. ft.) - ".$_REQUEST['tlArea']."<br>
                Total required gallons of paint - ".$_REQUEST['tlGals']."<br>
                Total labor hours to complete - ".$_REQUEST['tlTime']."<br>
                TOTAL EXPENSE: $".number_format($tlExpense,2)."<p>";
//BRINGING THE WALL DIMENSIONS BACK IN
$widths = explode(",", $_POST['userWidths']);
$heights = explode(",", $_POST['userHeights']);
echo '<p>Wall dimensions provided:<br>
    <select name="walls">';
    $index=0;
    for ($index=0, $x=1; $index<count($widths); $index++, $x++){
        echo '<option value="'.$index.'">'.
             "wall $x: width $widths[$index] x height $heights[$index]".
             '</option>';//NEEDS RETURNED
    }
    echo'</select></p>';
} //SERVER POST COMPLETE
    echo '</div>'; //END CONTENT DIV STARTED IN HEADER2.HTML 
    include'includes/phpfooter.html';
    ?>