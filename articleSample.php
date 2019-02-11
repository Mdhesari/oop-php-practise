<?php

class poly_base_Article
{
    /**
     * Title (short desc)
     *
     * @var string
     */
    private $title;

    /**
     * Author who has written the article
     *
     * @var string
     */
    private $author;

    /**
     * Date and time
     *
     * @var string
     */
    private $date;

    /**
     * Category what subject or topic
     *
     * @var [type]
     */
    private $category;

    /**
     * Set values
     *
     * @param string $title
     * @param string $author
     * @param string $date
     * @param string $category
     */
    public function __construct($title, $author, $date, $category)
    {
        $this->title = $title;
        $this->author = $author;
        $this->date = $date;
        $this->category = $category;
    }

    /**
     * Output the information into different formats
     *
     * @param string $type
     * @return object, string
     */
    public function write($type)
    {
        $ret = '';
        switch ($type) {
            case 'XML':
                $ret = '<article>';
                $ret .= '<title>' . $this->title . '</title>';
                $ret .= '<author>' . $this->author . '</author>';
                $ret .= '<date>' . $this->date . '</date>';
                $ret .= '<category>' . $this->category . '</category>';
                $ret .= '</article>';
                break;
            case 'JSON':
                $array = array('article' => $this);
                $ret = json_encode($array);
        }

        return $ret;
    }
}
