<?php

/**
 * Decorator pattern example
 *
 * This example does not implement the Decorator pattern, but rather
 * demonstrates the problem which is solved by Decorator
 */

class SimpleMessageBox
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

class IconMessageBox extends SimpleMessageBox
{
    protected $icon = null;

    public function setIcon($src)
    {
        $this->icon = $src;
    }

    public function getMessageHtml()
    {
        $html = parent::getMessageHtml();
        if ($this->icon) {
            $html = '<img src="' . $this->icon . '" />' . $html;
        }
        return $html;
    }
}

class TitlebarMessageBox extends SimpleMessageBox
{
    protected $title = null;

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getMessageHtml()
    {
        $html = parent::getMessageHtml();
        if ($this->title) {
            $html = '<h3>' . htmlspecialchars($this->title) . '</h3>' . $html;
        }
        return $html;
    }
}

$message = new SimpleMessageBox("Nobody expects the spanish inquisition!");

echo $message->toHtml() . "\n";

$iconMessage = new IconMessageBox("This one has a warning icon!");
$iconMessage->setIcon('warning.png');

echo $iconMessage->toHtml() . "\n";

// Decorate message with a title bar
$titleMessage = new TitlebarMessageBox("This one has a title");
$titleMessage->setTitle("Important Warning");

echo $titleMessage->toHtml() . "\n";

// Now, what if we wanted to have a class that does both unordered list printing
// and span wrapping? We will have to repeat a lot of code... Or, use the
// Decorator pattern (see 004-decorator-pattern-002.php)
