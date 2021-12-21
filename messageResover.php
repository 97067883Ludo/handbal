<?php

function uploadResover($upload, $msg){
    if ($msg == 1) {
        switch ($upload) {
            case 1:
                return'
                <div class="alert alert-danger">
                    <strong>Let op!</strong> er is geen lijst toegevoegd, de huidige lijst wordt gebruikt.
                </div>
                ';
                break;
            case 2:
                return'
                <div class="alert alert-danger">
                    <strong>Let op!</strong> het bestand dat je probeert te uploaden is geen excel bestand.
                </div>
                ';
                break;
            case 3:
                return'
                <div class="alert alert-danger">
                    <strong>Let op!</strong> Het bestand dat je probeert te uploaden is te groot, gebruik een ander bestand.
                </div>
                ';
                break;
            default:
                return'
                <div class="alert alert-success">
                    <strong>Success!</strong> de lijst is succesvol geüpload.
                </div>
                ';
                break;
        }
    }
}
