<?php


/**
 * Class for parsing robots.txt
 */
class RobotsTxt {

    /**
     * The site, which is owned by robots.txt.
     */
    private $_url = '';
    
    private $data = array();
    
     /**
     * server response 
     */
    public $_header = array();
    
    /**
     * @param $url string - URL, для которого следует парсить robots.txt
     */
    public function __construct($url)
    {
        $this->_url = $this->getUrl($url);
        $this->_header = get_headers($this->_url, 1);

        $this->data['directives'] = $this->getDirectives();
        $this->data['file_size'] = (int) $this->_header['Content-Length'];
        $this->data['FILE_MAX_SIZE'] = 32768;  //32Кб;
        $this->data['host'] = $this->getOneDirective('host');  
        $this->data['sitemap'] = $this->getOneDirective('sitemap');
        $this->data['code_response'] = $this->getServerResponseCode();
    }
    
    private function getUrl($url) 
    {
        $arrUrl = @parse_url($url);
        if (false === $arrUrl) {
            throw new Exception('Невозможно распарсить URL "' . $url . '"');
        }
        if (empty($arrUrl['scheme']) || empty($arrUrl['host'])) {
            $error = 'Введенный URL "' . $url . '" не содержит схемы и имени хоста';
            throw new Exception($error);
        }
        $url = $arrUrl['scheme'] . '://' . $arrUrl['host'] . '/';
        $this->data['site'] = $arrUrl['host'];
        return $url . 'robots.txt';
    }
    
    private function getDirectives()
    {
        $directives = file($this->_url);
        if (false === $directives) {
            $error = 'Файл ' . $this->_url . ' не существует или не может быть загружен.';
            throw new Exception($error);
        }
        return $directives;
    }
    
    private function getOneDirective($name)
    {
        
        if (empty($this->data['directives'])) return false;
        
        foreach ($this->data['directives'] as $value) {
            $value = strtolower($value);
            if (false !== strpos($value, $name)) {
                $arr[] = $value;
            }
        }
        return $arr;
    }

    public function getServerResponseCode()
    {
        return (int) explode(" ", $this->_header[0])[1];   
    }
    
    public function __get($name) 
    {
        if (array_key_exists($name, $this->data)) {
            return $this->data[$name];
        }
    }
}