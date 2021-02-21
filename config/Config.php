<?php

namespace SmartMetrics;

class Config
{
    private $client_id = "ju16a6m81mhid5ue1z3v2g0uh";
    private $email = "chitkosarvesh@gmail.com";
    private $name = "Sarvesh Chitko";
    private $register_url = "https://api.supermetrics.com/assignment/register";
    private $post_url = "https://api.supermetrics.com/assignment/posts";
    private $number_of_pages = 10;

    public function get_client_id()
    {
        return $this->client_id;
    }

    public function get_email()
    {
        return $this->email;
    }

    public function get_name()
    {
        return $this->name;
    }

    public function get_register_url()
    {
        return $this->register_url;
    }

    public function get_post_url()
    {
        return $this->post_url;
    }
    public function get_number_of_pages()
    {
        return $this->number_of_pages;
    }
}
