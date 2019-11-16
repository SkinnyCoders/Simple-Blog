<?php
defined('BASEPATH') or exit('No direct script access allowed');

function translateMonth($date)
    {
        $date = explode(' ', $date);
        switch ($date[1]) {
            case 'January':
                $date[1] = 'Januari';
                break;
            case 'February':
                $date[1] = 'Februari';
                break;
            case 'August':
                $date[1] = 'Agustus';
                break;
            case 'January':
                $date[1] = 'Januari';
                break;
            case 'January':
                $date[1] = 'Januari';
                break;
            case 'January':
                $date[1] = 'Januari';
                break;
            case 'January':
                $date[1] = 'Januari';
                break;
        }
        return $date[0]." ".$date[1]." ".$date[2];
    }

 	function rupiah($duit){
 		return number_format($duit, 2,',','.');
 	}