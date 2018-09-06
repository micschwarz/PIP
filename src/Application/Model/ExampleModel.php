<?php

namespace Application\Model;

class ExampleModel extends \System\Model
{
    public function getSomething($id)
    {
        $id = $this->escapeString($id);
        return $this->query('SELECT * FROM something WHERE id="' . $id . '"');
    }
}
