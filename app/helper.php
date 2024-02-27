<?php

use App\Models\TemplateImage;
use App\Models\User;

function getUser($userId)
{
    return User::where('id', $userId)->first();
}

function getTemlateImage($templateId)
{
    return TemplateImage::where('template_id', $templateId)->first();
}
