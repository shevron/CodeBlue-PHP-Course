<?php

class FileLines implements Iterator
{
    protected $handle;

    protected $line = null;

    protected $lineNum = 0;

    public function __construct($filename)
    {
        $this->handle = fopen($filename, 'r');
        if (! $this->handle) {
            throw new Exception("Unable to open $filename for reading");
        }

        $this->next();
    }

    public function current()
    {
        return $this->line;
    }

    public function key()
    {
        return $this->lineNum; 
    }

    public function next()
    {
        $this->line = fgets($this->handle);
        $this->lineNum++;
    }

    public function valid()
    {
        return ! feof($this->handle);
    }

    public function rewind()
    {
        fseek($this->handle, 0);
        $this->lineNum = 0;
        $this->next();
    }
}

$file =  new FileLines(__FILE__);

foreach($file as $num => $line) {
    echo "LINE {$num}: $line";
}

foreach($file as $num => $line) {
    echo "LINE {$num}: $line";
}
