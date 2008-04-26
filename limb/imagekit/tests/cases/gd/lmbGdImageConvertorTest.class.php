<?php
/*
 * Limb PHP Framework
 *
 * @link http://limb-project.com
 * @copyright  Copyright &copy; 2004-2007 BIT(http://bit-creative.com)
 * @license    LGPL http://www.gnu.org/copyleft/lesser.html
 */

lmb_require(dirname(__FILE__).'/../../../src/gd/lmbGdImageConvertor.class.php');

class lmbGdImageConvertorTest extends UnitTestCase {

  function _getInputImage()
  {
    return dirname(__FILE__).'/../../var/input.jpg';
  }

  function _getOutputImage()
  {
    return dirname(__FILE__).'/../../var/output.jpg';
  }

  function _getConvertor($params = array())
  {
    return new lmbGdImageConvertor($params);
  }

  function testApply()
  {
    $conv = $this->_getConvertor();
    $conv->load($this->_getInputImage());
    $conv->apply('resize', array('width' => 50, 'height' => 70, 'preserve_aspect_ratio' => false));

    $conv->save($this->_getOutputImage());
    list($width, $height, $type) = getimagesize($this->_getOutputImage());
    $this->assertEqual($width, 50);
    $this->assertEqual($height, 70);
  }

  function testApplyByOverload()
  {
    $conv = $this->_getConvertor();
    $conv->load($this->_getInputImage());
    $conv->resize(array('width' => 50, 'height' => 70, 'preserve_aspect_ratio' => false));

    $conv->save($this->_getOutputImage());
    list($width, $height, $type) = getimagesize($this->_getOutputImage());
    $this->assertEqual($width, 50);
    $this->assertEqual($height, 70);
  }

  function testApplyBatch()
  {
    $batch = array(
      array('resize' => array('width' => 50, 'height' => 60, 'preserve_aspect_ratio' => false)),
      array('rotate' => array('angle' => 90))
    );
    $conv = $this->_getConvertor();
    $conv->load($this->_getInputImage());
    $conv->applyBatch($batch);

    $conv->save($this->_getOutputImage());
    list($width, $height, $type) = getimagesize($this->_getOutputImage());
    $this->assertEqual($width, 60);
    $this->assertEqual($height, 50);
  }
  
  function testFilterLocator()
  {
    $path = dirname(__FILE__).'/../../var/filters';    
    $conv = $this->_getConvertor(array('add_filters_scan_dirs' => $path));
    $conv->load($this->_getInputImage());
    $conv->apply('test');
    $conv = $this->_getConvertor(array('add_filters_scan_dirs' => array($path)));
    $conv->load($this->_getInputImage());
    $conv->apply('test');
    $conv = $this->_getConvertor(array('filters_scan_dirs' => $path));
    $conv->load($this->_getInputImage());
    $conv->apply('test');
    $conv = $this->_getConvertor(array('filters_scan_dirs' => array($path)));
    $conv->load($this->_getInputImage());
    $conv->apply('test');
  }

  function testCheckSupportConv()
  {
    $conv = $this->_getConvertor();

    $this->assertTrue($conv->isSupportConversion('', 'jpeg', 'gif'));
    $this->assertTrue($conv->isSupportConversion($this->_getInputImage()));
    $this->assertFalse($conv->isSupportConversion($this->_getInputImage(), '', 'zxzx'));
  }

  function tearDown()
  {
    @unlink($this->_getOutputImage());
  }
}
?>