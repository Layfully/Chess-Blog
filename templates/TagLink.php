<?php
class TagLink
{
    public $tagData;
    public $classes;

    function __construct($tagData, $classes=""){
        $this->tagData = explode(",", $tagData);
        $this->classes = $this->removeMaliciousCode($classes);
    }

    function render(){
        echo"<div class='buttons has-addons $this->classes'>";
        foreach ($this->tagData as $tag){
            echo"
                <a class='button is-rounded is-danger is-small is-outlined has-background' href='?task=home&action=index&id=".$this->removeMaliciousCode($tag)."'>
                ".$this->removeMaliciousCode($tag)."
                </a>
            ";
        }
        echo'</div>';
    }
    function removeMaliciousCode($input)
    {
        return htmlentities($input, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    }
}
?>
