<?php
/**
 * PHPWord
 *
 * Copyright (c) 2011 PHPWord
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPWord
 * @package    PHPWord
 * @copyright  Copyright (c) 010 PHPWord
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt    LGPL
 * @version    Beta 0.6.3, 08.07.2011
 */


/**
 * PHPWord_DocumentProperties
 *
 * @category   PHPWord
 * @package    PHPWord
 * @copyright  Copyright (c) 2009 - 2011 PHPWord (http://www.codeplex.com/PHPWord)
 */
class PHPWord_Template {
    
    /**
     * ZipArchive
     * 
     * @var ZipArchive
     */
    private $_objZip;
    
    /**
     * Temporary Filename
     * 
     * @var string
     */
    private $_tempFileName;
    
    /**
     * Document XML
     * 
     * @var string
     */
    private $_documentXML;
    private $_headerXML;
    private $_footerXML;
    
    
    /**
     * Create a new Template Object
     * 
     * @param string $strFilename
     */
    public function __construct($strFilename) {
        $path = dirname($strFilename);
        $this->_tempFileName = $path.DIRECTORY_SEPARATOR.time().'.docx';
        
        copy($strFilename, $this->_tempFileName); // Copy the source File to the temp File

        $this->_objZip = new ZipArchive();
        $this->_objZip->open($this->_tempFileName);
        
        $this->_documentXML = $this->_objZip->getFromName('word/document.xml');
        $this->_headerXML = $this->_objZip->getFromName('word/header2.xml');
        $this->_footerXML = $this->_objZip->getFromName('word/footer1.xml');
    }
    
    /**
     * Set a Template value
     * 
     * @param mixed $search
     * @param mixed $replace
     */
    
    public function setValue($search, $replace) {
        if(substr($search, 0, 2) !== '${' && substr($search, -1) !== '}') {
            $search = '${'.$search.'}';
            // $search = '/\$\{.*?'.$search.'.*?\}/is';
        }
        
        if(!is_array($replace)) {
            $replace = utf8_encode($replace);
        }
        
        $this->_documentXML = str_replace($search, $replace, $this->_documentXML);
        $this->_headerXML = str_replace($search, $replace, $this->_headerXML);
        $this->_footerXML = str_replace($search, $replace, $this->_footerXML);
    }
    
    /**
     * Clone a table row
     * 
     * @param mixed $search
     * @param mixed $numberOfClones
     */
	public function cloneRow($search, $numberOfClones) {
        if(substr($search, 0, 2) !== '${' && substr($search, -1) !== '}') {
            $search = '${'.$search.'}';
        }
        		
		$tagPos 	 = strpos($this->_documentXML, $search);
		$rowStartPos = strrpos($this->_documentXML, "<w:tr ", ((strlen($this->_documentXML) - $tagPos) * -1));
		$rowEndPos   = strpos($this->_documentXML, "</w:tr>", $tagPos) + 7;

		$result = substr($this->_documentXML, 0, $rowStartPos);
		$xmlRow = substr($this->_documentXML, $rowStartPos, ($rowEndPos - $rowStartPos));
		for ($i = 1; $i <= $numberOfClones; $i++) {
			$result .= preg_replace('/\$\{(.*?)\}/','\${\\1#'.$i.'}', $xmlRow);
		}
		$result .= substr($this->_documentXML, $rowEndPos);

		$this->_documentXML = $result;
	}
    
    /**
     * Save Template
     * 
     * @param string $strFilename
     */
    public function save($strFilename) {
        if(file_exists($strFilename)) {
            unlink($strFilename);
        }
        
        $this->_objZip->addFromString('word/document.xml', $this->_documentXML);
        $this->_objZip->addFromString('word/header2.xml', $this->_headerXML);
        $this->_objZip->addFromString('word/footer1.xml', $this->_footerXML);
        
        // Close zip file
        if($this->_objZip->close() === false) {
            throw new Exception('Could not close zip file.');
        }
        
        rename($this->_tempFileName, $strFilename);
    }
}
?>