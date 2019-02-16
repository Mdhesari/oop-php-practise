<?php

/**
 * Writer interface for selecting type
 */
interface poly_writer_Writer
{
    /**
     * For returning kind of contents
     *
     * @param poly_base_Article $obj
     * @return string
     */
    public function write(poly_base_Article $obj);
}

/**
 * XmlWriter which implements the writer interface and returns xml type of content
 */
class poly_write_XMLWriter implements poly_writer_Writer
{
    public function write(poly_base_Article $obj)
    {
        $ret = '<article>';
        $ret .= '<title>' . $this->title . '</title>';
        $ret .= '<author>' . $this->author . '</author>';
        $ret .= '<date>' . $this->date . '</date>';
        $ret .= '<category>' . $this->category . '</category>';
        $ret .= '</article>';
        return $ret;
    }
}

class poly_write_JsonWriter implements poly_writer_Writer
{
    public function write(poly_base_Article $obj)
    {
        $array = array('article' => $this);
        return json_encode($array);
    }
}

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
     * All this method does now is accept and object of writer class (* that is any of class implementing the writer interface)
     * call its write method, passing itslef as the argument then forward its return value straight to the client code
     *
     * It no longer needs to worry about the details of formatting data, and it can focus on its main task
     *
     * @param string $type
     * @return object, string
     *  *** The good and correct way *****
     */
    //
    public function write(poly_writer_Writer $writer)
    {
        return $writer->write($this);
    }
    // **** The bad way ********
    // public function write($type)
    // {
    //     $ret = '';
    //     switch ($type) {
    //         case 'XML':
    //             $ret = '<article>';
    //             $ret .= '<title>' . $this->title . '</title>';
    //             $ret .= '<author>' . $this->author . '</author>';
    //             $ret .= '<date>' . $this->date . '</date>';
    //             $ret .= '<category>' . $this->category . '</category>';
    //             $ret .= '</article>';
    //             break;
    //         case 'JSON':
    //             $array = array('article' => $this);
    //             $ret = json_encode($array);
    //     }

    //     return $ret;
    // }

}

/**
 * Determine the format of writer that client wants
 *
 */
class poly_base_factory
{
    /**
     * Get type of writer
     *
     * @return object
     */
    public static function getWriter()
    {
        // grab request variable
        echo $format = $_REQUEST['format'];
        // construct our class name and check its existence
        $class = 'poly_writer_' . $format . 'Writer';

        if (class_exists($class)) {
            // return a new writer object
            return new $class();
        }

        throw new Exception('Unsupported format');
    }
}

// Put it all together
$article = new poly_base_Article('Polymorphism', 'Mohammad', time(), 1);

try {
    $writer = poly_base_factory::getWriter();
} catch (Exception $e) {
    // Set default value
    $writer = new poly_write_XMLWriter();
}

echo $article->write($writer);
