<?php

namespace App\Requests;

use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Type;

class CreateUpdateConstructionProjectRequest extends BaseRequest
{
    #[NotBlank()]
    protected $name;

    #[NotBlank()]
    protected $location;

    #[NotBlank()]
    protected $stage;

    #[NotBlank()]
    protected $category;

    #[NotBlank()]
    protected $startDate;

    #[NotBlank()]
    protected $description;

    #[NotBlank()]
    #[Type('integer')]
    protected $creatorId;
}