<?php
namespace App\classes;
class Home
{
    public function index()
    {
        header('location: pages/action.php?page=');
    }
}
