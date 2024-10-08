<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TransferResource extends JsonResource
{
    /**
     * The status of the response.
     *
     * @var bool
     */
    public $status;

    /**
     * The message of the response.
     *
     * @var string
     */
    public $message;

    /**
     * Create a new resource instance.
     *
     * @param bool $status
     * @param string $message
     * @param mixed $resource
     * @return void
     */
    public function __construct($status, $message, $resource)
    {
        // Call parent constructor to pass the resource
        parent::__construct($resource);
        $this->status  = $status;
        $this->message = $message;
    }

    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'status' => $this->status,
            'message' => $this->message,
            'data' => parent::toArray($request), // Pass the resource data
        ];
    }
}
