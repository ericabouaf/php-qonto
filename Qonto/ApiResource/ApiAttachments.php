<?php

namespace neyric\Qonto\ApiResource;

use neyric\Qonto\Core\ApiResource;
use neyric\Qonto\Model\Attachment;
use neyric\Qonto\Model\AttachmentResponse;

class ApiAttachments extends ApiResource
{

    /**
     * @param string $attachmentId
     * 
     * @return Attachment
     */
    public function get($attachmentId)
    {
        $data = $this->fetch('/attachments/' . $attachmentId);
        $attachmentResponse = $this->denormalize($data, AttachmentResponse::class);
        return $attachmentResponse->attachment;
    }

}