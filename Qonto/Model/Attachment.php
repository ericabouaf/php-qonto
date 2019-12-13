<?php

namespace neyric\Qonto\Model;

class Attachment
{
    public $id;

    /**
     * @var \DateTime
     */
    public $created_at;

    public $file_name;

    /**
     * @var string
     * NOTE: the api doc specifize int, but it is not the case
     */
    public $file_size;

    public $file_content_type;

    public $url;
}