<?php

namespace SmartMetrics;

/**
 * Class describing a single post, with all methods to access/modify the Post
 */
class Post
{
    /**
     * @var string Holds the ID of the post
     */
    private $id;
    /**
     * @var string Holds the Full Name of the owner of the Post
     */
    private $from_name;
    /**
     * @var string Holds the user-id of the owner of the Post
     */
    private $from_id;
    /**
     * @var string The actualy body of the Post
     */
    private $message;
    /**
     * @var string The type of the post
     */
    private $type;
    /**
     * @var string The time the post was created
     */
    private $created_time;
    /**
     * Class constructor, takes the raw array and converts it into the Post object
     * @param array A single JSON decoded post contained in the $post_data variable
     * @return void
     */
    function __construct($post_data)
    {
        $this->id = $post_data->id;
        $this->from_name = $post_data->from_name;
        $this->from_id = $post_data->from_id;
        $this->message = $post_data->message;
        $this->type = $post_data->type;
        $this->created_time = $post_data->created_time;
    }
    /**
     * returns the ID
     * @return string
     */
    public function get_id()
    {
        return $this->id;
    }
    /**
     * returns the from name
     * @return string
     */
    public function get_from_name()
    {
        return $this->from_name;
    }
    /**
     * returns the from id
     * @return string
     */
    public function get_from_id()
    {
        return $this->from_id;
    }
    /**
     * returns the message
     * @return string
     */
    public function get_message()
    {
        return $this->message;
    }
    /**
     * returns the type
     * @return string
     */
    public function get_type()
    {
        return $this->type;
    }
    /**
     * returns the created time
     * @return string
     */
    public function get_created_time()
    {
        return $this->created_time;
    }
    /**
     * returns the length of message
     * @return string
     */
    public function get_message_length()
    {
        return strlen($this->message);
    }
}
