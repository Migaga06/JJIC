<?php

class About extends Controller
{
    public function index()
    {
        $this->view('about');
    }
    public function history()
    {
        $this->view('history');
    }
}