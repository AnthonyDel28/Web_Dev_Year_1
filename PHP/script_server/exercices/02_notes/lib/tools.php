<?php


function colorNote($note) :string {
    $i = $note;
    if($i < 10)
        return "#d64343";
    elseif($i >= 10 && $i < 12)
        return "#8c8c8c";
    elseif($i >= 12 && $i < 14) 
        return "#d6d343";
    elseif($i >= 14 && $i < 16)
        return "#68d643";
    elseif($i >= 16 && $i < 18)
        return "#439dd6";
    else
        return "#9843d6";
}

function noteWord($note) :string {
    $i = $note;
    if($i < 10)
        return "Échec";
    elseif($i >= 10 && $i < 12)
        return "Sans mention";
    elseif($i >= 12 && $i < 14) 
        return "Satisfaisant";
    elseif($i >= 14 && $i < 16)
        return "Distinction";
    elseif($i >= 16 && $i < 18)
        return "Grande distinction";
    else
        return "<b>Plus grande distinction</b>";
}
?>