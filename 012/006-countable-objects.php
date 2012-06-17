<?php

class AlbumCollection implements Countable, IteratorAggregate
{
    protected $albums = array();

    protected $albumCount = 0;

    public function add(Album $album)
    {
        if (! isset($this->albums[$album->getId()])) {
            $this->albums[$album->getId()] = $album;
            $this->albumCount++;
        }

        return $this;
    }

    public function getIterator()
    {
        return new ArrayIterator($this->albums);
    }

    public function count()
    {
        return $this->albumCount;
    }
}

$myAlbums = new AlbumCollection();
$myAlbums->add(new Album("Pink Floyd", "Echoes"))
         ->add(new Album("Led Zeppelin", "Led Zeppelin IV"))
         ->add(new Album("Ofer Levi", "Ohev Lichiot"));

echo count($myAlbums); // will print '3'
