<?php

namespace SmartMetrics;

class Post
{
    private $id;
    private $from_name;
    private $from_id;
    private $message;
    private $type;
    private $created_time;
    function __construct($post_data)
    {
        $this->id = $post_data->id;
        $this->from_name = $post_data->from_name;
        $this->from_id = $post_data->from_id;
        $this->message = $post_data->message;
        $this->type = $post_data->type;
        $this->created_time = $post_data->created_time;
    }
    public function get_id()
    {
        return $this->id;
    }
    public function get_from_name()
    {
        return $this->from_name;
    }
    public function get_from_id()
    {
        return $this->from_id;
    }
    public function get_message()
    {
        return $this->message;
    }
    public function get_type()
    {
        return $this->type;
    }
    public function get_created_time()
    {
        return $this->created_time;
    }
    public function get_message_length()
    {
        return strlen($this->message);
    }
}
