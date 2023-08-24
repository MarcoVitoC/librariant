<?php

namespace App\Interfaces;

interface StatusInterface
{
   public const LOANED = 0;
   public const RETURNED = 1;
   public const RETURN_PENDING = 2;
   public const RENEWED = 3;
}