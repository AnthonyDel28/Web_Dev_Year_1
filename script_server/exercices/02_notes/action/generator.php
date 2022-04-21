<section class="result">

<?php
include ('../data/notes.php');
require_once ('../lib/tools.php');
?>

<table>
    <thead>
        <tr">
            <th colspan="2">Physic Exam, BAC +2</th>
        </tr>
    </thead>
    <tbody>
        <?php
            ksort($notes);
            foreach($notes as $student => $note){
                print "<tr style='background-color:".colorNote($note).";'>";
                print '<td>'.$student.'</td>';
                print "<td>".$note."</td>";
                print "<td>".noteWord($note)."";
                print "</tr>";
            }
        ?>
    </tbody>
</table>

</section>