<?php
namespace MailPoetVendor\Twig\Node\Expression\Binary;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Twig\Compiler;
class MatchesBinary extends AbstractBinary
{
 public function compile(Compiler $compiler)
 {
 $compiler->raw('preg_match(')->subcompile($this->getNode('right'))->raw(', ')->subcompile($this->getNode('left'))->raw(')');
 }
 public function operator(Compiler $compiler)
 {
 return $compiler->raw('');
 }
}
\class_alias('MailPoetVendor\\Twig\\Node\\Expression\\Binary\\MatchesBinary', 'MailPoetVendor\\Twig_Node_Expression_Binary_Matches');
