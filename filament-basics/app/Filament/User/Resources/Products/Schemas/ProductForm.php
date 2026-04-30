<?php

namespace App\Filament\User\Resources\Products\Schemas;

use App\Filament\Resources\Products\Schemas\ProductForm as AdminProductForm;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return AdminProductForm::configure($schema);
    }
}
