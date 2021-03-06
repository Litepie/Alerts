<?php

namespace Litepie\Alerts\Repositories\Presenter;

use Litepie\Alerts\Models\Notification;
use League\Fractal\TransformerAbstract;

class NotificationListTransformer extends TransformerAbstract
{
    public function transform(Notification $notification)
    {
        return [
            'id'              => $notification->getRouteKey(),
            'type'            => substr(strrchr($notification->type, '\\'), 1),
            'notifiable_id'   => $notification->notifiable_id,
            'notifiable_type' => @$notification->notifiable->name,
            'data'            => $notification->data,
            'read_at'         => $notification->read_at,
            'user'            => @$notification->data['user'],
            'action'          => @$notification->data['action'],
            'created_at'      => format_date($notification->created_at),
            'updated_at'      => format_date($notification->updated_at),
        ];
    }
}
