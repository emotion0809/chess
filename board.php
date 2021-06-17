<html>
<?php
session_start();
?>
<table width="100%" height="100%">
    <?php
    $x = $_GET["x"];
    $y = $_GET["y"];
    if ($_SESSION["action"] == 1) {
        switch ($_SESSION["p"][$x][$y]) {
            case "pawn":
                if ($x != 6) {
                    if (islegal_coordinate($x - 1, $y) && $_SESSION["color"][$x - 1][$y] == "blank") $_SESSION["can_move"][$x - 1][$y] = "#00FF00";
                } else {
                    if (islegal_coordinate($x - 1, $y) && $_SESSION["color"][$x - 1][$y] == "blank") $_SESSION["can_move"][$x - 1][$y] = "#00FF00";
                    if (islegal_coordinate($x - 2, $y) && $_SESSION["color"][$x - 2][$y] == "blank") $_SESSION["can_move"][$x - 2][$y] = "#00FF00";
                }
                if (islegal_coordinate($x - 1, $y - 1) && $_SESSION["color"][$x - 1][$y - 1] == $_SESSION["enenmy"]) $_SESSION["can_move"][$x - 1][$y - 1] = "#00FF00";
                if (islegal_coordinate($x - 1, $y + 1) && $_SESSION["color"][$x - 1][$y + 1] == $_SESSION["enenmy"]) $_SESSION["can_move"][$x - 1][$y + 1] = "#00FF00";
                break;
            case "rook":
                $i = 1;
                while (islegal_coordinate($x - $i, $y) && $_SESSION["color"][$x - $i][$y] != $_SESSION["self"] && $_SESSION["color"][$x - $i + 1][$y] != $_SESSION["enenmy"]) {
                    $_SESSION["can_move"][$x - $i][$y] = "#00FF00";
                    $i++;
                }
                $i = 1;
                while (islegal_coordinate($x + $i, $y) && $_SESSION["color"][$x + $i][$y] != $_SESSION["self"] && $_SESSION["color"][$x + $i - 1][$y] != $_SESSION["enenmy"]) {
                    $_SESSION["can_move"][$x + $i][$y] = "#00FF00";
                    $i++;
                }
                $i = 1;
                while (islegal_coordinate($x, $y - $i) && $_SESSION["color"][$x][$y - $i] != $_SESSION["self"] && $_SESSION["color"][$x][$y - $i + 1] != $_SESSION["enenmy"]) {
                    $_SESSION["can_move"][$x][$y - $i] = "#00FF00";
                    $i++;
                }
                $i = 1;
                while (islegal_coordinate($x, $y + $i) && $_SESSION["color"][$x][$y + $i] != $_SESSION["self"] && $_SESSION["color"][$x][$y + $i - 1] != $_SESSION["enenmy"]) {
                    $_SESSION["can_move"][$x][$y + $i] = "#00FF00";
                    $i++;
                }
                break;
            case "knight":
                if (islegal_coordinate($x - 2, $y + 1) && $_SESSION["color"][$x - 2][$y + 1] != $_SESSION["self"]) $_SESSION["can_move"][$x - 2][$y + 1] = "#00FF00";
                if (islegal_coordinate($x - 1, $y + 2) && $_SESSION["color"][$x - 1][$y + 2] != $_SESSION["self"]) $_SESSION["can_move"][$x - 1][$y + 2] = "#00FF00";
                if (islegal_coordinate($x + 1, $y + 2) && $_SESSION["color"][$x + 1][$y + 2] != $_SESSION["self"]) $_SESSION["can_move"][$x + 1][$y + 2] = "#00FF00";
                if (islegal_coordinate($x + 2, $y + 1) && $_SESSION["color"][$x + 2][$y + 1] != $_SESSION["self"]) $_SESSION["can_move"][$x + 2][$y + 1] = "#00FF00";
                if (islegal_coordinate($x + 2, $y - 1) && $_SESSION["color"][$x + 2][$y - 1] != $_SESSION["self"]) $_SESSION["can_move"][$x + 2][$y - 1] = "#00FF00";
                if (islegal_coordinate($x + 1, $y - 2) && $_SESSION["color"][$x + 1][$y - 2] != $_SESSION["self"]) $_SESSION["can_move"][$x + 1][$y - 2] = "#00FF00";
                if (islegal_coordinate($x - 1, $y - 2) && $_SESSION["color"][$x - 1][$y - 2] != $_SESSION["self"]) $_SESSION["can_move"][$x - 1][$y - 2] = "#00FF00";
                if (islegal_coordinate($x - 2, $y - 1) && $_SESSION["color"][$x - 2][$y - 1] != $_SESSION["self"]) $_SESSION["can_move"][$x - 2][$y - 1] = "#00FF00";
                break;
            case "bishop":
                $i = 1;
                $j = 1;
                while (islegal_coordinate($x - $i, $y - $j) && $_SESSION["color"][$x - $i][$y - $j] != $_SESSION["self"] && $_SESSION["color"][$x - $i + 1][$y - $j + 1] != $_SESSION["enenmy"]) {
                    $_SESSION["can_move"][$x - $i][$y - $j] = "#00FF00";
                    $i++;
                    $j++;
                }
                $i = 1;
                $j = 1;
                while (islegal_coordinate($x - $i, $y + $j) && $_SESSION["color"][$x - $i][$y + $j] != $_SESSION["self"] && $_SESSION["color"][$x - $i + 1][$y + $j - 1] != $_SESSION["enenmy"]) {
                    $_SESSION["can_move"][$x - $i][$y + $j] = "#00FF00";
                    $i++;
                    $j++;
                }
                $i = 1;
                $j = 1;
                while (islegal_coordinate($x + $i, $y - $j) && $_SESSION["color"][$x + $i][$y - $j] != $_SESSION["self"] && $_SESSION["color"][$x + $i - 1][$y - $j + 1] != $_SESSION["enenmy"]) {
                    $_SESSION["can_move"][$x + $i][$y - $j] = "#00FF00";
                    $i++;
                    $j++;
                }
                $i = 1;
                $j = 1;
                while (islegal_coordinate($x + $i, $y + $j) && $_SESSION["color"][$x + $i][$y + $j] != $_SESSION["self"] && $_SESSION["color"][$x + $i - 1][$y + $j - 1] != $_SESSION["enenmy"]) {
                    $_SESSION["can_move"][$x + $i][$y + $j] = "#00FF00";
                    $i++;
                    $j++;
                }
                break;
            case "queen";
                $i = 1;
                while (islegal_coordinate($x - $i, $y) && $_SESSION["color"][$x - $i][$y] != $_SESSION["self"] && $_SESSION["color"][$x - $i + 1][$y] != $_SESSION["enenmy"]) {
                    $_SESSION["can_move"][$x - $i][$y] = "#00FF00";
                    $i++;
                }
                $i = 1;
                while (islegal_coordinate($x + $i, $y) && $_SESSION["color"][$x + $i][$y] != $_SESSION["self"] && $_SESSION["color"][$x + $i - 1][$y] != $_SESSION["enenmy"]) {
                    $_SESSION["can_move"][$x + $i][$y] = "#00FF00";
                    $i++;
                }
                $i = 1;
                while (islegal_coordinate($x, $y - $i) && $_SESSION["color"][$x][$y - $i] != $_SESSION["self"] && $_SESSION["color"][$x][$y - $i + 1] != $_SESSION["enenmy"]) {
                    $_SESSION["can_move"][$x][$y - $i] = "#00FF00";
                    $i++;
                }
                $i = 1;
                while (islegal_coordinate($x, $y + $i) && $_SESSION["color"][$x][$y + $i] != $_SESSION["self"] && $_SESSION["color"][$x][$y + $i - 1] != $_SESSION["enenmy"]) {
                    $_SESSION["can_move"][$x][$y + $i] = "#00FF00";
                    $i++;
                }
                $i = 1;
                $j = 1;
                while (islegal_coordinate($x - $i, $y - $j) && $_SESSION["color"][$x - $i][$y - $j] != $_SESSION["self"] && $_SESSION["color"][$x - $i + 1][$y - $j + 1] != $_SESSION["enenmy"]) {
                    $_SESSION["can_move"][$x - $i][$y - $j] = "#00FF00";
                    $i++;
                    $j++;
                }
                $i = 1;
                $j = 1;
                while (islegal_coordinate($x - $i, $y + $j) && $_SESSION["color"][$x - $i][$y + $j] != $_SESSION["self"] && $_SESSION["color"][$x - $i + 1][$y + $j - 1] != $_SESSION["enenmy"]) {
                    $_SESSION["can_move"][$x - $i][$y + $j] = "#00FF00";
                    $i++;
                    $j++;
                }
                $i = 1;
                $j = 1;
                while (islegal_coordinate($x + $i, $y - $j) && $_SESSION["color"][$x + $i][$y - $j] != $_SESSION["self"] && $_SESSION["color"][$x + $i - 1][$y - $j + 1] != $_SESSION["enenmy"]) {
                    $_SESSION["can_move"][$x + $i][$y - $j] = "#00FF00";
                    $i++;
                    $j++;
                }
                $i = 1;
                $j = 1;
                while (islegal_coordinate($x + $i, $y + $j) && $_SESSION["color"][$x + $i][$y + $j] != $_SESSION["self"] && $_SESSION["color"][$x + $i - 1][$y + $j - 1] != $_SESSION["enenmy"]) {
                    $_SESSION["can_move"][$x + $i][$y + $j] = "#00FF00";
                    $i++;
                    $j++;
                }
                break;
            case "king":
                if (islegal_coordinate($x - 1, $y) && $_SESSION["color"][$x - 1][$y] != $_SESSION["self"]) $_SESSION["can_move"][$x - 1][$y] = "#00FF00";
                if (islegal_coordinate($x - 1, $y + 1) && $_SESSION["color"][$x - 1][$y + 1] != $_SESSION["self"]) $_SESSION["can_move"][$x - 1][$y + 1] = "#00FF00";
                if (islegal_coordinate($x, $y + 1) && $_SESSION["color"][$x][$y + 1] != $_SESSION["self"]) $_SESSION["can_move"][$x][$y + 1] = "#00FF00";
                if (islegal_coordinate($x + 1, $y + 1) && $_SESSION["color"][$x + 1][$y + 1] != $_SESSION["self"]) $_SESSION["can_move"][$x + 1][$y + 1] = "#00FF00";
                if (islegal_coordinate($x + 1, $y) && $_SESSION["color"][$x + 1][$y] != $_SESSION["self"]) $_SESSION["can_move"][$x + 1][$y] = "#00FF00";
                if (islegal_coordinate($x + 1, $y - 1) && $_SESSION["color"][$x + 1][$y - 1] != $_SESSION["self"]) $_SESSION["can_move"][$x + 1][$y - 1] = "#00FF00";
                if (islegal_coordinate($x, $y - 1) && $_SESSION["color"][$x][$y - 1] != $_SESSION["self"]) $_SESSION["can_move"][$x][$y - 1] = "#00FF00";
                if (islegal_coordinate($x - 1, $y - 1) && $_SESSION["color"][$x - 1][$y - 1] != $_SESSION["self"]) $_SESSION["can_move"][$x - 1][$y - 1] = "#00FF00";
                break;
        }
        if ($_SESSION["p"][$x][$y] != "blank") {
            $_SESSION["start_x"] = $x;
            $_SESSION["start_y"] = $y;
            $_SESSION["action"] = 2;
        }
    } else {
        if ($_SESSION["can_move"][$x][$y] == "#00FF00") {
            $_SESSION["p"][$x][$y] = $_SESSION["p"][$_SESSION["start_x"]][$_SESSION["start_y"]];
            $_SESSION["p"][$_SESSION["start_x"]][$_SESSION["start_y"]] = "blank";
            $_SESSION["color"][$x][$y] = $_SESSION["color"][$_SESSION["start_x"]][$_SESSION["start_y"]];
            $_SESSION["color"][$_SESSION["start_x"]][$_SESSION["start_y"]] = "blank";
            for ($i = 1; $i <= 8; $i++) {
                for ($j = 1; $j <= 8; $j++) {
                    if (($i + $j) % 2 == 1) {
                        $_SESSION["can_move"][$j - 1][$i - 1] = "#745c57";
                    } else {
                        $_SESSION["can_move"][$j - 1][$i - 1] = "#d9c7a9";
                    }
                }
                $_SESSION["action"] = 1;
            }
        }
    }
    for ($i = 1; $i <= 8; $i++) {
        echo "<tr>";
        for ($j = 1; $j <= 8; $j++) {
            if (($i + $j) % 2 == 1) {
                echo "
                    <td bgcolor = '#745c57' style='border:3px " . $_SESSION["can_move"][$i - 1][$j - 1] . " solid;'>";
                echo "<input id='slot" . $i . "," . $j . "' style='background-color:#745c57' class='" . $_SESSION["p"][$i - 1][$j - 1] . " 'onclick='movs($i,$j)' value='' type='button'>";
                echo "</td>";
            } else {
                echo "
                    <td bgcolor = '#d9c7a9' style='border:3px " . $_SESSION["can_move"][$i - 1][$j - 1] . " solid;'>";
                echo "<input id='slot" . $i . "," . $j . "' style='background-color:#d9c7a9' class='" . $_SESSION["p"][$i - 1][$j - 1] . " 'onclick='movs($i,$j)' value='' type='button'>";
                echo "</td>";
            }
        }
        echo "</tr>";
    }

    function islegal_coordinate($x, $y)
    {
        return ($x >= 0 && $x <= 7 && $y >= 0 && $y <= 7);
    }
    ?>
</table>

</html>