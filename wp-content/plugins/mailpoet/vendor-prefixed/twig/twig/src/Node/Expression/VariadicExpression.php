<?php
namespace MailPoetVendor\Twig\Node\Expression;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Twig\Compiler;
class VariadicExpression extends ArrayExpression
{
 public function compile(Compiler $compiler)
 {
 $compiler->raw('...');
 parent::compile($compiler);
 }
}
