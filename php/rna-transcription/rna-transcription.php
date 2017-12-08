<?php

function toRna(string $dna) : string
{
    $translationMap = array('G'=>'C', 'C'=>'G', 'T'=>'A', 'A'=>'U');
    $rna = '';
    foreach (str_split($dna) as $c)
        $rna .= $translationMap[$c];
    return $rna;
}