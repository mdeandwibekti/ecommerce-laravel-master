<?php

namespace App\Actions;

use TCG\Voyager\Actions\Action;

class MarkOrderShipped extends Action
{
    public function getTitle()
    {
        return 'Mark as Shipped';
    }

    public function getIcon()
    {
        return 'voyager-truck';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-success',
        ];
    }

    public function getDefaultRoute()
    {
        return route('orders.mark-shipped', $this->data->{$this->data->getKeyName()});
    }

    public function shouldActionDisplayOnDataType()
    {
        return $this->dataType->slug == 'orders' && !$this->data->shipped;
    }
}