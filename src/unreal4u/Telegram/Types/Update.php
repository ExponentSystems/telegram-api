<?php

declare(strict_types = 1);

namespace unreal4u\Telegram\Types;

use unreal4u\InternalFunctionality\AbstractFiller;
use unreal4u\Telegram\Types\Message;

/**
 * This object represents an incoming update.
 * Only one of the optional parameters can be present in any given update.
 *
 * Objects defined as-is january 2016
 *
 * @see https://core.telegram.org/bots/api#update
 */
class Update extends AbstractFiller
{
    /**
     * The update‘s unique identifier. Update identifiers start from a certain positive number and increase
     * sequentially. This ID becomes especially handy if you’re using Webhooks, since it allows you to ignore repeated
     * updates or to restore the correct update sequence, should they get out of order.
     * @var int
     */
    public $update_id = 0;

    /**
     * Optional. New incoming message of any kind — text, photo, sticker, etc.
     * @var Message
     */
    public $message = null;

    /**
     * Optional. New incoming inline query
     * @var null
     */
    public $inline_query = null;

    /**
     * Optional. The result of a inline query that was chosen by a user and sent to their chat partner
     * @var null
     */
    public $chosen_inline_result = null;

    public function __construct(\stdClass $data = null)
    {
        if (!empty($data->message)) {
            $data->message = new Message($data->message);
        }

        if (!empty($data->inline_query)) {
            // TODO
        }

        if (!empty($data->chosen_inline_result)) {
            // TODO
        }

        parent::__construct($data);
    }
}