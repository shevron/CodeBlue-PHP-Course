<?php

/**
 * Decorator pattern example
 *
 * This example shows how the decorator pattern can be used to add functionality
 * (both state modifications and new operations) dynamically, without creating
 * complex class instances
 */

interface MessageBoxInterface
{
    public function getMessageHtml();
    public function toHtml();
}

class SimpleMessageBox implements MessageBoxInterface
{
    protected $message = null;

    public function __construct($text)
    {
        $this->message = $text;
    }

    public function getMessageHtml()
    {
        return '<p class="message">' . htmlspecialchars($this->message) . '</p>';
    }

    public function toHtml()
    {
        return $this->getMessageHtml();
    }
}

abstract class MessageBoxDecorator implements MessageBoxInterface
{
    protected $messageBox = null;

    public function __construct(MessageBoxInterface $messageBox)
    {
        $this->messageBox = $messageBox;
    }

    public function setMessage($text)
    {
        return $this->messageBox->setMessage($text);
    }

    public function getMessageHtml()
    {
        return $this->messageBox->getMessageHtml();
    }

    public function toHtml()
    {
        return '<div class="message-box">' . $this->getMessageHtml() . '</div>';
    }
}

class IconMessageBoxDecorator extends MessageBoxDecorator
{
    protected $icon = null;

    public function setIcon($src)
    {
        $this->icon = $src;
    }

    public function getMessageHtml()
    {
        $html = $this->messageBox->getMessageHtml();
        if ($this->icon) {
            $html = '<img src="' . $this->icon . '" />' . $html;
        }
        return $html;
    }
}

class TitlebarMessageBoxDecorator extends MessageBoxDecorator
{
    protected $title = null;

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getMessageHtml()
    {
        $html = $this->messageBox->getMessageHtml();
        if ($this->title) {
            $html = '<h3>' . htmlspecialchars($this->title) . '</h3>' . $html;
        }
        return $html;
    }
}

$message = new SimpleMessageBox("Nobody expects the spanish inquisition!");

// Decorate message with an icon
$iconMessage = new IconMessageBoxDecorator($message);
$iconMessage->setIcon('warning.png');

// Decorate message with a title bar
$titleMessage = new TitlebarMessageBoxDecorator($iconMessage);
$titleMessage->setTitle("Important Warning");

echo $titleMessage->toHtml() . "\n";
